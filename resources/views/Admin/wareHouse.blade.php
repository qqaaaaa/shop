@include('News.header')
<div style="width:500px;height:500px;">
    <form action="addWareHouse" method="post" style="margin-top:20%;margin-left:20%;">
        {{csrf_field()}}
        <table>
            <div class="form-group">
                <label>请输入仓库名称:</label>
                <input type="text" class="form-control" name="wh_name" style="width:200px;display:inline;">
            </div>
            <div class="form-group" style="margin-top:50px;">
                <label>请输入仓库编码:</label>
                <input type="text" class="form-control" name="wh_number" style="width:200px;display:inline;" id="pwd">
            </div>
            <div class="form-group" style="margin-top:50px;">
                <label>请输入仓库所在地:</label>
                <input type="text" class="form-control" name="wh_city" style="width:200px;display:inline;" id="pwd">
            </div>
            <div class="form-group" style="margin-top:50px;">
                <label>请输入仓库服务地区:</label>
                <input type="text" class="form-control" name="wh_fcity" style="width:200px;display:inline;" id="pwd">
            </div>
            <div class="form-group" style="margin-top:50px;">
                <label>请输入仓库是否启用:</label>
                <input type="radio" value="1" name="wh_status">是
                <input type="radio" value="0" name="wh_status">否
            </div>
            <input type="submit" value="添加仓库" class="btn btn-default" style="margin-left:100px;font-weight:bold;margin-top:50px;"></td>
        </table>

    </form>
</div>
@include('News.footer')