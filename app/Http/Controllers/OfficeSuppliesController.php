<?php

namespace App\Http\Controllers;

use App\Models\OfficeSupplies;
use Illuminate\Http\Request;

class OfficeSuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return response()->json(OfficeSupplies::all());
        } catch (Exception $e) {
            return response()->json(['Index Office Supplies Error' => $e->getMessage()], 500);
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
                'supply_name' => 'required|string|max:255',
                'supply_description' => 'required|string',
                'serial_number' => 'required|string',
                'category_id' => 'nullable|exists:categories,id',
                'supply_quantity' => 'required|integer',
            ]);

            $officeSupply = OfficeSupplies::create($request->all());

            return response()->json(
                [
                    'message' => 'Successfully Created',
                    'data' => $officeSupply,
                ],
                201,
            );
        } catch (Exception $e) {
            return response()->json(['Store Office Supply Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OfficeSupplies $officeSupplies)
    {
        //
        try{
            return response()->json($officeSupplies);
        }catch(Exception $e){
            return response()->json(['Show Borrow Transaction Items Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficeSupplies $officeSupplies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OfficeSupplies $officeSupplies)
    {
        //
        try{
            $request->validate([
                'supply_name' => 'sometimes|required|string|max:255',
                'supply_description' => 'sometimes|required|string',
                'serial_number' => 'sometimes|required|string',
                'category_id' => 'sometimes|nullable|exists:categories,id',
                'supply_quantity' => 'sometimes|required|integer',
            ]);
            $officeSupplies->update($request->all());

            return response()->json([
                'message' => 'Successfully Updated',
                'data' => $officeSupplies
            ]);
        }catch(Exception $e){
            return response()->json(['Update Office Supplies Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficeSupplies $officeSupplies)
    {
        //
        try{
            $officeSupplies->delete();
            return response()->json([
                'message' => 'Deleted Successfully',
            ]);
        }catch(Exception $e){
            return response()->json(['Destroy Office Supplies Error' => $e->getMessage()], 500);
        }
    }
}
