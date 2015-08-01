<!DOCTYPE HTML>
<html>
<head>
    <title>点餐系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href="<?php echo base_url();?>public/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url();?>public/css/frontend.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
    <style type="text/css">
        .content .login{
            margin-left: 30%;
        }
        .header_top .nav li a{
            background: rgba(0, 0, 0, 0) url("<?php echo base_url();?>public/images/frontend/img_sprite.png") repeat scroll -175px -9px;
        }
        .content form p{color: red;}
    </style>
</head>
<body>
<div class="container">
    <div class="container_wrap">
        <div class="header_top">
            <div class="col-sm-3 logo"><a><img src="<?php echo base_url();?>public/images/frontend/logo.png" alt=""/></a></div>
            <div class="col-sm-6 nav">
                <ul>
      <!--              <li><span class="simptip-position-bottom simptip-movable" data-tooltip="首页"><a href="<?php echo site_url('index');?>"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="明天"><a href="javascript:;"> </a></span></li>-->
                </ul>
                </ul>
            </div>
            <div class="col-sm-3 header_right">
                <ul class="header_right_box">
                    
                    <!--  <li><img src="<?php echo base_url();?>public/images/frontend/p1.png" alt=""/></li>-->
                    <li>
                        <p><a><?php if(!empty($this->session->userdata['user_info']))echo $this->session->userdata['user_info']['user_name']; else echo "未登录";?></a></p>
<!--                        <p>--><?php //if(!empty($user_name))echo $user_name; else echo "填写登录";?><!--</p>-->
                    </li>
                    <li class="last">
                        <i class="edit"> </i>
                        <?php if(!empty($this->session->userdata['user_info'])){?>
                        <span><a href="<?php echo site_url('login/login_out')?>" alt="退出">退出</a></span>
                        <?php }?>
                    </li>
                    <div class="clearfix"> </div>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <script type="text/javascript">
            $(function(){
                $('.header_right_box .last a').click(function(){
                    if(confirm("你确定要退出吗？")){
                        return true;
                    }else{
                        return false;
                    }
                })
            })
        </script>
