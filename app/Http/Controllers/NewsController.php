<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use App\Models\RolePower;
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
            if ($va['pid']==0&&$va['show']==1) {
               $array_1[$va['id']]['id']=$va['id'];
              $array_1[$va['id']]['pid']=$va['pid'];
              $array_1[$va['id']]['name']=$va['name'];
              $array_1[$va['id']]['route']=$va['route'];
            }
             if ($va['pid']!=0&&$va['show']==1) {
               $array_2[$va['id']]['id']=$va['id'];
              $array_2[$va['id']]['pid']=$va['pid'];
              $array_2[$va['id']]['name']=$va['name'];
              $array_2[$va['id']]['route']=$va['route'];
            }
         }
         }
         $arr = ['arr1'=>$array_1,'arr2'=>$array_2,'name'=>$name];
         $uid=$flight[0]['id'];
         session(['userid' => $arr]);
         // print_r(session($uid));die;
   	$tim=$flight[0]['times']-7*24*60*60;
   	//判断是否即将过期
   	if ($time>$tim||$time>$times) {
   		echo "<script>alert('该密码即将过期请尽早更换密码避免耽误您的使用')</script>";
         return view('News/show',['array_1'=>session('userid')['arr1'],'array_2'=>session('userid')['arr2'],'name'=>session('userid')['name']]);
   	}
         return redirect('homePage');
   	
   }

   public function homePage(){
      session('userid');
      return view('News/show',['array_1'=>session('userid')['arr1'],'array_2'=>session('userid')['arr2'],'name'=>session('userid')['name']]);
   }

   public function menuList(){
      $menu = Power::where('pid',0)->paginate(10);
      session('userid');
      return view('News/menu',['array_1'=>session('userid')['arr1'],'array_2'=>session('userid')['arr2'],'name'=>session('userid')['name'],'menu'=>$menu]);
   }
   //菜单添加页面渲染
   public function menuAdd(){
      return view('News/menuadd',['array_1'=>session('userid')['arr1'],'array_2'=>session('userid')['arr2'],'name'=>session('userid')['name']]);
   }
   //菜单添加
   public function menuAdds(){
     if ($_POST['name']=='') {
        return back()->withErrors(['菜单名称不可以为空'])->withInput();
     }
     $name=$_POST['name'];
     $show=$_POST['show'];
         $flight = new Power;        
        $flight->name = $name;  
        $flight->show = $show;
        $flight->pid = 0;         
        $flight->save();  
        return redirect('menuList');
   }
   //菜单子权限
   public function menuDetails(){
      $id=$_GET['id'];
      $menu = Power::where('pid',$id)->paginate(10);
      return view('News/menuDetails',['array_1'=>session('userid')['arr1'],'array_2'=>session('userid')['arr2'],'name'=>session('userid')['name'],'menu'=>$menu,'id'=>$id]);
   }
   //子菜单添加页面
   public function subMenuAdd(){
      $id=$_GET['id'];
       return view('News/subMenuAdd',['array_1'=>session('userid')['arr1'],'array_2'=>session('userid')['arr2'],'name'=>session('userid')['name'],'id'=>$id]);
   }
   //子菜单添加
   public function subMenuAdds(){
       if ($_POST['name']=='') {
        return back()->withErrors(['菜单名称不可以为空'])->withInput();
     }
      $name=$_POST['name'];
      $show=$_POST['show'];
      $pid=$_POST['pid'];
        $flight = new Power;        
        $flight->name = $name;  
        $flight->show = $show;
        $flight->pid = $pid;         
        $flight->save();  
        return redirect("menuDetails?id=$pid");
   }
   //子菜单删除
   public function subMenuDel(){
      $id=$_GET['id'];
      $menus=  Power::where('id',$id)->get()->toArray();
      $pid=$menus['0']['pid'];
      $menu = Power::where('id',$id)->delete();
      $m=RolePower::where('p_id',$id)->delete();
      return redirect("menuDetails?id=$pid");
   }
   //子菜单修改页面
   public function subMenuCompile(){
      $id=$_GET['id'];
      $menus=  Power::where('id',$id)->get()->toArray();
      $names=$menus['0']['name'];
      return view('News/subMenuCompile',['array_1'=>session('userid')['arr1'],'array_2'=>session('userid')['arr2'],'name'=>session('userid')['name'],'id'=>$id,'names'=>$names]);
   }
   //子菜单修改
   public function subMenuCompiles(){
      $id=$_POST['id'];
      $name=$_POST['name'];
      $show=$_POST['show'];
      $menus= Power::where('id',$id)->update(['name'=>$name,'show'=>$show]);
      $menu= Power::where('id',$id)->get()->toArray();
      $pid=$menu['0']['pid'];
      return redirect("menuDetails?id=$pid");
   }
   //菜单编辑页面
   public function menuCompile(){
    $id=$_GET['id'];
    print_r($id);
    session_start();
    $menus=  Power::where('id',$id)->get()->toArray();
    $names=$menus['0']['name'];
    return view('News/menuCompile',['array_1'=>session('userid')['arr1'],'array_2'=>session('userid')['arr2'],'name'=>session('userid')['name'],'id'=>$id,'names'=>$names]);
   }
   //菜单编辑
   public function menuCompiles(){
    $id=$_POST['id'];
      $name=$_POST['name'];
      $show=$_POST['show'];
      $menus= Power::where('id',$id)->update(['name'=>$name,'show'=>$show]);
       return redirect('menuList');
   }
   //菜单删除
   public function menuDel(){
      $id=$_GET['id'];
      $menu = Power::where('pid',$id)->delete();
      $menu = Power::where('id',$id)->delete();
      return redirect("menuList");
   }
}