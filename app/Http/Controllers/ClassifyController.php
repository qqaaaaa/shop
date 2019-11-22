<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Request;
use App\Models\Classify;
use App\Models\Collect;
use App\Models\Product;
use App\Models\Images;
use App\Models\Ability;
use App\Models\Car;




class ClassifyController extends Controller
{

    public function index(){
//        $pid = 0;
//        $res = Classify::where('pid',$pid)->get()->toArray();
        $res = Classify::get()->toArray();
        $data = getTree($res);

//        var_dump($data);die;
        $code = 1;
        $msg = '请求成功';
        $data = $data;
       echo jsonType($code,$msg,$data);die;
    }

    public function clas(){
        $pid = Input::get('id');
        $res = Product::where('c_id',$pid)->get()->toArray();
        $code = 1;
        $msg = '请求成功';
        $data = $res;
        echo jsonType($code,$msg,$data);die;
    }

    public function collect(){
        $data = [
            'u_id'=>Input::get('u_id'),
            'p_id'=>Input::get('p_id'),
        ];
        $arr = Collect::where('u_id',$data['u_id'] and 'p_id',$data['p_id'])->find()->toArray();
        if($arr){
                $id = $arr['id'];
                $res = Collect::find($id);
                $res->delete();
                if($res){
                    $code = 2;
                    $msg = '取消收藏';
                    $data = [];
                    echo jsonType($code,$msg,$data);die;
                }
        }else{
            $user = new Collect;
            $res = $user->insertGetId($data);
            if($res){
                $code = 1;
                $msg = '收藏完成';
                $data = [];
                echo jsonType($code,$msg,$data);die;
            }
        }
    }

    public function classifyGoods(){
        $id = Input::get('id');
        $data = Product::where('c_id',$id)->get()->toArray();
        $code = 1;
        $msg = '请求成功';
        $data = $data;
        echo jsonType($code,$msg,$data);die;
    }

    public function details(){
        $id = Input::get('id');
        $data = Product::find($id);
        $code = 1;
        $msg = '请求成功';
        $data = $data;
        echo jsonType($code,$msg,$data);die;
    }

    public function images(){
        $id = Input::get('id');
        $data = Images::where('p_id',$id)->get()->toArray();
        $code = 1;
        $msg = '请求成功';
        $data = $data;
        echo jsonType($code,$msg,$data);die;
    }

    public function ability(){
        $id = Input::get('c_id');
        $data = Ability::where('c_id',$id)->get()->toArray();
        $code = 1;
        $msg = '请求成功';
        $data = $data;
        echo jsonType($code,$msg,$data);die;
    }

    public function car(){
        $data = [
            'goods_id' => Input::get('goods_id'),
            'goods_name' => Input::get('goods_name'),
            'goods_img' => Input::get('goods_img'),
            'goods_price' => Input::get('goods_price'),
            'goods_num' => Input::get('goods_num'),
            'user_id' => 1,
        ];
        $res = new Car;
        $user = $res->insertGetId($data);
        if($user){
            $code = 1;
            $msg = '请求成功';
            $data = [];
            echo jsonType($code,$msg,$data);die;
        }
    }

}
