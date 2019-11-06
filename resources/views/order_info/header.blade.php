<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta name="_token" content="{{ csrf_token() }}"/>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="js/jquery.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
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
 <h1><img src="images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="http://www.baidu.com" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="#" class="admin_icon">DeathGhost</a></li>
  <li><a href="#" class="set_icon">账号设置</a></li>
  <li><a href="login.php" class="quit_icon">安全退出</a></li>
 </ul>
</header>

<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="index.php">首页</a></h2>
 <ul>
  <li>
   <dl>
    <dt>商品信息</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="#" class="active">商品列表</a></dd>
    <dd><a href="#">商品分类</a></dd>
    <dd><a href="#">商品属性</a></dd>
    <dd><a href="#">品牌管理</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="#">订单列表</a></dd>
    <dd><a href="#">添加订单</a></dd>
    <dd><a href="#">缺货登记</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="#">会员列表</a></dd>
    <dd><a href="#">添加会员</a></dd>
    <dd><a href="#">会员等级</a></dd>
    <dd><a href="#">资金管理</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>基础设置</dt>
    <dd><a href="#">站点基础设置</a></dd>
    <dd><a href="#">SEO设置</a></dd>
    <dd><a href="#">SQL语句查询</a></dd>
    <dd><a href="#">模板管理</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>营销管理</dt>
    <dd><a href="#">订阅列表</a></dd>
    <dd><a href="#">邮件群发</a></dd>
    <dd><a href="#">优惠打折</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>配送与支付设置</dt>
    <dd><a href="#">配送方式</a></dd>
    <dd><a href="#">支付方式</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>在线统计</dt>
    <dd><a href="#">流量统计</a></dd>
    <dd><a href="#">销售额统计</a></dd>
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