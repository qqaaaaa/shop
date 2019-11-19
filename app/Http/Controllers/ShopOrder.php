<?php
namespace App\Http\Controllers;
use App\Models\Order1;
use App\Models\Order;
use App\Models\Buyer;
use App\Models\Orderbuy;
use App\Models\Orderlike;
use App\Models\OrderAddress;
use App\Models\Orderdiscount;
use App\Models\ReplyMsg;
class ShopOrder extends Controller{
	public function orderShow(){
		$res = Order::get()->toArray();
		$ress = Order::with(['orderadmin'=>function($id){$id->with(['orderDor']);}])->get()->toArray();
		var_dump($ress);die;
	}
	public function orderBuyer(){
		$name = "张三";
		$res = Buyer::get()->where('buyer_name',$name)->toArray();
		echo json_encode($res);
	}
	//个人信息展示
    public function buyerUpdate(){
    	$name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $header = $_POST['header'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $res = Buyer::where('buyer_name',$name)->update(['buyer_name'=>$name,'buyer_email'=>$email,'buyer_pwd'=>$pwd,'buyer_header'=>$header,'buyer_age'=>$age,'buyer_birthday'=>$birthday]);
         
         if($res){
         	echo "1";
         }
         else
         {
         	echo "0";
         }
       

    }
    //个人信息修改
    
    public function orderInfo(){
    	$name = "张三";
    	$res = Orderbuy::where('buyer_name',$name)->get()->toArray();
    	$id = '';
     foreach ($res as $key => $value) {
         $id =  $value['buyer_id'];
     }

    	$res = Order::with(['orderadmin'=>function($id){$id->with(['orderDor']);}])->where('buyer_id',$id)->get()->toArray();
    	echo json_encode($res);
		
    }
    //我的订单
   
   public function orderLike(){
      $name = "张三";
      $res = Orderbuy::where('buyer_name',$name)->get()->toArray();
    	$id = '';
     foreach ($res as $key => $value) {
         $id =  $value['buyer_id'];
     }
      $res = Orderlike::with(['orderbuy','orderDor'])->where('buyer_id',$id)->get()->toArray();
      echo json_encode($res);
   }
   //我的收藏
   public function orderDiscount(){
      $name = "张三";
      $res = Orderbuy::where('buyer_name',$name)->get()->toArray();
    	$id = '';
     foreach ($res as $key => $value) {
         $id =  $value['buyer_id'];
     }
   	$res = Orderdiscount::with(['orderbuy','orderdis'])->where('buyer_id',$id)->get()->toArray();
   	
   	echo json_encode($res);
   }

   //我的优惠券
   public function orderAddress(){
   	  $name = "张三";
      $res = Orderbuy::where('buyer_name',$name)->get()->toArray();
    	$id = '';
     foreach ($res as $key => $value) {
         $id =  $value['buyer_id'];
     }
     $res = Orderaddress::where('buyer_id',$id)->get()->toArray();
     var_dump($res);
   }
   //地址管理_我的地址列表
   
   public function addAddress(){
   	$name = $_POST['name'];
   	$phone = $_POST['phone'];
   	$address = $_POST['address'];
   	$order_number = $_POST['order_number'];
   	$res = [];
   	$res['consignee_name'] = $name;
   	$res['consignee_phone'] = $phone;
   	$res['consignee_address'] = $address;
   	$ress = Orderaddress::insert($res);
   	if($ress){
   		echo 1;
   	}
   	else{
   		echo 0;
   	}


   }
   //地址管理_添加收货地址
   public function updateAddress(){
    $name = $_POST['name'];
   	$phone = $_POST['phone'];
   	$address = $_POST['address'];
   	$order_number = $_POST['order_number'];
   	$res = Orderaddress::where('consignee_name',$name)->update(['consignee_name'=>$name,'consignee_phone'=>$phone,'consignee_address'=>$address,'order_number'=>$order_number]);
    if($res){
    	echo 1;
    }
    else{
    	echo 0;
    }

   }
   //地址管理_地址修改
   public function updAddress(){
   	$id = $_POST['id'];
   	Orderaddress::where('consignee_id',$id)->delete();
   }
   //地址管理_删除收货地址
   public function reply(){
   $name = "张三";
   $status = "0";
   $res = ReplyMsg::where('user_name',$name)->where('status',0)->get()->toArray();
   $guanzhu = 0;
        foreach ($res as $key => $value) {
            $guanzhu++;
        }
        echo json_encode($guanzhu);
   }
   //消息未读提示
 
}

?>