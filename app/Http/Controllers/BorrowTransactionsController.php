<?php

namespace App\Http\Controllers;

use App\Models\BorrowTransactions;
use Illuminate\Http\Request;

class BorrowTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return response()->json(BorrowTransactions::all());
        } catch (\Exception $e) {
            return response()->json(['Index Borrow Transactions Error' => $e->getMessage()], 500);
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
                'borrower_id' => 'required|exists:borrowers,id',
                'borrow_date' => 'nullable|date',
                'returned_date' => 'nullable|date',
                'lender_id' => 'required|exists:users,id',
                'remarks' => 'required|string',
            ]);

            $borrowTransaction = BorrowTransactions::create($request->all());

            return response()->json(
                [
                    'message' => 'Successfully Created',
                    'data' => $borrowTransaction,
                ],
                201,
            );
        } catch (\Exception $e) {
            return response()->json(['Store Borrow Transactions Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowTransactions $borrowTransactions)
    {
        //
        try{
            return response()->json($borrowTransactions);
        }catch(\Exception $e){
            return response()->json(['Show Borrow Transaction Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowTransactions $borrowTransactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowTransactions $borrowTransactions)
    {
        //
        try{
            $request->validate([
                'borrower_id' => 'sometimes|required|exists:borrowers,id',
                'borrow_date' => 'sometimes|nullable|date',
                'returned_date' => 'sometimes|nullable|date',
                'lender_id' => 'sometimes|required|exists:users,id',
                'remarks' => 'sometimes|required|string',
            ]);
            $borrowTransactions->update($request->all());

            return response()->json([
                'message' => 'Successfully Updated',
                'data' => $borrowTransactions
            ]);
        }catch(\Exception $e){
            return response()->json(['Update Borrow Transaction Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BorrowTransactions $borrowTransactions)
    {
        //
        try{
            $borrowTransactions->delete();
            return response()->json([
                'message' => 'Deleted Successfully',
            ]);
        }catch(\Exception $e){
            return response()->json(['Destroy Borrow Transaction Error' => $e->getMessage()], 500);
        }
    }
}
