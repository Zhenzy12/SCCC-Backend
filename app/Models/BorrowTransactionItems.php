<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BorrowTransactions;

class BorrowTransactionItems extends Model
{
    protected $table = 'borrow_transaction_items';

    protected $fillable = [
        'transaction_id',
        'item_copy_id',
        'returned',
        'returned_date',
        'item_type'
    ];

    public function borrowTransactions(){
        return $this->belongsTo(BorrowTransactions::class, 'transaction_id');
    }
}
