<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" type="text/css" href="http://www.shop.com/Green/css/style.css" />
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<script src="http://www.shop.com/Green/js/jquery.js"></script>
<script src="http://www.shop.com/Green/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
<header style="height:70px;" >
 <h1><img src="http://www.shop.com/Green/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="http://www.baidu.com" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="#" class="admin_icon">DeathGhost</a></li>
  <li><a href="#" class="set_icon">账号设置</a></li>
  <li><a href="login.php" class="quit_icon">安全退出</a></li>
 </ul>
</header>

<!--aside nav-->
<div style="width:215px;">
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="#" >首页</a></h2>
 <ul>
  <li>
   <dl>
    <dt>商品管理</dt>
    <dl>
       <dd><a href="http://www.shop.com/property">属性列表</a></dd>
       <dd><a href="http://www.shop.com/propertyAdd" >属性添加</a></dd>
       <dd><a href="http://www.shop.com/classifyAdd">分类添加</a></dd>
       <dd><a href="http://www.shop.com/classifyShow">分类列表</a></dd>
       <dd><a href="http://www.shop.com/productAdd" class="active">商品添加</a></dd>
       <dd><a href="http://www.shop.com/productShow">商品列表</a></dd>
    </dl>
   </dl>
  </li>
 </ul>
</aside>
</div>
<center>
     <div class="container" style="width:600px;">
	  <h2>分类添加</h2>
	  <form action="productUpdok" method="post" enctype="multipart/form-data">
      <div style="margin-top:20px;">
        <label for="text" style="float:left;">所属分类:</label><br>
        <select name="c_id" id="c_id" style="float:left;" class="form-control">
          <option value="">请选择...</option>
          <?php foreach ($data as $key => $value): ?>
            <option value="<?php echo $value['id'];?>"><?php echo str_repeat("-&nbsp;",$value['level']) ?><?php echo $value['clname'];?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div style="margin-top:50px;">
        <label for="text" style="float:left;">所属品牌:</label><br>
        <select name="p_id" id="p_id" style="float:left;" class="form-control">
          <option value="">请选择...</option>
          <?php foreach ($arr as $key => $value): ?>
            <option value="<?php echo $value['brand_id'];?>"><?php echo $value['brand_name'];?></option>
          <?php endforeach ?>
        </select>
      </div>
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <div class="form-group" style="margin-top:50px;">
        <label for="text" style="float:left;">商品名称:</label>
        <input type="text" class="form-control" value="<?php echo $arr['pstore'];?>" name="pstore" id="pstore"  placeholder="输入商品名称">
      </div>
      <div class="form-group" style="margin-top:10px;">
        <label for="text" style="float:left;">商品描述:</label>
        <input type="text" class="form-control" value="<?php echo $arr['intro'];?>" name="intro" id="intro"  placeholder="输入商品描述">
      </div>
      <div class="form-group" style="margin-top:10px;">
        <label for="text" style="float:left;">商品售价:</label>
        <input type="text" class="form-control" value="<?php echo $arr['monry'];?>"  name="monry" id="monry"  placeholder="输入商品售价">
      </div>
       <div style="margin-top:10px;" >
        <label for="text" style="float:left;">上下架状态:</label><br>
        <select name="status" id="status" style="float:left;" class="form-control">
          <option value="1">上架</option>
          <option value="0">下架</option>
        </select>
      </div>
      <div class="form-group" style="margin-top:10px;">
        <label for="text" style="float:left;">商品库存:</label>
        <input type="text" class="form-control" value="<?php echo $arr['num'];?>" name="num" id="num"  placeholder="输入商品库存">
      </div>
       <div style="margin-top:10px;" >
        <label for="text" style="float:left;">是否是礼物:</label><br>
        <select name="gift" id="gift" style="float:left;" class="form-control">
          <option value="1">是</option>
          <option value="0">否</option>
        </select>
      </div>
      <div class="form-group" style="margin-top:60px;">
        <label for="text" style="float:left;">商品图片:</label>
        <input type="file" id="image" name="image" >
      </div>
	    <div style="margin-top:40px;">
	    	<button type="submit" id="add" class="btn btn-primary" style="background-color:#06c1ae;border-color:#06c1ae">分类添加</button>
	    </div>
	  </form>
	</div>
</center>
</section>
</body>
</html>
<script>

  $('dt').click(function(){
    $(this).next().toggle('dl')
  })
</script>
