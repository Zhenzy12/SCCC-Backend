<?php

namespace App\Http\Controllers;

use App\Models\Offices;
use Illuminate\Http\Request;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return response()->json(Offices::all());
        } catch (\Exception $e) {
            return response()->json(['Index Offices Error' => $e->getMessage()], 500);
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
            $request->validate([
                'office_name' => 'required|string|max:255',
                'deleted_by' => 'nullable|exists:users,id',
                'is_deleted' => 'required|boolean'
            ]);

            $offices = Offices::create($request->all());

            return response()->json(
                [
                    'message' => 'Successfully Created',
                    'data' => $offices,
                ],
                201,
            );
        } catch (\Exception $e) {
            return response()->json(['Store Offices Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Offices $offices)
    {
        //
        try {
            return response()->json($offices);
        } catch (\Exception $e) {
            return response()->json(['Show Offices Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offices $offices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offices $offices)
    {
        //
        try {
            $request->validate([
                'office_name' => 'sometimes|required|string|max:255',
                'is_deleted' => 'sometimes|required|boolean',
                'deleted_by' => 'sometimes|required|exists:users,id',
            ]);
            $offices->update($request->all());

            return response()->json([
                'message' => 'Successfully Updated',
                'data' => $offices
            ]);
        } catch (\Exception $e) {
            return response()->json(['Update Offices Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offices $offices)
    {
        //
        try {
            $offices->delete();
            return response()->json([
                'message' => 'Deleted Successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json(['Destroy Offices Error' => $e->getMessage()], 500);
        }
    }
}
