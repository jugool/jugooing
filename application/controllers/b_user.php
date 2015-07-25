<?php
class B_user extends CI_Controller {
	/**
	 * 重载构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database(); 
		$this->table_name = 'user';
		$this->page_size = 10;
	}
	
	/**
	 * 用户列表页面
	 */
	public function ulist()
	{
		$this->db->select('*');
		$query = $this->db->get('user');
		$total_page = ceil(count($query->result())/($this->page_size));
		
		$page = isset($_GET['page']) ? $_GET['page'] : 0;
		$like = isset($_POST['like']) ? $_POST['like'] : 0;
		
		if ($page <= 0)
		{
			$page = 1;
		}
		else if ($page >= $total_page)
		{
			$page = $total_page;
		}
		
		$start = ($page - 1) * ($this->page_size);
		$end = $this->page_size;
		$this->db->select('*');
		$this->db->limit($end, $start);
		if (!empty($like))
		{
			$this->db->like('name', "$like");
		}
		$query = $this->db->get('user');
		$data['user_list'] = $query->result();	
		
		if (count($data['user_list']) > 0)
		{
			foreach ($data['user_list'] as $key => $val)
			{
				if ($val->type == 0)
				{
					$data['user_list'][$key]->type = "<b style='color:red;'>管理员</b>";
				}
				else 
				{
					$data['user_list'][$key]->type = "员工";
				}
			}
		}
		
		if (count($data['user_list']) > 0)
		{
			$data['total_page'] = $total_page;
			$data['page'] = $page;
			$this->load->view('admin/user/user_list', $data);
		}
		else 
		{
			$data['total_page'] = 0;
			$data['page'] = 0;
			$this->load->view('admin/user/user_list', $data);
		}
		
	}
	
	/**
	 * 删除用户
	 */
	public function udelete()
	{
		if (!empty($_GET['id']))
		{
			$this->db->where('id', $_GET['id']);
			$re = $this->db->delete('user');
		}
		redirect('b_user/ulist');
	}
	
	/**
	 * 用户添加页面
	 */
	public function uadd()
	{
		$this->load->view('admin/user/add_user');
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
		
		/* $data = array(
				'url' => 'www.mynewclient.com',
				'name' => 'BigCo Inc',
				'clientid' => '33',
				'type' => 'dynamic'
		); */
		//$this->db->insert('sites', $data); 把数据增加到sites表中.
	}
}
