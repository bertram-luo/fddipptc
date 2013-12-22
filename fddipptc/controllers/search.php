<?php
    session_start();
    class Search extends CI_Controller{
        function __construct(){
            parent::__construct();
            if(!isset($_SESSION['valid_username'])){
                $this->load->view('login_error');
            }else{
                $this->load->database();
                $uid = $_SESSION['valid_userid'];
            }
        }
        public function index(){
            $this->load->view('search');
        }
        
    }
    
?>