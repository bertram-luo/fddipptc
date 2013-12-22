<?php
	session_start();
	class Useradd extends CI_Controller{
		public function index(){
			if(isset($_SESSION['valid_username'])){
				$this->load->view('useradd');
			}
			else{$this->load->view('login_error');}
		}
	
		public function useradd_insert(){
	       if(isset($_SESSION['valid_username'])){
	       		$this->load->helper(array('form','url'));
	            $this->load->library('form_validation');
	            $this->form_validation->set_rules('username','用户名','required');
	            $this->form_validation->set_rules('password','Password','required|matches[password_conf]');
	            $this->form_validation->set_rules('password_conf','Password_conf','required');
	            
	            if($this->form_validation->run() == False){
	                $this->load->view('useradd');
	            }else{
	                $password = $_POST['password'];
	                $username = $_POST['username'];
	
	                $this->load->database();            
	                #check for the existence of user typed username
	                $check_result =$this->db->query("select * from users where username='".$username."'");
	                if($check_result->num_rows() > 0){
	                    $this->db->close();
	                    $this->load->view('useradd',array('error'=>"您选择的用户名已存在,请重新输入"));
	                }else{
	                #insert the new user recored into database
	                    $query_string = "insert into users (username,password,times) values(\"$username\",sha1(\"$password\"),1)";
	                    $insert_result = $this->db->query($query_string);
	                    if($insert_result){
	                      $_DATA['username'] = $username;
	                      $this->load->view('useradd_success',$_DATA);
	                    }else{
	                        $this->load->view('useradd',array('error'=>"添加失败，请重新输入"));
	                    }
	                     $this->db->close();
	                }
	            }
	        }
	    }
	}
?>