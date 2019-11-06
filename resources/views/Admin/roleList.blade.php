<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
    <table>
        <tr>
            <td>角色id</td>
            <td>角色名称</td>
            <td>角色权限</td>
            <td>操作</td>
        </tr>
        @foreach($allRole as $key=>$v)
            <tr>
                <td>{{$v['id']}}</td>
                <td>{{$v['name']}}</td>
                <td>
                    <select name="" id="">
                        @foreach($v['rolepower'] as $k=>$val)
                            @foreach($val['power'] as $k=>$value)
                                <option value="">{{$value['name']}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </td>
                <td>
                    <button value="{{$v['id']}}" class="del"><a href="javascript:;">删除</a></button>
                    <button><a href="updAdmin?id={{$val['id']}}">编辑</a></button>
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">角色成员列表</button>
                </td>
            </tr>
        @endforeach
    </table>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.del').click(function(){
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
        })
    </script>
</body>
</html>