<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
	protected $table = 'order_info';
	public $timestamps = false;
	public function Orderadmin(){
		return $this->hasMany('App\Models\Orderadmin','order_number','order_number');
	}
}
?>