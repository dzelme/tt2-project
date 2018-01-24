<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // * Get the patient record associated with the user.
    public function patient()
    {
        return $this->hasOne('App\Patient', 'user_id');
    }
    
    // patient appointmnet
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
    
    // roles
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identification', 'name', 'surname', 'email', 'password', 'alergies', 'gums', 'notes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
