<?php
session_start();
class Reference extends CI_Controller{
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
        if($_SESSION['session_reference_1_key']){
            $insertArr = $_SESSION['session_reference_1_key']['insert'];
            $first_author = explode(":", $insertArr['first_author']);
            $insertArr['all_name'] = $first_author[0];
            $insertArr['short_name'] = $first_author[1];
        }
        $this->load->view('reference_s1',$insertArr);
    }
    public function reference_1(){

    	$insertArr['reference_type'] = $this->input->post('reference_type',true);
        #length check
        $all_name = $this->input->post('all_name',true);
        $short_name = strtoupper($this->input->post('short_name',true));
        if(empty($all_name) || empty($short_name) ||(strtoupper(urlencode($short_name))!=$short_name)){
            echo "请输入正确的作者全名和简称";
            exit;
        }
        $insertArr['first_author'] = $all_name.":".$short_name;
    	$insertArr['publish_date'] = $this->input->post('publish_date',true);
    	$insertArr['title'] = $this->input->post('title',true);
        $insertArr['add_user'] = $_SESSION['valid_username'];
        $insertArr['add_time'] = time();
        //判断文献类型
        if(!in_array($insertArr['reference_type'],array("B","C","G","J","N","S","T"))){
            echo "文献类型错误！";
            exit;
        }
        //检查时间输入是否正确
        if(empty($insertArr['publish_date'])){
            echo "请输入文献日期";
            exit;
        }
        list($year,$month,$day) = explode("-", $insertArr['publish_date']);
        if(!checkdate($month, $day, $year)){
            echo "对不起，您输入的日期不正确！";
            exit;
        }
        //选择数据库
        $tableName = "reference_".$insertArr['reference_type'];
        $query_id ="select max(id) as id from {$tableName} limit 1" ;
        $result= $this->db->query($query_id);
        $max_id = $result->row()->id + 1 ;
        //时间
        $publish_date_format = date("Ymd",strtotime($insertArr['publish_date']));
        //拼接文献id
        $_SESSION['m_id']= $insertArr['m_id'] = strtoupper($insertArr['reference_type']).str_pad($max_id,5,"0",STR_PAD_LEFT).$short_name.$publish_date_format.str_pad($_SESSION['valid_userid'],4,"0",STR_PAD_LEFT);
        //检测该文献是否存在
        $query_title ="select * from {$tableName} where title like '%".$insertArr['title']."%'" ;
        $query = $this->db->query($query_title);
        foreach ($query->result() as $row){
            $in_date = date("Ymd",strtotime($row->publish_date));
            if($row->add_user == $_SESSION['valid_username'] && $in_date == $insertArr['publish_date']){
                echo "对不起，您输入的资料已存在！";
                exit;
            }
        }
        $re['insert'] =  $insertArr;
        $re['tableName'] = $tableName;
        $_SESSION['session_reference_1_key'] = $re;
        if(isset($_SESSION['session_reference_2_key'])){
            $insertArr = $_SESSION['session_reference_2_key']['insert'];
            $insertArr['authorsArr'] = explode("|",$insertArr['authors']);
            $insertArr['gov_locArr'] = explode("|",$insertArr['gov_loc']);
            $insertArr['keywordsArr'] = explode("|",$insertArr['keywords']);
        } 
        $insertArr['m_id'] = $_SESSION['m_id'];
        $this->load->view('reference_s2',$insertArr);
    }
    public function reference_2(){
        $insertArr['m_id'] = $_SESSION['m_id'];
        $authors = $_POST['authors'];
        if(count($authors) < 1){
            echo "请输入正确的作者";
        }
        $insertArr['authors'] = implode('|', $authors);
        $insertArr['persons'] = $this->input->post('persons',true);
        $insertArr['ref_loc'] = $this->input->post('ref_loc',true);
        $gov_loc = $_POST['gov_loc'];
        $insertArr['gov_loc'] = implode('|', $gov_loc);
        $keywords = $_POST['keywords'];
        if(count($keywords) < 5){
            echo "关键词数量不能为空且不少于5个！";
            exit;
        }
        $insertArr['keywords'] = implode('|', $keywords);
        $insertArr['from_where'] = $this->input->post('from_where',true);
        $insertArr['from_write'] = $this->input->post('from_write',true);
        $insertArr['from_url'] = $this->input->post('from_url',true);
        $insertArr['add_user'] = $_SESSION['valid_username'];
        $insertArr['add_time'] = time();
        //需要用第一个的文献类型，来判断基层来源和摘取来源的类型
        $reference_1_arr = $_SESSION['session_reference_1_key'];
        if(in_array($reference_1_arr['insert']['reference_type'], array("B","C","G","J","T")) && empty($insertArr['from_where'])){
            echo "研究文献,书籍,政府文件,公司文件,统计年鉴的基层来源不能为空！";
            exit;
        }
        if(in_array($reference_1_arr['insert']['reference_type'], array("N")) && empty($insertArr['from_where'])){
            echo "新闻消息的摘取来源不允许为空！";
            exit;
        }
        $re['insert'] =  $insertArr;
        $re['tableName'] = "info";
        $_SESSION['session_reference_2_key'] = $re; 
        $this->load->view('reference_select',$insertArr);
    }
    public function reference_tip_1(){
        $insertArr['m_id'] = $_SESSION['m_id'];
        $insertArr['contents'] = $this->input->post('contents',true);
        //上传文件
        $uploads_dir = "/tmp/uploads/reference/";
        if(!is_dir($uploads_dir)){
            system("mkdir -p {$uploads_dir}");
        }
        $from_file = $_FILES['from_file'];
        //判断下文件格式
        if(!in_array($from_file['type'],array("application/msword","application/pdf"))){
            echo "对不起，文件格式错误！";
            exit;
        }
        //重命名文件名,windows和linux的文件目录格式不一样
        if($from_file['type']=="application/msword"){
            $end_name = ".doc";
        }else{
            $end_name = ".pdf";
        }
        $from_file["name"] = $insertArr['m_id'].'_'.$_SESSION['valid_username'].'_from_file_'.$end_name;
        if (file_exists($uploads_dir . $from_file["name"])){
          echo $from_file["name"] . " already exists. ";
        }
        else{
          move_uploaded_file($from_file["tmp_name"],$uploads_dir.$from_file["name"]);
        }
        $insertArr['from_file'] = $uploads_dir.$from_file["name"];
        $from_media = $_FILES['from_media'];
        //判断下文件格式
       /* if(!in_array($from_media['type'],array("application/msword","application/pdf"))){
            echo "对不起，文件格式错误！";
            exit;
        }
        //重命名文件名,windows和linux的文件目录格式不一样
        if($from_media['type']=="application/msword"){
            $end_name = ".doc";
        }else{
            $end_name = ".pdf";
        }
        $from_media["name"] = $insertArr['m_id'].'_'.$_SESSION['valid_username'].'_from_media_'.$end_name;
        */
        if (file_exists($uploads_dir . $from_media["name"])){
          echo $from_media["name"] . " already exists. ";
        }
        else{
          move_uploaded_file($from_media["tmp_name"],$uploads_dir.$from_media["name"]);
        }
        $insertArr['from_media'] = $uploads_dir.$from_media["name"];        
        //写入数据库
        $insertArr['add_user'] = $_SESSION['valid_username'];
        $insertArr['add_time'] = time();
        //将前两步的数据写入到数据库
        $re_1 = $_SESSION['session_reference_1_key'];
        $re_2 = $_SESSION['session_reference_2_key'];
        $str_1 = $this->db->insert($re_1['tableName'], $re_1['insert']);
        $str_2 = $this->db->insert($re_2['tableName'], $re_2['insert']);
        $str = $this->db->insert('reference_tip_1', $insertArr);
        if($str_1 && $str_2 && $str){
            unset($_SESSION['session_reference_1_key']);
            unset($_SESSION['session_reference_2_key']);
            unset($_SESSION['m_id']);
            echo "恭喜你，输入成功！<a hrer='/'>回到首页</a>";

        }else{
            echo "对不起，输入失败！";
        }
    }

    public function reference_tip_2(){
        $insertArr['m_id'] = $_SESSION['m_id'];
        $insertArr['directory'] = $this->input->post('directory',true);
        $insertArr['preface'] = $this->input->post('preface',true);
        $insertArr['comment'] = $this->input->post('comment',true);
        //上传文件
        $uploads_dir = "/tmp/uploads/reference/";
        if(!is_dir($uploads_dir)){
            system("mkdir -p {$uploads_dir}");
        }
        $from_file_directory = $_FILES['directory_attach'];
        //判断下文件格式
        if(!in_array($from_file_directory['type'],array("application/msword","application/pdf"))){
            echo "对不起，文件格式错误！";
            exit;
        }
        if (file_exists($uploads_dir . $from_file_directory["name"])){
          echo $from_file_directory["name"] . " already exists. ";
        }
        else{
          move_uploaded_file($from_file_directory["tmp_name"],$uploads_dir.$from_file_directory["name"]);
        }
        $insertArr['directory_attach'] = $uploads_dir.$from_file_directory["name"];

        $from_file_preface = $_FILES['preface_attach'];
        //判断下文件格式
        if(!in_array($from_file_preface['type'],array("application/msword","application/pdf"))){
            echo "对不起，文件格式错误！";
            exit;
        }
        if (file_exists($uploads_dir . $from_file_preface["name"])){
          echo $from_file_preface["name"] . " already exists. ";
        }
        else{
          move_uploaded_file($from_file_preface["tmp_name"],$uploads_dir.$from_file_preface["name"]);
        }
        $insertArr['preface_attach'] = $uploads_dir.$from_file_preface["name"]; 

        $from_file_comment = $_FILES['comment_attach'];
        //判断下文件格式
        if(!in_array($from_file_comment['type'],array("application/msword","application/pdf"))){
            echo "对不起，文件格式错误！";
            exit;
        }
        if (file_exists($uploads_dir . $from_file_comment["name"])){
          echo $from_file_comment["name"] . " already exists. ";
        }
        else{
          move_uploaded_file($from_file_comment["tmp_name"],$uploads_dir.$from_file_comment["name"]);
        }
        $insertArr['preface_comment'] = $uploads_dir.$from_file_comment["name"]; 
        //写入数据库
        $insertArr['add_user'] = $_SESSION['valid_username'];
        $insertArr['add_time'] = time();
        //将前两步的数据写入到数据库
        $re_1 = $_SESSION['session_reference_1_key'];
        $re_2 = $_SESSION['session_reference_2_key'];
        $str_1 = $this->db->insert($re_1['tableName'], $re_1['insert']);
        $str_2 = $this->db->insert($re_2['tableName'], $re_2['insert']);
        $str = $this->db->insert('reference_tip_1', $insertArr);
        if($str_1 && $str_2 && $str){
            unset($_SESSION['session_reference_1_key']);
            unset($_SESSION['session_reference_2_key']);
            unset($_SESSION['m_id']);
            echo "恭喜你，输入成功！<a hrer='/'>回到首页</a>";
        }else{
            echo "对不起，输入失败！";
        }
    }

    public function reference_tip_3(){
        $insertArr['m_id'] = $_SESSION['m_id'];
        $insertArr['contents'] = $this->input->post('contents',true);
        $messages = $_POST['messages'];
        $insertArr['messages'] = implode('|', $messages);
        $comments = $_POST['comments'];
        $insertArr['comments'] = implode('|', $comments);

        //上传文件
        $uploads_dir = "/tmp/uploads/reference/";
        if(!is_dir($uploads_dir)){
            system("mkdir -p {$uploads_dir}");
        }
        $from_file_photo = $_FILES['photo'];
        //判断下文件格式
        if(!in_array($from_file_photo['type'],array("application/msword","application/pdf"))){
            echo "对不起，文件格式错误！";
            exit;
        }
        if (file_exists($uploads_dir . $from_file_photo["name"])){
          echo $from_file_photo["name"] . " already exists. ";
        }
        else{
          move_uploaded_file($from_file_photo["tmp_name"],$uploads_dir.$from_file_photo["name"]);
        }
        $insertArr['photo'] = $uploads_dir.$from_file_photo["name"];

        //写入数据库
        $insertArr['add_user'] = $_SESSION['valid_username'];
        $insertArr['add_time'] = time();
        //将前两步的数据写入到数据库
        $re_1 = $_SESSION['session_reference_1_key'];
        $re_2 = $_SESSION['session_reference_2_key'];
        $str_1 = $this->db->insert($re_1['tableName'], $re_1['insert']);
        $str_2 = $this->db->insert($re_2['tableName'], $re_2['insert']);
        $str = $this->db->insert('reference_tip_1', $insertArr);
        if($str_1 && $str_2 && $str){
            unset($_SESSION['session_reference_1_key']);
            unset($_SESSION['session_reference_2_key']);
            unset($_SESSION['m_id']);
            echo "恭喜你，输入成功！<a hrer='/'>回到首页</a>";
        }else{
            echo "对不起，输入失败！";
        }
    }
    public function select_ref(){
        $data['m_id'] = $_SESSION['m_id'];
        $type = $_GET['type'];
        switch($type){
            case "tip_1":
                $this->load->view('reference_tip_1',$data);
                break;
            case "tip_2":
                $this->load->view('reference_tip_2',$data);
                break;
            case "tip_3":
                $this->load->view('reference_tip_3',$data);
                break;
        }
    }
}
?>