<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderbuy extends Model{
	protected $table = 'buyer';
	public $timestamps = false;
	public function OrderDor(){
		return $this->hasMany('App\Models\OrderDor','id','product_id');
		
	}
}
?>