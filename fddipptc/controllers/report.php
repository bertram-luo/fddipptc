<?php
	session_start();
	class Report extends CI_Controller{
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
			$username = $_SESSION['valid_username'];
			$query_id ="select * from proposal where add_user='".$username."' and state=1";
	        $query = $this->db->query($query_id);
	        $data['pro_list'] =  $query->result();
	        foreach ($data['pro_list'] as $key=>$row) {
	        	$query_id ="select * from report where state=1 and report_id = {$row->p_id}";
	        	$query = $this->db->query($query_id);
	        	$data['pro_list'][$key]->report = $query->row();
	        }
			$this->load->view('user',$data);
		}
		//增加报告页面
		public function add_report(){
			$p_id = intval($_GET['p_id']);
			if(empty($p_id)){
				echo "对不起，参数错误！";
				exit;
			}
			$query_id = "select * from proposal where state=1 and p_id = {$p_id} order by id DESC";
			$query = $this->db->query($query_id);
	        $this->data['pro_row'] =  $query->row();
	        if($query->row()->p_id){
	        	$this->load->view('report',$this->data);
	        }else{
	        	echo "输入有误！";
	        	exit;
	        }
		}

		//报告入库
		public function report_insert(){
			$insertArr['report_id'] = $this->input->post('report_id',true);
			if(empty($insertArr['report_id'])){
				echo "对不起，您输入有误！";
				exit;
			}
			$insertArr['title'] = $this->input->post('title',true);
			$keywords = $_POST['keywords'];
			$insertArr['keywords'] = implode('|', $keywords);
			$insertArr['ref_locs'] = $this->input->post('ref_locs',true);
			$gov_locs = $_POST['gov_locs'];
			$insertArr['gov_locs'] = implode('|', $gov_locs);
			$authors = $_POST['authors'];
			$insertArr['authors'] = implode('|', $authors);

			$uploads_dir = "/tmp/uploads/report/";
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
			$userfile["name"] = "报告".$insertArr['report_id'].'_'.$insertArr['title'].'_'.$_SESSION['valid_username'].$end_name;
			if (file_exists($uploads_dir . $userfile["name"])){
		      echo $userfile["name"] . " already exists. ";
		  	}
		    else{
		      move_uploaded_file($userfile["tmp_name"],$uploads_dir.$userfile["name"]);
		    }
		    $insertArr['userfile'] = $uploads_dir.$userfile["name"];
	    	$insertArr['start'] = $this->input->post('start',true);
	    	$insertArr['end'] = $this->input->post('end',true);
	    	if(empty($insertArr['keywords']) || empty($userfile)){
	    		echo "您的输入有误！";
	    		exit;
	    	}
	    	$insertArr['report_id'] = $insertArr['report_id'];
	    	$insertArr['add_user'] = $_SESSION['valid_username'];
        	$insertArr['add_time'] = time();
	    	$str = $this->db->insert('report', $insertArr);
        	if($str){
        		echo "恭喜你，输入成功！";
        	}else{
        		echo "对不起，输入失败！";
        	}

		}

	}
?>