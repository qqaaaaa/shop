<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use App\Models\Roleower;
use App\Models\Power;

class NewsController extends Controller
{
	//渲染登录页面
	public function user(){
		return view('News/login');
	}
	//登录验证
	public function loGin(){
	$time=time();
   	$name=$_POST['name'];
   	$pwd=$_POST['pwd'];
      $pwd=md5($pwd);
   	//判断是否为空
   	if ($name==''||$pwd=='') {
   		 return back()->withErrors(['用户名和密码不可以为空'])->withInput();
   	}
   	$flight = Admin::where('name',$name)->where('pwd',$pwd)->get()->toArray();
   	//判断返回值是否为空
   	if (empty($flight)) {
   		return back()->withErrors(['用户名或密码不正确'])->withInput();
   	}
   	$times=$flight[0]['times'];
   	//判断时间戳是否超时
   	if ($time>$times) {
   		return back()->withErrors(['请及时联系管理员更新密码'])->withInput();
   	}
      $role=Admin::with('role')->where('name',$name)->get()->toArray();
      $rolepower=Role::with(['rolepower'=>function($rolepower){$rolepower->with(['power']);}])->where('role.name',$role['0']['role']['0']['name'])->get()->toArray();
      $array_1=[];
      $array_2=[];
      foreach ($rolepower['0']['rolepower'] as $key => $v) {
         foreach ($v['power'] as $key => $va) {
            if ($va['pid']==0) {
               $array_1[$va['id']]['id']=$va['id'];
              $array_1[$va['id']]['pid']=$va['pid'];
              $array_1[$va['id']]['name']=$va['name'];
              $array_1[$va['id']]['route']=$va['route'];
            }
             if ($va['pid']!=0) {
               $array_2[$va['id']]['id']=$va['id'];
              $array_2[$va['id']]['pid']=$va['pid'];
              $array_2[$va['id']]['name']=$va['name'];
              $array_2[$va['id']]['route']=$va['route'];
            }
         }
         }

   	$tim=$flight[0]['times']-7*24*60*60;
   	//判断是否即将过期
   	if ($time>$tim||$time>$times) {
   		echo "<script>alert('该密码即将过期请尽早更换密码避免耽误您的使用')</script>";
         return view('News/show',['array_1'=>$array_1,'array_2'=>$array_2,'name'=>$name]);
   	}
      return view('News/show',['array_1'=>$array_1,'array_2'=>$array_2,'name'=>$name]);
   	
   }
   public function menuList(){
      return view('News/menu');
   }
}