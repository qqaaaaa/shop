@include('News.header')
<center>
  <div class="container" style="width:500px;">
  <h2>属性值列表</h2>
  <table class="table table-bordered" style="margin-top:20px;">
    <thead>
      <tr>
        <th>属性值名称</th>
        <th>操作</th>
      </tr>
    </thead>
    <?php foreach ($res as $key => $v): ?>
      <tr>
        <td><?php echo $v['ability']; ?></td>
        <td><a href="abilityUpd?id=<?php echo $v['id']?>">修改</a><a href="?id=<?php echo $v['id']?>">删除</a></td>
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
