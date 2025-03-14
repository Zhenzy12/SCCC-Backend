<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $users = User::all(['id', 'firstName', 'middleName', 'lastName', 'email', 'for_911', 'for_inventory']);
            return response()->json($users, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
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
    public function dashboard(Request $request, string $id)
    {
        //
        try {
            // Validate the incoming request
            $request->validate([
                'for_911' => 'required|boolean', // Ensure for_911 is required and boolean
            ]);

            // Find the resource (row) to update
            $resource = User::findOrFail($id);

            // Update the specific column (for_911)
            $resource->for_911 = $request->input('for_911');
            $resource->save();

            // Return updated resource
            return response()->json(['message' => 'Role updated successfully', $resource], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function inventory(Request $request, string $id)
    {
        //
        try {
            // Validate the incoming request
            $request->validate([
                'for_inventory' => 'required|boolean', // Ensure for_inventory is required and boolean
            ]);

            // Find the resource (row) to update
            $inventory_role = User::findOrFail($id);

            // Update the specific column (for_inventory)
            $inventory_role->for_inventory = $request->input('for_inventory');
            $inventory_role->save();

            // Return updated resource
            return response()->json(['message' => 'Role updated successfully', $inventory_role], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function archive(Request $request, string $id)
    {
        //
        try {
            // Validate the incoming request
            $request->validate([
                'for_inventory' => 'required|boolean', // Ensure for_inventory is required and boolean
                'for_911' => 'required|boolean', // Ensure for_911 is required and boolean
            ]);
    
            // Find the resource (row) to update
            $inventory_role = User::findOrFail($id);
    
            // Update the specific column (for_inventory)
            $inventory_role->for_inventory = $request->input('for_inventory');
            $inventory_role->for_911 = $request->input('for_911');
            $inventory_role->save();
    
            // Return updated resource
            return response()->json(['message' => 'User Access has been changed successfully', $inventory_role], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
