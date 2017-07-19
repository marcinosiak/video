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

    /**
     * Relacja (na poziomie modelu) - użytkownik możebyć autorem wielu filmow
     * @return [type] [description]
     */
    public function video()
    {
      return $this->hasMany('App\Video');
    }    
}
