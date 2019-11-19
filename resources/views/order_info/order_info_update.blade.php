@include('News.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
 <a href="index"><button type="button" class="btn btn-info"><<返回</button></a>
<div style="margin-top:70px">

<table class="table table-bordered">
 <tr>
   <td>ID</td>
   <td>订单号</td>
   <td>管理员</td>
   <td>修改方法</td>
   <td>修改时间</td>
 </tr>
<tbody id="content">
 @foreach($res as $key=>$val)

 <tr>
   <td><?php echo $val->id?></td>
   <td><?php echo $val->order_number?></td>
   <td><?php echo $val->user?></td>
   <td><?php echo $val->change?></td>
   <td><?php echo $val->updatetime?></td>
 </tr>

 @endforeach
</tbody>
</table>

</div>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
</script>
@include('News.footer')