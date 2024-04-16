<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create($advertisementId)
    {
        $advertisement = Advertisement::findOrFail($advertisementId);

        return view('ratings.create', compact('advertisement'));
    }

    public function store(Request $request, $advertisementId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        $advertisement = Advertisement::findOrFail($advertisementId);

        $rating = $advertisement->ratings()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['rating' => $request->rating]
        );

        //$this->updateAdvertisementRating($advertisement);

        return redirect()->route('advertisements.show', compact('advertisement'))->with('success', 'Rating updated successfully.');
    }


    private function updateAdvertisementRating(Advertisement $advertisement)
    {
        $averageRating = $advertisement->ratings()->avg('rating');
        $advertisement->update(['rating' => $averageRating]);
    }
}
