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
       <dd><a href="http://www.shop.com/propertyAdd">属性添加</a></dd>
       <dd><a href="http://www.shop.com/classifyAdd">分类添加</a></dd>
       <dd><a href="http://www.shop.com/classifyShow">分类列表</a></dd>
       <dd><a href="#">商品添加</a></dd>
       <dd><a href="#">商品列表</a></dd>
    </dl>
   </dl>
  </li>
 </ul>
</aside>
</div>
<center>
     <div class="container" style="width:600px;">
	  <h2>添加属性</h2>
	  <form>
	    <div class="form-group" style="margin-top:50px;">
	      <label for="text" style="float:left;">属性展示名称:</label>
	      <input type="text" class="form-control" id="proname" value="<?php echo $arr['proname']?>"  placeholder="输入属性展示名称"><span id="in1"></span>
	    </div>
      <div style="margin-top:50px;" >
      <label for="text" style="float:left;">属性所属分类:</label><br>
	    <select name="classify" id="classify" style="float:left;" class="form-control">
          <option value="<?php echo $arr['classify']?>"><?php echo $arr['classify']?></option>
          <?php foreach ($data as $key => $value): ?>
            <option value="<?php echo $value['clname'];?>"><?php echo str_repeat("-&nbsp;",$value['level']) ?><?php echo $value['clname'];?></option>
          <?php endforeach ?>
        </select>
        </div>
        <input type="hidden" id="id" value="<?php echo $arr['id']?>">
	    <div style="margin-top:90px;" >
	    	<label for="text" style="float:left;">前台是否显示该属性:</label><br>
	    	<select name="deny" id="deny" style="float:left;" class="form-control">
	    		<option value="1">是</option>
	    		<option value="0">否</option>
	    	</select>
	    </div>
	    <div style="margin-top:100px;">
	    	<button type="button" id="upd" class="btn btn-primary" style="background-color:#06c1ae;border-color:#06c1ae">修改属性</button>
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
  $('#upd').click(function(){
  	var proname = $('#proname').val()
  	var classify = $('#classify').val()
  	var deny = $('#deny').val()
    var id = $('#id').val()
  	// alert(deny)
  	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  	$.ajax({
  				url: "propertyUpdok",
  				type: "post",
  				data: {
  					proname:proname,
  					classify:classify,
  					deny:deny,
            id:id,
  				},
  				dataType: "json",
  				success: function(e){
            // console.log(e);
  					if(e.stauts==1){
  						alert(e.msg)
  						location.href='property';
  					}
  				}
  			})
  	if(proname != ""){
  		if(classify != ""){
  			
  		}else{
  			$('#in2').html('不能为空')
  		}
  	}else{
  		$('#in1').html('不能为空')
  	}
  })
</script>
