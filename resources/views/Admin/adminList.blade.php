@include('News.header')
<table class="table table-hover">
<tr>
    <th>管理员id</th>
    <th>管理员名字</th>
    <th>操作</th>
</tr>
@foreach($adminList as $key=>$val)
<tr>
    <th>{{$val['id']}}</th>
    <th>{{$val['name']}}</th>
    <th>
        <button value="{{$val['id']}}" class="btn btn-default">删除</button>
        <a class="btn btn-default" href="updAdmin?id={{$val['id']}}" role="button">编辑</a>
    </th>
</tr>
@endforeach
</table>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('.btn').click(function(){
            var id = $(this).attr('value');
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url:'delAdmin',
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
@include('News.footer')