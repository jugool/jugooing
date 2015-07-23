<?php
class User extends CI_Controller {  
    public function __construct() {  
        parent :: __construct();  
       // 由于有邮箱唯一性的判断，所以需要这段代码  
        $this -> load -> database();  
    }  
    public function register() {  
          
        $this -> load -> helper('form');  
        $this -> load -> library('form_validation');  
//用户名不能为空  
        $this -> form_vali  
dation -> set_rules('user' , '用户名' , 'required');  
        $this -> form_validation -> set_rules('pass' , '密码' , 'required');  
// 重复密码不能为空，并且要和密码相同  
        $this -> form_validation -> set_rules('again' , '重复密码' ,  'required|matches[pass]');  
        $this -> form_validation -> set_rules('sex' , 'sex' ,'required');  
// 邮箱不能空，格式要正确，而且要唯一  
        $this -> form_validation -> set_rules('email' , 'email' , 'required|valid_email|is_unique[user.email]');  
// 判断已数组形式的表单元素  
        $this -> form_validation -> set_rules('addr[]' , 'addr' , 'required');  
        if($this -> form_validation ->run() === false) {  
            $this -> load -> view('register');  
        }  
    }  
}  