<?php
/**
 * Created by PhpStorm.
 * User: steven.lin
 * Date: 2015/7/28
 */
class index extends CI_Controller
{
    /**
     * 重载构造函数
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $is_login = $this->session->userdata('user_info');
        if (is_array($is_login) && !empty($is_login))
        {
            $data['user_name'] = $is_login['user_name'];
            $this->load->view('main', $data);
        }
        else
        {
            // 加载后台登录页面
            redirect('login');
        }
    }


}
