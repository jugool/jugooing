<?php
/**
 * Created by PhpStorm.
 * User: steven.lin
 * Date: 2015/7/25
 */
class b_dish extends CI_Controller
{
    /**
     * 重载构造函数
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'dishes';
        $this->page_size = 10;
        $this->load->helper('url');
    }

    /**
     * 菜单列表
     */
    public function dlist()
    {
        $this->db->select('*');
        $count = $this->db->get($this->table_name)->num_rows;
        $total_page = ceil($count/$this->page_size);
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $like = isset($_POST['like']) ? $_POST['like'] : 0;

        if ($page <= 0)
        {
            $page = 1;
        }
        else if ($page >= $total_page)
        {
            $page = $total_page;
        }
        $start = ($page - 1) * ($this->page_size);
        $end = $this->page_size;
        if (!empty($like))
        {
            $this->db->like('name', "$like");
        }
        $this->db->select('dishes.*,library.name');
        $this->db->join('library', 'library.id = dishes.l_id', 'left');
        $this->db->order_by('dish_time','asc');
        $this->db->order_by('create_time','desc');
        $this->db->limit($end, $start);
        $temp = $this->db->get($this->table_name)->result();
        $data['list'] = $this->objectToArray($temp);
        if ($total_page > 0)
        {
            $data['total_page'] = $total_page;
            $data['page'] = $page;
//            echo "<pre>";
//            print_r($data);
//            echo "</pre>";
            $this->load->view('admin/dish/dish_list',$data);
        }
        else
        {
            $data['total_page'] = 0;
            $data['page'] = 0;
            $this->load->view('admin/dish/dish_list',$data);
        }
    }

    /**
     * 添加菜单
     */
    public function dadd(){

        if($this->input->post())
        {
            if (empty($this->input->post('dish'))&&!is_array($this->input->post('dish')))
            {
                $this->show_error('请选择你要上架的菜品!');exit();
            }
            if (empty($this->input->post('shelves_time')))
            {
                $this->show_error('请选择你要上架的菜品的时间!');exit();
            }
            $list = $this->input->post('dish'); //所选择的上架菜品列表
            $data = array(
                'dish_day' => trim($this->input->post('shelves_time')),
                'dish_time' => $this->input->post('dish_time'),
                'create_time' => time()
            );
            $is_bool = true;
            foreach($list as $id)
            {
                //首先查看是否已经添加过了该菜品
                $this->db->select('dishes.*,library.name');
                $this->db->join('library', 'library.id = dishes.l_id', 'left');
                $this->db->where('l_id',$id);
                $this->db->where('dish_day',$this->input->post('shelves_time'));
                $this->db->where('dish_time',$this->input->post('dish_time'));
                $temp = $this->db->get($this->table_name);
                $num = $temp->num_rows;
                $info = $this->objectToArray($temp->result());
                if(isset($num)&&$num>0)
                {
                    $this->show_error('您已经添加过了 '.$info[0]['name'].' 了！');
                    exit();
                }
                $data['l_id'] = trim($id); //菜品ID
                if(empty($this->input->post('num_'.$id)))
                {
                    $this->show_error('选择的菜品未填上架数量!');
                    exit();
                }
                $data['dish_num'] = trim($this->input->post('num_'.$id),'.'); //菜品数量
                $result = $this->db->insert($this->table_name, $data);
                if(!$result)
                {
                    $is_bool = false;
                }
            }
            if(false === $is_bool)
            {
                $this->show_error('添加菜单过程中出错了！');exit();
            }
            else
            {
                echo "<script>alert('添加成功!')</script>";
            }
            //$this->load->view('admin/dish/dish_list');
            redirect('/b_dish/dlist');
        }
        else
        {
            $this->db->select('id,name');
            $this->db->where('is_show', 1); //必须是已经开启展示的菜品
            $data['dish_list'] = $this->db->get('library')->result();
            $this->load->view('admin/dish/add_dish', $data);
        }
    }

    /**
     * 删除菜单
     */
    public function ddelete()
    {
        if (!empty($_GET['id']))
        {
            $this->db->where('id', $_GET['id']);
            $re = $this->db->delete($this->table_name);
        }
        redirect('b_dish/dlist');
    }

    /**
     * 错误返回
     */
    public function show_error($msg)
    {
        echo "<script>alert('".$msg."')</script>";
        echo "<script>window.history.go(-1);</script>";
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