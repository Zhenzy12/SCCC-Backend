<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Borrowers;

class Offices extends Model
{
    //

    protected $table = 'offices';

    protected $fillable = [
        'office_name',
    ];

    public function borrowers(){
        return $this->hasMany(Borrowers::class, 'office_id');
    }
}
