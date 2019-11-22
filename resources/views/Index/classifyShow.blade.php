@include('News.header')
<center>
  <div class="container" style="width:800px;">
  <h2>分类列表</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>分类名称</th>
        <th>分类排序</th>
        <th>是否展示</th>
        <th>父级id</th>
        <th>操作</th>
      </tr>
    </thead>
    <?php foreach ($res as $key => $v): ?>
      <tr>
        <td><?php echo $v['clname']; ?></td>
        <td><?php echo $v['clorder']; ?></td>
        @if($v['cldeny'] == 1)
        <td>是</td>
        @else
        <td>否</td>
        @endif
        <td><?php echo $v['pid']; ?></td>
        <td><a href="classifyUpd?id=<?php echo $v['id']?>">编辑</a>||<a href="classifyDel?id=<?php echo $v['id']?>">删除</a></td>
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
