<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActionsTaken;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Tracking;

class ActionsTakenController extends Controller
{
    //
    public function index()
    {
        //
        try {
            $actions = ActionsTaken::all();
            return response()->json($actions);
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
                'actions' => 'required'
            ]);
            $action = ActionsTaken::create([
                'actions' => $validated['actions']
            ]);

            Tracking::create([
                'category' => 'Actions Taken',
                'user_id' => Auth::id(),
                'action' => 'Created',
                'data' => json_encode($action->toArray()), // ✅ Important
                'description' => 'An Actions Taken was created by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $action,
                'message' => 'Actions Taken created successfully'
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
            $action = ActionsTaken::findOrFail($id);
            return response()->json([
                $action,
                'message' => 'Actions Taken retrieved successfully'
            ], 200);
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
                'actions' => 'required'
            ]);
            $action = ActionsTaken::findOrFail($id);
            $action->update([
                'actions' => $validated['actions']
            ]);

            Tracking::create([
                'category' => 'Actions Taken',
                'user_id' => Auth::id(),
                'action' => 'Updated',
                'data' => json_encode($action->toArray()), // ✅ Important
                'description' => 'An Actions Taken was updated by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $action,
                'message' => 'Actions Taken updated successfully'
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
            $action = ActionsTaken::findOrFail($id);
            $action->delete();

            Tracking::create([
                'category' => 'Actions Taken',
                'user_id' => Auth::id(),
                'action' => 'Deleted',
                'data' => json_encode($action->toArray()), // ✅ Important
                'description' => 'An Actions Taken was deleted by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                $action,
                'message' => 'Actions Taken deleted successfully'
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
