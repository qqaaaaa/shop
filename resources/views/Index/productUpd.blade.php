@include('News.header')
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
@include('News.footer')
