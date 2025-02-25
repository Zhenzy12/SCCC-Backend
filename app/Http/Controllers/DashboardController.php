<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\TypeOfAssistance;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $incidents = Incident::all();
        $assistance = TypeOfAssistance::all();
        // $assistance = Incident::with('assistance')
        // ->select('assistance_id', DB::raw('count(*) as total'))
        // ->groupBy('assistance_id')
        // ->get();
        $report = Report::all();

        return response()->json([
                'incidents' => $incidents, 
                'assistance' => $assistance,
                'report' => $report
            ], 200);
    }
}
