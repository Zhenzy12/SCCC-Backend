<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BorrowTranactions;

class BorrowTransactionItems extends Model
{
    //

    protected $table = 'borrow_transaction_items';

    protected $fillable = [
        'transaction_id',
        'item_copy_id',
        'returned',
        'returned_date',
        'item_type'
    ];

    public function borrowTransactions(){
        return $this->belongsTo(BorrowTranactions::class, 'transaction_id');
    }
}
