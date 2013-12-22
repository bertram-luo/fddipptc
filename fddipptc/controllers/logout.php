<?php
    session_start();
    class Logout extends CI_controller{
        function index(){
            $_SESSION = array();
            session_destroy();
            $data['inform'] =" 请登录";
            $this->load->view('login',$data);
        }
    }
?>
