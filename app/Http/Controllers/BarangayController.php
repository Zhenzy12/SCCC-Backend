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

            $barangays = Barangay::orderBy('id', 'desc')
                ->get(['id', 'name', 'longitude', 'latitude']);

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
        try {
            $report = Report::with([
                'source:id,sources',
                'incident:id,type',
                'actions:id,actions',
                'assistance:id,assistance',
                'barangay:id,name,longitude,latitude'
            ])
                ->where('barangay_id', $id) // Use the route parameter
                ->orderBy('id', 'desc')
                ->get();

            return response()->json($report);
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
        try {
            $barangay = Barangay::findOrFail($id);
            return response()->json($barangay, 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 404);
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
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
