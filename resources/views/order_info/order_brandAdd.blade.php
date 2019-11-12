@include('order_info.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
 <a href="brandShow"><button type="button" class="btn btn-info"><<返回</button></a>
 <h2>品牌添加页面</h2>
<div style="margin-top:70px">
   <form action="brandAdd_do" method="post">{{ csrf_field() }}
<div class="form-group">
      <label for="disabledTextInput">品牌名称</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" name="brand_name">
    </div>
 <div class="form-group">
      <label for="disabledTextInput">是否公开</label>
      <label class="radio-inline">
  <input type="radio" name="brand_state" id="inlineRadio1" value="1"> 公开
</label>
<label class="radio-inline">
  <input type="radio" name="brand_state" id="inlineRadio2" value="0"> 不公开
</label>
    </div>   
<input type="submit" class="btn btn-success" value="提交">
</form>
</div>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
</script>
@include('order_info.footer')