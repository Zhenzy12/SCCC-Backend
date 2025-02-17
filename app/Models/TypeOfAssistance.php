<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfAssistance extends Model
{
    //
    protected $table = 'type_of_assistance';

    protected $fillable = [
        'assistance'
    ];

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public function report(){
        return $this->hasOne(Report::class);
    }
}
