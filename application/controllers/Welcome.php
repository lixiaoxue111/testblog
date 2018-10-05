<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        //echo 'dfdgd';die;
	    //$this->load->view('welcome_message');
         $loginedUser=$this ->session ->userdata('loginedUser');
        $this -> load ->model('article_model');
        // user_id=WRITER  article_id=BLOG_ID  post_data=ADD_TIME
        $articles = $this -> article_model -> get_articles_by_user($loginedUser -> USER_ID); //查文章
        $types = $this ->article_model->get_types_by_user($loginedUser -> USER_ID);
        $this->load->view('index',array(
            'articles' => $articles,
            'types'=>$types
        ));
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
       if($result){ //查到结果
           //echo 'success';
           $this -> session ->set_userdata('loginedUser',$result);
           redirect('welcome/index');
           //$this ->load -> view('index',array('username'=>$username)); //不能存登录用户
       }else{//未查到结果
           echo 'fail';
       }
    }

    //退出
    public function logout(){
        $this ->session ->unset_userdata('loginedUser');
        redirect('welcome/login');
    }
    //加载注册录页面
    public function reg(){
	    $this -> load -> view('reg');
    }
    //验证是否重名
    public function check_name(){
	   $name = $this -> input -> get('uname');
	   echo $name.'hahha';
        $this -> load ->model('user_model');
        $result=$this -> user_model ->get_by_name($name);
        if($result){
            echo 'fail';
        }else{
            echo 'success';
        }
    }
    //处理注册页面
    public function do_reg(){
        $email = htmlspecialchars($this -> input -> post('email')); //htmlspecialchars 防止跨站攻击
        $username = $this -> input ->post('username');
        $password= $this -> input -> post('password');
        $password2=$this -> input -> post('password2');
        $gender=$this -> input -> post('gender');
        $province=$this -> input ->post('province');
        $city=$this -> input -> post('city');
        // 验证
        $this ->load ->model('user_model');
        $rows = $this ->user_model ->save($email,$username,$password,$gender,$province,$city);
        if($rows > 0){
            $this -> load -> view('login');
        }else{
            $this -> load ->view('reg');
        }
    }


}
