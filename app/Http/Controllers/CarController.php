<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\OrderInfo;
use App\Models\ConsigneeInfo;
use App\Models\Orderadmin;

class EmptyObj {}
class CarController{

    //获取购物车的内容
    public function getCar(){
        $id = $_REQUEST['id'];
        $info = Car::where('user_id',$id)->get()->toArray();
        if(empty($info)){
            $obj = new EmptyObj();
            return json_encode(['code'=>0,'message'=>'购物车为空','data'=>$obj]);
        }
        return json_encode(['code'=>1,'message'=>'成功','data'=>$info]);
    }
    //删除购物车内容
    public function delCar(){
        $id = $_REQUEST['id'];
        $res = Car::destroy($id);
        if($res){
            return json_encode(['code'=>1,'message'=>'删除成功']);
        }else{
            return json_encode(['code'=>0,'message'=>'删除失败']);
        }
    }
    //获取收货地址
    public function getAddress(){
        $id = $_REQUEST['id'];
        $info = ConsigneeInfo::where('buyer_id',$id)->get()->toArray();
        return json_encode(['code'=>1,'message'=>'success','data'=>$info]);
    }
    //确认下单
    public function addOrder(){
        //买家id
        $buyerId = $_REQUEST['buyerId'];
        //总金额
        $money = $_REQUEST['money'];
        //收货地址
        $address = $_REQUEST['shouaddr'];
        //付款方式
        $payType = $_REQUEST['paytype'];
        //生成订单号
        $orderNumber = time().rand(100000,999999);
        //商品信息
        $goodsId = $_REQUEST['goodsid'];
        $goodsNum = $_REQUEST['goodsnum'];
        $obj = new OrderInfo();
        $obj->order_number = $orderNumber;
        $obj->buyer_id = $buyerId;
        $obj->order_amount = $money;
        $obj->consignee_info = $address;
        $obj->pay_change = $payType;
        $obj->save();

        $obj1 = new Orderadmin();
        $obj1->order_number = $orderNumber;
        $obj1->product_id = $goodsId;
        $obj1->product_number = $goodsNum;
        $obj1->save();
        return json_encode(['code'=>1,'message'=>'成功']);
    }
}