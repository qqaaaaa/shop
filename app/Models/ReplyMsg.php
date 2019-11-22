<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyMsg extends Model
{
    protected $table = 'reply_msg';
    public $timestamps = false;
     protected $resultSetType = 'collection';
}