@include('News.header')
<div style="width:500px;height:500px;">
    <form action="doAddRole" method="post" style="margin-top:20%;margin-left:20%;">
        {{csrf_field()}}
        <table>
            <div class="form-group">
                <label>角色名称:</label>
                <input type="text" class="form-control" name="role_name" style="width:200px;display:inline;">
            </div>
            <div style="margin-top:50px;">
                <label>角色权限:</label>
                <select name="power_id" id="" class="form-control" style="width:200px;display:inline;">
                    @foreach($power as $key=>$v)
                        <option value="{{$v['id']}}">{{$v['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div style="margin-top:50px;">
                <label for="exampleInputEmail1">角色成员:</label>
                <select name="admin_id" id="" class="form-control" style="width:200px;display:inline;">
                    @if(empty($admin))
                        <option>无角色可选</option>
                    @endif
                    @foreach($admin as $key=>$v)
                        <option value="{{$v['id']}}">{{$v['name']}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="添加角色" class="btn btn-default" style="margin-left:100px;font-weight:bold;margin-top:20px;">
        </table>
    </form>
</div>
@include('News.footer')