<?php
/**
 * Created by PhpStorm.
 * User: steven.lin
 * Date: 2015/7/25
 */
class b_library extends CI_Controller
{
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
	public function llist()
    {
		$this->load->view('admin/library/library_list');
    }

    
}