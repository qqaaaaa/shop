<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="doAddRole" method="post">
    {{csrf_field()}}
    <tr>
        <td>角色名称</td>
        <td><input type="text" name="role_name"></td>
    </tr>
    <tr>
        <td>角色权限</td>
        <td>
            <select name="power_id" id="">
                @foreach($power as $key=>$v)
                    <option value="{{$v['id']}}">{{$v['name']}}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td>角色成员</td>
        <td>
            <select name="admin_id" id="">
                @if(empty($admin))
                    <option>无角色可选</option>
                @endif
                @foreach($admin as $key=>$v)
                    <option value="{{$v['id']}}">{{$v['name']}}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td><input type="submit" value="添加角色"></td>
        <td></td>
    </tr>
</form>
</body>
</html>