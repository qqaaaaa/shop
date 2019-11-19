<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDor extends Model{
	protected $table = 'product';
	public $timestamps = false;
	public function Orderbuy(){
      return $this->hasMany('App\Models\Orderbuy','buyer_id','buyer_id');
	}
}
?>