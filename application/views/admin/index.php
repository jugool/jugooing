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

<!-- 顶部 -->
<?php
	$this->load->view('admin/header');
?>

<!-- 菜单 -->
<?php
	$this->load->view('admin/left_menu');
?>

<div id="layout_right_content" class="layout_right_content">
	<div class="route_bg">
		<a href="#">主页</a><i class="glyph-icon icon-chevron-right"></i>
		<a href="#">用户添加</a>
	</div>
    <div class="mian_content">
        <div id="page_content">
            <iframe id="menuFrame" name="menuFrame" src="admin/main" style="overflow:visible;" scrolling="yes"
                    frameborder="no" height="100%" width="100%" target="_self"></iframe>
        </div>
    </div>
</div>

<!-- 尾部 -->
<?php
	$this->load->view('admin/footer');
?>