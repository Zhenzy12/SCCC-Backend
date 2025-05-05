<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Source;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SourceController extends Controller
{
    //
    public function index()
    {
        //
        try {
            $sources = Source::all();

            Tracking::create([
                'category' => 'Source',
                'user_id' => Auth::id(),
                'action' => 'Viewed',
                'data' => json_encode($sources->toArray()), // ✅ Important
                'description' => 'A Source was viewed by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json($sources);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
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
        try {
            $validated = $request->validate([
                'sources' => 'required'
            ]);
            $source = Source::create([
                'sources' => $validated['sources']
            ]);

            Tracking::create([
                'category' => 'Source',
                'user_id' => Auth::id(),
                'action' => 'Created',
                'data' => json_encode($source->toArray()), // ✅ Important
                'description' => 'A Source was created by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $source,
                'message' => 'Source created successfully'
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
            $source = Source::findOrFail($id);
            return response()->json([
                $source,
                'message' => 'Source retrieved successfully'
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
            $source = Source::findOrFail($id);
            $validated = $request->validate([
                'sources' => 'required'
            ]);
            $source->update([
                'sources' => $validated['sources']
            ]);

            Tracking::create([
                'category' => 'Source',
                'user_id' => Auth::id(),
                'action' => 'Updated',
                'data' => json_encode($source->toArray()), // ✅ Important
                'description' => 'A Source was updated by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $source,
                'message' => 'Source updated successfully'
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
            $source = Source::findOrFail($id);
            $source->delete();

            Tracking::create([
                'category' => 'Source',
                'user_id' => Auth::id(),
                'action' => 'Deleted',
                'data' => json_encode($source->toArray()), // ✅ Important
                'description' => 'A Source was deleted by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                'message' => 'Source deleted successfully'
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
