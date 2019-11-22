@include('News.header')
<center>
     <div class="container" style="width:600px;">
     <div style="margin-top:20px;">
       <a href="propertyAdd">属性添加</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="">属性值添加</a>
     </div>
	  <form>
	    <div class="form-group" style="margin-top:50px;">
	      <label for="text" style="float:left;">属性展示名称:</label>
	      <input type="text" class="form-control" id="proname"  placeholder="输入属性展示名称"><span id="in1"></span>
	    </div>
      <div style="margin-top:50px;" >
      <label for="text" style="float:left;">属性所属分类:</label><br>
	    <select name="c_id" id="c_id" style="float:left;" class="form-control">
          <option value="">请选择...</option>
          <?php foreach ($data as $key => $value): ?>
            <option value="<?php echo $value['id'];?>"><?php echo str_repeat("-&nbsp;",$value['level']) ?><?php echo $value['clname'];?></option>
          <?php endforeach ?>
        </select>
        </div>
	    <div style="margin-top:90px;" >
	    	<label for="text" style="float:left;">前台是否显示该属性:</label><br>
	    	<select name="deny" id="deny" style="float:left;" class="form-control">
	    		<option value="1">是</option>
	    		<option value="0">否</option>
	    	</select>
	    </div>
	    <div style="margin-top:100px;">
	    	<button type="button" id="add" class="btn btn-primary" style="background-color:#06c1ae;border-color:#06c1ae">添加属性</button>
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
  $('#add').click(function(){
  	var proname = $('#proname').val()
  	var c_id = $('#c_id').val()
  	var deny = $('#deny').val()
  	// alert(deny)
  	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  	$.ajax({
  				url: "propertyAddok",
  				type: "post",
  				data: {
  					proname:proname,
  					c_id:c_id,
  					deny:deny,
  				},
  				dataType: "json",
  				success: function(e){
  					if(e.status==1){
  						alert(e.msg)
  						location.href='property';
  					}
  				}
  			})
  	if(proname != ""){
  		if(c_id != ""){

  		}else{
  			$('#in2').html('不能为空')
  		}
  	}else{
  		$('#in1').html('不能为空')
  	}
  })
</script>
@include('News.footer')
