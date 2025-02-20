<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Source;
use App\Models\ActionsTaken;
use App\Models\Incident;
use App\Models\TypeOfAssistance;
use App\Models\Barangay;

class ReportController extends Controller
{
    //
    public function index()
    {
        $sources = Source::all();
        $incidents = Incident::all();
        $barangays = Barangay::all();
        $actions = ActionsTaken::all();
        $assistance = TypeOfAssistance::all();
        // dd($sources);

        return response()->json([
            'sources' => $sources,
            'actions' => $actions,
            'incidents' => $incidents,
            'assistance' => $assistance,
            'barangays' => $barangays
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'time' => 'required',
            'date_received' => 'required',
            'arrival_on_site' => 'required',
            'name' => 'required',
            'landmark' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'source_id' => 'required',
            'incident_id' => 'required',
            'barangay_id' => 'required',
            'actions_id' => 'required',
            'assistance_id' => 'required',
        ]);

        $report = Report::create([
            'time' => $request->time,
            'date_received' => $request->date_received,
            'arrival_on_site' => $request->arrival_on_site,
            // 'name' => auth()->user()->name,
            'name' => $request->name,
            'landmark' => $request->landmark,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'source_id' => $request->source_id,
            'incident_id' => $request->incident_id,
            'barangay_id' => $request->barangay_id,
            'actions_id' => $request->actions_id,
            'assistance_id' => $request->assistance_id,
        ]);

        return response()->json([
            'message' => 'Report created successfully!',
            'report' => $report,
        ]);
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
        $request->validate([
            'time' => 'required',
            'date_received' => 'required',
            'arrival_on_site' => 'required',
            'user_id' => 'required',
            'source_id' => 'required',
            'incident_id' => 'required',
            'barangay_id' => 'required',
            'actions_id' => 'required',
            'assistance_id' => 'required',
        ]);

        $report = Report::find($id);

        if (!$report) {
            return response()->json([
                'message' => 'Report not found'
            ], 404);
        }

        $report->update([
            'time' => $request->time,
            'date_received' => $request->date_received,
            'arrival_on_site' => $request->arrival_on_site,
            'user_id' => $request->user_id,
            'source_id' => $request->source_id,
            'incident_id' => $request->incident_id,
            'barangay_id' => $request->barangay_id,
            'actions_id' => $request->actions_id,
            'assistance_id' => $request->assistance_id,
        ]);

        return response()->json([
            'message' => 'Report updated successfully',
            'report' => $report
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
