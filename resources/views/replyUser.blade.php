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
        <form action="doReply" method="post" style="margin-top:20%;margin-left:20%;">
            {{csrf_field()}}
            <input type="hidden" value="{{$name}}" name="username">
            <div class="form-group">
                <label>给 <span style="color: red;font-size: 20px;">{{$name}}</span> 回复消息:</label>
                <input type="text" class="form-control" name="message" style="width:200px;display:inline;">
            </div>
            <input type="submit" value="发送消息" class="btn btn-default" style="margin-left:100px;font-weight:bold;margin-top:50px;"></td>
        </form>
    </div>
</body>
</html>