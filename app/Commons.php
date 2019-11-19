<?php
function success_json($code,$msg,$data=[]){ 
    if(empty($data)){
        $data = new stdClass();
    }
    $res['code']=$code;
    $res['msg']=$msg;
    $res['data']=$data;
    echo json_encode($res);
    }