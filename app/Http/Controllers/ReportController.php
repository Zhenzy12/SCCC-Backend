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
use App\Http\Requests\ReportRequest;
use App\Models\Urgency;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;

use Exception;

class ReportController extends Controller
{
    //
    public function index()
    {
        //
        try {
            // $sources = Source::all();
            // $incidents = Incident::all();
            // $barangays = Barangay::all();
            // $actions = ActionsTaken::all();
            // $assistance = TypeOfAssistance::all();
            // $urgencies = Urgency::all();

            // return response()->json([
            //     'sources' => $sources,
            //     'actions' => $actions,
            //     'incidents' => $incidents,
            //     'assistance' => $assistance,
            //     'barangays' => $barangays,
            //     'urgencies' => $urgencies,
            // ], 200);
            $report = Report::with([
                'source:id,sources', 
                'incident:id,type', 
                'actions:id,actions', 
                'assistance:id,assistance', 
                'barangay:id,name,longitude,latitude',
                'urgency:id,urgency'
            ])->orderBy('id', 'desc')->get();

            // if ($report->isEmpty()) {
            //     return response()->json(['message' => 'No reports found'], 404);
            // } else {
                return response()->json($report, 200); 
            // }

        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);

        }
    }

    // public function create(Request $request, ReportRequest $reportRequest)
    // {
    //     //
    //     try {
    //         $reportRequest->validated();

    //         $report = Report::create([
    //             'time' => $reportRequest->time,
    //             'date_received' => $reportRequest->date_received,
    //             'arrival_on_site' => $reportRequest->arrival_on_site,
    //             'name' => $reportRequest->name,
    //             'landmark' => $reportRequest->landmark,
    //             'longitude' => $reportRequest->longitude,
    //             'latitude' => $reportRequest->latitude,
    //             'source_id' => $reportRequest->source_id,
    //             'incident_id' => $reportRequest->incident_id,
    //             'barangay_id' => $reportRequest->barangay_id,
    //             'actions_id' => $reportRequest->actions_id,
    //             'assistance_id' => $reportRequest->assistance_id,
    //             'urgency_id' => $reportRequest->urgency_id,
    //             'description' => $reportRequest->description,
    //         ]);

    //         Tracking::create([
    //             'category' => 'Report',
    //             'user_id' => Auth::id(),
    //             'action' => 'Created',
    //             'data' => json_encode($report->toArray()), // ✅ Important
    //             'description' => 'A Report was created by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
    //         ]);

    //         return response()->json([
    //             'message' => 'Report created successfully!',
    //             'report' => $report,
    //         ], 201);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $reportRequest)
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
                'description' => $reportRequest->description,
            ]);

            Tracking::create([
                'category' => 'Report',
                'user_id' => Auth::id(),
                'action' => 'Created',
                'data' => json_encode($report->toArray()), // ✅ Important
                'description' => 'A Report was created by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                'message' => 'Report created successfully!',
                'report' => $report,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Restore the specified resource.
     */
    public function restore(ReportRequest $reportRequest)
    {
        //
        try {
            $reportRequest->validated();
            $report = new Report($reportRequest->all());
            $report->id = $reportRequest->id;
            $report->exists = false; // force it to treat as insert
            $report->save();

            Tracking::create([
                'category' => 'Report',
                'user_id' => Auth::id(),
                'action' => 'Restored',
                'data' => json_encode($report->toArray()), // ✅ Important
                'description' => 'A Report was restored by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                'message' => 'Report restored successfully!',
                'report' => $report,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
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
                'description' => $reportRequest->description,
            ]);

            Tracking::create([
                'category' => 'Report',
                'user_id' => Auth::id(),
                'action' => 'Updated',
                'data' => json_encode($report->toArray()), // ✅ Important
                'description' => 'A Report was updated by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
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

            Tracking::create([
                'category' => 'Report',
                'user_id' => Auth::id(),
                'action' => 'Deleted',
                'data' => json_encode($report->toArray()), // ✅ Important
                'description' => 'A Report was deleted by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

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

    public function destroyMultiple(Request $request)
    {
        try {
            // Get the selected reports from the request
            $selectedReports = $request->input('data'); // Full report objects

            // Initialize an array to store deleted report data
            $deletedReportsData = [];

            // Loop through each report in the selected reports
            foreach ($selectedReports as $reportData) {
                // Find the report by ID and delete it
                $report = Report::findOrFail($reportData['id']);  // Using findOrFail to ensure the report exists
                $report->delete();

                // Add the deleted report data to the array for tracking
                $deletedReportsData[] = $reportData;
            }

            // Track the deletion for all reports outside the loop
            Tracking::create([
                'category' => 'Report',
                'user_id' => Auth::id(),
                'action' => 'Multiple Delete',
                'data' => json_encode($deletedReportsData), // Pass the data of all deleted reports
                'description' => 'Multiple reports were deleted by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                'message' => 'Reports deleted successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
