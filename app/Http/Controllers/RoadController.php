<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Road;
use App\Models\Inbound;
use App\Models\Outbound;
use Illuminate\Support\Facades\Log;

class RoadController extends Controller
{
    public function index()
    {
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

        } catch (\Exception $e) {
            Log::error("Error fetching roads: " . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateInbound(Request $request, Road $road)
    {
        try {
            // Force status_id to be an integer
            $status_id = (int) $request->status_id;
            
            // Log incoming request data for debugging
            Log::info('Inbound update request', [
                'road_id' => $road->id,
                'raw_status_id' => $request->status_id,
                'converted_status_id' => $status_id
            ]);
            
            $inbound = Inbound::where('road_id', $road->id)->firstOrFail();
            
            // Use direct property assignment instead of mass update
            $inbound->status_id = $status_id;
            $inbound->save();
            
            // Get a fresh instance to ensure we have what was actually saved
            $freshInbound = $inbound->fresh();
            
            Log::info('Inbound update completed', [
                'road_id' => $road->id,
                'new_status_id' => $freshInbound->status_id
            ]);

            return response()->json([
                'success' => true,
                'inbound' => $freshInbound
            ]);

        } catch (\Exception $e) {
            Log::error("Error updating inbound: " . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateOutbound(Request $request, Road $road)
    {
        try {
            // Force status_id to be an integer
            $status_id = (int) $request->status_id;
            
            Log::info('Outbound update request', [
                'road_id' => $road->id,
                'raw_status_id' => $request->status_id,
                'converted_status_id' => $status_id
            ]);
            
            $outbound = Outbound::where('road_id', $road->id)->firstOrFail();
            
            // Use direct property assignment instead of mass update
            $outbound->status_id = $status_id;
            $outbound->save();
            
            // Get a fresh instance to ensure we have what was actually saved
            $freshOutbound = $outbound->fresh();
            
            Log::info('Outbound update completed', [
                'road_id' => $road->id,
                'new_status_id' => $freshOutbound->status_id
            ]);

            return response()->json([
                'success' => true,
                'outbound' => $freshOutbound
            ]);

        } catch (\Exception $e) {
            Log::error("Error updating outbound: " . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}