<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    //
    public function index()
    {
        //
        return response()->json('this is a test', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'landmark' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $location = Location::create([
            'name' => $request->name,
            'landmark' => $request->landmark,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return response()->json([
            'message' => 'Location created successfully!',
            'location' => $location,
        ]);
    }

}
