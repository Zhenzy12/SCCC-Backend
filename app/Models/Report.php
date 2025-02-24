<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = 'reports';

    protected $fillable = [
        'time',
        'date_received',
        'arrival_on_site',
        'name',
        'landmark',
        'longitude',
        'latitude',
        'source_id',
        'incident_id',
        'barangay_id',
        'actions_id',
        'assistance_id',
    ];

    public function barangay(){
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function source(){
        return $this->belongsTo(Source::class, 'source_id');
    }

    public function incident(){
        return $this->belongsTo(Incident::class, 'incident_id');
    }

    public function actions(){
        return $this->belongsTo(ActionsTaken::class, 'actions_id');
    }

    public function assistance(){
        return $this->belongsTo(TypeOfAssistance::class, 'assistance_id');
    }
}
