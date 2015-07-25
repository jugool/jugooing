<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<ol class="breadcrumb">
    <li><a>用户管理</a></li>
    <li class="active">用户列表</li>
</ol>
<div class="table_lis top">
	<form class="navbar-form navbar-left">
        <a href="../b_user/uadd" type="button" class="btn btn-info btn_add" style='margin-left:15px;'>添加用户</a>
    </form>
    <form class="navbar-form navbar-right" role="search" action="ulist" method="post">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="请输入名称查找" name="like">
        </div>
        <button type="submit" class="btn btn-default">查询</button>
    </form>
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>工号</th>
        <th>手机</th>
        <th>QQ</th>
        <th>用户类型</th>
        <th>操作</th>
    </tr>
<?php  foreach ($user_list as $k => $val){ ?>
    <tr>
        <td><?php echo $val->id; ?></td>
        <td><?php echo $val->name; ?></td>
        <td><?php echo $val->job_number; ?></td>
        <td><?php echo $val->telephone; ?></td>
        <td><?php echo $val->qq; ?></td>
        <td><?php echo $val->type; ?></td>
        <td>
            <a href="uupdate?id=<?php echo $val->id;?>">修改</a> |
            <a href="udelete?id=<?php echo $val->id;?>" onclick= "if(confirm( '确定删除？ ')==false)return   false; ">删除</a>
        </td>
    </tr>
<?php }?>
</table>
<nav>
    <ul class="pagination">
        <li><a>页数：<?php echo $page;?>/<?php echo $total_page;?></a></li>
        <li><a aria-label="Next" href="ulist?page=<?php echo --$page;?>"><span aria-hidden="true">«</span></a></li>
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
        	<li class="active"><a href="ulist?page=<?php echo $page1;?>"><?php echo $page1; ?><span class="sr-only">(current)</span></a></li>
        <?php }else{ ?>
        	<li><a href="ulist?page=<?php echo $page1?>"><?php echo $page1;?></a></li>
        <?php }?>
        <?php 
        	++$page1;
        	}}
        ?>
        <li><a aria-label="Next" href="ulist?page=<?php echo (++$page);?>"><span aria-hidden="true">»</span></a></li>
    </ul>
</nav>
