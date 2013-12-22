<?php
class Blog extends CI_Controller{
    public function index()
    {
      #echo "Hello World!";
      $data['title']="fddi document management system";
      $data['heading'] = "FDDI dms";
      $data['todo_list'] = array('clean house','call mom','run errands');
      $this->load->view('blogview',$data);
    }
    public function index2()
    {
      #echo "Hello World!";
      $data['title'] = "fddi document management system";
      $data['heading'] = "FDDI dms";
      $this->load->view('blogview',$data);
    }

    public function comments()
    {
      echo "look at this";
    }
    public function args($brand, $id)
    {
      echo $brand;
      echo $id;
    }
}
?>
