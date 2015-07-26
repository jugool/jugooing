<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<ol class="breadcrumb">
    <li><a href="#">菜品管理</a></li>
    <li class="active">菜品库</li>
</ol>

<div class="table_list">
    <form class="navbar-form navbar-left" role="add">
        <a href="../b_library/ladd" type="button" class="btn btn-info btn_add">添加菜品</a>
    </form>
    <form class="navbar-form navbar-right" role="search" action="llist" method="post">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="输入菜名查找" name="like">
        </div>
        <button type="submit" class="btn btn-default">查询</button>
    </form>
</div>

<table class="table table-striped table-bordered table-hover table-condensed" style="font-size:12px;">
    <tr>
        <th>ID</th>
        <th>菜名</th>
        <th>描述</th>
        <th>价格(元)</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    <?php  foreach ($library_list as $k => $val){ ?>
    <tr>
        <td><?php echo $val->id; ?></td>
        <td><?php echo $val->name; ?></td>
        <td><?php echo $val->descript; ?></td>
        <td><?php echo $val->price; ?></td>
        <td><?php echo $val->create_time; ?></td>
        <td>
            <a href="lupdate?id=<?php echo $val->id;?>">修改</a> |
            <a href="ldelete?id=<?php echo $val->id;?>" onclick= "if(confirm( '确定删除？ ')==false)return   false; ">删除</a> |
        	<a href="ldetail?id=<?php echo $val->id;?>">详情</a>
        </td>
    </tr>
<?php }?>
</table>
<nav>
    <ul class="pagination">
        <li><a>页数：<?php echo $page;?>/<?php echo $total_page;?></a></li>
        <li><a aria-label="Next" href="llist?page=<?php echo --$page;?>"><span aria-hidden="true">«</span></a></li>
        <?php 
        	++$page;
        	$page1 = $page;
        	if ($total_page >= 5)
        	{
        		$j = 5;
        	}
        	else 
        	{
        		$j = $total_page;
        	}
        	for ($i = 1; $i<=$j; $i++)
        	{
        		if ($page1 <= $total_page){
        		if ($page1 == $page)
        		{
        ?>
        	<li class="active"><a href="llist?page=<?php echo $page1;?>"><?php echo $page1; ?><span class="sr-only">(current)</span></a></li>
        <?php }else{ ?>
        	<li><a href="llist?page=<?php echo $page1?>"><?php echo $page1;?></a></li>
        <?php }?>
        <?php 
        	++$page1;
        	}}
        ?>
        <li><a aria-label="Next" href="llist?page=<?php echo (++$page);?>"><span aria-hidden="true">»</span></a></li>
    </ul>
</nav>
