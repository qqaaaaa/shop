@include('order_info.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--  <div class="col-lg-6" style="margin-top:20px;float:right;">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for..." id="name">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="search">search</button>
      </span>
    </div>
  </div> -->

<a href="index"><button type="button" class="btn btn-info"><<返回</button></a>
<div style="margin-top:70px">

<table class="table table-bordered">
 <tr>
   <td>ID</td>
   <td>订单号</td>
   <td>收货人</td>
   <td>订单状态</td>
   <td>支付状态</td>
   <td>当前位置</td>
   <td>收货地址</td>
   <td>收货人联系方式</td>
   <td>发货时间</td>
   <td>预计抵达时间</td>
   <td>操作</td>
 </tr>
<tbody id="content">
 @foreach($res as $key=>$val)

 <tr>
   <td><?php echo $val->order_id?></td>
   <td ><?php echo $val->order_number?></td>

   <td id="<?php echo $val->order_number?>"><span id="name"><?php echo $val->consignee_name?></span><input type="email" class="form-control" id="nameinput" style="display:none"></td>

   <td id="<?php echo $val->order_number?>"><span id="trade_status"><?php if($val->trade_status == 1){echo "已收货";}if($val->trade_status == 0){echo "配送中";}if($val->trade_status == 2){echo "未出货";}if($val->trade_status == 3){echo "已送达";}if($val->trade_status == 4){echo "其他";}?></span>
    <select class="form-control" id="trade_status_input" style="display:none">
  <option value="1">已出货</option>
  <option value="2">未出货</option>
  <option value="0">配送中</option>
  <option value="3">已送达</option>
  <option value="4">其他</option>
</select></td> 
<td><?php if($val->pay_status == 1){echo "未付款";}if($val->pay_status == 2){echo "已付款";}if($val->pay_status == 3){echo "货到未付款";}if($val->pay_status == 4){echo "货到以付款";}?></td>
   <td id="<?php echo $val->order_number?>"><span id="address"><?php echo $val->consignee_address?></span><input type="email" class="form-control" id="addressinput" style="display:none"></td>

   <td><?php echo $val->user_address?></td>
   <td><?php echo $val->consignee_phone?></td>
   <td><?php echo $val->delivery_time?></td>
   <td><?php echo $val->best_time?></td>
   <td><a href="updateselect">查看修改记录</a></td>
 </tr>

 @endforeach
</tbody>
</table>

</div>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
// $(document).on("click","#search",function(){
//  var name = $("#name").val();
//  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
//  $.ajax({
//    type:"post",
//    url:"search_order_number",
//    data:{name:name},
//    // dataType:"json",
//    success:function(msg){
//       // msg = JSON.parse(msg);
//       // console.log(msg.order_id);
//    if(msg==1){
//       alert('无搜索结果,请重新输入');
//    }
//    else{
//       $("#content").empty();
//       var str = '';
//       $.each(msg,function(k,v){
//          console.log(v.order_id);
//          str = '<tr><td>'+v.order_id+'</td><td>'+v.order_number+'</td><td>'+v.buyer_name+'</td><td>'+v.trade_status+'</td><td>'+v.pay_status+'</td><td>'+v.order_amount+'</td><td>'+v.pay_amount+'</td><td>'+v.pay_name+'</td><td>'+v.pay_time+'</td><td><a href="trade_status?id='+v.order_number+'">订单状态详情</a></td></tr>';
//       })
//       $("#content").html(str);
//    }
//    }
//  })
// })
$(document).on("click","#trade_status",function(){
 document.getElementById('trade_status').innerHTML="";
 document.getElementById('trade_status_input').style.display='block';

})
$(document).on("blur","#trade_status_input",function(){
   var trade_status = $("#trade_status_input").val();
   var info_id = $(this).parent().attr('id');
   
   $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
   $.ajax({
    type:"post",
    url:"trade_status_input",
    data:{trade_status:trade_status,info_id:info_id},
    success:function(msg){
      if(msg == 1){
        if(trade_status == 1){var trade = "已收货";}if(trade_status == 0){var trade = "配送中";}if(trade_status == 2){var trade = "未出货";}if(trade_status == 3){var trade = "已送达";}if(trade_status == 4){var trade = "其他";}
         document.getElementById('trade_status').innerHTML=trade;
          document.getElementById('trade_status_input').style.display='none';
      }
    }
   })
   })
$(document).on("click","#address",function(){
 document.getElementById('address').innerHTML="";
 document.getElementById('addressinput').style.display='block';

})


$(document).on("blur","#addressinput",function(){
   var addressinput = $("#addressinput").val();
   var info_id = $(this).parent().attr('id');
   //alert(info_id);
   $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
   $.ajax({
    type:"post",
    url:"addressUpdate",
    data:{addressinput:addressinput,info_id:info_id},
    success:function(msg){
      
       
         document.getElementById('address').innerHTML=addressinput;
          document.getElementById('addressinput').style.display='none';
    
    }
   })
   })

$(document).on("click","#name",function(){
 document.getElementById('name').innerHTML="";
 document.getElementById('nameinput').style.display='block';

})


$(document).on("blur","#nameinput",function(){
   var nameinput = $("#nameinput").val();
   var info_id = $(this).parent().attr('id');

  //alert(nameinput);
   $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
   $.ajax({
    type:"post",
    url:"nameUpdate",
    data:{nameinput:nameinput,info_id:info_id},
    success:function(msg){
      
       
         document.getElementById('name').innerHTML=nameinput;
          document.getElementById('nameinput').style.display='none';
    
    }
   })
   })
</script>
@include('order_info.footer')