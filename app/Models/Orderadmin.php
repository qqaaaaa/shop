<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderadmin extends Model{
	protected $table = 'order_product';
	public $timestamps = false;
	public function OrderDor(){
		return $this->hasMany('App\Models\OrderDor','id','product_id');
	}
}


?>