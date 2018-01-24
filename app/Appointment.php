<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //relationship patients
    public function patients()
    {
        return $this->belongsTo('App\User', 'user_id', 'patient_id');
    }
    
    //relationship doctors
    public function doctors()
    {
        return $this->belongsTo('App\User', 'user_id', 'doctor_id');
    }
    
    protected $fillable = ['from', 'to', 'reminder'];
}
