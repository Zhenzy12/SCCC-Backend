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
use App\Http\Resources\ReportCollection;
use App\Http\Resources\SourceCollection;
use App\Http\Requests\ReportRequest;
use App\Models\Urgency;
use Exception;

class ReportController extends Controller
{
    //
    public function index()
    {
        //
        try {
            $sources = Source::all();
            $incidents = Incident::all();
            $barangays = Barangay::all();
            $actions = ActionsTaken::all();
            $assistance = TypeOfAssistance::all();
            $urgencies = Urgency::all();

            return response()->json([
                'sources' => $sources,
                'actions' => $actions,
                'incidents' => $incidents,
                'assistance' => $assistance,
                'barangays' => $barangays,
                'urgencies' => $urgencies,
            ], 200);

        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);

        }
    }

    public function create(Request $request, ReportRequest $reportRequest)
    {
        //
        try {
            $reportRequest->validated();

            $report = Report::create([
                'time' => $reportRequest->time,
                'date_received' => $reportRequest->date_received,
                'arrival_on_site' => $reportRequest->arrival_on_site,
                'name' => $reportRequest->name,
                'landmark' => $reportRequest->landmark,
                'longitude' => $reportRequest->longitude,
                'latitude' => $reportRequest->latitude,
                'source_id' => $reportRequest->source_id,
                'incident_id' => $reportRequest->incident_id,
                'barangay_id' => $reportRequest->barangay_id,
                'actions_id' => $reportRequest->actions_id,
                'assistance_id' => $reportRequest->assistance_id,
                'urgency_id' => $reportRequest->urgency_id,
            ]);

            return response()->json([
                'message' => 'Report created successfully!',
                'report' => $report,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
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
        try {
            $report = Report::with([
                'source:id,sources', 
                'incident:id,type', 
                'actions:id,actions', 
                'assistance:id,assistance', 
                'barangay:id,name,longitude,latitude',
                'urgency:id,urgency'
            ])->findOrFail($id);

            return response()->json($report, 200);

        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 404);

        }
    }

    public function display()
    {
        //
        try {
            $urgencies = Urgency::all();
            $classification = TypeOfAssistance::all();
            $report = Report::with([
                'source:id,sources', 
                'incident:id,type', 
                'actions:id,actions', 
                'assistance:id,assistance', 
                'barangay:id,name,longitude,latitude',
                'urgency:id,urgency'
            ])->orderBy('id', 'desc')->get();

            if ($report->isEmpty()) {
                return response()->json(['message' => 'No reports found'], 404);
            } else {
                return response()->json([$report, $classification, $urgencies], 200); 
            }

        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
            
        }
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {

            $report = Report::with([
                'source:id,sources', 
                'incident:id,type', 
                'actions:id,actions', 
                'assistance:id,assistance', 
                'barangay:id,name,longitude,latitude',
                'urgency:id,urgency'
            ])->where('id', $id)->first();

            return response()->json($report, 200);

        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 404);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, ReportRequest $reportRequest)
    {
        //
        try {
            $reportRequest->validated();

            $report = Report::find($id);

            if (!$report) {
                return response()->json([
                    'message' => 'Report not found'
                ], 404);
            }

            $report->update([
                'time' => $reportRequest->time,
                'date_received' => $reportRequest->date_received,
                'arrival_on_site' => $reportRequest->arrival_on_site,
                'user_id' => $reportRequest->user_id,
                'source_id' => $reportRequest->source_id,
                'incident_id' => $reportRequest->incident_id,
                'barangay_id' => $reportRequest->barangay_id,
                'name' => $reportRequest->name,
                'latitude' => $reportRequest->latitude,
                'longitude' => $reportRequest->longitude,
                'landmark' => $reportRequest->landmark,
                'actions_id' => $reportRequest->actions_id,
                'assistance_id' => $reportRequest->assistance_id,
                'urgency_id' => $reportRequest->urgency_id,
            ]);

            return response()->json([
                'message' => 'Report updated successfully',
                'report' => $report
            ]);

        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);

        }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {

            $report = Report::find($id);

            if (!$report) {
                return response()->json([
                    'error' => 'Report not found'
                ], 404);
            }

            $report->delete();
            return response()->json([
                'message' => 'Report deleted successfully'
            ]);

        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);

        }
    }
}
