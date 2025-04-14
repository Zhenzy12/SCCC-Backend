<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryAccess extends Model
{
    //
    protected $table = 'inventory_accesses';

    protected $fillable = [
        'for_dashboard',
        'for_categories',
        'for_borrowers',
        'for_users',
    ];
}
