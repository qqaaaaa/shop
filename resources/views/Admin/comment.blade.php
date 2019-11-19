@include('News.header')
<table class="table table-hover">
    <tr>
        <th>编号</th>
        <th>商品名字</th>
        <th>用户名字</th>
        <th>评论内容</th>
        <th>操作</th>
    </tr>
    @foreach($comment as $key=>$val)
        <tr>
            <th>{{$val['id']}}</th>
            <th>{{$val['goods_name']}}</th>
            <th>{{$val['user']}}</th>
            <th>{{$val['comment']}}</th>
                @if($val['status']==1&&$val['pass_status']==1)
                    <th>审核通过</th>
                @elseif($val['status']==1&&$val['pass_status']==0)
                    <th>审核未通过</th>
                @else
                    <th>
                        <button value="{{$val['id']}}" class="btn btn-default" name="pass">通过</button>
                        <button value="{{$val['id']}}" class="btn btn-default" name="nopass">不通过</button>
                    </th>
                @endif
        </tr>
    @endforeach
</table>
<script>
    $(document).ready(function(){
        $("button[name='pass']").click(function(){
            var id = $(this).attr('value');
            var this1 = $(this).parent('th');
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url:'pass',
                type:'post',
                data:{id:id},
                datatype:'json',
                success:function(res){
                    res = JSON.parse(res);
                    if(res.code==1){
                        this1.empty();
                        this1.html('审核通过');
                    }else{
                        alert(res.message);
                    }
                }
            })
        });
        $("button[name='nopass']").click(function(){
            var id = $(this).attr('value');
            var this1 = $(this).parent('th');
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url:'noPass',
                type:'post',
                data:{id:id},
                datatype:'json',
                success:function(res){
                    res = JSON.parse(res);
                    if(res.code==1){
                        this1.empty();
                        this1.html('审核未通过');
                    }else{
                        alert(res.message);
                    }
                }
            })
        });
    });
</script>
@include('News.footer')