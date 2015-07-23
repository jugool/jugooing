<?php
/**
 * Created by PhpStorm.
 * 后台登陆
 * User: steven.lin
 * Date: 2015/7/22
 */
if (! defined('BASEPATH')) {
    exit('Access Denied');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台登陆页</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='<?php echo  base_url();?>public/css/jquery-ui.css'>
    <link rel='stylesheet prefetch' href='<?php echo  base_url();?>public/css/bootstrap.min.css'>
    <link rel="stylesheet" href="<?php echo  base_url();?>public/css/style.css" media="screen" type="text/css"/>
    <script src="<?php echo  base_url();?>public/js/modernizr.js"></script>
</head>
<body>
<body class="login-page">
<div class="login-form">
    <div class="login-content">
        <div class="form-login-error">
            <h3>Invalid login</h3>
            <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
        </div>
        <?php //echo validation_errors();?>
        <?php echo form_open('./admin/do_login');?>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <?php
                echo form_input('user_name', set_value('user_name'), 'id="user_name" class="form-control" placeholder="Username" autocomplete="off"');
                ?>
            </div>
            <?php echo form_error('user_name');?>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <?php
                echo form_password('password', set_value('password'), 'id="password" class="form-control" placeholder="Password" autocomplete="off"');
                ?>
            </div>
            <?php echo form_error('password');?>
        </div>
        <div class="form-group">
            <?php echo form_submit('submit','登陆','class="btn btn-primary btn-block btn-login"');?>
        </div>
        <div class="form-group">
            <em style="color:#fff;">jugool工作室版权所有&reg;</em>
        </div>
        <?php echo form_close();?>
    </div>
</div>
</body>
</html>
<script>
</script>