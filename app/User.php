<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function addressonetoone() {
        
        return $this->hasOne('App\AddressOneToOne');
    }

    public function postsonetomany() {

        return $this->hasMany('App\PostOneToMany');
    }
    
    public function rolesmanytomany() {
        
        return $this->belongsToMany('App\Role');
    }
    
}
