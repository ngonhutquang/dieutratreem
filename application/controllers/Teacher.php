<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher extends MY_Controller {


  public function __construct (){
    parent::__construct();    
    $this->load->model('Teacher_Model');
   if ($this->session->userdata('teacher_data')== null) {
        redirect(base_url()."Authorization/login");
     }   
  }

  public function index (){
    $this->load->model ('Dissertation_Model');
    $this->load->model ('Teacher_Model');
  	$teacher_id = $this->session->userdata('teacher_data')->id;
  	$teacher = $this->Teacher_Model->get_info($teacher_id);

    $dissertation_arr = null;



    $list_diss = $this->db->select('dissertation_id')->group_by('teacher_id')->get('teacher_manager_student');
   foreach ($list_diss->result() as $row)
    {
       $diss = $this->Dissertation_Model->get_info($row->dissertation_id);
       $dissertation_arr[] =  $diss;
        
    }





       
    $content = "teacher/teacher";   

    $data = array ('content'=>$content,'teacher'=>$teacher,'dissertation'=>$dissertation_arr);     

    $this->load->view ('admin/pages/index',$data);

    
  }


          


              




        

            public function view_teacer_detail (){


            $id = $this->input->post('id');

          
            $Student = $this->Student_Model->get_info($id);



            



            $content = "admin/Student_manager/Student_detail";


            $data = array ('content'=>$content,'variable'=>$Student);




            return $this->load->view ('admin/pages/index',$data);


          }







          public function set_status () {

            $result = ''; 
            $value = $this->input->post('id');           
            $value = $this->input->post();           

            $id = $value['id'];
            unset($value['id']);         

            if ($this->Student_Model->update($id,$value)) {
                  
            }

          }



        }

        ?>