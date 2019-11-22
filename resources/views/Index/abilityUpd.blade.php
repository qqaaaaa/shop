@include('News.header')
<center>
     <div class="container" style="width:600px;">
    <h2>属性值修改</h2>

      <div class="form-group" style="margin-top:50px;">
        <label for="text" style="float:left;">属性值:</label>
        <input type="text" class="form-control" id="ability" value="<?php echo $arr['ability'];?>" placeholder="输入分类排序"><span id="in2"></span>
      </div>
      <input type="hidden" id="id" value="<?php echo $id?>">
      <div style="margin-top:100px;">
        <button type="button" id="upd" class="btn btn-primary" style="background-color:#06c1ae;border-color:#06c1ae">修改</button>
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
  	var ability = $('#ability').val()
    var id = $('#id').val()
  	// alert(cldeny)
  	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  	$.ajax({
          url: "abilityUpdok",
          type: "post",
          data: {
            ability:ability,
            id:id,
          },
          dataType: "json",
          success: function(e){
            // console.log(e)
            if(e.status==1){
              alert(e.msg)
              location.href='property';
            }
          }
        })
  })
</script>
@include('News.footer')
