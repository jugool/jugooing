<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<!--<link rel="stylesheet" href="--><?php //echo base_url(); ?><!--public/vendor/bootstrap/css/bootstrap.css"/>-->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrapValidator.js"></script>
<ol class="breadcrumb">
<li><a href="#">统计管理</a></li>
<li class="active">用户统计</li>
</ol>
<div class="progress"  style="width:60%;margin:auto;background:red;border:3px solid #000;">
<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $sad_user;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $sad_user;?>%">
<?php echo $sad_user;?>%
</div>
<div style="text-align:center;color:#fff;">
<?php echo $sun_user;?>%
</div>
</div>
<div>
<div style="width:60%;margin:auto;margin-top:20px;">
<button type="button" class="btn btn-danger" style="background:#000;color:#000;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;总人数<?php echo $total;?>人<br/><br/>
<button type="button" class="btn btn-danger" style="background:#428bca;color:#428bca;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;管理员<?php echo $ad_user;?>人<br/><br/>
<button type="button" class="btn btn-danger" style="background:red;color:#f00;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;有效用户<?php echo $un_user;?>人<br/><br/>
<button type="button" class="btn btn-danger" style="background:yellow;color:yellow;height:20px;font-size:4px;border:0px;">员</button>&nbsp;&nbsp;无效用户<?php echo $or_user;?>人
</div>
</div>
<div style="margin:auto;text-align:center;width:62%;">
<form class="navbar-form navbar-left" role="add" style="margin-top:30px;">
	<a href="../b_user/ulist" type="button" class="btn btn-info btn_add">查看用户</a>
</form>
</div>