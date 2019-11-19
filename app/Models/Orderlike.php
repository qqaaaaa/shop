<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderlike extends Model{
	protected $table = 'like';
	public $timestamps = false;
	public function Orderbuy(){
		return $this->hasMany('App\Models\Orderbuy','buyer_id','buyer_id');
	}
	public function OrderDor(){
		return $this->hasMany('App\Models\OrderDor','id','product_id');
	}
}
?>