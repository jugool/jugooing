<?php
class B_user extends CI_Controller {
	/**
	 * 用户列表页面
	 */
	public function user_list()
	{
		$this->load->view('admin/user/user_list');
	}
}
