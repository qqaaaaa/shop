@include('News.header')
<div  style="width:500px;height:500px;">
    <form action="doUpdRole" method="post" style="margin-top:20%;margin-left:20%;">
        {{csrf_field()}}
            <input type="hidden" name="r_name" value="{{$roleName}}">
        <div class="form-group">
            <label>给<span style="color: red;">{{$roleName}}</span>添加权限：</label>
            <select name="p_id" id="" class="form-control" style="width:200px;display:inline;">
                @foreach($power as $k => $v)
                    <option value="{{$v['id']}}">{{$v['name']}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="添加权限" class="btn btn-default" style="margin-left:100px;font-weight:bold;margin-top:20px;">
    </form>
</div>

</body>
</html>