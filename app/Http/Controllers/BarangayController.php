<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barangay;
use Exception;
use App\Http\Requests\BarangayRequest;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $reportsPerBarangay = Report::groupBy('barangay_id')
                ->select('barangay_id', DB::raw('COUNT(*) as total_reports'))
                ->get();

            $barangays = Barangay::all();

            return response()->json([
                'barangays' => $barangays,
                'reportsPerBarangay' => $reportsPerBarangay
            ], 200);
        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangayRequest $barangayRequest)
    {
        //
        try {
            $barangayRequest->validated();

            $barangay = Barangay::create([
                'name' => $barangayRequest->name,
                'longitude' => $barangayRequest->longitude,
                'latitude' => $barangayRequest->latitude,
            ]);

            Tracking::create([
                'category' => 'Barangay',
                'user_id' => Auth::id(),
                'action' => 'Created',
                'data' => json_encode($barangay->toArray()), // ✅ Important
                'description' => 'A Barangay was created by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                'message' => 'Barangay created successfully!',
                'barangay' => $barangay,
            ]);
        } catch (Exception $e) {
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
            $barangay = Barangay::findOrFail($id);
            return response()->json($barangay, 200);
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
    public function update(string $id, BarangayRequest $barangayRequest)
    {
        //
        try {
            $barangayRequest->validated();

            $barangay = Barangay::findOrFail($id);

            $barangay->update([
                'name' => $barangayRequest->name,
                'longitude' => $barangayRequest->longitude,
                'latitude' => $barangayRequest->latitude
            ]);

            Tracking::create([
                'category' => 'Barangay',
                'user_id' => Auth::id(),
                'action' => 'Updated',
                'data' => json_encode($barangay->toArray()), // ✅ Important
                'description' => 'A Barangay was updated by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                'message' => 'Barangay updated successfully!',
                'barangay' => $barangay,
            ]);
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
            $barangay = Barangay::findOrFail($id);
            $barangay->delete();

            Tracking::create([
                'category' => 'Barangay',
                'user_id' => Auth::id(),
                'action' => 'Deleted',
                'data' => json_encode($barangay->toArray()), // ✅ Important
                'description' => 'A Barangay was deleted by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);

            return response()->json([
                'message' => 'Barangay deleted successfully!',
                'barangay' => $barangay,
            ]);
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
