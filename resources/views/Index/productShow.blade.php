@include('News.header')
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
        <td><img src="<?php echo $v['image']?>" style="width: 50px;height: 50px" alt=""></td>
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
@include('News.footer')
