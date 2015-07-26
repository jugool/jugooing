<?php
/**
 * Created by PhpStorm.
 * User: steven.lin
 * Date: 2015/7/25
 */
class B_library extends CI_Controller
{
	/**
	 * 重载构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->page_size = 10;
	}
	/**
	 * 菜品列表函数
	 */
	public function llist()
    {
    	$this->db->select('*');
    	$query = $this->db->get('library');
    	$total_page = ceil(count($query->result())/($this->page_size));
    	
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
    	$this->db->select('*');
    	$this->db->limit($end, $start);
    	if (!empty($like))
    	{
    		$this->db->like('name', "$like");
    	}
    	$query = $this->db->get('library');
    	$data['library_list'] = $query->result();
    	
    	/* if (count($data['user_list']) > 0)
    	{
    		foreach ($data['user_list'] as $key => $val)
    		{
    			if ($val->type == 0)
    			{
    				$data['user_list'][$key]->type = "<b style='color:red;'>管理员</b>";
    			}
    			else
    			{
    				$data['user_list'][$key]->type = "员工";
    			}
    		}
    	} */
    	
    	if (count($data['library_list']) > 0)
    	{
    		$data['total_page'] = $total_page;
    		$data['page'] = $page;
    		$this->load->view('admin/library/library_list', $data);
    	}
    	else
    	{
    		$data['total_page'] = 0;
    		$data['page'] = 0;
    		$this->load->view('admin/library/library_list', $data);
    	}
    }

    /**
     * 添加菜品
     */
    public function ladd()
    {
    	
    	if (empty($_POST))
    	{
    		$this->load->view('admin/library/add_library');
    	}
    	else
    	{
    		// 先处理图片上传
    		$re = $this::uploadImg();
    		
    		if ($re === 1 || $re === 4)
    		{
    			echo "<script>alert('图片上传失败');history.back(-1);</script>";die();
    		}
    		else if ($re === 2)
    		{
    			echo "<script>alert('图片过大');history.back(-1);</script>";die();
    		}
    		else if ($re === 3)
    		{
    			echo "<script>alert('图片格式不正确');history.back(-1);</script>";die();
    		}
    		else 
    		{
    			$data['images'] = $re;
    		}
    		$data['name'] = $_POST['name'];
    		$data['price'] = $_POST['price'];
    		if (!empty($_POST['descript']))
    		{
    			$data['descript']= $_POST['descript'];
    		}
    		$data['create_time'] = date('Y-m-d H:i:s');
    		$data['modify_time'] = date('Y-m-d H:i:s');
    		
    		if ($this->db->insert('library', $data))
    		{
    			echo "<script>alert('添加成功!')</script>";
    			$this->load->view('admin/library/add_library');
    		}
    	}
    }
    
    /**
     * 删除菜品
     */
    public function ldelete()
    {
    	if (!empty($_GET['id']))
    	{
    		$this->db->where('id', $_GET['id']);
    		$re = $this->db->delete('library');
    	}
    	redirect('b_library/llist');
    }
    
    /**
     * 处理图片函数
     */
    public function uploadImg()
    {
    	if($_FILES['imgsrc']['error'] > 0){
    		return 1;
    	}
    	if($_FILES['imgsrc']['size'] > 1000000){
    		return 2;
    	}
    	if($_FILES['imgsrc']['type']!='image/jpeg' && $_FILES['file']['type']!='image/gif' && $_FILES['file']['type']!='image/png'){
    		return 3;
    	}
    	$today = date("YmdHis");
    	$filetype = $_FILES['imgsrc']['type'];
    	if($filetype == 'image/jpeg'){
    		$type = '.jpg';
    	}
    	if($filetype == 'image/gif'){
    		$type = '.gif';
    	}
    	if($filetype == 'image/png'){
    		$type = '.png';
    	}
    	
    	$upfile = dirname(dirname(dirname(__FILE__))) . '\public\upload\library' . '\\' . $today . $type;
    	if(!move_uploaded_file($_FILES['imgsrc']['tmp_name'], $upfile))
    	{
    			return 4;
    	}
    	else
    	{
    		return $upfile;
    	}
    }
    
    /**
     * 菜品修改页面
     */
    public function lupdate()
    {
    	if (!empty($_GET['id']))
    	{
    		$this->db->select('*');
    		$this->db->where('id', $_GET['id']);
    		$query = $this->db->get('library');
    		$data['library'] = $query->result();
    		$data['library'] = $data['library'][0];
    			
    		$data['img0'] = $data['library']->images;
    		// 处理下图片路径
    		$imgs = explode('jugooing' , $data['library']->images);
    		$imgs[1] = substr($imgs[1], 1);
    		$base_url = $this->config->base_url();
    		$data['library']->images = str_replace("\\","/",$base_url.$imgs[1]);
    		$this->load->view("admin/library/update_library", $data);
    	}
    	else{
    		if (!empty($_FILES['imgsrc']['name'])){
    			// 先处理图片上传
    			$re = $this::uploadImg();
    		
    			if ($re === 1 || $re === 4)
    			{
    				echo "<script>alert('图片上传失败');history.back(-1);</script>";die();
    			}
    			else if ($re === 2)
    			{
    				echo "<script>alert('图片过大');history.back(-1);</script>";die();
    			}
    			else if ($re === 3)
    			{
    				echo "<script>alert('图片格式不正确');history.back(-1);</script>";die();
    			}
    			else 
    			{
    				$data['images'] = $re;
    			}
    		}
    		
    		// 删除图片
    		$this->db->select('*');
    		$this->db->where('id', $_GET['id']);
    		$query = $this->db->get('library');
    		$data['library'] = $query->result();
    		$data['library'] = $data['library'][0];
    		@unlink($data['library']->images);
    		unset($data['library']);
    		
    		// 插入数据
    		$data['name'] = $_POST['name'];
    		$data['price'] = $_POST['price'];
    		if (!empty($_POST['descript']))
    		{
    			$data['descript']= $_POST['descript'];
    		}
    		$data['modify_time'] = date('Y-m-d H:i:s');
    		$this->db->where('id', $_POST['id']);
    		if ($this->db->update('library', $data))
    		{
    			echo "<script>alert('修改成功!')</script>";
    			redirect('b_library/llist');
    		}
    	}
    }
}