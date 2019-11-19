<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public $timestamps = false;
    protected $table="user";
    protected $fillable = [
        'name', 'email', 'password',
    ];
     
    public function getJWTCustomClaims()
    {
        return [];
    }

}