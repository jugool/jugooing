<?php
// 设置控制器
function get_c($c)
{
	$c_path = dirname(dirname(dirname(__FILE__))) . "\app\controller\\{$c}.class.php";
	if (!file_exist($c_path))
	{
		ju_error("The file of class $c is not exist.");
	}
	return new $c;
}

// 匹配控制器函数
function preg_c($c, $jugoo_c)
{
	if (in_array($c, $jugoo_c))
	{
		return $c;
	}
	else
	{	
		return 'jugooing';
	}
}

// 系统错误函数
function ju_error($msg)
{
	echo "ERROR::{$msg}";
}