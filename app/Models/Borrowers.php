<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Offices;

class Borrowers extends Model
{
    //

    protected $table = 'borrowers';

    protected $fillable = [
        'borrowers_name',
        'borrowers_contact',
        'office_id',
    ];

    public function offices(){
        return $this->belongsTo(Offices::class, 'office_id', 'id');
    }
}
