<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\TypeOfAssistance;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Exception;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $incidents = Incident::all();
        $assistance = TypeOfAssistance::all();
        $report = Report::all();

        return response()->json([
            'incidents' => $incidents, 
            'assistance' => $assistance,
            'report' => $report
        ], 200);
    }

    public function recent()
    {
        try {
        $recent = Report::with(['source:id,sources', 'incident:id,type', 'actions:id,actions', 'assistance:id,assistance', 'barangay:id,name,longitude,latitude'])->latest()->take(5)->get();
        return response()->json([
            'recent' => $recent
        ], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong'], 500);
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
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
