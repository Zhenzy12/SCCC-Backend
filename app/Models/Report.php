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
        'name', #this is the column for the auth user
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
        return $this->belongsTo(Barangay::class);
    }

    public function source(){
        return $this->belongsTo(Source::class);
    }

    public function incident(){
        return $this->belongsTo(Incident::class);
    }

    public function actionsTaken(){
        return $this->belongsTo(ActionsTaken::class, 'actions_id');
    }

    public function typeOfAssistance(){
        return $this->belongsTo(TypeOfAssistance::class, 'assistance_id');
    }
}
