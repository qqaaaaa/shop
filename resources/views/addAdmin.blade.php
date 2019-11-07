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
    <form action="doAddAdmin" method="post" style="margin-top:20%;margin-left:20%;">
        {{csrf_field()}}
        <table>
            <div class="form-group">
                <label for="exampleInputEmail1">请输入账号:</label>
                <input type="text" class="form-control" name="name" style="width:200px;display:inline;">
            </div>
            <div class="form-group" style="margin-top:50px;">
                <label for="exampleInputEmail1">请输入密码:</label>
                <input type="password" class="form-control" name="pwd" style="width:200px;display:inline;" id="pwd">
            </div>
            <input type="submit" value="添加管理员" class="btn btn-default" style="margin-left:100px;font-weight:bold;margin-top:50px;"></td>
        </table>

    </form>
</div>

<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#pwd').blur(function(){
            var pwd = $(this).val();
            var reg=/^(?=.*[a-zA-Z])(?=.*[0-9]).{6,30}$/;
            if(!reg.test(pwd)){
                alert("密码格式必须为6-30位并且包含大小写字母和数字");
                return;
            }
        })
    })
</script>
</body>
</html>