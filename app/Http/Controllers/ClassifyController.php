<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Request;
use App\Models\Classify;
use App\Models\Collect;
use App\Models\Product;


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

    public function details(){
        $id = Input::get('id');
        $data = Product::where('id',$id)->find()->toAarray();
        $code = 1;
        $msg = '请求成功';
        $data = $data;
        echo jsonType($code,$msg,$data);die;
    }

}
