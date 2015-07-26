<?php
class B_order extends CI_Controller {
	/**
	 * 重载构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database(); 
		$this->table_name = 'order';
		$this->page_size = 10;
	}
	
	/**
	 * 订单列表页面
	 */
	public function olist()
	{
		$this->db->select('*');
		$query = $this->db->get('order');
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
		/* if (!empty($like))
		{
			$this->db->like('name', "$like");
		} */
		$query = $this->db->get('order');
		$data['order_list'] = $query->result();	
		
		if (count($data['order_list']) > 0)
		{
			foreach ($data['order_list'] as $key => $val)
			{
				if ($val->dish_time == 'am')
				{
					$data['order_list'][$key]->dish_time = "上午";
				}
				else
				{
					$data['order_list'][$key]->dish_time = "下午";
				}
				
				//  得到用户
				$this->db->select('name');
				$this->db->where('id',  $val->u_id);
				$query = $this->db->get('user');
				$re = $query->result();
				if (count($re) > 0)
				{
					$data['order_list'][$key]->u_id = $re[0]->name;
				}
				else 
				{
					$data['order_list'][$key]->u_id = "<span style='color:red;'>无</span>";
				}
				
				//  得到菜品
				$this->db->select('name');
				$this->db->where('id',  $val->l_id);
				$query = $this->db->get('library');
				$re = $query->result();
				if (count($re) > 0)
				{
					$data['order_list'][$key]->l_id = $re[0]->name;
				}
				else
				{
					$data['order_list'][$key]->l_id = "<span style='color:red;'>无</span>";
				}
				
			}
		}
		
		if (count($data['order_list']) > 0)
		{
			$data['total_page'] = $total_page;
			$data['page'] = $page;
			$this->load->view('admin/order/order_list', $data);
		}
		else 
		{
			$data['total_page'] = 0;
			$data['page'] = 0;
			$this->load->view('admin/order/order_list', $data);
		}
		
	}
	
	/**
	 * 订单查询页面
	 */
	public function oolist()
	{
		$like = isset($_POST['like']) ? $_POST['like'] : 0;
		$this->db->select('*');
		if (!empty($like))
		{
			switch ($_POST['stype'])
			{
				case 'u' :
					$this->db->where('u_id', $like);
					break;
				case 'l':
					$this->db->where('l_id', $like);
					break;
				case 't':
					$this->db->like('dish_day', $like);
					break;
				default:
					break;
			}
		}
		$query = $this->db->get('order');
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
			switch ($_POST['stype'])
			{
				case 'u' :
					$this->db->where('u_id', $like);
					break;
				case 'l':
					$this->db->where('l_id', $like);
					break;
				case 't':
					$this->db->like('dish_day', $like);
					break;
				default:
					break;
			}
		}
		$query = $this->db->get('order');
		$data['order_list'] = $query->result();
	
		if (count($data['order_list']) > 0)
		{
			foreach ($data['order_list'] as $key => $val)
			{
				if ($val->dish_time == 'am')
				{
					$data['order_list'][$key]->dish_time = "上午";
				}
				else
				{
					$data['order_list'][$key]->dish_time = "下午";
				}
	
				//  得到用户
				$this->db->select('name');
				$this->db->where('id',  $val->u_id);
				$query = $this->db->get('user');
				$re = $query->result();
				if (count($re) > 0)
				{
					$data['order_list'][$key]->u_id = $re[0]->name;
				}
				else
				{
					$data['order_list'][$key]->u_id = "<span style='color:red;'>无</span>";
				}
	
				//  得到菜品
				$this->db->select('name');
				$this->db->where('id',  $val->l_id);
				$query = $this->db->get('library');
				$re = $query->result();
				if (count($re) > 0)
				{
					$data['order_list'][$key]->l_id = $re[0]->name;
				}
				else
				{
					$data['order_list'][$key]->l_id = "<span style='color:red;'>无</span>";
				}
	
			}
		}
	
		if (count($data['order_list']) > 0)
		{
			$data['total_page'] = $total_page;
			$data['page'] = $page;
			$this->load->view('admin/order/order_list', $data);
		}
		else
		{
			$data['total_page'] = 0;
			$data['page'] = 0;
			$this->load->view('admin/order/order_list', $data);
		}
	
	}
	
	/**
	 * 删除订单
	 */
	public function odelete()
	{
		if (!empty($_GET['id']))
		{
			$this->db->where('id', $_GET['id']);
			$re = $this->db->delete('order');
		}
		redirect('b_order/olist');
	}
}