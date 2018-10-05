<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model{
    public function get_articles_by_user($WRITER){
        /*return $this -> db ->get_where('t_blogs',array(
            'WRITER' => $WRITER,
        )) ->result();*/

         $this -> db -> select('t_blogs.*, t_blog_catalogs.NAME');
         $this -> db -> from('t_blogs');
         $this -> db -> join('t_blog_catalogs', 't_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID');
         $this -> db -> where('t_blogs.WRITER',$WRITER);
         return $this ->db -> get() ->result();
    }
    public function get_types_by_user($USER_ID){
        /*return $this -> db -> get_where('t_blog_catalogs',array(
            'USER_ID' => $USER_ID
        )) -> result();*/

        $sql = "select t_blog_catalogs.*, (select count(*) from t_blogs where t_blogs.CATALOG_ID = t_blog_catalogs.CATALOG_ID) BLOG_COUNT from t_blog_catalogs where t_blog_catalogs.USER_ID=$USER_ID";
        return $this -> db -> query($sql) -> result();
    }
}


