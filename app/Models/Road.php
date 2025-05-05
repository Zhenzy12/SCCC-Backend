<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Road extends Model
{
    protected $table = 'roads';

    protected $fillable = [
        'road_name',
        'road_type_id',
    ];

    public function roadType()
    {
        return $this->belongsTo(RoadType::class, 'road_type_id');
    }   
}
