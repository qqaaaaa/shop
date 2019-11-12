<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="pointer-events:auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="margin-left:235px;">角色成员列表</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>成员id</th>
                        <th>成员姓名</th>
                        <th>操作</th>
                    </tr>
                    <tbody id="modal">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <table class="table table-hover">
        <tr>
            <th>角色id</th>
            <th>角色名称</th>
            <th>角色权限</th>
            <th>操作</th>
        </tr>
        @foreach($allRole as $key=>$v)
            <tr>
                <th>{{$v['id']}}</th>
                <th>{{$v['name']}}</th>
                <th>
                    <select name="" id=""  class="form-control" style="width:200px;">
                        @foreach($v['rolepower'] as $k=>$val)
                            @foreach($val['power'] as $k=>$value)
                                <option value="">{{$value['name']}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </th>
                <td>
                    <button value="{{$v['id']}}" class="btn btn-default" name="del">删除</button>
                    <a class="btn btn-default" href="updRole?name={{$v['name']}}" role="button">编辑</a>
                    <button class="btn btn-default" name="admin" ids="{{$v['id']}}">角色成员列表</button>
                </td>
            </tr>
        @endforeach
    </table>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("button[name='del']").click(function(){
                var id = $(this).attr('value');
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    url:'delRole',
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
        });
        $(document).on('click',"button[name='admin']",function(){
            var roleId = $(this).attr('ids');
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url:'getRoleGroup',
                type:"post",
                data:{roleId:roleId},
                datatype:'json',
                success:function(res){
                    var res = JSON.parse(res);
                    if(res.code==0){
                        alert(res.message);return;
                    }
                    var str = '';
                    $.each(res.data,function(k,v){
                        str += "<tr><td>"+v.id+"</td><td>"+v.name+"</td><td><button class='delAdmin' ids="+v.id+" ids='"+v.id+"'>删除</button></td></tr>";
                    });
                    $('#modal').html(str);
                    $('#myModal').modal('show');
                }
            });
        });
        $(document).on('click','.delAdmin',function(){
            var adminId = $(this).attr('ids');
            var this1 = $(this).parents('tr');
            $.ajax({
                url:'delRoleAdmin',
                type:"post",
                data:{adminId:adminId},
                datatype:'json',
                success:function(res){
                    res = JSON.parse(res);
                    if(res.code==1){
                        alert(res.message);
                        this1.remove();
                    }else{
                        alert(res.message);
                    }
                }
            })
        });
    </script>
</body>
</html>