<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barangay;
use Exception;
use App\Http\Requests\BarangayRequest;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barangays = Barangay::all(['id', 'name', 'longitude', 'latitude']);

        
        return response()->json($barangays, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, BarangayRequest $barangayRequest)
    {
        //
        try {
            $barangayRequest->validated();

            $barangay = Barangay::create([
                'name' => $barangayRequest->name,
                'longitude' => $barangayRequest->longitude,
                'latitude' => $barangayRequest->latitude,
            ]);

            return response()->json([
                'message' => 'Barangay created successfully!',
                'barangay' => $barangay,
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create barangay',
                'error' => $e->getMessage(),
            ], 500);
        }
        // $request->validate([
        //     'name' => 'string|max:255',
        //     'longitude' => 'nullable|numeric',
        //     'latitude' => 'nullable|numeric',
        // ]);

        // $barangay = Barangay::create([
        //     'name' => $request->name,
        //     'longitude' => $request->longitude,
        //     'latitude' => $request->latitude,
        // ]);

        // return response()->json([
        //     'message' => 'Barangay created successfully!',
        //     'barangay' => $barangay,
        // ]);
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
        try {
            $barangay = Barangay::findOrFail($id);
        return response()->json($barangay, 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Barangay not found',
                'error' => $e->getMessage()
            ], 404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, BarangayRequest $barangayRequest)
    {
        //
        try {
            $barangayRequest->validated();

            $barangay = Barangay::findOrFail($id);
            $barangay->update($request->all());  
            
            $barangay->update([
                'name' => $barangayRequest->name,
                'longitude' => $barangayRequest->longitude,
                'latitude' => $barangayRequest->latitude
            ]);

            // $barangay->update($request->all());

            return response()->json([
                'message' => 'Barangay updated successfully!',
                'barangay' => $barangay,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to update barangay',
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
        $barangay = Barangay::findOrFail($id);
        $barangay->delete();
        return response()->json([
            'message' => 'Barangay deleted successfully!',
            'barangay' => $barangay,
        ]);
    }
}
