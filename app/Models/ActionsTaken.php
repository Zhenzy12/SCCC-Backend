<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionsTaken extends Model
{
    //
    protected $table = 'actions_taken';
    protected $fillable = [
        'action'
    ];
}
