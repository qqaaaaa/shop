@include('News.header')
<center>
  <div class="container" style="width:800px;">
  <h2>属性列表</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>属性名称</th>
        <th>属性分类</th>
        <th>是否展示</th>
        <th>操作</th>
        <th>属性值管理</th>
      </tr>
    </thead>
    <?php foreach ($res as $key => $v): ?>
      <tr>
        <td><?php echo $v['proname']; ?></td>
        <td><?php echo $v['c_id']; ?></td>
        @if($v['deny'] == 1)
        <td>是</td>
        @else
        <td>否</td>
        @endif
        <td><a href="propertyUpd?id=<?php echo $v['id']?>">修改</a><a href="propertyDel?id=<?php echo $v['id']?>">删除</a></td>
        <td><a href="abilityShow?id=<?php echo $v['id']?>">列表</a> <a href="abilityAdd?id=<?php echo $v['id']?>">添加</a></td>
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
