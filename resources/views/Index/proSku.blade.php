@include('News.header')
<center>
     <div class="container" style="width:600px;">
	  <h2>分类添加</h2>
	  <form>
	    <div class="form-group" style="margin-top:50px;">
	      <label for="text" style="float:left;">库存:</label>
	      <input type="text" class="form-control" id="num"  placeholder="输入库存"><span id="in1"></span>
	    </div>
	    <div class="form-group" style="margin-top:50px;">
	      <label for="text" style="float:left;">单价:</label>
	      <input type="text" class="form-control" id="monry" placeholder="输入单价"><span id="in2"></span>
	    </div>
	    <div style="margin-top:100px;">
	    	<button type="button" id="add" class="btn btn-primary" style="background-color:#06c1ae;border-color:#06c1ae">生成sku</button>
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
    var clname = $('#clname').val()
    var clorder = $('#clorder').val()
    var cldeny = $('#cldeny').val()
    var pid = $('#pid').val()
    // alert(deny)
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
          url: "classifyAddok",
          type: "post",
          data: {
            clname:clname,
            clorder:clorder,
            cldeny:cldeny,
            pid:pid,
          },
          dataType: "json",
          success: function(e){
            if(e.status==1){
              alert(e.msg)
              location.href='classifyShow';
            }
          }
        })

  })
</script>
@include('News.footer')
