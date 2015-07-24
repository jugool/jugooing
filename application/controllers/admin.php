<?php
/**
 * 用户登录类
 * @author bocley
 */
class Admin extends CI_Controller {

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
	 * 后台首页
	 */
	public function index()
	{
        $is_login = $this->session->userdata('admin_info');
        if(is_array($is_login)&&!empty($is_login))
        {
            $data['user_name'] = $is_login['user_name'];
            //$this->load->view('admin/index', $data);
            $this->load->view('admin/index', $data);
        }else{
            // 加载后台登录页面
            $this->load->view('admin/login');
        }

	}
	
	/**
	 * 后台首页
	 */
	public function main()
	{
		// 加载后台中心页面
		$this->load->view('admin/user/user_list');
	}

    public function add_user()
    {
        $this->load->view('admin/user/add_user');
    }

    /**
     * 后台登录验证
     */
    public function do_login()
    {
        //登录验证
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', '用户名', 'trim|required|min_length[4]|max_length[12]');
        $this->form_validation->set_rules('password', '密码', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        }
        else
        {
            if (isset ($_POST['submit']) && !empty ($_POST['submit'])) {
                if($this->form_validation->run() !== false){
                    //从Model层 验证用户
                    $this->load->model('adminModel');
                    $result = $this->adminModel->verify_users(
                        $this->input->post('user_name'),
                        $this->input->post('password')
                    );
                    $login_info = array();
                    //验证是否登陆成功
                    if($result !== false){
                        //设置登录Session
                        $login_info['id'] = $result->id;
                        $login_info['user_name'] = $result->name;
                        $login_info['logins'] = 18;
                        $this->session->set_userdata('admin_info', $login_info);
                        //成功后跳转
                        $data['user_name'] = $login_info['user_name'];
                        redirect('admin');
                    }else{
                        echo "<script>window.alert('该用户不存在或密码错误！');</script>";
                        $this->load->view('admin/login');
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
        $this->load->view('admin/login');
    }
}