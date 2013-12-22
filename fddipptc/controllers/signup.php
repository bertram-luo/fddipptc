<?php
    class Signup extends CI_Controller{
      function index(){
        $this->load->helper(array('form','url','date'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required|matches[passconf]');
        $this->form_validation->set_rules('passconf','Password Confirmation','required');
        $this->form_validation->set_rules('email','E-mail','required|valid_email');

        if($this->form_validation->run() == False){
            echo '<h1>form validation failed</h1>';
            $this->load->view('signup');
        }else{
            $this->load->view('signupsuccess');
        }
      }
    }
?>
