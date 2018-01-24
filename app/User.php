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
    
    //parbauda, vai lietotajam ir kaut viena loma
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) 
        {
            foreach ($roles as $role) 
            {
                if ($this->hasRole($role)) {return true;}
            }
        } else 
        {
            if ($this->hasRole($roles)) {return true;}
        }
        return false;
    }
    
    //parbauda, vai lietotajam ir konkreta loma
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {return true;}
        return false;
    }
}
