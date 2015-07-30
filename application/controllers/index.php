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
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->table_name = "dishes";
    }

    public function index()
    {
        $is_login = $this->session->userdata('user_info');
        if (is_array($is_login) && !empty($is_login))
        {
            $data['user_name'] = $is_login['user_name'];
            redirect('index/main');
        }
        else
        {
            // 加载后台登录页面
            redirect('login');
        }
    }

    /**
     * 首页菜单
     */
    public function main()
    {

        $this->db->select('dishes.id,library.name,library.images,library.price,library.descript');
        $this->db->where('library.is_show', 1); //必须是已经开启展示的菜品
        $this->db->where('dishes.dish_time', 'am'); //中午
        $this->db->join('library', 'library.id = dishes.l_id', 'left');
        $data['dish_list'] = $this->objectToArray($this->db->get($this->table_name)->result());
        foreach($data['dish_list'] as $key=>$val)
        {
            if (1 === $key % 4 || 0 === $key % 4) //首页交错排列
            {
                $data['dish_list'][$key]['arrange'] = true;
            }else{
                $data['dish_list'][$key]['arrange'] = false;
            }
        }

        $this->load->view('main',$data);
    }

    /**
     * 对象转换成数组
     */
    public function objectToArray($e)
    {
        $e = (array)$e;
        foreach ($e as $k => $v)
        {
            if (gettype($v) == 'resource') return;
            if (gettype($v) == 'object' || gettype($v) == 'array')
                $e[$k] = (array)$this->objectToArray($v);
        }
        return $e;
    }

}
/*
class Index extends CI_Controller {	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array(
				'form',
				'url'
		));
		$this->load->library('session');
		$this->load->database();
	}
	
	/**
	 * 前台登录
	 */
	public function index()
	{
		$is_login = $this->session->userdata('user_info');
		if(!empty($is_login))
		{
			$data['user_name'] = $is_login;
			redirect('index/main');
		}else{ 
			// 加载登录页面
			$str = date('H:i:s');
			$data['jugool'] = md5($str);
			$this->session->set_userdata('jugool', $data['jugool']);
			$this->load->view('login', $data);
		}
	
	}
	
	/**
	 * 后台首页
	 */
	public function main()
	{
		$is_login = $this->session->userdata('user_info');
		if(!empty($is_login))
		{
			$data['boot_show'] = true;
			$this->load->view('dish', $data);
		}else{
			// 加载登录页面
			$str = date('H:i:s');
			$data['jugool'] = md5($str);
			$this->session->set_userdata('jugool', $data['jugool']);
			$this->load->view('login', $data);
		}
		//echo 111;die();
		// 加载前台中菜品页面
		
	}
	
	/**
	 * 登录验证
	 */
	public function do_login()
	{
		// 安全验证
		$jugool = $this->session->userdata('jugool');
		$jugool1 = isset($_POST['jugoool'])?$_POST['jugoool']:0;
		if ($jugool != $jugool1)
		{
			echo "<script>alert('非法登录!');history.back(-1);</script>";die();
		}
		
		$job_number = isset($_POST['number'])?$_POST['number']:'';
		$password = isset($_POST['password'])?$_POST['password']:'';
		
		$this->db->select('*');
		$this->db->where('job_number', $job_number);
		$this->db->where('type', 1);
		$this->db->where('password', md5(md5($password)));
		$re = $this->db->get('user');
		$result = $re->result();
		$login_info = array();
		if (count($result) === 1)
		{
			//设置登录Session
			$user_name = $result[0]->name;
			$this->session->set_userdata('user_info', $user_name);
			redirect('index');
		}
		else 
		{
			echo "<script>window.alert('该用户不存在或密码错误！');</script>";
			$this->load->view('login');
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
*/
