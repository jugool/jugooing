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
		$data['notice'] = '';
        //是否登陆
        $is_login = $this->session->userdata('admin_info');
        if (is_array($is_login) && !empty($is_login))
        {
            $this->load->view('admin/index');
        }
        else
        {
            // 加载后台登录页面
            $this->load->view('login/index_v2', $data);
        }
	}
	
	/**
	 * 后台登录
	 */
	public function login()
	{
		
		// 用户名为空
		if (empty($_POST['name']))
		{
			$data['notice'] = '用户名为空';
			$this->load->view('login/index', $data);
		}
		// 密码为空
		if (empty($_POST['password']))
		{
			$data['notice'] = '密码为空';
			$this->load->view('login/index', $data);
		}
		// 选出用户
		
	}

	public function main()
	{
		$this->load->view('admin/main');
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
            $this->load->view('login/index_v2');
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
                        redirect('admin');
                    }else{
                        echo "<script>window.alert('该用户不存在或密码错误！');</script>";
                        $this->load->view('login/index_v2');
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
        redirect('admin','refresh');
    }
}