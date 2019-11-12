<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div style="width:500px;height:500px;">
    <form action="doUpdAdmin" method="post" style="margin-top:20%;margin-left:20%;">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$adminInfo['id']}}">
        <div class="form-group">
            <label>账号:</label>
            <input type="text" class="form-control" name="name" style="width:200px;display:inline;" placeholder="{{$adminInfo['name']}}">
        </div>
        <div class="form-group">
            <label>密码:</label>
            <input type="password" class="form-control" name="pwd" style="width:200px;display:inline;">
        </div>
        <div>
            <label>角色:</label>
            <select name="r_id" id="" class="form-control" style="width:200px;display:inline;">
                @foreach($roleInfo as $key=>$v)
                    <option value="{{$v['id']}}">{{$v['name']}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="确认修改" class="btn btn-default" style="margin-left:100px;font-weight:bold;margin-top:20px;">
    </form>
</div>
</body>
</html>