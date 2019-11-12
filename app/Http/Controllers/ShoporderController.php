<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use app\Models\Test;
session_start();
class ShoporderController extends Controller{
	public function index(){
		//echo "1";die;
		

		session('name','刘德华');
      $query = new \App\Models\Test();
      $res = $query->selectorder();

      //var_dump($res);die;
      return view('order_info/order_info_show',['res'=>$res]);
	}
	public function search_order_number(){
		$name = $_POST['name'];
		$query = new \App\Models\Test();
		$res = $query->find_order_number($name);
        if($res){
         // return json_encode($res[0]);
         return $res;
        }
        else{
        	echo "1";
        }
	}
	public function trade_status(){
		$name = $_POST['id'];
		//var_dump($name);die;
		$query = new \App\Models\Test();
		$res = $query->find_order_trade($name);
		$ress = $query->selectProduct($name);
		
		return view('order_info/order_info_trade',['res'=>$res,'ress'=>$ress]);

	}
	public function trade_status_input(){
		
		$name = session('name');
		$updatetime = date("Y-m-d h:i:s",strtotime("+8 hour"));
		$updatechange = "订单状态";
		$trade_status = $_POST['trade_status'];
		$info_id = $_POST['info_id'];
        
		$query = new \App\Models\Test();
		$res = $query->trade_status_update($trade_status,$info_id);
        if($res){
        	$res = [];
        	$res['user'] = $name;
        	$res['change'] = $updatechange;
        	$res['updatetime'] = $updatetime;
        	$res['order_number'] = $info_id;
            $res = $query->updatechange($res);
            echo 1;
        }
        else{
        	echo 2;
        }
	}
	public function addressUpdate(){
		$name = session('name');
		$updatetime = date("Y-m-d h:i:s",strtotime("+8 hour"));
		$updatechange = "订单位置";
		$addressinput = $_POST['addressinput'];
		$info_id = $_POST['info_id'];

		$query = new \App\Models\Test();
		$res = $query->trade_address_update($addressinput,$info_id);
        if($res){
        	$res = [];
        	$res['user'] = $name;
        	$res['change'] = $updatechange;
        	$res['updatetime'] = $updatetime;
        	$res['order_number'] = $info_id;
            $res = $query->updatechange($res);
        	echo 1;
        }
        else{
        	echo 2;
        }
	}
	public function updateselect(){	
      $query = new \App\Models\Test();
      $res = $query->updateselect();
      //var_dump($res);die;
      return view('order_info/order_info_update',['res'=>$res]);
	}
    
    public function nameUpdate(){
    		$name = session('name');
		$updatetime = date("Y-m-d h:i:s",strtotime("+8 hour"));
		$updatechange = "预定收货位置";
		$nameinput = $_POST['nameinput'];
		$info_id = $_POST['info_id'];

		$query = new \App\Models\Test();
		$res = $query->trade_name_update($nameinput,$info_id);
        if($res){
        	$res = [];
        	$res['user'] = $name;
        	$res['change'] = $updatechange;
        	$res['updatetime'] = $updatetime;
        	$res['order_number'] = $info_id;
            $res = $query->updatechange($res);
        	echo 1;
        }
        else{
        	echo 2;
        }
    }
    public function brandShow(){
      $query = new \App\Models\Test();
      $res = $query->brandShow();
      //var_dump($res);die;
      return view('order_info/order_brandShow',['res'=>$res]);
    }
     public function brandDel(){
     	$brand_id = $_POST['brand_id'];
     	//return $brand_id;
     	$query = new \App\Models\Test();
     	$res = $query->brandDel($brand_id);
     	if($res){
     		echo "1";
     	}
     	else
     	{
     		echo "0";
     	}
     }
     public function brandAdd(){
     	return view('order_info/order_brandAdd');
     }
     public function brandAdd_do(){
     	$brand_name = $_POST['brand_name'];
     	$brand_state = $_POST['brand_state'];
     	$query = new \App\Models\Test();
     	$res = [];
     	$res['brand_name'] = $brand_name;
     	$res['brand_state'] = $brand_state;
     	$res = $query->brandAdd($res);
     	if($res){
     		return redirect('brandShow');
     	}
     	else{
     		echo "<script>alert('添加失败')</script>";
     	}
     }
      public function discountUpdate(){
    		$name = session('name');
		$updatetime = date("Y-m-d h:i:s",strtotime("+8 hour"));
		$updatechange = "优惠券修改";
		$discount_input = $_POST['discount_input'];
		$info_id = $_POST['info_id'];
        $id = $_POST['id'];
		$query = new \App\Models\Test();
		$res = $query->trade_discount_update($discount_input,$info_id,$id);

        if($res){
        	$res = [];
        	$res['user'] = $name;
        	$res['change'] = $updatechange;
        	$res['updatetime'] = $updatetime;
        	$res['order_number'] = $info_id;
            $res = $query->updatechange($res);
            $abb = $query->findDiscount($discount_input);
            if($abb){
            	echo $discount_input;
            }
        	
        }
        else{
        	echo 2;
        }
    }
}
?>