<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_Manager extends MY_Controller {


  public function __construct (){
    parent::__construct();    
 
    // $this->validation_category();
   
    $this->load->model('student_Model') ; 

    
 if ($this->session->userdata('admin_data')== null) {
      
     
 
       redirect(base_url()."Authorization/login");
  }

  }


  // public function validation_category () {
  //   $this->form_validation->set_rules('name', '', 'required');
    

  // }

  public function index (){
    $datas = $this->student_Model->get_list();

    $variables = array('datas'=>$datas);       
    $content = "admin/student_manager/student";   

    $data = array ('content'=>$content,'variable'=>$variables);     

    $this->load->view ('admin/pages/index',$data);

    
  }


  public function get_one_student(){
    $id =  $this->input->post('id');
    redirect(base_url().'/Client/submit_vacancy');

    $arraystudent = array();
    
    $arraystudent[0]= $this->Product_Model->get_info($id);

    $datas = $arraystudent;
    $variables = array('datas'=>$datas);       
    $content = "admin/student/student";      

    $data = array ('content'=>$content,'variable'=>$variables);      
    return $this->load->view ('admin/pages/index',$data);

      
  }

   // public function set_status()
   //  {
   //      $result = '';
   //      $value  = $this->input->post('id');
   //      $value  = $this->input->post();

   //      $id = $value['id'];
   //      unset($value['id']);

   //      if ($this->Product_Model->update($id, $value)) {
   //          //  $result = '<script> alert ("Update student success");
   //          //  window.location.href ="'.base_url().'admin/student";
   //          //  </script>';
   //          //  $content = "admin/student/student";
   //          // $data = array ('content'=>$content,'result'=>$result);
   //          //  return $this->load->view ('admin/pages/index',$data);
   //      }

   //  }



/*
  public function add_student () {
        $this->load->model('Country_Model');       

        $country = $this->Country_Model->get_list();        

    $content = "admin/student/add_student";
    $data = array ('content'=>$content,'country'=>$country);
    return $this->load->view ('admin/pages/index',$data);
  }
*/

  public function do_add_student () {
   $result = '';

   $value = $this->input->post();
     $result = '<script> 
                      //$(".loadersmall").show(); 

              $(".notification_add").show();        


              window.setTimeout(function() {
                $(".notification_add").fadeOut("slow");
              }, 3000);  

         </script>';
   $value['status'] = 1;

   if ($this->student_Model->create($value)) {        
        $content = "admin/student_manager/student";
        $this->session->set_userdata('notification_data',$result);
         redirect(admin_url().'student_Manager/add_student');
        

   }








}


          public function get_student_by_id (){

            $value = array ('action','id');     
            $data = $this->get_post_data($value);     
            $product_id = $this->input->post('id');
            $result =  array();
            if ($data['action'] == "view") {
             $result['student'] = $this->Product_Model->get_info($data['data']['id']);    

             $position = $this->db->select('*')->where('product',$product_id)->get('product_media')->result_array();   


             if ($position) {         
              $result['position']= $position[0];
            } 

          }
          echo json_encode($result);

        }

        public function editing_student () {
          $cv_source = $_SERVER['DOCUMENT_ROOT'].'/public/Upload/position_description/';
          $result = ''; 
          $value = $this->input->post();           
          $id = $value['id'];
          unset($value['id']);  

          if ($this->student_Model->update($id,$value)){
              $result = '<script> 
                      //$(".loadersmall").show(); 

              $(".notification_update").show();        


              window.setTimeout(function() {
                $(".notification_update").fadeOut("slow");
              }, 3000);  

                    //  window.location.href="'.base_url().'admin/student/"; </script>';
            $content = "admin/student_manager/student";
            $this->session->set_userdata('notification_data',$result);
            redirect(admin_url().'student_Manager');



          }
          
          


              




        


          }

          public function edit_student (){


            $id = $this->input->post('id');

          
            $student = $this->student_Model->get_info($id);







            $content = "admin/student_manager/edit_student";


            $data = array ('content'=>$content,'variable'=>$student);




            return $this->load->view ('admin/pages/index',$data);


          }

            public function view_student_detail (){


            $id = $this->input->post('id');

          
            $student = $this->student_Model->get_info($id);



            



            $content = "admin/student_manager/student_detail";


            $data = array ('content'=>$content,'variable'=>$student);




            return $this->load->view ('admin/pages/index',$data);


          }





          public function delete_student () {
         
            if ($this->input->post('id')) {
              $student_id = $this->input->post('id');
              
              if ($this->student_Model->delete($student_id)){             

              $result = '<script> 
                      

              $(".notification_delete").show();        


              window.setTimeout(function() {
                $(".notification_delete").fadeOut("slow");
              }, 3000);  

               </script>';
               
               // $this->session->set_userdata('notification_data',$result);

               // pre ($result);

               // redirect(admin_url().'student_Manager');

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

          public function add_student () {
          
          

            $variables = array();       

            $content = "admin/student_manager/add_student";

            $data = array ('content'=>$content);      


            return $this->load->view ('admin/pages/index',$data);

          }


          public function set_status () {

            $result = ''; 
            $value = $this->input->post('id');           
            $value = $this->input->post();           

            $id = $value['id'];
            unset($value['id']);         

            if ($this->student_Model->update($id,$value)) {
                  
            }

          }



          public function student_detail ($id){

            $datas = array();
            $datas[0] = $this->Product_Model->get_info($id);     
            if (!empty($datas[0])) {

              $variables = array('datas'=>$datas);       
              $content = "admin/student/student";      

              $data = array ('content'=>$content,'variable'=>$variables);      
              return $this->load->view ('admin/pages/index',$data);
            }else echo "Null";   


          }

        }

        ?>