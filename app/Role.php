<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['name'];


    public function usersmanytomany() {

        return $this->belongsToMany('App\User');
    }
}
