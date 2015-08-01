<?php
class b_notice extends CI_Controller
{
	/**
	 * 重载构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->table_name = 'notice';
		$this->load->helper('url');
	}
	
	/**
	 * 公告列表
	 */
	public function nlist()
	{
		$this->db->select('*');
		$this->db->where('id', 1);
		$data['notice'] = $this->db->get('notice')->result();
		if (count($data['notice']) == 1)
		{
			$data['notice'] = $data['notice'][0];
		}
		else 
		{
			$data['notice'] = '';
		}
		$this->load->view('admin/notice/notice', $data);
	}
	
	/**
	 * 修改公告
	 */
	public function nnotice()
	{
		$notice = $_POST['notice'];
		$this->db->where('id', 1);
		$data['content'] = $notice;
		$data['modify_time'] = date('Y-m-d H:i:s');
		$re = $this->db->update('notice', $data);
		if ($re == TRUE)
		{
			echo "<script>alert('修改成功');history.back(-1);</script>";die();
		}
		else
		{
			echo "<script>alert('修改失败');history.back(-1);</script>";die();
		}
	}
}