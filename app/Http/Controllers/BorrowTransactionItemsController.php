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
        } catch (\Exception $e) {
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
        try {
            $request->validate([
                'transaction_id' => 'required|exists:borrow_transactions,id',
                'items' => 'required|array',
                'items.*.item_copy_id' => 'required|integer',
                'items.*.returned' => 'required|boolean',
                'items.*.returned_date' => 'nullable|date',
                'items.*.item_type' => 'required|string',
                'items.*.quantity' => 'required|integer'
            ]);

            $transactionId = $request->transaction_id;
            $items = $request->items; // This is now an array

            $data = [];
            $now = now();

            foreach ($items as $value) {
                $data[] = [
                    'transaction_id' => $transactionId,
                    'item_copy_id' => $value['item_copy_id'],
                    'returned' => $value['returned'],
                    'returned_date' => $value['returned_date'], // Fix: Use `$value` instead of `$item`
                    'item_type' => $value['item_type'],
                    'quantity' => $value['quantity'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            BorrowTransactionItems::insert($data);

            return response()->json([
                'message' => 'Successfully Created',
                'data' => $data, // Return the inserted data
            ], 201);
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
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
    public function update(Request $request)
    {
        try {
            $request->validate([
                'items' => 'required|array|min:1',
                'items.*.id' => 'required|exists:borrow_transaction_items,id',
                'items.*.returned' => 'sometimes|required|boolean',
                'items.*.returned_date' => 'sometimes|nullable|date',
                'items.*.quantity' => 'sometimes|required|integer',
            ]);

            $updatedItems = [];

            foreach ($request->items as $item) {
                $borrowItem = BorrowTransactionItems::findOrFail($item['id']);
                $borrowItem->update([
                    'returned' => $item['returned'] ?? $borrowItem->returned,
                    'returned_date' => $item['returned_date'] ?? $borrowItem->returned_date,
                    'quantity' => $item['quantity'] ?? $borrowItem->quantity,
                    'updated_at' => now(),
                ]);
                $updatedItems[] = $borrowItem;
            }

            return response()->json([
                'message' => 'Successfully Updated',
                'data' => $updatedItems
            ]);
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
            return response()->json(['Destroy Borrow Transaction Items Error' => $e->getMessage()], 500);
        }
    }
}
