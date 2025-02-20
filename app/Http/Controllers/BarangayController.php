<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barangay;


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
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $barangay = Barangay::create([
            'name' => $request->name,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return response()->json([
            'message' => 'Barangay created successfully!',
            'barangay' => $barangay,
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
        $barangay = Barangay::findOrFail($id);
        return response()->json($barangay, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'string|max:255',
            'longitude' => 'numeric',
            'latitude' => 'numeric',
        ]);

        // $barangay = Barangay::findOrFail($id);
        // $barangay->update([
        //     'name' => $request->name,
        //     'longitude' => $request->longitude,
        //     'latitude' => $request->latitude,
        // ]);

        // return response()->json([
        //     'message' => 'Barangay updated successfully!',
        //     'barangay' => $barangay,
        // ]);

        $barangay = Barangay::findOrFail($id);
        $barangay->update($request->all());  

        // $barangay->update([
        //     'name' => $request->name,
        //     'longitude' => $request->longitude,
        //     'latitude' => $request->latitude
        // ]);

        return response()->json([
            'message' => 'Barangay updated successfully!',
            'barangay' => $barangay,
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
