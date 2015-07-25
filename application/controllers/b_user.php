<?php
class B_user extends CI_Controller {
	/**
	 * 重载构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();  
		//连接数据库（构造函数中连接数据库）
	}
	
	/**
	 * 用户列表页面
	 */
	public function ulist()
	{
		$this->db->select('*');
		$query = $this->db->get('user');
		
		$data['user_list'] = $query->result();	
		
		$this->load->view('admin/user/user_list', $data);
	}
	
	/**
	 * 用户添加页面
	 */
	public function uadd()
	{
		
		/* name
		job_number
		depart_number 
		password 
		email 
		telephone
		qq
		image 
		type 
		create_time 
		login_ip 
		login_num */
		
		$data = array(
				'url' => 'www.mynewclient.com',
				'name' => 'BigCo Inc',
				'clientid' => '33',
				'type' => 'dynamic'
		);
		//$this->db->insert('sites', $data); 把数据增加到sites表中.
	}
}
