<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Test extends Model{
	public function selectorder(){
     $res = Db::table("order_info")->join('buyer', 'order_info.buyer_id', '=', 'buyer.buyer_id')->get()->toArray();
    
      return $res;
	}
	public function find_order_number($name){
	  $res = Db::table("order_info")->join('buyer', 'order_info.buyer_id', '=', 'buyer.buyer_id')->where('order_number',$name)->get()->toArray();
	  return $res;
	}
	public function find_order_trade($name){
	  $res = Db::table("order_info")->join('consignee_info', 'order_info.order_number', '=', 'consignee_info.order_number')->join('buyer', 'order_info.buyer_id', '=', 'buyer.buyer_id')->join('product', 'order_info.product_id', '=', 'product.id')->get()->where('order_number',$name)->toArray();
	 
	  //var_dump($res);die;
	  return $res;
	}
	public function selectProduct($name){
		 $ress = Db::table("order_product")->join('product','order_product.product_id','=','product.id')->join('discount','order_product.discount_id','=','discount.id')->get()->where('order_number',$name)->toArray();
		 //var_dump($ress);die;
		 return $ress;
	}
	public function trade_status_update($name,$id){
     $res = Db::table("order_info")->where('order_number',$id)->update(['trade_status' => $name]);
     return $res;
	}
	public function trade_address_update($name,$id){
     $res = Db::table("consignee_info")->where('order_number',$id)->update(['consignee_address' => $name]);
     return $res;
	}
	public function updatechange($res){
		$res = Db::table("update_trade")->insert($res);
		return $res;
	}
	public function updateselect(){
		$res = Db::table("update_trade")->get()->toArray();
		return $res;
	}
	public function trade_name_update($name,$id){
     $res = Db::table("consignee_info")->where('order_number',$id)->update(['consignee_name' => $name]);
     return $res;
	}
	public function brandShow(){
		$res = Db::table("brand")->get()->toArray();
		return $res;
	}
	public function brandDel($id){
		$res = Db::table("brand")->where('brand_id',$id)->delete();
		return $res;
	}
	public function brandAdd($res){
		$res = Db::table("brand")->insert($res);
		return $res;
	}
	public function trade_discount_update($name,$id,$pid){
     $res = Db::table("order_product")->where('order_number',$id)->where('product_id',$pid)->update(['discount_id' => $name]);
     return $res;
	}
	public function findDiscount($id){
		$res = Db::table("discount")->where('id',$id)->get()->toArray();
		return $res;
	}
}
?>