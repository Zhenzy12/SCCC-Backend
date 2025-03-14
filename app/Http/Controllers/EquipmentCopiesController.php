<?php

namespace App\Http\Controllers;

use App\Models\EquipmentCopies;
use Illuminate\Http\Request;

class EquipmentCopiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        try {
            return response()->json(EquipmentCopies::all());
        } catch (\Exception $e) {
            return response()->json(['Index Equipment Copies Error' => $e->getMessage()], 500);
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
                'item_id' => 'required|exists:office_equipments,id',
                'is_available' => 'required|boolean',
                'copy_num' => 'required|integer'
            ]);

            $equipmentCopy = EquipmentCopies::create($request->all());

            return response()->json([
                'message' => 'Successfully Created',
                'data' => $equipmentCopy
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['Store Equipment Copy Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentCopies $equipmentCopies)
    {
        //
        try {
            return response()->json($equipmentCopies);
        } catch (\Exception $e) {
            return response()->json(['Show Equipment Copies Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipmentCopies $equipmentCopies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EquipmentCopies $equipmentCopies)
    {
        //
        try {
            $request->validate([
                'item_id' => 'sometimes|required|exists:office_equipments,id',
                'is_available' => 'sometimes|required|boolean',
                'copy_num' => 'sometimes|required|integer'
            ]);
            $equipmentCopies->update($request->all());

            return response()->json([
                'message' => 'Successfully Updated',
                'data' => $equipmentCopies
            ]);
        } catch (\Exception $e) {
            return response()->json(['Update Equipment Copies Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentCopies $equipmentCopies)
    {
        //
        try {
            $equipmentCopies->delete();
            return response()->json([
                'message' => 'Deleted Successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json(['Destroy Equipment Copies Error' => $e->getMessage()], 500);
        }
    }
}
