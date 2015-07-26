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
		$like = isset($_POST['like']) ? $_POST['like'] : 0;
		$this->db->select('*');
		if (!empty($like))
		{
			$this->db->like('name', "$like");
		}
		$query = $this->db->get('user');
		$total_page = ceil(count($query->result())/($this->page_size));
		
		$page = isset($_GET['page']) ? $_GET['page'] : 0;
		
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
		if (empty($_POST))
		{
			$this->load->view('admin/user/add_user');
		}
		else 
		{
			$data['name'] = $_POST['username'];
			$data['type'] = $_POST['user_type'];
			$data['job_number'] = $_POST['job_number'];
			$data['password']= md5(md5($_POST['password']));
			if (!empty($_POST['telephone']))
			{
				$data['telephone'] = $_POST['telephone'];
			}
			if (!empty($_POST['qq']))
			{
				$data['qq'] = $_POST['qq'];
			}
			if (!empty($_POST['email']))
			{
				$data['email'] = $_POST['email'];
			}
			
			if ($this->db->insert('user', $data))
			{
				echo "<script>alert('添加成功!')</script>";
				$this->load->view('admin/user/add_user');
			}
		}
	}
	
	/**
	 * 用户修改页面
	 */
	public function uupdate()
	{
		if (!empty($_GET['id']))
		{
			$this->db->select('*');
			$this->db->where('id', $_GET['id']);
			$query = $this->db->get('user');
			$data['user'] = $query->result();
			$data['user'] = $data['user'][0];
			
			$this->load->view('admin/user/update_user', $data);
		}
		else{
			$data['name'] = $_POST['username'];
			$data['type'] = $_POST['user_type'];
			$data['job_number'] = $_POST['job_number'];
			$data['password']= md5(md5($_POST['password']));
			if (!empty($_POST['telephone']))
			{
				$data['telephone'] = $_POST['telephone'];
			}
			if (!empty($_POST['qq']))
			{
				$data['qq'] = $_POST['qq'];
			}
			if (!empty($_POST['email']))
			{
				$data['email'] = $_POST['email'];
			}
			
			$this->db->where('id', $_POST['id']);
			if ($this->db->update('user', $data))
			{
				echo "<script>alert('修改成功!')</script>";
				redirect('b_user/ulist');
			}
		}
	}
	
}
