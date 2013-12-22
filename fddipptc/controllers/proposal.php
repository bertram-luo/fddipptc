<?php
	session_start();
	class Proposal extends CI_Controller{
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
			$this->load->view('proposal');
		}
		public function insert(){

			$insertArr['title'] = $this->input->post('title',true);

			$keywords = $_POST['keywords'];
			$insertArr['keywords'] = implode('|', $keywords);

			$ref_locs = $_POST['ref_locs'];
			$insertArr['ref_locs'] = implode('|',$ref_locs);

			$gov_locs = $_POST['gov_locs'];
			$insertArr['gov_locs'] = implode('|', $gov_locs);

			$authors = $_POST['authors'];
			$insertArr['authors'] = implode('|', $authors);
			//最大的id
			$query_id ="select max(id) as id from proposal limit 1" ;
	        $result= $this->db->query($query_id);
	        $max_id = $result->row()->id + 1 ;
	        $uploads_dir = "/tmp/uploads/proposal/";
	        if(!is_dir($uploads_dir)){
	            system("mkdir -p {$uploads_dir}");
	        }
			$userfile = $_FILES['userfile'];
			//判断下文件格式
			if(!in_array($userfile['type'],array("application/msword","application/pdf"))){
				echo "对不起，文件格式错误！";
				exit;
			}
			//重命名文件名,windows和linux的文件目录格式不一样
			if($userfile['type']=="application/msword"){
				$end_name = ".doc";
			}else{
				$end_name = ".pdf";
			}
			$userfile["name"] = "大纲".str_pad($max_id,6,"0",STR_PAD_LEFT).'_'.$insertArr['title'].'_'.$_SESSION['valid_username'].$end_name;

			if (file_exists($uploads_dir . $userfile["name"])){
		      echo $userfile["name"] . " already exists. ";
		  	}else{
		      move_uploaded_file($userfile["tmp_name"],$uploads_dir.$userfile["name"]);
		    }
		    $insertArr['userfile'] = $uploads_dir.$userfile["name"];
	    	$insertArr['start'] = $this->input->post('start',true);
	    	$insertArr['end'] = $this->input->post('end',true);
	    	if(empty($insertArr['title']) || empty($insertArr['keywords']) || empty($userfile)){
	    		echo "您的输入有误！";
	    		exit;
	    	}
	    	
	    	$insertArr['p_id'] = str_pad($max_id,6,"0",STR_PAD_LEFT);
	    	$insertArr['add_user'] = $_SESSION['valid_username'];
        	$insertArr['add_time'] = time();
	    	$str = $this->db->insert('proposal', $insertArr);
        	if($str){
        		echo "恭喜你，输入成功！<a href='/index.php/report'>录入报告</a>";
        	}else{
        		echo "对不起，输入失败！";
        	}

		}
		public function add_proposal(){
			$id = intval($_GET['id']);
			if(empty($id)){
				echo "参数错误！";
				exit;
			}
			echo "hello";
		}
		
	}
	
?>