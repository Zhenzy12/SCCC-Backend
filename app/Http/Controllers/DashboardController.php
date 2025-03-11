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
        $report = Report::all();

        return response()->json([
                'incidents' => $incidents, 
                'assistance' => $assistance,
                'report' => $report
            ], 200);
    }
}
