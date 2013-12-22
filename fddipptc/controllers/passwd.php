<?php
	session_start();
	class Passwd extends CI_Controller{
		public function index(){
			if(isset($_SESSION['valid_username'])){
				$this->load->view('passwd');
			}
		}
		public function passwd_update(){
			
		}
	}
?>