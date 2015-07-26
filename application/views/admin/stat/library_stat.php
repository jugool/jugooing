<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<!--<link rel="stylesheet" href="--><?php //echo base_url(); ?><!--public/vendor/bootstrap/css/bootstrap.css"/>-->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrapValidator.js"></script>
<ol class="breadcrumb">
<li><a href="#">统计管理</a></li>
<li class="active">菜品统计</li>
</ol>
<div class="progress"  style="width:60%;margin:auto;background:red;">
<div class="progress-bar" role="progressbar" aria-valuenow="100%" aria-valuemin="0" aria-valuemax="100" style="width:100%">
100%
</div>

</div>
<div>
<div style="width:60%;margin:auto;margin-top:20px;">
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;总数：<?php echo $total;?>个<br/><br/>
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;平均价格：<?php echo $price;?>元<br/><br/>
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;最高价：<?php echo $hprice;?>元 &nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $hname;?>)<br/><br/>
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;最低价：<?php echo $lprice;?>元 &nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $lname;?>)<br/><br/>
</div>
</div>
<div style="margin:auto;text-align:center;width:63%;">
<form class="navbar-form navbar-left" role="add" style="margin-top:30px;">
	<a href="../b_library/llist" type="button" class="btn btn-info btn_add">查看菜品</a>
</form>
</div>