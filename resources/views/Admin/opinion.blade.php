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
<div>
    <table class="table table-hover">
        <tr>
            <th>编号</th>
            <th>用户名</th>
            <th>用户意见或反馈</th>
            <th>操作</th>
        </tr>
        @foreach($opinion as $key=>$v)
            <tr>
                <th>{{$v['id']}}</th>
                <th>{{$v['name']}}</th>
                <th><p>{{$v['opinion']}}</p></th>
                <td>
                    <a class="btn btn-default" href="replyUser?user={{$v['name']}}" role="button">回复</a>
                </td>
            </tr>
        @endforeach
    </table>
{{$opinion->links()}}
</div>
</body>
</html>