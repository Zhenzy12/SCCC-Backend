<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    //
    protected $table = 'barangay';

    protected $fillable = [
        'name'
    ];

    public function locations(){
        return $this->hasMany(Location::class);
    }
}
