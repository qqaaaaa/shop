@include('News.header')

    <div style="width:500px;height:500px;">
        <form action="doReply" method="post" style="margin-top:20%;margin-left:20%;">
            {{csrf_field()}}
            <input type="hidden" value="{{$username}}" name="username">
            <div class="form-group">
                <label>给 <span style="color: red;font-size: 20px;">{{$username}}</span> 回复消息:</label>
                <input type="text" class="form-control" name="message" style="width:200px;display:inline;">
            </div>
            <input type="submit" value="发送消息" class="btn btn-default" style="margin-left:100px;font-weight:bold;margin-top:50px;"></td>
        </form>
    </div>

@include('News.footer')