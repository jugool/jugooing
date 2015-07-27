<?php
class B_stat extends CI_Controller {
	/**
	 * 重载构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * 用户统计
	 */
	public function ustat()
	{
		$this->db->select('*');
		$query = $this->db->get('user');
		$data['users'] = $query->result();
		$data['total'] = count($data['users']);
		$data['sun_user'] = '0%';
		$data['sad_user'] = '0%';
		$data['sor_user'] = '0%';
		$data['un_user'] = 0;
		$data['ad_user'] = 0;
		$data['or_user'] = 0;
		
		if ($data['total'] > 0)
		{	
			foreach ($data['users'] as $key => $val)
			{
				if ($val->type == 0)
				{
					$data['ad_user']++;
					$data['users'][] = $val->name;
					$data['sad_user'] = $data['ad_user']/$data['total'] * 100;
				}
				else if ($val->type == 1)
				{
					$data['un_user']++;
					$data['sun_user'] = $data['un_user']/$data['total'] * 100;
				}
				else
				{
					$data['or_user']++;
					$data['sor_user'] = $data['or_user']/$data['total'] * 100;
				}
			}
		}
		
		$this->load->view('admin/stat/user_stat', $data);
	}
	
	/**
	 * 菜品统计
	 */
	public function lstat()
	{
		$this->db->select('*');
		$query = $this->db->get('library');
		$data['library'] = $query->result();
		$data['total'] = count($data['library']);
		$data['price'] = 0;
		$data['hname'] = '';
		$data['hprice'] = 0;
		$data['lname'] = '';
		$data['lprice'] = 100000;
		
		if ($data['total'] > 0)
		{
			foreach ($data['library'] as $key => $val)
			{
				$data['price'] += $val->price;
				
				if ($val->price > $data['hprice'])
				{
					$data['hprice'] = $val->price;
					$data['hname'] = $val->name;
				}
				
				if ($val->price < $data['lprice'])
				{
					$data['lprice'] = $val->price;
					$data['lname'] = $val->name;
				}
			 }
			
			$data['price'] = $data['price'] /$data['total'];
		}
	
		$this->load->view('admin/stat/library_stat', $data);
	}
	
	/**
	 * 资费统计
	 */
	public function ostat()
	{
		// 选出今天的订单
		if (!isset($_GET['export']))
		{
			$this->db->select('*');
			$today = date('Y-m-d');
			$this->db->where('dish_day', $today);
			$ntime = date('H');
			if ($ntime < 12)
			{
				$data['t'] = date('Y-m-d').'上午';
				$this->db->where('dish_time', 'am');
			}
			else 
			{
				$data['t'] = date('Y-m-d').'下午';
				$this->db->where('dish_time', 'pm');
			}
			$query = $this->db->get('order');
			$data['order'] = $query->result();
			$data['total'] = count($data['order']);
			$data['prices'] = 0;
			$data['price'] = 0;
			$data['hprice'] = 0;
			$data['lprice'] = 100000;
			
			if ($data['total'] > 0)
			{
				foreach ($data['order'] as $key => $val)
				{
					// 选出菜
					$this->db->select('price,name');
					$this->db->where('id', $val->l_id);
					$query = $this->db->get('library');
					$now_l = $query->result();
					$now_l = $now_l[0];
					//  得到菜名
					$data['order'][$key]->l_id = $now_l->name;
					$data['prices'] += $now_l->price;
				
					if ($now_l->price> $data['hprice'])
					{
						$data['hprice'] = $now_l->price;
					}
				
					if ($now_l->price< $data['lprice'])
					{
						$data['lprice'] = $now_l->price;
					}
					
					//  得到用户
					$this->db->select('name');
					$this->db->where('id',  $val->u_id);
					$query = $this->db->get('user');
					$re = $query->result();
					if (count($re) > 0)
					{
						$data['order'][$key]->u_id = $re[0]->name;
					}
					else
					{
						$data['order'][$key]->u_id = "<span style='color:red;'>无</span>";
					}
					
					if ($val->dish_time == 'am')
					{
						$data['order'][$key]->dish_time = "上午";
					}
					else
					{
						$data['order'][$key]->dish_time = "下午";
					}
		
				}
				
				$data['price'] = $data['prices'] /$data['total'];
			}
			if ($data['lprice'] == 100000)
			{
				$data['lprice'] = 0;
			}
			
			$this->load->view('admin/stat/order_stat', $data);
		}
		else 
		{
			$this->db->select('*');
			$today = date('Y-m-d');
			$this->db->where('dish_day', $today);
			$ntime = date('H');
			if ($ntime < 12)
			{
				$this->db->where('dish_time', 'am');
			}
			else
			{
				$this->db->where('dish_time', 'pm');
			}
			$query = $this->db->get('order');
			$data['order'] = $query->result();
			$data['total'] = count($data['order']);
					
			if ($data['total'] > 0)
			{
				foreach ($data['order'] as $key => $val)
				{
					// 选出菜
					$this->db->select('price,name');
					$this->db->where('id', $val->l_id);
					$query = $this->db->get('library');
					$now_l = $query->result();
					$now_l = $now_l[0];
					$data['order'][$key]->l_id = $now_l->name;
						
					//  得到用户
					$this->db->select('name');
					$this->db->where('id',  $val->u_id);
					$query = $this->db->get('user');
					$re = $query->result();
					if (count($re) > 0)
					{
						$data['order'][$key]->u_id = $re[0]->name;
					}
					else
					{
						$data['order'][$key]->u_id = "<span style='color:red;'>无</span>";
					}
							
					if ($val->dish_time == 'am')
					{
						$data['order'][$key]->dish_time = "上午";
					}
					else
					{
						$data['order'][$key]->dish_time = "下午";
					}
				}
			}
			$this->export_csv($data['order']);
		}
	}
	
	/**
	 * 导出excl表格
	 */
	public function export_csv($data=array())
	{
		header("Content-type:application/vnd.ms-excel;charset=utf-8");
		$d = date("Y-m-d");
		$ntime = date('H');
		if ($ntime < 12)
		{
			$t = 'am';
		}
		else 
		{
			$t = 'pm';
		}
		header("Content-Disposition:attachment; filename={$d}.{$t}.xls");
		echo '用户'.chr(9);
		echo '菜名'.chr(9);
		//echo '时间'.chr(9);
		//echo '时段'.chr(9);
		echo "\r\n";
		if (count($data) > 1)
		{
			foreach ($data as $k => $v)
			{
				echo "$v->u_id".chr(9);
				echo "$v->l_id".chr(9);
				//echo "$v->dish_day".chr(9);
				//echo "$v->dish_time".chr(9);
				echo "\r\n";
			}
		}
		
	}
<?php
class B_stat extends CI_Controller {
	/**
	 * 重载构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * 用户统计
	 */
	public function ustat()
	{
		$this->db->select('*');
		$query = $this->db->get('user');
		$data['users'] = $query->result();
		$data['total'] = count($data['users']);
		$data['sun_user'] = '0%';
		$data['sad_user'] = '0%';
		$data['sor_user'] = '0%';
		$data['un_user'] = 0;
		$data['ad_user'] = 0;
		$data['or_user'] = 0;
		
		if ($data['total'] > 0)
		{	
			foreach ($data['users'] as $key => $val)
			{
				if ($val->type == 0)
				{
					$data['ad_user']++;
					$data['users'][] = $val->name;
					$data['sad_user'] = $data['ad_user']/$data['total'] * 100;
				}
				else if ($val->type == 1)
				{
					$data['un_user']++;
					$data['sun_user'] = $data['un_user']/$data['total'] * 100;
				}
				else
				{
					$data['or_user']++;
					$data['sor_user'] = $data['or_user']/$data['total'] * 100;
				}
			}
		}
		
		$this->load->view('admin/stat/user_stat', $data);
	}
	
	/**
	 * 菜品统计
	 */
	public function lstat()
	{
		$this->db->select('*');
		$query = $this->db->get('library');
		$data['library'] = $query->result();
		$data['total'] = count($data['library']);
		$data['price'] = 0;
		$data['hname'] = '';
		$data['hprice'] = 0;
		$data['lname'] = '';
		$data['lprice'] = 100000;
		
		if ($data['total'] > 0)
		{
			foreach ($data['library'] as $key => $val)
			{
				$data['price'] += $val->price;
				
				if ($val->price > $data['hprice'])
				{
					$data['hprice'] = $val->price;
					$data['hname'] = $val->name;
				}
				
				if ($val->price < $data['lprice'])
				{
					$data['lprice'] = $val->price;
					$data['lname'] = $val->name;
				}
			 }
			
			$data['price'] = $data['price'] /$data['total'];
		}
	
		$this->load->view('admin/stat/library_stat', $data);
	}
	
	/**
	 * 
	 */
	public function ostat()
	{
		// 选出今天的订单
		if (!isset($_GET['export']))
		{
			$this->db->select('*');
			$today = date('Y-m-d');
			$this->db->where('dish_day', $today);
			$ntime = date('H');
			if ($ntime < 12)
			{
				$data['t'] = date('Y-m-d').'上午';
				$this->db->where('dish_time', 'am');
			}
			else 
			{
				$data['t'] = date('Y-m-d').'下午';
				$this->db->where('dish_time', 'pm');
			}
			$query = $this->db->get('order');
			$data['order'] = $query->result();
			$data['total'] = count($data['order']);
			$data['prices'] = 0;
			$data['price'] = 0;
			$data['hprice'] = 0;
			$data['lprice'] = 100000;
			
			if ($data['total'] > 0)
			{
				foreach ($data['order'] as $key => $val)
				{
					// 选出菜
					$this->db->select('price,name');
					$this->db->where('id', $val->l_id);
					$query = $this->db->get('library');
					$now_l = $query->result();
					$now_l = $now_l[0];
					//  得到菜名
					$data['order'][$key]->l_id = $now_l->name;
					$data['prices'] += $now_l->price;
				
					if ($now_l->price> $data['hprice'])
					{
						$data['hprice'] = $now_l->price;
					}
				
					if ($now_l->price< $data['lprice'])
					{
						$data['lprice'] = $now_l->price;
					}
					
					//  得到用户
					$this->db->select('name');
					$this->db->where('id',  $val->u_id);
					$query = $this->db->get('user');
					$re = $query->result();
					if (count($re) > 0)
					{
						$data['order'][$key]->u_id = $re[0]->name;
					}
					else
					{
						$data['order'][$key]->u_id = "<span style='color:red;'>无</span>";
					}
					
					if ($val->dish_time == 'am')
					{
						$data['order'][$key]->dish_time = "上午";
					}
					else
					{
						$data['order'][$key]->dish_time = "下午";
					}
		
				}
				
				$data['price'] = $data['prices'] /$data['total'];
			}
			
			if ($data['lprice'] == 100000)
			{
				$data['lprice'] = 0;
			}
			$this->load->view('admin/stat/order_stat', $data);
		}
		else 
		{
			$this->db->select('*');
			$today = date('Y-m-d');
			$this->db->where('dish_day', $today);
			$ntime = date('H');
			if ($ntime < 12)
			{
				$this->db->where('dish_time', 'am');
			}
			else
			{
				$this->db->where('dish_time', 'pm');
			}
			$query = $this->db->get('order');
			$data['order'] = $query->result();
			$data['total'] = count($data['order']);
					
			if ($data['total'] > 0)
			{
				foreach ($data['order'] as $key => $val)
				{
					// 选出菜
					$this->db->select('price,name');
					$this->db->where('id', $val->l_id);
					$query = $this->db->get('library');
					$now_l = $query->result();
					$now_l = $now_l[0];
					$data['order'][$key]->l_id = $now_l->name;
						
					//  得到用户
					$this->db->select('name');
					$this->db->where('id',  $val->u_id);
					$query = $this->db->get('user');
					$re = $query->result();
					if (count($re) > 0)
					{
						$data['order'][$key]->u_id = $re[0]->name;
					}
					else
					{
						$data['order'][$key]->u_id = "<span style='color:red;'>无</span>";
					}
							
					if ($val->dish_time == 'am')
					{
						$data['order'][$key]->dish_time = "上午";
					}
					else
					{
						$data['order'][$key]->dish_time = "下午";
					}
				}
			}
			$this->export_csv($data['order']);
		}
	}
	
	/**
	 * 导出excl表格
	 */
	public function export_csv($data=array())
	{
		header("Content-type:application/vnd.ms-excel;charset=utf-8");
		$d = date("Y-m-d");
		$ntime = date('H');
		if ($ntime < 12)
		{
			$t = 'am';
		}
		else 
		{
			$t = 'pm';
		}
		header("Content-Disposition:attachment; filename={$d}.{$t}.xls");
		echo '用户'.chr(9);
		echo '菜名'.chr(9);
		//echo '时间'.chr(9);
		//echo '时段'.chr(9);
		echo "\r\n";
		if (count($data) > 1)
		{
			foreach ($data as $k => $v)
			{
				echo "$v->u_id".chr(9);
				echo "$v->l_id".chr(9);
				//echo "$v->dish_day".chr(9);
				//echo "$v->dish_time".chr(9);
				echo "\r\n";
			}
		}
		
	}
}