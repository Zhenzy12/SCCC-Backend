<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Road;
use App\Models\Inbound;
use App\Models\Outbound;

class RoadController extends Controller
{

    public function index()
    {
        //
        try {
            $roads = Road::all();
            $inbounds = Inbound::all();
            $outbounds = Outbound::all();
            foreach ($roads as $road) {
                $road->inbound = $inbounds->where('road_id', $road->id)->first();
                $road->outbound = $outbounds->where('road_id', $road->id)->first();
            }

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
