@include('News.header')
<div>
  <center><h1>子菜单添加</h1></center>	
  </div>
  <center><div style="hight:100px;width:350px;" class="form-group">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    </center>
</div>
  <center>
  <div style="width:300px;">
  	<form action="subMenuAdds" method="post" role="form">
  	 {{ csrf_field() }}
   <div class="form-group">
      <label for="name">菜单名称</label>
      <input type="text" class="form-control" id="name" name="name" 
         placeholder="请输入名称">
   </div>
  	<div class="btn-group" data-toggle="buttons">
    <input type="hidden" value="<?php echo $id; ?>" name="pid">
   <label class="btn btn-primary">
      <input type="radio" name="show" id="option1" value="1"  checked="checked"> 展示
   </label>
   <label class="btn btn-primary">
      <input type="radio" name="show" id="option2" value="0"> 不展示
   </label>
</div>

<div style="margin-top:25px;"><button type="submit" class="btn btn-default">提交</button></div>
   
</form>

  </div>
  </center>
@include('News.footer')