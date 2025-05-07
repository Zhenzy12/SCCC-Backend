<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotline;

class HotlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $hotlines = Hotline::all();
            return response()->json($hotlines);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'number' => 'nullable|string|max:255',
                'email' => 'nullable|string|max:255',
                'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            // if ($request->hasFile('image_path')) {
            //     $image = $request->file('image_path');
            //     $imageName = time() . '_' . $image->getClientOriginalName();
            //     $image->move(public_path('storage'), $imageName);
            //     $validated['image_path'] = $imageName; // Store just the filename
            // }

            if ($request->hasFile('image_path')) {
                $path = $request->file('image_path')->store('hotlines', 'public');
                $validated['image_path'] = $path;
            }

            $hotline = Hotline::create($validated);
            return response()->json([
                'hotline' => $hotline,
                'message' => 'Hotline created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
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
            $hotline = Hotline::findOrFail($id);
            return response()->json($hotline);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
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
                'name' => 'required|string|max:255',
                'number' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $hotline = Hotline::findOrFail($id);
            $hotline->update($validated);
            return response()->json([
                'hotline' => $hotline,
                'message' => 'Hotline updated successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
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
            $hotline = Hotline::findOrFail($id);
            $hotline->delete();
            return response()->json([
                'message' => 'Hotline deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
