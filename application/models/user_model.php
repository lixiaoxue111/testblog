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
        return $this -> db ->get_where('t_user',array('username' => $usename))->row();
    }
}
