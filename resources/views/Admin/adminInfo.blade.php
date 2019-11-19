@include('News.header')
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
@include('News.footer')