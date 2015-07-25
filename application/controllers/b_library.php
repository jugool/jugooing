<?php
/**
 * Created by PhpStorm.
 * User: steven.lin
 * Date: 2015/7/25
 */
class b_library extends CI_Controller
{
    public function library_list()
    {



        $this->load->view('admin/library/library_list');
    }

    public function add_dishs()
    {



        $this->load->view('admin/library/add_dishs');
    }
}