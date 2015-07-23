<?php
/**
 * Created by PhpStorm.
 * User: steven.lin
 * Date: 2015/7/22
 */
class adminModel extends CI_Model
{
    /**
     * 重载构造函数
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();  //连接数据库（构造函数中连接数据库）
    }

    /**
     * 登录验证
     * @param string $user 用户名
     * @param string $password 密码
     * @return boolean 是否存在
     */
    public function verify_users($user, $password){
        $this->db->select('*');
        $this->db->where('name',$user);
        $this->db->where('password',md5(md5($password)));
        $query = $this->db->get('user');
        if($query->num_rows > 0){
            return $query->row();
        }
        return false;
    }

    /**
     * 插入一条数据
     * @param string $table 表名
     * @param string $data 插入数据
     * @return array
     */
    function insert_one($table,$data){
        $this->db->insert($table,$data) ;
        return array(
            'affect_num'=>$this->db->affected_rows() ,
            'insert_id'=>$this->db->insert_id(),
            'sql'=>$this->db->last_query()
        );
    }
}