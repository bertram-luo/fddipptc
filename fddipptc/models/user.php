<?php
class user extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_user_info($username,$passwd){
        //$sql = "select * from users where username = '".$username."' and password= '".sha1($password)."'";
        $sql = "select * from users";
        $data = $this->db->query($sql);
        print_r($data);
        return $data;
    }
    

}
?>