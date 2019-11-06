<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<table class="table table-hover">
<tr>
    <td>管理员id</td>
    <td>管理员名字</td>
    <td>操作</td>
</tr>
<?php foreach($adminList as $key=>$val){?>
<tr>
    <td>{{$val['id']}}</td>
    <td>{{$val['name']}}</td>
    <td>
        <button value="{{$val['id']}}" class="del"><a href="javascript:;">删除</a></button>
        <button><a href="updAdmin?id={{$val['id']}}">编辑</a></button>
    </td>
</tr>
<?php } ?>
</table>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('.del').click(function(){
            var id = $(this).attr('value');
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url:'delAdmin',
                type:'post',
                data:{id:id},
                datatype:'json',
                success:function(res){
                    res = JSON.parse(res);
                    alert(res.message);
                    location.reload();
                }
            })
        })
    })
</script>
</body>
</html>