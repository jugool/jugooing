<?php
/**
 * Created by PhpStorm.
 * 后台登陆
 * User: steven.lin
 * Date: 2015/7/22
 */
if (!defined('BASEPATH')) {
    exit('Access Denied');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>我的后台</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/index.css" type="text/css" media="screen">

    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/tendina.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/common.js"></script>

</head>
<body>
<!--顶部-->
<div class="layout_top_header">
    <div style="float: left"><span
            style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d">我要吃饭管理后台</span></div>
    <div id="ad_setting" class="ad_setting">
        <a class="ad_setting_a" href="javascript:;">
            <i class="icon-user glyph-icon" style="font-size: 20px"></i>
            <span>管理员</span>
            <i class="icon-chevron-down glyph-icon"></i>
        </a>
        <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
            <li class="ad_setting_ul_li"><a href="javascript:;"><i class="icon-user glyph-icon"></i> 个人中心 </a></li>
            <li class="ad_setting_ul_li"><a href="javascript:;"><i class="icon-cog glyph-icon"></i> 设置 </a></li>
            <li class="ad_setting_ul_li"><a href="javascript:;" onclick="login_out()><i class="icon-signout glyph-icon"></i> <span
                        class="font-bold">退出</span> </a></li>
        </ul>
    </div>
    <script type="text/javascript">
        function login_out() {
            if (confirm("确定要退出系统吗?")) {
                window.location.href = "<?php echo site_url("admin/login_out")?>;
            } else return false;
        }
    </script>
</div>
<!--顶部结束-->
<!--菜单-->
<div class="layout_left_menu">
    <ul class="tendina" id="menu">
        <li class="childUlLi">
            <a href="#" target="menuFrame"><i class="glyph-icon icon-home"></i>首页</a>
            <ul style="display: none;">
                <li><a href="#" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>用户添加</a></li>
            </ul>
        </li>
        <li class="childUlLi">
            <a href="#" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>成员管理</a>
            <ul style="display: none;">
                <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>后台菜单管理</a></li>
                <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>展示商品管理</a></li>
                <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>数据管理</a></li>
            </ul>
        </li>
        <li class="childUlLi">
            <a href="#" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>角色管理</a>
            <ul style="display: none;">
                <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>修改密码</a></li>
                <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>帮助</a></li>
            </ul>
        </li>
        <li class="childUlLi">
            <a href="#"> <i class="glyph-icon  icon-location-arrow"></i>菜单管理</a>
            <ul style="display: none;">
                <li><a href="#" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>平台菜单</a></li>
                <li><a href="#" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>运行商菜单</a></li>
                <li><a href="#" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>服务站菜单</a></li>
                <li><a href="#" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>商家菜单</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--菜单-->
<div id="layout_right_content" class="layout_right_content">
    <div class="route_bg">
        <a href="#">主页</a><i class="glyph-icon icon-chevron-right"></i>
        <a href="#">菜单管理</a>
    </div>
    <div class="mian_content">
        <div id="page_content">
            <iframe id="menuFrame" name="menuFrame" src="./main.html" style="overflow:visible;" scrolling="yes"
                    frameborder="no" height="100%" width="100%"></iframe>
        </div>
    </div>
</div>
<div class="layout_footer">
    <p>Copyright © 2014 - 2015 jugool工作室版权所有&reg;</p>
</div>
</body>
</html>