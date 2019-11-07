<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Request;
use App\Models\Property;
use App\Models\Classify;

class IndexController extends Controller
{

	public function property(){
		// $res = OrderInfo::get()->toArray();
		$res = Property::get()->toArray();
		// print_r($res);die;
		return view('Index/property')->with('res',$res);
	}

	public function propertyAdd(){
		$res = Classify::get()->toArray();
		$data = $this->getTree($res);
		// var_dump($data);die;
		return view('Index/propertyAdd')->with('data',$data);
	}

	public function propertyAddok(){
		$input = Request::all();
		$res = new Property;
		$user = $res->insertGetId($input);
		if($user){
			$re['status'] = 1;
			$re['msg'] = '添加完成';
			echo json_encode($re);die;
		}
	}

	public function classifyAdd(){
		$res = Classify::get()->toArray();
		$data = $this->getTree($res);
		// var_dump($data);die;
		return view('Index/classifyAdd')->with('data',$data);
	}

	public function classifyAddok(){
		$input = Request::all();
		$res = new Classify;
		$user = $res->insertGetId($input);
		if($user){
			$re['status'] = 1;
			$re['msg'] = '添加完成';
			echo json_encode($re);die;
		}
	}

	public function classifyShow(){
		$res = Classify::get()->toArray();
		// var_dump($res);
		return view('Index/classifyShow')->with('res',$res);
	}

	public function classifyUpd(){
		$id = Input::get('id');
		$arr = Classify::find($id)->toArray();
		$res = Classify::get()->toArray();
		$data = $this->getTree($res);
		return view('Index/classifyUpd')->with('arr',$arr)->with('data',$data);
	}

	public function classifyUpdok(){
		$data = [
			'clname' => Input::post('clname'),
			'clorder' => Input::post('clorder'),
			'cldeny' => Input::post('cldeny'),
			'pid' => Input::post('pid'),
		];
		$id = Input::post('id');
		$res = classify::where('id',$id)->update($data);
		if($res){
			$re['status'] = 1;
			$re['msg'] = '修改完成';
			echo json_encode($re);die;
		}
		
	}

	public function classifyDel(){
		$id = Input::get('id');
		$user = classify::find($id);
		if($user['id'] == $user['pid']){
			$user->delete();
			if($user){
				echo "<script>alert('删除成功');location.href='classifyShow'</script>";die;
			}
		}else{
			echo "<script>alert('请先解除字节点');location.href='classifyShow'</script>";die;
		}
	}

	public function propertyUpd(){
		$id = $_GET['id'];
		// print_r($id);
		$arr = Property::find($id)->toArray();
		$res = Classify::get()->toArray();
		$data = $this->getTree($res);
		// var_dump($data);die;
		return view('Index/propertyUpd')->with('arr',$arr)->with('data',$data);
	}

	public function propertyUpdok(){
		$data = [

			'proname'=>Input::post('proname'),
			'classify'=>Input::post('classify'),
			'deny'=>Input::post('deny'),
		];
		$id = Input::post('id');
		// $user = new Property;
		$res = Property::where('id',$id)->update($data);
		// echo $res;
		if($res){
			$re['stauts'] = 1;
			$re['msg'] = '修改成功';
			echo json_encode($re);die;
		}
	}

	public function propertyDel(){
		$id = Input::get('id');
		$user = Property::find($id);
		$user->delete();
		if($user){
			echo "<script>alert('删除成功');location.href='property'</script>";die;
		}
	}

	/*
		$res 调入传入数组，pid 找到父节点为0的,level声明根节点级别是一级
		
	*/
	public function getTree($res,$pid=0,$level=1){
		//声明静态数组避免递归多次时多次声明导致数组覆盖
		static $arr = [];
		foreach ($res as $key => $value) {
			//找到父节点为0的节点pid=0的节点
			if($value['pid'] == $pid){
				//父节点为根节点级别0也就是一级
				$value['level'] = $level;
				//把数组放在arr中
				$arr[] = $value;
				//把这个节点从数组中移除，减少后续消耗
				unset($res[$key]);
				//开始递归，查找父id为该节点id的节点，级别为原级别+1
				$this->getTree($res,$value['id'],$level+1);
			}
		
		}
		return $arr;
	}
}
