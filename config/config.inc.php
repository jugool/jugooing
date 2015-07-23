<?php
/**
 * Created by PhpStorm.
 * User: steven.lin
 * Date: 2015/7/22
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*----------------------------该项目所用到的------------------------*/
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = 'ljq...';
$db['default']['database'] = 'test';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE; //报错出现 mysqli_real_escape_string()
$db['default']['stricton'] = FALSE;
$db['real_data']['table_pre'] = '';  //数据表的前缀
/*----------------------------该项目所用到的------------------------*/