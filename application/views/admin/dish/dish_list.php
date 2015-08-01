<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<ol class="breadcrumb">
    <li><a href="#">菜品管理</a></li>
    <li class="active">上架菜品</li>
</ol>

<div class="table_list">
    <form class="navbar-form navbar-left" role="add">
        <a href="dadd" type="button" class="btn btn-info btn_add">菜品添加</a>
    </form>
    <form class="navbar-form navbar-right" role="search" action="dlist" method="post">
        <div class="form-group">
        	<select class="form-control" name="stype">
             	<option value="tod">今日</option>
                <option value="tom">明日</option>
                <option value="all">所有</option>
             </select>
            <input type="text" class="form-control" placeholder="Search" name="like"> 
        </div>
        <button type="submit" class="btn btn-default">查询</button>
    </form>
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th>ID</th>
        <th>菜名</th>
        <th>数量</th>
        <th>订餐时间</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    <?php foreach($list as $item){ ?>
    <tr>
        <td><?php echo $item['id'];?></td>
        <td><?php echo $item['name'];?></td>
        <td><?php echo $item['dish_num'];?></td>
        <td><?php
        	echo $item['dish_day'].'/';
            if($item['dish_time'] === 'am'){
                echo "中午";
            }else{
                echo "晚上";
            }
            ?>
        </td>
        <td><?php echo $item['create_time'];?></td>
        <td>
            <a href="ddelete?id=<?php echo $item['id'];?>" onclick= "if(confirm( '确定删除？ ')==false)return false; ">删除</a>
        </td>
    </tr>
    <?php }?>
</table>
<?php
    $page_index = $this->input->get('page')?$this->input->get('page'):'1';
    if($page_index+1 > $total_page){
        $page_index = $total_page;
    }
?>
<nav>
    <ul class="pagination">
        <li><a>页数：<?php echo $page;?>/<?php echo $total_page;?></a></li>
        <li><a aria-label="Next" href="dlist?page=<?php echo $page_index-1;?>"><span aria-hidden="true">«</span></a></li>
        <?php for($i=1;$i<=$total_page;$i++) { ?>
            <li class="<?php if($page_index == $i)echo 'active';?>"><a href="dlist?page=<?php echo $i?>"><?php echo $i;?></a></li>
        <?php }?>
        <li><a aria-label="Next" href="dlist?page=<?php echo $page_index+1;?>"><span aria-hidden="true">»</span></a></li>
    </ul>
</nav>
