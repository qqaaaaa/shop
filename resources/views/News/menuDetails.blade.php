@include('News.header')
<!-- <div style="width:200px;"> -->
<table class="table table-condensed">
<div>
  <center><h1>菜单列表</h1></center>	
  </div>
  <a href="subMenuAdd?id=<?php echo $id; ?>" class="btn btn-primary btn-lg" style="height:40px; width:100px; float: right;"><span style="font-size:15px;">添加子菜单</span></a>
   <thead>
      <tr>
         <th>ID</th>
         <th>菜单名称</th>
         <th>菜单是否展示</th>
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
   <?php foreach ($menu as $key => $v): ?>
   	<tr>
         <td><?php echo $v['id']; ?></td>
         <td><?php echo $v['name']; ?></td>
         <?php if ($v['show']==1): ?>
         	<td>是</td>
         <?php endif ?>
         <?php if ($v['show']==0): ?>
         	<td>否</td>
         <?php endif ?>
         <td> <a href="subMenuCompile?id=<?php echo$v['id']; ?>">编辑</a>  <a href="subMenuDel?id=<?php echo $v['id']; ?>">删除</a></td>
      </tr>
   <?php endforeach ?>
   
   </tbody>

</table>
 <center> {{$menu->links()}}</center>
<!-- </div> -->
@include('News.footer')