<?php
/**
 * 用户登录类
 * @author bocley
 */
class Admin extends CI_Controller {
	
	/**
	 * 后台首页
	 */
	public function index()
	{
		$data['notice'] = '';
		$this->load->helper('url');
		// 加载后台登录页面
		$this->load->view('login/index', $data);
	}
	
	/**
	 * 后台登录
	 */
	public function login()
	{
		
		// 用户名为空
		if (empty($_POST['name']))
		{
			$data['notice'] = '用户名为空';
			$this->load->view('login/index', $data);
		}
		// 密码为空
		if (empty($_POST['password']))
		{
			$data['notice'] = '密码为空';
			$this->load->view('login/index', $data);
		}
		// 选出用户
		
	}
}