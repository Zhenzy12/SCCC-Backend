<?php

namespace App\Http\Controllers;

use App\Models\BorrowTransactionItems;
use Illuminate\Http\Request;

class BorrowTransactionItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return response()->json(BorrowTransactionItems::all());
        } catch (Exception $e) {
            return response()->json(['Index Borrow Transaction Items Error' => $e->getMessage()], 500);
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
                'transaction_id' => 'required|exists:borrow_transactions,id',
                'item_copy_id' => 'required|integer',
                'returned' => 'required|boolean',
                'returned_date' => 'nullable|date',
                'item_type' => 'required|string',
                'quantity' => 'required|integer'
            ]);

            $borrowTransactionItem = BorrowTransactionItems::create($request->all());

            return response()->json(
                [
                    'message' => 'Successfully Created',
                    'data' => $borrowTransactionItem,
                ],
                201,
            );
        } catch (Exception $e) {
            return response()->json(['Store Borrow Transaction Items Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowTransactionItems $borrowTransactionItems)
    {
        //
        try {
            return response()->json($borrowTransactionItems);
        } catch (Exception $e) {
            return response()->json(['Show Borrow Transaction Items Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowTransactionItems $borrowTransactionItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowTransactionItems $borrowTransactionItems)
    {
        //
        try {
            $request->validate([
                'transaction_id' => 'sometimes|required|exists:borrow_transactions,id',
                'item_copy_id' => 'sometimes|required|integer',
                'returned' => 'sometimes|required|boolean',
                'returned_date' => 'sometimes|nullable|date',
                'item_type' => 'sometimes|required|string',
                'quantity' => 'sometimes|required|integer'
            ]);
            $borrowTransactionItems->update($request->all());

            return response()->json([
                'message' => 'Successfully Updated',
                'data' => $borrowTransactionItems
            ]);
        } catch (Exception $e) {
            return response()->json(['Update Borrow Transaction Items Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BorrowTransactionItems $borrowTransactionItems)
    {
        //
        try {
            $borrowTransactionItems->delete();
            return response()->json([
                'message' => 'Deleted Successfully',
            ]);
        } catch (Exception $e) {
            return response()->json(['Destroy Borrow Transaction Items Error' => $e->getMessage()], 500);
        }
    }
}
