<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\TypeOfAssistance;
use App\Models\Report;

class IncidentController extends Controller
{
    //
    public function index()
    {
        //
        $classification = TypeOfAssistance::all();

        // Fetches all reports with their associated data and sort by id through descending order
        $report = Report::with(['source', 'incident', 'actions', 'assistance', 'barangay'])->orderBy('id', 'desc')->get();

        if ($report->isEmpty()) {
            return response()->json(['message' => 'No reports found'], 404);
        } else {
           return response()->json([$report, $classification], 200); 
        }
    }

    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
