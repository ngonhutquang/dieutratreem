<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher_Manager extends MY_Controller {


  public function __construct (){
    parent::__construct();    
 
    // $this->validation_category();
   
    $this->load->model('Teacher_Model') ; 

  if ($this->session->userdata('admin_data')== null) {
      
     
 
       redirect(base_url()."Authorization/login");
  }
 


  }


  // public function validation_category () {
  //   $this->form_validation->set_rules('name', '', 'required');
    

  // }

  public function index (){
    $datas = $this->Teacher_Model->get_list();

    $variables = array('datas'=>$datas);       
    $content = "admin/teacher_manager/teacher";   

    $data = array ('content'=>$content,'variable'=>$variables);     

    $this->load->view ('admin/pages/index',$data);

    
  }


  public function get_one_teacher(){
    $id =  $this->input->post('id');
    redirect(base_url().'/Client/submit_vacancy');

    $arrayteacher = array();
    
    $arrayteacher[0]= $this->Product_Model->get_info($id);

    $datas = $arrayteacher;
    $variables = array('datas'=>$datas);       
    $content = "admin/teacher/teacher";      

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
   //          //  $result = '<script> alert ("Update teacher success");
   //          //  window.location.href ="'.base_url().'admin/teacher";
   //          //  </script>';
   //          //  $content = "admin/teacher/teacher";
   //          // $data = array ('content'=>$content,'result'=>$result);
   //          //  return $this->load->view ('admin/pages/index',$data);
   //      }

   //  }



/*
  public function add_teacher () {
        $this->load->model('Country_Model');       

        $country = $this->Country_Model->get_list();        

    $content = "admin/teacher/add_teacher";
    $data = array ('content'=>$content,'country'=>$country);
    return $this->load->view ('admin/pages/index',$data);
  }
*/

  public function do_add_teacher () {
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

   if ($this->Teacher_Model->create($value)) {        
        $content = "admin/teacher_manager/teacher";
        $this->session->set_userdata('notification_data',$result);
         redirect(admin_url().'Teacher_Manager/add_teacher');
        

   }








}


          public function get_teacher_by_id (){

            $value = array ('action','id');     
            $data = $this->get_post_data($value);     
            $product_id = $this->input->post('id');
            $result =  array();
            if ($data['action'] == "view") {
             $result['teacher'] = $this->Product_Model->get_info($data['data']['id']);    

             $position = $this->db->select('*')->where('product',$product_id)->get('product_media')->result_array();   


             if ($position) {         
              $result['position']= $position[0];
            } 

          }
          echo json_encode($result);

        }

        public function editing_teacher () {
          $cv_source = $_SERVER['DOCUMENT_ROOT'].'/public/Upload/position_description/';
          $result = ''; 
          $value = $this->input->post();           
          $id = $value['id'];
          unset($value['id']);  

          if ($this->Teacher_Model->update($id,$value)){
              $result = '<script> 
                      //$(".loadersmall").show(); 

              $(".notification_update").show();        


              window.setTimeout(function() {
                $(".notification_update").fadeOut("slow");
              }, 3000);  

                    //  window.location.href="'.base_url().'admin/teacher/"; </script>';
            $content = "admin/teacher_manager/teacher";
            $this->session->set_userdata('notification_data',$result);
            redirect(admin_url().'Teacher_Manager');



          }
          
          


              




        


          }

          public function edit_teacher (){


            $id = $this->input->post('id');

          
            $teacher = $this->Teacher_Model->get_info($id);







            $content = "admin/teacher_manager/edit_teacher";


            $data = array ('content'=>$content,'variable'=>$teacher);




            return $this->load->view ('admin/pages/index',$data);


          }

            public function view_teacher_detail (){


            $id = $this->input->post('id');

          
            $teacher = $this->Teacher_Model->get_info($id);



            



            $content = "admin/teacher_manager/teacher_detail";


            $data = array ('content'=>$content,'variable'=>$teacher);




            return $this->load->view ('admin/pages/index',$data);


          }





          public function delete_teacher () {
         
            if ($this->input->post('id')) {
              $teacher_id = $this->input->post('id');
              
              if ($this->Teacher_Model->delete($teacher_id)){             

              $result = '<script> 
                      

              $(".notification_delete").show();        


              window.setTimeout(function() {
                $(".notification_delete").fadeOut("slow");
              }, 3000);  

               </script>';
               
               // $this->session->set_userdata('notification_data',$result);

               // pre ($result);

               // redirect(admin_url().'Teacher_Manager');

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

          public function add_teacher () {
          
          

            $variables = array();       

            $content = "admin/teacher_manager/add_teacher";

            $data = array ('content'=>$content);      


            return $this->load->view ('admin/pages/index',$data);

          }


          public function set_status () {

            $result = ''; 
            $value = $this->input->post('id');           
            $value = $this->input->post();           

            $id = $value['id'];
            unset($value['id']);         

            if ($this->Teacher_Model->update($id,$value)) {
                  
            }

          }



          public function teacher_detail ($id){

            $datas = array();
            $datas[0] = $this->Product_Model->get_info($id);     
            if (!empty($datas[0])) {

              $variables = array('datas'=>$datas);       
              $content = "admin/teacher/teacher";      

              $data = array ('content'=>$content,'variable'=>$variables);      
              return $this->load->view ('admin/pages/index',$data);
            }else echo "Null";   


          }

        }

        ?>