<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $assistance = Assistance::all();
            return response()->json($assistance);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $validated = $request->validate([
                'assistance' => 'required'
            ]);
            $assistance = Assistance::create([
                'assistance' => $validated['assistance']
            ]);

            Tracking::create([
                'category' => 'Assistance',
                'user_id' => Auth::id(),
                'action' => 'Created',
                'data' => json_encode($assistance->toArray()), // ✅ Important
                'description' => 'An Assistance was created by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $assistance,
                'message' => 'Assistance created successfully'
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
            $assistance = Assistance::findOrFail($id);
            return response()->json($assistance);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $validated = $request->validate([
                'assistance' => 'required'
            ]);
            $assistance = Assistance::findOrFail($id);
            $assistance->update([
                'assistance' => $validated['assistance']
            ]);

            Tracking::create([
                'category' => 'Assistance',
                'user_id' => Auth::id(),
                'action' => 'Updated',
                'data' => json_encode($assistance->toArray()), // ✅ Important
                'description' => 'An Assistance was updated by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $assistance,
                'message' => 'Assistance updated successfully'
            ], 201);
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
            $assistance = Assistance::findOrFail($id);
            $assistance->delete();

            Tracking::create([
                'category' => 'Assistance',
                'user_id' => Auth::id(),
                'action' => 'Deleted',
                'data' => json_encode($assistance->toArray()), // ✅ Important
                'description' => 'An Assistance was deleted by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                'message' => 'Assistance deleted successfully'
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
