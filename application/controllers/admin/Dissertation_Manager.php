<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dissertation_Manager extends MY_Controller {


  public function __construct (){
    parent::__construct();    

  // $this->validation_category();

    $this->load->model('Dissertation_Model') ; 
    $this->load->model('Student_Model');
    $this->load->model ('Teacher_Model');

 if ($this->session->userdata('admin_data')== null) {
      
     
 
       redirect(base_url()."Authorization/login");
  }

  }


// public function validation_category () {
//   $this->form_validation->set_rules('name', '', 'required');


// }

  public function index (){
    $datas = $this->Dissertation_Model->get_list();

    $variables = array('datas'=>$datas);       
    $content = "admin/dissertation_manager/dissertation";   

    $data = array ('content'=>$content,'variable'=>$variables);     

    $this->load->view ('admin/pages/index',$data);


  }


  public function get_one_dissertation(){
    $id =  $this->input->post('id');
    redirect(base_url().'/Client/submit_vacancy');

    $arraydissertation = array();

    $arraydissertation[0]= $this->Product_Model->get_info($id);

    $datas = $arraydissertation;
    $variables = array('datas'=>$datas);       
    $content = "admin/dissertation/dissertation";      

    $data = array ('content'=>$content,'variable'=>$variables);      
    return $this->load->view ('admin/pages/index',$data);


  }

  public function do_add_dissertation () {
    $this->load->model('Teacher_Manager_Student_Model');
    $result = '';


    $title = $this->input->post('title'); 
    $dissertation_code = $this->input->post('dissertation_code');

     $type = $this->input->post('type');

    $student_list = $this->input->post('student_code'); 
    $teacher_list = $this->input->post('teacher_code');
    $student = json_encode($student_list);
    $teacher = json_encode($teacher_list);
    $media_file = 0;

    $value  = array('title' => $title , 'student' =>$student ,'type'=>$type,'teacher'=>$teacher,'dissertation_code'=>$dissertation_code,'status' =>   0,'media_file'=>$media_file);

    if ($this->Dissertation_Model->create($value)) {
      $dissertation_id =  $this->db->insert_id();

      foreach ($teacher_list as $key => $teacher) {             
        foreach ($student_list as $key => $student) {
          $this->Teacher_Manager_Student_Model->create(array('teacher_id'=>$teacher,'student_id'=>$student,'dissertation_id'=>$dissertation_id));            
          $this->Student_Model->update($student,array('dissertation_id'=>$dissertation_id));            
        }
      }
       $result = '<script> 
                      //$(".loadersmall").show(); 

              $(".notification_update").show();        


              window.setTimeout(function() {
                $(".notification_update").fadeOut("slow");
              }, 3000);  

                    //  window.location.href="'.base_url().'admin/student/"; </script>';
            $content = "admin/student_manager/student";
            $this->session->set_userdata('notification_data',$result);
            redirect(admin_url().'Dissertation_Manager/add_dissertation');

            
    } else {
      echo "That bai";
    }

 //   $result = '<script> 
 //                    //$(".loadersmall").show(); 

 //            $(".notification_add").show();        


 //            window.setTimeout(function() {
 //              $(".notification_add").fadeOut("slow");
 //            }, 3000);  

 //       </script>';
 // $value['status'] = 1;

 // if ($this->Dissertation_Model->create($value)) {        
 //      $content = "admin/dissertation_manager/dissertation";
 //      $this->session->set_userdata('notification_data',$result);
 //       redirect(admin_url().'dissertation_Manager/add_dissertation');


 // }

  }


  public function get_dissertation_by_id (){

    $value = array ('action','id');     
    $data = $this->get_post_data($value);     
    $product_id = $this->input->post('id');
    $result =  array();
    if ($data['action'] == "view") {
     $result['dissertation'] = $this->Product_Model->get_info($data['data']['id']);    

     $position = $this->db->select('*')->where('product',$product_id)->get('product_media')->result_array();   


     if ($position) {         
      $result['position']= $position[0];
    } 

  }
  echo json_encode($result);

}

public function editing_dissertation () {

  $this->load->model('Teacher_Manager_Student_Model');
    $result = '';

    $id = $this->input->post('id');

    $title = $this->input->post('title'); 

    $type = $this->input->post('type'); 

    $dissertation_code = $this->input->post('code');
    $student_list = $this->input->post('student_code'); 
    $teacher_list = $this->input->post('teacher_code');
    $student = json_encode($student_list);
    $teacher = json_encode($teacher_list);

    $can_update_tcmanager = $this->Teacher_Manager_Student_Model->update_rule(array('dissertation_id'=>$id),array('status'=>-1));
  

    $value  = array('title' => $title ,'type'=>$type, 'student' =>$student , 'teacher'=>$teacher,'dissertation_code'=>$dissertation_code );

    
    $student_old = $this->Student_Model->get_list(array('dissertation_id'=>$id));

    foreach ($student_old as $key => $st) {
          $this->Student_Model->update($st->id,array('dissertation_id'=>0));
    } 
    // pre ($student_old);    

    if ($this->Dissertation_Model->update($id,$value)) {
      $this->Teacher_Manager_Student_Model->del_rule(array('dissertation_id'=>$id));
    
      foreach ($teacher_list as $key => $teacher) {             
        foreach ($student_list as $key => $student) {
          $this->Teacher_Manager_Student_Model->create(array('teacher_id'=>$teacher,'student_id'=>$student,'dissertation_id'=>$id));            
          $this->Student_Model->update($student,array('dissertation_id'=>$id));            
        }
      }
    }  else {
      echo "That bai";
    }
}

public function edit_dissertation (){


 $id = $this->input->post('id');


  $dissertation = $this->Dissertation_Model->get_info($id);

  $teacher_list = json_decode($dissertation->teacher);
  $student_list = json_decode($dissertation->student);
  $teacher_arr  = array(); 
  $student_arr  = array();

  foreach ($teacher_list as $key => $value) {
   $teacher = $this->Teacher_Model->get_info($value);
   $teacher_arr[] = $teacher;
 }
 foreach ($student_list as $key => $value) {
   $student = $this->Student_Model->get_info($value);
   $student_arr[] = $student;
 }

 






  $content = "admin/dissertation_manager/edit_dissertation";



 $data = array ('content'=>$content,'variable'=>$dissertation,'teacher_list'=>$teacher_arr,'student_list'=>$student_arr);


   
 



 



  return $this->load->view ('admin/pages/index',$data);


}

public function view_dissertation_detail (){
  $id = $this->input->post('id');
  


  $dissertation = $this->Dissertation_Model->get_info($id);

  $teacher_list = json_decode($dissertation->teacher);
  $student_list = json_decode($dissertation->student);
  $teacher_arr  = array(); 
  $student_arr  = array();

  foreach ($teacher_list as $key => $value) {
   $teacher = $this->Teacher_Model->get_info($value);
   $teacher_arr[] = $teacher;
 }
 foreach ($student_list as $key => $value) {
   $student = $this->Student_Model->get_info($value);
   $student_arr[] = $student;
 }

 $content = "admin/dissertation_manager/dissertation_detail";


 $data = array ('content'=>$content,'variable'=>$dissertation,'teacher_list'=>$teacher_arr,'student_list'=>$student_arr);




 return $this->load->view ('admin/pages/index',$data);


}





public function delete_dissertation () {

  if ($this->input->post('id')) {
    $dissertation_id = $this->input->post('id');

    if ($this->Dissertation_Model->delete($dissertation_id)){             

      $result = '<script> 


      $(".notification_delete").show();        


      window.setTimeout(function() {
        $(".notification_delete").fadeOut("slow");
      }, 3000);  

      </script>';

             // $this->session->set_userdata('notification_data',$result);

             // pre ($result);

             // redirect(admin_url().'dissertation_Manager');

      echo $result;


    }


  }


}


public function get_parent_by_master () {
  $id = $this->input->post('id');
  $join_parent =  $this->db->select('parent_category.id, parent_category.name');
  $this->db->from('parent_category');
  $this->db->where('master_category', $id);
  $this->db->join('master_category', 'parent_category.master_category = master_category.id');
  $query = $this->db->get()->result_array();

  echo json_encode($query);


}


public function get_category_by_parent () {
  $id = $this->input->post('id');
  $join_parent =  $this->db->select('category.id, category.name');
  $this->db->from('category');
  $this->db->where('parent_category', $id);
  $this->db->join('parent_category', 'category.parent_category = parent_category.id');
  $query = $this->db->get()->result_array();

  echo json_encode($query);


}


public function category_attribute () {
  $id = $this->input->post('id');       

  $join_parent =  $this->db->select('attribute.id, attribute.name');
  $this->db->distinct();
  $this->db->from('attribute');                  
  $this->db->join('category_attribute_mapping', 'category_attribute_mapping.attribute = attribute.id');
  $this->db->join('category', 'category_attribute_mapping.category = category.id');
  $this->db->where('category_attribute_mapping.category', $id);
  $query = $this->db->get()->result_array();

  echo json_encode($query);


}

public function add_dissertation () {



  $variables = array();       

  $content = "admin/dissertation_manager/add_dissertation";

  $data = array ('content'=>$content);      


  return $this->load->view ('admin/pages/index',$data);

}


public function set_status () {

  $result = ''; 
  $value = $this->input->post('id');           
  $value = $this->input->post();           

  $id = $value['id'];
  unset($value['id']);         

  if ($this->Dissertation_Model->update($id,$value)) {

  }

}





        //Lấy sinh viên dựa vào mã số 

public function get_student_by_code (){
  $this->load->model('Student_Model');        

  $student_code = $this->input->post('student_code');
  $student = $this->Student_Model->get_info_rule(array('code'=>$student_code));   

  if ($student) {
    echo json_encode($student);
  }  else {
    echo "false";
  }





}


      //Lấy sinh viên dựa vào mã số 

public function get_teacher_by_code (){
  $this->load->model('Teacher_Model');        

  $teacher_code = $this->input->post('teacher_code');
  $teacher = $this->Teacher_Model->get_info_rule(array('code'=>$teacher_code));   

  if ($teacher) {
    echo json_encode($teacher);
  }  else {
    echo "false";
  }





}

}

?>