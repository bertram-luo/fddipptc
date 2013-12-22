<?php
    session_start();
class Login extends CI_Controller{
    public function index(){
        if(isset($_SESSION['valid_username']))
        {
            header("location:/index.php/backend");
        }else{ 
            $this->load->helper(array('url','form'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run() == FALSE){
                $data['inform'] = "请登录";
                $this->load->view('login',$data);
            }else{
                $username = $this->input->post('username',true);
                $password = $this->input->post('password',true);
                $this->load->database();
                $query_string = "select * from users where username = '".$username."' and password= '".sha1($password)."'";
                $result = $this->db->query($query_string);

                if($result->num_rows() > 0){
                    $row = $result->row();
                    $newtimes = $row->times + 1;
                    $update_string = "update users set(times=$newtimes) where username=$username";
                    $_SESSION['valid_username'] = $_REQUEST['username'];
                    $_SESSION['valid_userid'] = $result->row()->id;
                    $this->db->close();
                    header('Location:/index.php/backend');
                    die();
                }else{
                    $this->db->close();
                    $data['warning']= "用户名或密码错误";
                    $data['inform'] = "请重新登录";
                    $this->load->view('login',$data);
                }

            }
       }
    }
}

?>
