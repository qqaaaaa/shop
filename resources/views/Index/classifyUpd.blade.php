@include('News.header')
<center>
     <div class="container" style="width:600px;">
    <h2>分类修改</h2>
    <form>
      <div class="form-group" style="margin-top:50px;">
        <label for="text" style="float:left;">分类名称:</label>
        <input type="text" class="form-control" id="clname" value="<?php echo $arr['clname'];?>"  placeholder="输入分类名称"><span id="in1"></span>
      </div>
      <div class="form-group" style="margin-top:50px;">
        <label for="text" style="float:left;">分类排序:</label>
        <input type="text" class="form-control" id="clorder" value="<?php echo $arr['clorder'];?>" placeholder="输入分类排序"><span id="in2"></span>
      </div>
      <div style="margin-top:50px;" >
        <label for="text" style="float:left;">前台是否显示该分类:</label><br>
        <select name="cldeny" id="cldeny" style="float:left;" class="form-control">
          <option value="1">是</option>
          <option value="0">否</option>
        </select>
      </div>
      <input type="hidden" id="id" value="<?php echo $arr['id']?>">
      <div style="margin-top:90px;">
        <label for="text" style="float:left;">父类:</label><br>
        <select name="pid" id="pid" style="float:left;" class="form-control">
          <option value="0">一级分类</option>
          <?php foreach ($data as $key => $value): ?>
            <option value="<?php echo $value['id'];?>"><?php echo str_repeat("-&nbsp;",$value['level']) ?><?php echo $value['clname'];?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div style="margin-top:100px;">
        <button type="button" id="upd" class="btn btn-primary" style="background-color:#06c1ae;border-color:#06c1ae">分类修改</button>
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
  	var clname = $('#clname').val()
  	var clorder = $('#clorder').val()
  	var cldeny = $('#cldeny').val()
    var pid = $('#pid').val()
    var id = $('#id').val()
  	// alert(cldeny)
  	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  	$.ajax({
  				url: "classifyUpdok",
  				type: "post",
  				data: {
  					clname:clname,
  					clorder:clorder,
  					cldeny:cldeny,
            pid:pid,
            id:id,
  				},
  				dataType: "json",
  				success: function(e){
            console.log(e);
  					if(e.status==1){
  						alert(e.msg)
  						location.href='classifyShow';
  					}
  				}
  			})
  	if(clname != ""){
  		if(clorder != ""){

  		}else{
  			$('#in2').html('不能为空')
  		}
  	}else{
  		$('#in1').html('不能为空')
  	}
  })
</script>
@include('News.footer')
