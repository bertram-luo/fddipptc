<?php
	session_start();
	class Test extends CI_Controller{
		public function index(){
			$this->load->view('test2');
		}
	}
?>