@include('order_info.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
 <div class="col-lg-6" style="margin-top:20px;float:right;">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for..." id="name">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="search">search</button>
      </span>
    </div><!-- /input-group -->
  </div>

<div style="margin-top:70px">

<table class="table table-bordered">
 <tr>
   <td>ID</td>
   <td>订单号</td>
   <td>购买人</td>
   <td>订单金额</td>
   <td>实付金额</td>
   <td>商品名称</td>
   <td>支付方式</td>
   <td>支付时间</td>
   <td>操作</td>
 </tr>
<tbody id="content">
 @foreach($res as $key=>$val)

 <tr>
   <td><?php echo $val->order_id?></td>
   <td><?php echo $val->order_number?></td>
   <td><?php echo $val->buyer_name?></td>
   <td><?php echo $val->order_amount?></td>
   <td><?php echo $val->pay_amount?></td>
   <td><?php echo $val->pay_name?></td>
   <td><?php echo $val->pay_change?></td>
   <td><?php echo $val->pay_time?></td>
   <td><form action="trade_status" method="post">{{ csrf_field() }}<input type="hidden" value="<?php echo $val->order_number?>" name="id"> <button type="submit" class="btn btn-info" style="float:left;">订单状态详情</button></form><form action="trade_user" method="post">{{ csrf_field() }}<input type="hidden" value="<?php echo $val->order_number?>" name="id"> <button type="submit" class="btn btn-danger">订单用户详情</button></form></td>
 </tr>

 @endforeach
</tbody>
</table>

</div>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
$(document).on("click","#search",function(){
 var name = $("#name").val();
 $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
 $.ajax({
   type:"post",
   url:"search_order_number",
   data:{name:name},
   // dataType:"json",
   success:function(msg){
      // msg = JSON.parse(msg);
      // console.log(msg.order_id);
   if(msg==1){
      alert('无搜索结果,请重新输入');
   }
   else{
      $("#content").empty();
      var str = '';
      $.each(msg,function(k,v){
         console.log(v.order_id);
         str = '<tr><td>'+v.order_id+'</td><td>'+v.order_number+'</td><td>'+v.buyer_name+'</td><td>'+v.trade_status+'</td><td>'+v.pay_status+'</td><td>'+v.order_amount+'</td><td>'+v.pay_amount+'</td><td>'+v.pay_name+'</td><td>'+v.pay_time+'</td><td>'+v.pay_change+'</td><td><a href="trade_status?id='+v.order_number+'">订单状态详情</a></td></tr>';
      })
      $("#content").html(str);
   }
   }
 })
})
</script>
@include('order_info.footer')