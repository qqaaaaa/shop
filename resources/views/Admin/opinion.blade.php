@include('News.header')
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
@include('News.footer')