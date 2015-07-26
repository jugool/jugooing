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
}