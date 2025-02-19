<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BorrowTransactionItems;
use App\Models\Borrowers;

class BorrowTransactions extends Model
{
    //

    protected $table = 'borrow_transactions';

    protected $fillable = [
        'borrower_id',
        'borrow_date',
        'return_date',
        'lender_id',
        'remarks',
    ];

    public function borrowTransactions(){
        return $this->hasMany(BorrowTransactionItems::class);
    }

    public function borrowers(){
        return $this->belongsTo(Borrowers::class, 'borrower_id');
    }

}
