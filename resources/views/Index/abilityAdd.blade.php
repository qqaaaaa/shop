@include('News.header')
<center>
     <div class="container" style="width:600px;">
    <h2>属性值添加</h2>
    <form>
      <div class="form-group" style="margin-top:50px;">
        <label for="text" style="float:left;">属性值名称:</label>
        <input type="text" class="form-control" id="ability"  placeholder="输入属性值名称"><span id="in1"></span>
      </div>
      <input type="hidden" id="c_id" value="<?php echo $id?>">
      <div style="margin-top:100px;">
        <button type="button" id="add" class="btn btn-primary" style="background-color:#06c1ae;border-color:#06c1ae">添加</button>
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
    var ability = $('#ability').val()
    var c_id = $('#c_id').val()
    // alert(deny)
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
          url: "abilityAddok",
          type: "post",
          data: {
            ability:ability,
            c_id:c_id,
          },
          dataType: "json",
          success: function(e){
            if(e.status==1){
              alert(e.msg)
              location.href='property';
            }
          }
        })

  })
</script>
@include('News.footer')
