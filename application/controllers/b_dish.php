<?php
/**
 * Created by PhpStorm.
 * User: steven.lin
 * Date: 2015/7/25
 */
class b_dish extends CI_Controller
{
    public function dish_list()
    {

        $this->load->view('admin/dish/dish_list');
    }

    public function add_dish(){


        $this->load->view('admin/dish/add_dish');
    }
}