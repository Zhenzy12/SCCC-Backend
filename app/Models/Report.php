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
        'source_id',
        'incident_id',
        'location_id',
        'actions_id',
        'assistance_id',
    ];

    public function location(){
        return $this->belongsTo(Location::class);
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
