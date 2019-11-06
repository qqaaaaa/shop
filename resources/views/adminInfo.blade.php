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
<form action="doUpdAdmin" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$adminInfo['id']}}">
    <tr>
        <td>账号:</td>
        <td><input type="text" name="name" placeholder="{{$adminInfo['name']}}"></td>
    </tr>
    <tr>
        <td>密码:</td>
        <td><input type="password" name="pwd"></td>
    </tr>
    <select name="r_id" id="">
        @foreach($roleInfo as $key=>$v)
            <option value="{{$v['id']}}">{{$v['name']}}</option>
        @endforeach
    </select>
    <tr>
        <td><input type="submit" value="确认修改"></td>
        <td></td>
    </tr>
</form>
</body>
</html>