<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>我的后台</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/index.css" type="text/css" media="screen">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/tendina.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/common.js"></script>
	<script type="text/javascript">
		function login_out() {
			if (confirm("确定要退出系统吗?")) {
				window.location.href = "<?php echo site_url('admin/login_out')?>";
			}
		}
	</script>
</head>
<body>
<!--顶部-->
<div class="layout_top_header">
    <div style="float: left"><span
            style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d">我要吃饭管理后台</span></div>
    <div id="ad_setting" class="ad_setting">
        <a class="ad_setting_a" href="javascript:;">
            <i class="icon-user glyph-icon" style="font-size: 20px"></i>
            <span style='color:red;'><?php echo $user_name;?></span>
            <i class="icon-chevron-down glyph-icon"></i>
        </a>
        <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
            <li class="ad_setting_ul_li"><a href="javascript:;"><i class="icon-user glyph-icon"></i> 个人中心 </a></li>
            <li class="ad_setting_ul_li"><a href="javascript:;"><i class="icon-cog glyph-icon"></i> 设置 </a></li>
            <li class="ad_setting_ul_li"><a href="javascript:;" onclick="login_out()"><i class="icon-signout glyph-icon"></i> <span
                        class="font-bold">退出</span> </a></li>
        </ul>
    </div>
</div>