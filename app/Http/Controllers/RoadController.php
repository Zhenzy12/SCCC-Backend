<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Road;

class RoadController extends Controller
{
    public function index()
    {
        //
        try {
            $roads = Road::all();

            return response()->json([
                'roads' => $roads,
            ], 200);

        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);

        }
    }
}
