@include('News.header')
<table class="table table-hover">
    <tr>
        <th>编号</th>
        <th>仓库名称</th>
        <th>仓库编码</th>
        <th>仓库所在地区</th>
        <th>仓库服务地区</th>

        <th>操作</th>
    </tr>
    @foreach($data as $key=>$val)
        <tr>
            <th>{{$val['id']}}</th>
            <th>{{$val['wh_name']}}</th>
            <th>{{$val['wh_number']}}</th>
            <th>{{$val['wh_city']}}</th>
            <th>{{$val['wh_fcity']}}</th>
            <th>
                <button value="{{$val['id']}}" class="btn btn-default">删除</button>
                <a class="btn btn-default" href="updWareHouse?id={{$val['id']}}" role="button">编辑</a>
            </th>
        </tr>
    @endforeach
</table>
<script>
    $(document).ready(function(){
        $('.btn').click(function(){
            var id = $(this).attr('value');
            var this1 = $(this).parents('tr');
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url:'delWareHouse',
                type:'post',
                data:{id:id},
                datatype:'json',
                success:function(res){
                    res = JSON.parse(res);
                    if(res.code==1){
                        alert(res.message);
                        this1.remove();
                    }else{
                        alert(res.message);
                    }

                }
            })
        })
    })
</script>
@include('News.footer')