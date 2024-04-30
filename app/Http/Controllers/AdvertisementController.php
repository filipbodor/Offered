<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\FavoriteAdvertisement;
use App\Models\Location;
use App\Models\Subcategory;
class AdvertisementController extends Controller
{

    public function show(Advertisement $advertisement)
    {
        $userRating = $advertisement->ratings()->where('user_id', auth()->id())->first();

        $averageRating = Advertisement::with('ratings')->findOrFail($advertisement->id)->ratings()->avg('rating');;
        $averageRating = round($averageRating, 1); // Round to one decimal place for display

        return view('advertisements.show', compact('advertisement', 'userRating', 'averageRating'));

    }
    public function index()
    {
        $categories = Category::with('subcategories')->get();

        $advertisements = Advertisement::paginate(10);
        return view('advertisements.index', compact('advertisements', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $locations = Location::all();


        return view('advertisements.create', compact('categories', 'locations', 'subcategories'));
    }

    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $categories = Category::all();

        return view('advertisements.edit', compact('advertisement', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'location_id' => 'required|exists:locations,id',
            'services.*' => 'required|string|max:255',
            'prices.*' => 'required|numeric',
        ]);

        $advertisement = Advertisement::findOrFail($id);
        $advertisement->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'location_id' => $request->location_id, // Assuming location_id is directly provided
        ]);

        // Handle dynamic services and prices
        // First, remove all existing services to replace them with the new set
        $advertisement->services()->delete(); // Consider soft deleting if you want to keep records

        $services = $request->input('services', []);
        $prices = $request->input('prices', []);

        foreach ($services as $index => $service) {
            if (!empty($service) && isset($prices[$index])) {
                $advertisement->services()->create([
                    'service_name' => $service,
                    'price' => $prices[$index],
                ]);
            }
        }

        return redirect()->route('advertisements.show', compact('advertisement'))->with('success', 'Advertisement updated successfully.');
    }

    public function store(Request $request)
    {
        // Validate the request data including services and prices
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'location' => 'required|exists:locations,name',
            'services.*' => 'required_with:prices.*|string|max:255',
            'prices.*' => 'required_with:services.*|numeric',
        ]);

        try {
            // Create a new advertisement instance and save it to the database
            $advertisement = new Advertisement([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'location_id' => Location::where('name', $request->location)->first()->id,
            ]);
            $advertisement->save();

            // Handle dynamic services and prices
            $services = $request->input('services', []);
            $prices = $request->input('prices', []);

            foreach ($services as $index => $service) {
                if (!empty($service) && isset($prices[$index])) {
                    $advertisement->services()->create([
                        'service_name' => $service,
                        'price' => $prices[$index],
                    ]);
                }
            }

            return redirect()->route('advertisements.show', compact('advertisement'))->with('success', 'Advertisement created successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error($e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to create advertisement. Please try again.');
        }
    }


    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);

        $this->authorize('delete', $advertisement);

        $advertisement->favoriteAdvertisements()->delete();

        $advertisement->delete();

        return redirect()->route('advertisements.index')->with('success', 'Advertisement deleted successfully.');
    }

    public function search(Request $request)
    {

        $query = Advertisement::query();

        $hasLocationDistance = $request->filled('location') && $request->filled('distance');

        if ($hasLocationDistance) {
            $location = Location::where('name', $request->location)->first(['latitude', 'longitude']);

            if ($location) {
                $currentLatitude = $location->latitude;
                $currentLongitude = $location->longitude;
                $distance = $request->distance;

                if ($request->filled('keywords')) {
                    $keywords = $request->keywords . '*';
                    $query->whereRaw("MATCH(title, description) AGAINST(? IN BOOLEAN MODE)", [$keywords]);
                }

                $query->whereHas('location', function ($query) use ($currentLatitude, $currentLongitude, $distance) {
                    $query->select('*')
                        ->selectRaw("(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS dist", [$currentLatitude, $currentLongitude, $currentLatitude])
                        ->havingRaw("dist <= ?", [$distance]);
                });
            } else {
                $query->whereRaw('1 = 0');
            }
        } else if ($request->filled('location')) {
            // If location is set but keywords are not, still filter by location
            $location = Location::where('name', $request->location)->first(['latitude', 'longitude']);

            if ($location) {
                $currentLatitude = $location->latitude;
                $currentLongitude = $location->longitude;
                $distance = $request->distance ?? 0; // Set default distance to 0 if not provided

                $query->whereHas('location', function ($query) use ($currentLatitude, $currentLongitude, $distance) {
                    $query->select('*')
                        ->selectRaw("(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS dist", [$currentLatitude, $currentLongitude, $currentLatitude])
                        ->havingRaw("dist <= ?", [$distance]);
                });
            } else {
                $query->whereRaw('1 = 0');
            }
        } else if ($request->filled('keywords')) {
            $keywords = $request->keywords . '*';
            $query->whereRaw("MATCH(title, description) AGAINST(? IN BOOLEAN MODE)", [$keywords]);
        }

        $categories = Category::with('subcategories')->get();
        $advertisements = $query->paginate(10);

        return view('advertisements.search', compact('advertisements', 'categories'));
    }



    public function getByCategoryAndSubcategory($category, $subcategory = null) {
        $category = Category::findOrFail($category);

        // Initialize the query to filter advertisements by category
        $query = Advertisement::where('category_id', $category->id);

        // If a subcategory is provided, further filter the advertisements by subcategory
        if ($subcategory) {
            $query->where('subcategory_id', $subcategory);
        }

        $advertisements = $query->paginate(10); // Paginate 10 items per page
        $categories = Category::with('subcategories')->get();

        return view('advertisements.category', compact('advertisements', 'category', 'categories'));
    }
    public function filter(Request $request)
    {
        $query = Advertisement::query();

        // Set default sorting options if not provided
        $request->merge([
            'rating_sort' => $request->filled('rating_sort') ? $request->rating_sort : 'rating_asc',
            'newest_sort' => $request->filled('newest_sort') ? $request->newest_sort : 'newest',
        ]);

        // Filter by advertisement type
        if ($request->filled('advertisement_type')) {
            if ($request->advertisement_type == 'my') {
                $query->where('user_id', auth()->id());
            } elseif ($request->advertisement_type == 'favorites') {
                $favoriteAdvertisementIds = FavoriteAdvertisement::where('user_id', auth()->id())
                    ->pluck('advertisement_id');
                $query->whereIn('id', $favoriteAdvertisementIds);
            }
        }

        // Handle rating sort
        if ($request->filled('rating_sort')) {
            $direction = $request->rating_sort == 'rating_asc' ? 'asc' : 'desc';
            $query->withAvg('ratings', 'rating')->orderBy('ratings_avg_rating', $direction);
        }

        // Handle newest sort
        if ($request->filled('newest_sort')) {
            $direction = $request->newest_sort == 'newest' ? 'desc' : 'asc';
            $query->orderBy('created_at', $direction);
        }

        $advertisements = $query->paginate(10);
        $categories = Category::with('subcategories')->get();

        return view('advertisements.index', compact('advertisements', 'categories'));
    }

}
