<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
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
<header style="height:70px;">
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
       <dd><a href="http://www.shop.com/propertyAdd">属性添加</a></dd>
       <dd><a href="http://www.shop.com/classifyAdd">分类添加</a></dd>
       <dd><a href="http://www.shop.com/classifyShow">分类列表</a></dd>
       <dd><a href="http://www.shop.com/productAdd">商品添加</a></dd>
       <dd><a href="http://www.shop.com/productShow" class="active">商品列表</a></dd>
    </dl>
   </dl>
  </li>
 </ul>
</aside>
</div>
<center>
  <div class="container" style="width:800px;">
  <h2>商品列表</h2>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>商品名称</th>
        <th>商品简介</th>
        <th>单价</th>
        <th>上下架</th>
        <th>库存</th>
        <th>是否是礼物</th>
        <th>图片</th>
        <th>分类id</th>
        <th>品牌id</th>
        <th>操作</th>
        <th>sku</th>
      </tr>
    </thead>
    <?php foreach ($res as $key => $v): ?>
      <tr>
        <td><?php echo $v['pstore']; ?></td>
        <td><?php echo $v['intro']; ?></td>
        <td><?php echo $v['monry']; ?></td>
        <td><?php echo $v['status']; ?></td>
        <td><?php echo $v['num']; ?></td>
        <td><?php echo $v['gift']; ?></td>
        <td><?php echo $v['image']; ?></td>
        <td><?php echo $v['c_id']; ?></td>
        <td><?php echo $v['p_id']; ?></td>
        <td><a href="productUpd?id=<?php echo $v['id']?>">编辑</a><a href="productDel?id=<?php echo $v['id']?>">删除</a></td>
        <td><a href="proSku?c_id=<?php echo $v['c_id'];?>&id=<?php echo $v['id'];?>">生成sku</a></td>
      </tr>
    <?php endforeach ?>
</table>
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
