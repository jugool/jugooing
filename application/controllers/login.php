<?php
/**
 * 用户登录类
 * @author bocley
 */
class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('session');
    }

    /**
     * 登录验证
     */
	public function index()
	{
        //登录验证
        $this->load->library('form_validation');
        $this->form_validation->set_rules('job_number', '工号', 'trim|required|min_length[1]|max_length[6]');
        $this->form_validation->set_rules('password', '密码', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            if (isset ($_POST['submit']) && !empty ($_POST['submit'])) {
                if($this->form_validation->run() !== false){
                    //从Model层 验证用户
                    $this->load->model('adminModel');
                    $result = $this->adminModel->verify_job(
                        $this->input->post('job_number'),
                        $this->input->post('password')
                    );
                    $login_info = array();
                    //验证是否登陆成功
                    if($result !== false){
                        //设置登录Session
                        $login_info['id'] = $result->id;
                        $login_info['user_name'] = $result->name;
                        $login_info['job_number'] = $result->job_number;
                        $login_info['login_ip'] = $this->input->ip_address();
                        $this->session->set_userdata('user_info', $login_info);
                        //成功后跳转
                        $data['user_name'] = $login_info['user_name'];
                        redirect('index');
                    }else{
                        echo "<script>window.alert('该用户不存在或密码错误！');</script>";
                        $this->load->view('login');
                    }
                }
            }
        }
	}

    /**
     * 退出登录
     */
    public function login_out()
    {
        $this->session->sess_destroy();//注销所有session变量
        redirect('index');
    }

}