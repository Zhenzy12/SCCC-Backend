<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\TypeOfAssistance;
use App\Models\Report;
use App\Models\Source;
use App\Models\Urgency;
use Exception;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function recent()
    {
        try {
            $recents = Report::with([
                'source:id,sources', 
                'incident:id,type', 
                'actions:id,actions', 
                'assistance:id,assistance', 
                'barangay:id,name,longitude,latitude',
                'urgency:id,urgency'])
                ->latest()
                ->take(5)
                ->get();
            return response()->json([
                'recents' => $recents
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function total_reports()
    {
        try {
            $total = Report::count();
            return response()->json([
                'total' => $total
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
