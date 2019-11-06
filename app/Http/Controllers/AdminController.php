<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Role;
use App\Models\RolePower;
use App\Models\Power;
Class AdminController{

    public function index(){
        $res = Admin::with('role')->get()->toArray();
        var_dump($res);
    }
    //渲染添加页面
    public function addAdmin(){
        return view('addAdmin');
    }
    //添加的方法
    public function doAddAdmin(){
        $name = $_POST['name'];
        $pwd = $_POST['pwd'];
        $time = time()+90*24*60*60;
        $data = ['name'=>$name,'pwd'=>$pwd,'times'=>$time];
        $obj = new Admin();
        $res = $obj->insertGetId($data);
        if(!$res){
            echo "<script>alert('添加失败！');location.href='addAdmin'</script>";
        }
        echo "<script>alert('添加成功！');location.href='adminList'</script>";
    }
    //管理员列表
    public function adminList(){
        $res = Admin::all();
        return view('adminList',['adminList'=>$res]);
    }
    //删除管理员
    public function delAdmin(){
        $id = $_POST['id'];
        $res = Admin::destroy($id);
        if($res){
            return json_encode(['code'=>1,'message'=>'删除成功']);
        }
        return json_encode(['code'=>0,'message'=>'删除失败']);
    }
    //编辑管理员信息
    public function updAdmin(){
        $id = $_GET['id'];
        $obj = new Admin();
        $info = $obj->where('id',$id)->get()->toArray();
        $roleObj = new Role();
        $roleInfo = $roleObj->all()->toArray();
        return view('adminInfo',['adminInfo'=>$info[0],'roleInfo'=>$roleInfo]);
    }
    //修改管理员信息
    public function doUpdAdmin(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $pwd = $_POST['pwd'];
        $role = $_POST['r_id'];
        $obj = Admin::find($id);
        $obj->name = $name;
        $obj->pwd = $pwd;
        $obj->r_id = $role;
        $res = $obj->save();
        if(!$res){
            echo "<script>alert('修改失败！');location.href='adminList'</script>";
        }
        echo "<script>alert('修改成功！');location.href='adminList'</script>";
    }
    //渲染添加管理员角色页面
    public function addRole(){
        $power = Power::all()->toArray();
        $admin = Admin::where('r_id',null)->get()->toArray();
        return view('addRole',['power'=>$power,'admin'=>$admin]);
    }
    //添加管理员角色
    public function doAddRole(){
        //权限的id
        $powerId = $_POST['power_id'];
        //角色的id
        $adminId = $_POST['admin_id'];
        //角色名称
        $roleName = $_POST['role_name'];
        //判断角色名称唯一性
        $res = Role::where('name',$roleName)->get()->toArray();
        if(!empty($res)){
            echo "<script>alert('添加失败,已有此角色');location.href='addRole'</script>";
        }
        //实例化角色表的模型并添加角色到数据表，返回id
        $roleObj = new Role();
        $roleId = $roleObj->insertGetId(['name'=>$roleName]);
        //实例化角色权限表的模型将关联关系存到数据库
        $rolePowerObj = new RolePower();
        $rolePowerObj->insertGetId(['r_name'=>$roleName,'p_id'=>$powerId]);
        //修改管理员的角色
        $adminObj = Admin::where('id',$adminId)->update(['r_id'=>$roleId]);
        echo "<script>alert('添加成功！');location.href='roleList'</script>";
    }
    //管理员角色列表
    public function roleList(){
        $allRole=Role::with(['rolepower'=>function($rolepower){$rolepower->with(['power']);}])->get()->toArray();
//        $allRole = RolePower::with('power')->get()->toArray();
//        var_dump($allRole);die;
        return view('roleList',['allRole'=>$allRole]);
    }
    //删除角色
    public function delRole(){
        $roleId = $_POST['id'];
        $admin = Admin::where('r_id',$roleId)->get()->toArray();
        if(!empty($admin)){
            return json_encode(['code'=>0,'message'=>'角色下含有成员不能删除']);
        }
        $role = Role::where('id',$roleId)->get()->toArray();
        $roleName = $role[0]['name'];
        $delRes = RolePower::where('r_name',$roleName)->get()->toArray();
        if(empty($delRes)){
            $delRole = Role::where('id',$roleId)->delete();
            if($delRole){
                return json_encode(['code'=>1,'message'=>'删除角色成功']);
            }
        }
        $res = RolePower::where('r_name',$roleName)->delete();
        if($res){
            $delRole = Role::where('id',$roleId)->delete();
            if($delRole){
                return json_encode(['code'=>1,'message'=>'删除角色成功']);
            }
        }
    }
}