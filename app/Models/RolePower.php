<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePower extends Model
{
    protected $table = 'role_power';
    public $timestamps = false;
    public function power(){
        return $this->hasMany('App\Models\Power','id','p_id');
    }
}