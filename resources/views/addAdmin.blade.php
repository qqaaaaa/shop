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
<form action="doAddAdmin" method="post">
    {{csrf_field()}}
    <tr>
        <td>请输入账号:</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>请输入密码:</td>
        <td><input type="password" name="pwd"></td>
    </tr>
    <tr>
        <td><input type="submit" value="添加管理员"></td>
        <td></td>
    </tr>
</form>
</body>
</html>