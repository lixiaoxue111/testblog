<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        //echo 'dfdgd';die;
	    $this->load->view('welcome_message');
	}
	//加载登录页面
    public function login()
    {
        $this->load->view('login');
    }
    public function check_login(){
	    //1.接收数据
        //echo 'dfdgd';die;
        //echo $_GET;die;
        $username=$this -> input -> post('username');
        $password=$this -> input -> post('password');
        //2.验证 ...
        //3.数据库操作
        $this -> load -> model('user_model'); //加载model文件
       $result = $this -> user_model -> get_by_name_pwd($username,$password);
       if($result){
           echo 'success';
       }else{
           echo 'fail';
       }
    }

    //加载注册录页面
    public function reg(){
	    $this -> load -> view('reg');
    }
    //处理注册页面
    public function do_reg(){
	    $email = $this -> input -> post('email');
        $username = $this -> input ->post('username');
    }

   /* public function check_name(){
	   $name = $this -> input -> get('uname');
	   echo $name.'hahha';
        $this -> load ->model('user_model');
        $result=$this -> user_model ->get_by_name($name);
        if($result){
            echo 'fail';
        }else{
            echo 'success';
        }
    }*/
}
