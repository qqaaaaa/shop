<?php


function getTree($res,$pid=0,$level=1){
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
            getTree($res,$value['id'],$level+1);
        }
    }
    return $arr;
}

function jsonType($code,$msg,$data){
    $arr['code'] = $code;
    $arr['msg'] = $msg;
    $arr['data'] = $data;
    return  json_encode($arr);die;
}

