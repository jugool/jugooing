<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<!--<link rel="stylesheet" href="--><?php //echo base_url(); ?><!--public/vendor/bootstrap/css/bootstrap.css"/>-->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrapValidator.js"></script>
<ol class="breadcrumb">
<li><a href="#">统计管理</a></li>
<li class="active">资费统计</li>
<h4>
订单时间:<?php echo $t;?>
</h4>
</ol>
<div class="progress"  style="width:60%;margin:auto;background:red;">
<div class="progress-bar" role="progressbar" aria-valuenow="100%" aria-valuemin="0" aria-valuemax="100" style="width:100%">
100%
</div>
</div>
<div>
<div style="width:60%;margin:auto;margin-top:20px;">
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;总订单：<?php echo $total;?>个<br/><br/>
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;总价格：<?php echo $prices;?>元<br/><br/>
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;平均价：<?php echo $price;?>元<br/><br/>
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;最高价：<?php echo $hprice;?>元 <br/><br/>
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;最低价：<?php echo $lprice;?>元<br/><br/>
</div>
</div>
<table class="table table-striped table-bordered table-hover table-condensed" style="font-size:12px;margin-top:40px;">
     <tr>
        <th>ID</th>
        <th>菜品</th>
        <th>用户</th>
        <th>菜品时间</th>
        <th>菜品时段</th>
        <th>订单时间</th>
    </tr>
<?php  foreach ($order as $k => $val){ ?>
    <tr>
        <td><?php echo $val->id; ?></td>
        <td><?php echo $val->l_id; ?></td>
        <td><?php echo $val->u_id; ?></td>
        <td><?php echo $val->dish_day; ?></td>
        <td><?php echo $val->dish_time; ?></td>
        <td><?php echo $val->order_time; ?></td>
    </tr>
<?php }?>
</table>
<div class="table_lis top" style="margin-top:40px;">
	<form class="navbar-form navbar-left">
        <a href="../b_stat/ostat?export=1" type="button" class="btn btn-info btn_add" style='margin-left:15px;'>导出订单</a>
    </form>
</div>
<br/><br/><br/><br/>