<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers;
use App\Models\Buyer;
use App\Jwt;
use App\Models\Classify;
class ApiController extends Controller {
	public function loGin(){


// //对token进行验证签名
// $getPayload=$jwt->verifyToken($token);
// echo "<br><br>";
// var_dump($getPayload);
// echo "<br><br>";
		$name=$_GET['username'];
		$pwd=$_GET['password'];
		$menu = Buyer::where('buyer_name',$name)->get()->toArray();
		if ($menu=='') {
			return success_json(2,'失败',[]);
		}
		// 		//测试和官网是否匹配begin
	// print_r($menu['0']['buyer_id']);die;
	$id=$menu['0']['buyer_id'];
	$names=$menu['0']['buyer_name'];
	$payload=array('sub'=>"$id",'name'=>"$names");
	$jwt=new Jwt();
	$token=$jwt->getToken($payload);
		return success_json(200,'成功',['token'=>$token,'id'=>$id,'names'=>$names]);
	}
	public function actEmail(){
		include "EmailController.php";
	}
	public function reSetPwd(){
		$email=$_POST['email'];
		$menu = Buyer::where('buyer_email',$email)->get()->toArray();
		$code=$menu['0']['buyer_code'];
		$this->actEmail();
		$url="http://www.shop.com/api/reSetPwds?code=$code";
		$emails=new Email();
		$content="点击链接重置你的密码".$url;
		$res=$emails->sendMail($email,"重置密码",$content);
		if ($res==true) {
			return success_json(0,'去邮箱重置');
		}
	}
	public function reSetPwds(){
		$code=$_POST['code'];
		$pwd=$_POST['pwd'];
		$menu = Buyer::where('buyer_code',$code)->update(['buyer_pwd'=>$pwd]);
		return success_json(0,'修改成功');
	}
	public function mailBox(){
		$email=$_POST['email'];
		$menu = Buyer::where('buyer_email',$email)->get()->toArray();
		if ($menu) {
			return success_json(1,'邮箱已存在');
		}
		return success_json(0,'邮箱可用');
	}
	public function register(){
		$name=$_GET['name'];
		$pwd=$_GET['pwd'];
		$email=$_GET['email'];
		$menu = Buyer::where('buyer_email',$email)->get()->toArray();
		if ($menu) {
			return success_json(1,'邮箱已存在');
		}
		$birthday=$_REQUEST['birthday'];
		$code=time()+rand(1,9999);
		 $flight = new Buyer;        
        $flight->buyer_name = $name;  
        $flight->buyer_pwd = $pwd;
        $flight->buyer_email = $email;      
        $flight->buyer_birthday = $birthday;    
        $flight->buyer_code = $code;     
        $flight->save();
        $this->actEmail();
		$emails=new Email();
		$content="恭喜"."$name"."成功注册";
		$res=$emails->sendMail($email,"注册成功",$content);
        return success_json(200,'注册成功');
		
	}
	public function classify(){
		$menu = Classify::limit(4)->get()->toArray();
		return success_json(0,'成功',$menu);
	}
	public function product(){
		$menu = Product::limit(6)->get()->toArray();
		return success_json(0,'成功',$menu);
	}
	
}
