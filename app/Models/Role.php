<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     protected $table = 'role';
     public function rolePower(){
     	return $this->hasMany('App\Models\RolePower','r_name','name');
     }
}
