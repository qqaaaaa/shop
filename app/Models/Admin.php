<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    public $timestamps = false;
    public function role(){
        return $this->hasOne('App\Models\Role','id','r_id');
    }
}
