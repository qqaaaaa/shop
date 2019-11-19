<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order1 extends Model{
    protected $table = 'order_info';
	public $timestamps = false;
	public function Orderadmin1(){
		return $this->hasMany('App\Models\Orderadmin1','order_number','order_number');
	}
}
?>