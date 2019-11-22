@include('News.header')
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
            console.log(e);
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
@include('News.footer')
