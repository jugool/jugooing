<?php
/**
 * Created by PhpStorm.
 * User: steven.lin
 * Date: 2015/7/25
 */
class b_dish extends CI_Controller
{
    public function dlist()
    {
		$this->load->view('admin/dish/dish_list');
    }
}