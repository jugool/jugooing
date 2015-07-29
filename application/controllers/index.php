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
