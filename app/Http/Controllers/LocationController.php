<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location; // Ensure this matches the namespace of your Location model

class LocationController extends Controller
{
    /**
     * Handle the search request for locations.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Fetch locations matching the query
        $locations = Location::where('name', 'like', '%' . $query . '%')
            ->limit(6) // Limit the number of results
            ->get();

        return response()->json($locations);
    }
}
