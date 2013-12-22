<?php
session_start();
class Backend extends CI_Controller{
    function index(){
      if(isset($_SESSION['valid_username']))
        $this->load->view('backend_welcome');
      else{
        $this->load->view('login_error');
      }
   }
}
?>
