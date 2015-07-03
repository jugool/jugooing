<?php
############
## 入口文件  ##
############

// 检测PHP版本
if (version_compare(PHP_VERSION, '5.4.0', '<'))
{
	die ('Jugooing needs php which version is higher than 5.4.0. @^@');
}

// jugooing
require_once 'core/jugooing.php';