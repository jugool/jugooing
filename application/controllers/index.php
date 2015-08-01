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
        //当前时间段
        $H = date('H');
        if ($H < 12) {
            $date = 'am'; //中午
        } else {
            $date = 'pm'; //晚上
        }
        //首页菜单列表
        $this->db->select('dishes.id,dishes.l_id,library.name,library.images,library.price,library.descript');
        $this->db->where('library.is_show', 1); //必须是已经开启展示的菜品
        $this->db->where('dishes.dish_time', $date); 
        $this->db->where('dishes.dish_day',date('Y-m-d')); 
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
        
        if (count($data['dish_list']) > 0)
        {
        	foreach ($data['dish_list'] as $k => $v)
        	{
        		$imgs = explode('jugooing' , $v['images']);
        		$imgs[1] = substr($imgs[1], 1);
        		$base_url = $this->config->base_url();
        		$data['dish_list'][$k]['images'] = str_replace("\\","/",$base_url.$imgs[1]);
        	}
        }
        //首页当前点餐信息
        $this->db->select('order.num,library.name');
        $this->db->where('u_id',$this->session->userdata['user_info']['id']);
        $this->db->where('dish_day',date('Y-m-d'));
        $this->db->where('dish_time',$date);
        $this->db->join('library', 'library.id = order.l_id', 'left');
        $temp = $this->objectToArray($this->db->get('order')->result());
        if (!empty($temp) && is_array($temp))
        {
            foreach($temp as $key=>$val)
            {
                $info[] = $val['name']."*".$val['num'];
            }
            $data['this_people'] = implode(' , ',$info);
        }
        
        //首页右边公告栏信息
        $this->db->select('*');
        $this->db->order_by('modify_time','desc');
        $notice = $this->objectToArray($this->db->get('notice')->result());
        $data['notice'] = $notice[0];
        $data['this_date'] = $date; 
        
        //首页排名前3的点餐菜品，和点餐人数
        $this->db->select('order.u_id,library.images,count(order.id) as count');
        $this->db->where('order.dish_time',$date);
        $this->db->like('order.order_time',date('Y-m-d'),'after');
        $this->db->group_by('order.l_id');
        $this->db->order_by('count desc');
        $this->db->join('library', 'library.id = order.l_id', 'left');
        $order = $this->objectToArray($this->db->get('order')->result());
        $data['order'] = $order;
        $this->load->view('main',$data);
    }

    /**
     * 首页订单处理
     */
    public function order_process()
    {
        $html_order = $this->input->post('order_list');
        $date = str_replace('/', '-', $this->input->post('date1'));
        $time = $this->input->post('date2');
        $temp = array();
        //查看当前日期时间点是否已经订餐
        $this->db->select("count(*) as count");
        $this->db->where('dish_day', $date);
        $this->db->where('dish_time', $time);
        $result = $this->db->get('order')->result();
        if ($result[0]->count > 0)
        {
            echo 2; //表示当前时间点已经点过餐了
            exit();
        }
        if(!empty($html_order)&&isset($html_order))
        {
            $temp = explode(',',trim($html_order,","));;
            foreach($temp as $item)
            {
                preg_match("/already[_0-9]+/i",$item,$m1);
                $m1 = explode("_",$m1[0]);
                $library_id = $m1[1]; //菜品库ID
                //preg_match_all("/[\x{4e00}-\x{9fa5}]+[_0-9]+/u",$item,$m2);
                preg_match("/[*][0-9]+/",$item,$m2);
                $num = trim($m2[0],'*'); //菜品数量
                if(empty($library_id)||empty($num)) //必须要有菜品id和数量
                {
                    echo 0;
                    exit();
                }
                $data = array(
                    'l_id' => $library_id,
                    'u_id' => $this->session->userdata['user_info']['id'],
                    'num' => $num,
                    'dish_day' => $date, //需要进行替换
                    'dish_time' => $time,
                    'order_time' => date('Y-m-d H:i:s')
                );
                $result = $this->db->insert('order', $data);
            }
            if($result)
            {
                echo true;
                exit();
            }
        }
    }

    /**
     * 订单取消
     */
    public function cancel_order()
    {
        $user_id = $this->session->userdata['user_info']['id']; //用户ID
        $date = $this->input->post('date1'); //当前日期
        $time = $this->input->post('date2'); //当前时间段
        if (!empty($date) && !empty($time))
        {
            $this->db->where('u_id', $user_id);
            $this->db->where('dish_day', $date);
            $this->db->where('dish_time', $time);
            $result = $this->db->delete('order');
            if ($result) //是否取消成功
            {
                echo true;
            }
            else
            {
                echo false;
            }
        }
        else
        {
            echo false;
        }
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