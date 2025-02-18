<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OfficeSupplies;
use App\Models\OfficeEquipments;

class Categories extends Model
{
    //

    protected $table = 'categories';

    protected $fillable = ['category_name'];

    public function officeEquipments()
    {
        return $this->hasMany(OfficeEquipments::class, 'category_id');
    }

    public function officeSupplies()
    {
        return $this->hasMany(OfficeSupplies::class, 'category_id');
    }
}
