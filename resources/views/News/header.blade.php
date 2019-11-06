<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="../../xgreen/css/style.css" />
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="../../xgreen/js/jquery.js"></script>
<script src="../../xgreen/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
  var t=null;
   t=setTimeout(time,1000);   //设置定时器，一秒刷新一次
   function time(){
       clearTimeout(t);  //清楚定时器
       dt=new Date();
       var y=dt.getYear()+1900;
       var m=dt.getMonth()+1;
       var d=dt.getDate();
       var weekday=["星期日","星期一","星期二","星期三","星期四","星期五","星期六"];
       var day=dt.getDay();
       var h=dt.getHours();
       var min=dt.getMinutes();
       var s=dt.getSeconds();
       if(h<10){
           h="0"+h;
       }
       if(min<10){
           min="0"+min;
       }
       if(s<10){
           s="0"+s;
       }
       document.getElementById("timeShow").innerHTML= y + "年" + m + "月" + d + "日" + weekday[day] + "" + h + ":" + min + ":" + s + "";
       t = setTimeout(time, 1000);
   }
</script>
<script>
	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
</head>
<body>
<!--header-->
<header>
 <h1><img src="../../xgreen/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
 <li ><div id="timeShow"></div></li>
  <li><a href="#" class="admin_icon"><?php echo $name; ?></a></li>
  <li><a href="user" class="quit_icon">安全退出</a></li>
 </ul>
</header>

<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="index.php">首页</a></h2>
 <ul>
  <li>
   <dl>
   <?php foreach ($array_1 as $key => $v): ?>
     <dt><?php echo $v['name']; ?></dt>
     <?php foreach ($array_2 as $key => $vv): ?>

      <?php if ($vv['pid']==$v['id']): ?>
        <dd><a href=<?php echo $vv['route']; ?>><?php echo $vv['name']; ?></a></dd>
      <?php endif ?>
         
     <?php endforeach ?>
   <?php endforeach ?>
    

   </dl>
  </li>
 </ul>
</aside>

<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
     <!--开始：以下内容则可删除，仅为素材引用参考-->
     <!--点击加载-->
     <script>
     $(document).ready(function(){
		$("#loading").click(function(){
			$(".loading_area").fadeIn();
             $(".loading_area").fadeOut(1500);
			});
		 });
     </script>
     <section class="loading_area">
      <div class="loading_cont">
       <div class="loading_icon"><i></i><i></i><i></i><i></i><i></i></div>
       <div class="loading_txt"><mark>数据正在加载，请稍后！</mark></div>
      </div>
     </section>
     <!--结束加载-->
     <!--弹出框效果-->
     <script>
     $(document).ready(function(){
		 //弹出文本性提示框
		 $("#showPopTxt").click(function(){
			 $(".pop_bg").fadeIn();
			 });
		 //弹出：确认按钮
		 $(".trueBtn").click(function(){
			 alert("你点击了确认！");//测试
			 $(".pop_bg").fadeOut();
			 });
		 //弹出：取消或关闭按钮
		 $(".falseBtn").click(function(){
			 alert("你点击了取消/关闭！");//测试
			 $(".pop_bg").fadeOut();
			 });
		 });
     </script>
     <section class="pop_bg">
      <div class="pop_cont">
       <!--title-->
       <h3>弹出提示标题</h3>
       <!--content-->
       <div class="pop_cont_input">
        <ul>
         <li>
          <span>标题</span>
          <input type="text" placeholder="定义提示语..." class="textbox"/>
         </li>
         <li>
          <span class="ttl">城市</span>
          <select class="select">
           <option>选择省份</option>
          </select>
          <select class="select">
           <option>选择城市</option>
          </select>
          <select class="select">
           <option>选择区/县</option>
          </select>
         </li>
         <li>
          <span class="ttl">地址</span>
          <input type="text" placeholder="定义提示语..." class="textbox"/>
         </li>
         <li>
          <span class="ttl">地址</span>
          <textarea class="textarea" style="height:50px;width:80%;"></textarea>
         </li>
        </ul>
       </div>
       <!--以pop_cont_text分界-->
       <div class="pop_cont_text">
        这里是文字性提示信息！
       </div>
       <!--bottom:operate->button-->
       <div class="btm_btn">
        <input type="button" value="确认" class="input_btn trueBtn"/>
        <input type="button" value="关闭" class="input_btn falseBtn"/>
       </div>
      </div>
     </section>