<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdiscount extends Model{
	protected $table = 'discountbuy';
	public $timestamps = false;
	public function Orderbuy(){
		return $this->hasMany('App\Models\Orderbuy','buyer_id','buyer_id');
	}
	public function Orderdis(){
		return $this->hasMany('App\Models\Orderdis','id','discount_id');
	}
}

?>