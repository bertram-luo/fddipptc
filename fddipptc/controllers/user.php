<?php
    session_start();
    class User extends CI_Controller{
        public function index(){
            if(isset($_SESSION['valid_username'])){
                $this->load->view('user');
            }
        }   
    }
?>