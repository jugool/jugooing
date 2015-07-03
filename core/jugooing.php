<?php
header("content-type:text/html;charset=utf8");
include_once 'include.php';

// 系统分流
$c = preg_c(isset($_GET['born']) ? $_GET['born'] : 'jugooing', $jugoo_c);
$a = isset($_GET['client']) ? $_GET['client'] : 'index';

// 确定环境
if ($c == 'jugooing' && $jugooing_debug)
{
	ini_set('display_errors', 1);
}
else if ($app_debug)
{
	ini_set('display_errors', 1);
}

get_c($c);