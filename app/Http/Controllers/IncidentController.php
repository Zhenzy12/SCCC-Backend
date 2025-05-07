<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\TypeOfAssistance;
use App\Models\Report;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    //
    public function index()
    {
        //
        try {
            $incident = Incident::all();
            return response()->json($incident, 200);
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
        try {
            $validated = $request->validate([
                'type' => 'required'
            ]);
            $incident = Incident::create([
                'type' => $validated['type']
            ]);

            Tracking::create([
                'category' => 'Incident',
                'user_id' => Auth::id(),
                'action' => 'Created',
                'data' => json_encode($incident->toArray()),
                'description' => 'An Incident was created by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $incident,
                'message' => 'Incident created successfully'
            ], 201);
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
            $incident = Incident::findOrFail($id);
            return response()->json([
                $incident,
                'message' => 'Incident retrieved successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $validated = $request->validate([
                'type' => 'required'
            ]);
            $incident = Incident::findOrFail($id);
            $incident->update([
                'type' => $validated['type']
            ]);

            Tracking::create([
                'category' => 'Incident',
                'user_id' => Auth::id(),
                'action' => 'Updated',
                'data' => json_encode($incident->toArray()),
                'description' => 'An Incident was updated by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $incident,
                'message' => 'Incident updated successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 404);
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
            $incident = Incident::findOrFail($id);
            $incident->delete();

            Tracking::create([
                'category' => 'Incident',
                'user_id' => Auth::id(),
                'action' => 'Deleted',
                'data' => json_encode($incident->toArray()),
                'description' => 'An Incident was deleted by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $incident,
                'message' => 'Incident deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
