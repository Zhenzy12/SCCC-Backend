<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowers;
use App\Models\Users;
use App\Models\BorrowTransactions;
use App\Models\Offices;
use App\Models\BorrowTransactionItems;
use App\Models\EquipmentCopies;
use App\Models\OfficeSupplies;
use App\Models\OfficeEquipments;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $borrowers = Borrowers::with('offices')->get();

        $borrow_transactions = BorrowTransactions::with(['borrowers', 'borrowTransactionItems'])->get();

        $borrow_transaction_items = BorrowTransactionItems::with(['borrowTransactions'])->get();

        $equipment_copies = EquipmentCopies::with(['officeEquipments'])->get();

        $office_supplies = OfficeSupplies::with(['categories'])->get();

        $office_equipments = OfficeEquipments::with(['categories'])->get();

        $offices = Offices::with(['borrowers'])->get();

        return response()->json([
            'borrowers' => $borrowers,
            'borrow_transactions' => $borrow_transactions,
            'borrow_transaction_items' => $borrow_transaction_items,
            'equipment_copies' => $equipment_copies,
            'office_supplies' => $office_supplies,
            'office_equipments' => $office_equipments,
            'offices' => $offices,
        ]);
    }
}
