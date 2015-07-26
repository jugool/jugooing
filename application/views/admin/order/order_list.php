<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<ol class="breadcrumb">
    <li><a>订购管理</a></li>
    <li class="active">订单列表</li>
</ol>
<div class="table_lis top">
    <form class="navbar-form navbar-right" role="search" action="oolist" method="post">
        <div class="form-group">
             <select class="form-control" name="stype">
             	<option value="u">员工工号</option>
                <option value="l">菜品ID</option>
                <option value="t">时间查找</option>
             </select>
             <input type="text" class="form-control" placeholder="请输入内容查找" name="like">
        </div>
        <button type="submit" class="btn btn-default">查询</button>
    </form>
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th>ID</th>
        <th>菜品</th>
        <th>用户</th>
        <th>菜品时间</th>
        <th>菜品时段</th>
        <th>订单时间</th>
        <th>操作 </th>
    </tr>
<?php  foreach ($order_list as $k => $val){ ?>
    <tr>
        <td><?php echo $val->id; ?></td>
        <td><?php echo $val->l_id; ?></td>
        <td><?php echo $val->u_id; ?></td>
        <td><?php echo $val->dish_day; ?></td>
        <td><?php echo $val->dish_time; ?></td>
        <td><?php echo $val->order_time; ?></td>
        <td>
            <a href="odelete?id=<?php echo $val->id;?>" onclick= "if(confirm( '确定删除？ ')==false)return   false; ">删除</a>
        </td>
    </tr>
<?php }?>
</table>
<nav>
    <ul class="pagination">
        <li><a>页数：<?php echo $page;?>/<?php echo $total_page;?></a></li>
        <li><a aria-label="Next" href="olist?page=<?php echo --$page;?>"><span aria-hidden="true">«</span></a></li>
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
        	<li class="active"><a href="olist?page=<?php echo $page1;?>"><?php echo $page1; ?><span class="sr-only">(current)</span></a></li>
        <?php }else{ ?>
        	<li><a href="olist?page=<?php echo $page1?>"><?php echo $page1;?></a></li>
        <?php }?>
        <?php 
        	++$page1;
        	}}
        ?>
        <li><a aria-label="Next" href="olist?page=<?php echo (++$page);?>"><span aria-hidden="true">»</span></a></li>
    </ul>
</nav>
