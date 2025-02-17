<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = 'reports';

    protected $fillable = [
        'time',
        'date received',
        'arrival on site',
        'user_id',
        'source_id',
        'incident_id',
        'barangay_id',
        'actions_id',
        'assistance_id',
    ];

    public function incident(){
        return $this->belongsTo(Incident::class);
    }
}
