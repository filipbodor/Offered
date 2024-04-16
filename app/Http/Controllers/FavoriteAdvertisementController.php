<?php


namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class FavoriteAdvertisementController extends Controller
{
    public function add(Advertisement $advertisement)
    {
        auth()->user()->favoriteAdvertisements()->attach($advertisement);

        return back()->with('success', 'Advertisement added to favorites');
    }

    public function remove(Advertisement $advertisement)
    {
        auth()->user()->favoriteAdvertisements()->detach($advertisement);

        return back()->with('success', 'Advertisement removed from favorites');
    }
}
