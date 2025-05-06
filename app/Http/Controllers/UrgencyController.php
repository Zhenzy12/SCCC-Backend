<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Urgency;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UrgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $urgencies = Urgency::all();

            return response()->json($urgencies);
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $validated = $request->validate([
                'urgency' => 'required'
            ]);
            $urgency = Urgency::create([
                'urgency' => $validated['urgency']
            ]);

            Tracking::create([
                'category' => 'Urgency',
                'user_id' => Auth::id(),
                'action' => 'Created',
                'data' => json_encode($urgency->toArray()), // ✅ Important
                'description' => 'An Urgency was created by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);
            return response()->json([
                $urgency,
                'message' => 'Urgency created successfully'
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
            $urgency = Urgency::findOrFail($id);
            return response()->json($urgency);
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
                'urgency' => 'required'
            ]);
            $urgency = Urgency::findOrFail($id);
            $urgency->update([
                'urgency' => $validated['urgency']
            ]);

            Tracking::create([
                'category' => 'Urgency',
                'user_id' => Auth::id(),
                'action' => 'Updated',
                'data' => json_encode($urgency->toArray()), // ✅ Important
                'description' => 'An Urgency was updated by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);
            
            return response()->json([
                $urgency,
                'message' => 'Urgency updated successfully'
            ], 201);
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
            $urgency = Urgency::findOrFail($id);
            $urgency->delete();

            Tracking::create([
                'category' => 'Urgency',
                'user_id' => Auth::id(),
                'action' => 'Deleted',
                'data' => json_encode($urgency->toArray()), // ✅ Important
                'description' => 'An Urgency was deleted by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);
            
            return response()->json([
                $urgency,
                'message' => 'Urgency deleted successfully'
            ], 201);
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
