<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\OrderInfo;


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
    
    //确认下单
    public function addOrder(){
        $orderNumber = $_REQUEST['orderNumber'];
        $buyerId = $_REQUEST['buyerId'];
        $money = $_REQUEST['money'];
        $goodsName = $_REQUEST['goodsName'];
        $goodsId = $_REQUEST['goodsId'];
        $address = $_REQUEST['address'];
        $obj = new OrderInfo();
        $obj->order_number = $orderNumber;
        $obj->buyer_id = $buyerId;
        $obj->order_amount = $money;
        $obj->pay_name = $goodsName;
        $obj->product_id = $goodsId;
        $obj->address = $address;
        $res = $obj->save();
        if(!$res){
            return json_encode(['code'=>0,'message'=>'失败']);
        }else{
            return json_encode(['code'=>1,'message'=>'成功']);
        }
    }
}