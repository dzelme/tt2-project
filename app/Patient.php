<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //ge user that owns the patient
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    //mass assignable attributes
    protected $fillable = ['alergies', 'gums', 'notes'];
}
