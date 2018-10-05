<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function get_by_name_pwd($name,$pwd){
       $query = $this -> db ->get_where('t_users',array(
            'NAME' => $name,
            'PASSWORD' => $pwd
        ));
       return $query -> row();
    }

    public function get_by_name($usename){
        return $this -> db ->get_where('t_users',array('username' => $usename))->row();
    }
    public function save($email,$username,$password,$gender,$province,$city){
        $this -> db -> insert('t_users',array(
            'ACCOUNT' =>$email,
            'PASSWORD' =>$password,
            'NAME' =>$username,
            'GENDER' =>$gender,
            'PROVINCE' =>$province,
            'CITY' =>$city,
        ));
        return $this ->db ->affected_rows(); //受影响的行数
    }
}
