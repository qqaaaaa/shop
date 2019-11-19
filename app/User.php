<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

       public $timestamps = false;
    protected $table="user";
    protected $fillable = [
        'name', 'email', 'password',
    ];
     public function getJWTIdentifier()


    {

        return $this->getKey();

    }
     public function getJWTCustomClaims()

    {

        return [];

    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
