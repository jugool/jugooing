<?php
/**
 * 用户登录类
 * @author bocley
 */
class Login extends CI_Controller {
	
	/**
	 * 后台首页
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
}