<?php

namespace App\Http\Controllers;

use App\Models\OfficeEquipments;
use Illuminate\Http\Request;

class OfficeEquipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return response()->json(OfficeEquipments::all());
        } catch (Exception $e) {
            return response()->json(['Index Office Equipments Error' => $e->getMessage()], 500);
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
                'equipment_name' => 'required|string|max:255',
                'equipment_description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                // 'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Handle image upload
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();
            //     $image->move(public_path('images/supplies'), $imageName);
            //     $data['image_path'] = 'images/supplies/' . $imageName;
            // }

            $equipment = OfficeEquipments::create($request->all());

            return response()->json([
                'message' => 'Successfully Created',
                'data' => $equipment
            ], 201);
        } catch (Exception $e) {
            return response()->json(['Store Office Equipment Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OfficeEquipments $officeEquipments)
    {
        //
        try {
            return response()->json($officeEquipments);
        } catch (Exception $e) {
            return response()->json(['Show Office Equipments Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficeEquipments $officeEquipments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OfficeEquipments $officeEquipments)
    {
        //
        try {
            $request->validate([
                'equipment_name' => 'sometimes|required|string|max:255',
                'equipment_description' => 'sometimes|required|string',
                'category_id' => 'sometimes|required|exists:categories,id',
                // 'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Handle image upload
            // if ($request->hasFile('image')) {
            //     // Delete old image if exists
            //     if ($officeEquipments->image_path && file_exists(public_path($officeEquipments->image_path))) {
            //         unlink(public_path($officeEquipments->image_path));
            //     }

            //     $image = $request->file('image');
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();
            //     $image->move(public_path('images/supplies'), $imageName);
            //     $data['image_path'] = 'images/supplies/' . $imageName;
            // }

            $officeEquipments->update($request->all());
            return response()->json([
                'message' => 'Successfully Updated',
                'data' => $officeEquipments
            ]);
        } catch (Exception $e) {
            return response()->json(['Update Office Equipment Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficeEquipments $officeEquipments)
    {
        //
        try {
            $officeEquipments->delete();
            return response()->json(['message' => 'Deleted Successfully']);
        } catch (Exception $e) {
            return response()->json(['Destroy Office Equipment Error' => $e->getMessage()], 500);
        }
    }
}
