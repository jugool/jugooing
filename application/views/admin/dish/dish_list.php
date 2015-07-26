<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<ol class="breadcrumb">
    <li><a href="#">菜品管理</a></li>
    <li class="active">菜品列表</li>
</ol>

<div class="table_list">
    <form class="navbar-form navbar-left" role="add">
        <a href="dadd" type="button" class="btn btn-info btn_add">菜单添加</a>
    </form>
    <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">查询</button>
    </form>
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th>ID</th>
        <th>菜名</th>
        <th>数量</th>
        <th>订餐时间段</th>
        <th>上架时间</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    <?php foreach($list as $item){ ?>
    <tr>
        <td><?php echo $item['id'];?></td>
        <td><?php echo $item['name'];?></td>
        <td><?php echo $item['dish_num'];?></td>
        <td><?php
            if($item['dish_time'] === 'am'){
                echo "中午";
            }else{
                echo "晚上";
            }
            ?>
        </td>
        <td><?php echo $item['dish_day'];?></td>
        <td><?php echo date('Y-m-d',$item['create_time']);?></td>
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
