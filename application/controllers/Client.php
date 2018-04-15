<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Xu ly controller
        $controller = $this->uri->segment(1);
        $controller = strtolower($controller);
        $this->load->helper(array(
            'form',
            'url'
        ));
        // load form_validation library
        $this->load->library('form_validation');
        $this->load->library('csvimport');
      
        $this->load->model ('News_Model');

        $this->load->model ('Static_Pages_Model');
        $this->load->model ('Dissertation_Model');
        $this->load->model ('Teacher_Model');
        $this->load->model ('Student_Model');

        $this->load->helper(array(
            'form',
            'url'
        ));
    }
    public function validation_category()
    {
        $this->form_validation->set_rules('name', '', 'required');
        $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('description');
        $this->form_validation->set_rules('contact_email', '', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('title', '', 'required');
        $this->form_validation->set_rules('contact_phone', '', 'required');
    }

    public function get_config(){    

        $meta_title  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta-title'));
        $meta_keyword  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta-keyword'));
        $meta_description  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta-description'));
        $admin_username  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'admin_username'));
        $admin_password  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'admin_password'));
        $smtp_username  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_username'));
        $smtp_password  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_password'));
        $contact_email  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'contact_email'));
        // $code_change_pass  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'code_change_pass'));
        // $date_change_pass  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'date_change_pass'));
        // $code_login  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'code_login'));

        $configArr = array('meta_title' => $meta_title,'meta_keyword'=>$meta_keyword, 'meta_description'=>$meta_description, 'admin_username'=>$admin_username, 'admin_password'=>$admin_password );

        return $configArr;


    }


    public function index()

    {  $content_value  = $this->Static_Pages_Model->get_list(array('where'=>array('name_url'=>'trangchu')));
    $content = "user/home";   

    $data = array ('content'=>$content,'content_value'=>$content_value);     

    $this->load->view ('user/master_page',$data);





    }


        public function introduce()
    {

    $content_value  = $this->Static_Pages_Model->get_list(array('where'=>array('name_url'=>'gioithieu')));
    $content = "user/introduce";   

    $data = array ('content'=>$content,'content_value'=>$content_value);     

    $this->load->view ('user/master_page',$data);


    }



    public function view_dissertation_detail (){


  $id = $this->input->get('id');


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




        public function dissertation_lv()
    {

    $this->load->library('pagination');
       
        // load URL helper
       $this->load->helper('url');

       $this->load->database();
      
       
        // init params
       $params = array();
       $limit_per_page = 5;
       $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
       $total_records = $this->Dissertation_Model->get_total(array ('where'=> array('type' =>  1 )));

       
       if ($total_records > 0)
       {
            // get current page records
        $params["results"] = $this->Dissertation_Model->get_current_page_records_where($limit_per_page, $page*$limit_per_page,array('type'=>1));
        
        $config['base_url'] = base_url() . 'lv/';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 2;
        
            // custom paging configuration
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<span class="firstlink">';
        $config['first_tag_close'] = '</span>';
        
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<span class="lastlink">';
        $config['last_tag_close'] = '</span>';
        
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<span class="nextlink">';
        $config['next_tag_close'] = '</span>';
        
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<span class="prevlink">';
        $config['prev_tag_close'] = '</span>';
        
        $config['cur_tag_open'] = '<span class="curlink">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = '<span class="numlink">';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
            // build paging links
        $params["links"] = $this->pagination->create_links();
    }

    $page_content              = 'user/dissertation_lv';
   
    $data = array('content' => $page_content,'links'=>$params["links"],'results'=>$params['results'] 
);


    $this->load->view('user/master_page', $data);



    }


          public function dissertation_tl()
    {
 $this->load->library('pagination');
       
        // load URL helper
       $this->load->helper('url');

       $this->load->database();
      
       
        // init params
       $params = array();
       $limit_per_page = 5;
       $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
       $total_records = $this->Dissertation_Model->get_total(array ('where'=> array('type' =>  2 )));

       
       if ($total_records > 0)
       {
            // get current page records
        $params["results"] = $this->Dissertation_Model->get_current_page_records_where($limit_per_page, $page*$limit_per_page,array('type'=>2));
        
        $config['base_url'] = base_url() . 'tl/';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 2;
        
            // custom paging configuration
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<span class="firstlink">';
        $config['first_tag_close'] = '</span>';
        
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<span class="lastlink">';
        $config['last_tag_close'] = '</span>';
        
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<span class="nextlink">';
        $config['next_tag_close'] = '</span>';
        
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<span class="prevlink">';
        $config['prev_tag_close'] = '</span>';
        
        $config['cur_tag_open'] = '<span class="curlink">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = '<span class="numlink">';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
            // build paging links
        $params["links"] = $this->pagination->create_links();
    }

        $page_content     = 'user/dissertation_tl';
   
    $data = array('content' => $page_content,'links'=>$params["links"],'results'=>$params['results'] 
);


    $this->load->view('user/master_page', $data);



    }


        public function news( $page = 1 )
    {

    $this->load->model('News_Model');
    

    $this->load->library('pagination');
       
        // load URL helper
       $this->load->helper('url');

       $this->load->database();
      
       
        // init params
       $params = array();
       $limit_per_page = 5;
       $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
       $total_records = $this->News_Model->get_total(array ('where'=> array('status' =>  1 )));

       
       if ($total_records > 0)
       {
            // get current page records
        $params["results"] = $this->News_Model->get_current_page_records_where($limit_per_page, $page*$limit_per_page,array('status'=>1));
        
        $config['base_url'] = base_url() . 'news/';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 2;
        
            // custom paging configuration
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<span class="firstlink">';
        $config['first_tag_close'] = '</span>';
        
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<span class="lastlink">';
        $config['last_tag_close'] = '</span>';
        
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<span class="nextlink">';
        $config['next_tag_close'] = '</span>';
        
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<span class="prevlink">';
        $config['prev_tag_close'] = '</span>';
        
        $config['cur_tag_open'] = '<span class="curlink">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = '<span class="numlink">';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
            // build paging links
        $params["links"] = $this->pagination->create_links();
    }

    $page_content              = 'user/news';
   
    $data = array('content' => $page_content,'links'=>$params["links"],'results'=>$params['results'] 
);


    $this->load->view('user/master_page', $data);

       }




public function  dissertation_detail ($id){


 


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



 



        $content = 'user/dissertation_detail';

       $data = array ('content'=>$content,'variable'=>$dissertation,'teacher_list'=>$teacher_arr,'student_list'=>$student_arr);

       
        $this->load->view('user/master_page',$data);



}


 

    public function site_map()
    {
        $page_content              = array();
        $page_content['page_path'] = 'customer/site_map';
        $page_content['data']      = '';
        $data                      = array(
            'page_content' => $page_content
        );
        $this->load->view('customer/main_page', $data);
    }


   

public function get_news_detail ($id) {

    $news_detail = $this->News_Model->get_info($id);

        // pre($news_detail);

        $content = 'user/news_detail';

        $data = array ('content' => $content,'news_detail'=>$news_detail);
       
        $this->load->view('user/master_page',$data);


    // $this->load->view('customer/main_page', $data);

}


public function success_page()
{
    $page_content              = array();
    $page_content['page_path'] = 'customer/submit_success';
    $page_content['data']      = '';
    $data                      = array(
        'page_content' => $page_content
    );
    $this->load->view('customer/main_page', $data);

}


public function do_add_cv()
{
    $cv_id = '';
    $result = '';
    $this->form_validation->set_rules('name', '', 'required');
    $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('contact_number');
    $this->form_validation->set_rules('classification');
    $this->form_validation->set_rules('location');
    $this->form_validation->set_rules('comments');
    if ($this->form_validation->run() == FALSE) {
        $page_content              = array();
        $page_content['page_path'] = 'customer/submit_resume';
        $page_content['data']      = 'long';
        $data                      = array(
            'page_content' => $page_content
        );
        $this->load->view('customer/main_page', $data);
    } else {
        $value = $this->input->post();
        if ($this->CV_Model->create($value)) {
            $cv_id = $this->db->insert_id();
            $result                    = '<script> window.location.href="' . base_url() . 'thank-you";  </script>';
            $page_content              = array();
            $page_content['page_path'] = 'customer/submit_resume';
            $page_content['result']    = $result;
            $page_content['data']      = '';
            $data                      = array(
                'page_content' => $page_content
            );
            $this->load->view('customer/main_page', $data);
        }
        if (isset($_FILES['attach_resume']['name'])&&$_FILES['attach_resume']['name'] != '') {
            $config['upload_path']   = upload_file('cv');
            $config['allowed_types'] = 'pdf|jpg|docx|doc|pdf|ppt|pptx';
            $config['max_size']      = '2048';

                /*$exten = get_mime_by_extension($_FILES['attach_resume']['name']);
                print_r($exten);*/
                

                $cv_media_id = $this->Cv_Media_Model->next_id();
                $cv_file_name = clean_string($cv_media_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['attach_resume']['name']);

                $cv_media = $this->Cv_Media_Model->create(array("cv"=>$cv_id,"source_url"=> $cv_file_name,"notes"=>"attach_resume"));

                $file_id = $this->db->insert_id();

                $config['file_name'] = clean_string($file_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['attach_resume']['name']);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                if (!$this->upload->do_upload('attach_resume')) {
                    $error                     = array(
                        'error_attach' => $this->upload->display_errors()
                    );
                    $page_content              = array();
                    $page_content['page_path'] = 'customer/submit_resume';
                    $page_content['data']      = '';
                    $page_content['error']     = $error;
                    $data                      = array(
                        'page_content' => $page_content
                    );
                    $this->load->view('customer/main_page', $data);
                } else {


                    $dataUpload                = array(
                        'upload_data' => $this->upload->data()
                    );
                    $page_content              = array();
                    $page_content['page_path'] = 'customer/submit_resume';
                    $page_content['data']      = $dataUpload;
                    $data                      = array(
                        'page_content' => $page_content
                    );
                    $this->load->view('customer/main_page', $data);
                }
            }
            if (isset($_FILES['cover_letter']['name']) &&$_FILES['cover_letter']['name'] != '' ) {
                $config['upload_path']   = upload_file('cv');
                $config['allowed_types'] = 'jpg|docx|doc|pdf|ppt|pptx';
                $config['max_size']      = '2048';



                $cv_media_id = $this->Cv_Media_Model->next_id();
                $cv_file_name = clean_string($cv_media_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['cover_letter']['name']);

                $cv_media = $this->Cv_Media_Model->create(array("cv"=>$cv_id,"source_url"=> $cv_file_name,"notes"=>"cover_letter"));

                $file_id = $this->db->insert_id();

                $config['file_name'] = clean_string($file_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['cover_letter']['name']);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);



                if (!$this->upload->do_upload('cover_letter')) {
                    $error                     = array(
                        'error_letter' => $this->upload->display_errors()
                    );
                    $page_content              = array();
                    $page_content['page_path'] = 'customer/submit_resume';
                    $page_content['data']      = '';
                    $page_content['error']     = $error;
                    $data                      = array(
                        'page_content' => $page_content
                    );
                    $this->load->view('customer/main_page', $data);
                } else {
                    $data                      = array(
                        'upload_data' => $this->upload->data()
                    );
                    $page_content              = array();
                    $page_content['page_path'] = 'customer/submit_resume';
                    $page_content['data']      = '';
                    $data                      = array(
                        'page_content' => $page_content
                    );
                    $this->load->view('customer/main_page', $data);
                }
            }
        }
    }
    public function do_add_job()
    {
        $result = '';
        $this->form_validation->set_rules('name', '', 'required');
        $this->form_validation->set_rules('description');
        $this->form_validation->set_rules('contact_email', '', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('title', '', 'required');
        $this->form_validation->set_rules('contact_phone', '', 'required');
        if ($this->form_validation->run() == FALSE) {
            $page_content              = array();
            $page_content['page_path'] = 'customer/submit_job';
            $page_content['data']      = '';
            $data                      = array(
                'page_content' => $page_content
            );
            $this->load->view('customer/main_page', $data);
        } else {
         $product_media_id ='';
         $product_file_name ='';
         $product_id = '';
         $job_detail                      = array();
         $title = $this->input->post('title');
         $job_detail['name']             = $title;
         $job_detail['description']       = $this->input->post('description');
         $job_detail['location']          = $this->input->post('location');
         $job_detail['meta_title']  = $title;
         $job_detail['meta_keyword']  = $title;
         $job_detail['meta_description']  = $this->input->post('description');
         $job_detail['country']  = $this->input->post('country');
         $job_detail['location']  = $this->input->post('location');
         $job_detail['type']  = $this->input->post('type');
         $job_detail['city']= 0;


         $job_detail['datetime']          = date('Y-m-d H:i:s');
         $contact_detail                  = array();
         $contact_detail['name']          = $this->input->post('name');
         $contact_detail['contact_email'] = $this->input->post('contact_email');
         $contact_detail['contact_phone'] = $this->input->post('contact_phone');
            //Check Supplier Email is exists?
         if ($this->Supplier_Model->check_exists(array(
            'contact_email' => $contact_detail['contact_email']
        ))) {
            $supplier   = $this->Supplier_Model->get_info_rule(array(
                'contact_email' => $contact_detail['contact_email']
            ));
            $job_detail['supplier'] = $supplier->id;
            $result_Job             = $this->Product_Model->create($job_detail);
            $product_id = $this->db->insert_id();
              // Check exists file upload and config
            if (isset($_FILES['attach_position_description']['name'])&&$_FILES['attach_position_description']['name']!= null) {
                $config['upload_path']   = upload_file('position_description');
                $config['allowed_types'] = 'jpeg|jpg|png|gif|bmp|pdf|docx|doc|ppt|pptx|csv|mp4|3gp|mkv';
                $config['max_size']      = '4444';
                $product_media_id = $this->Product_Media_Model->next_id();
                $product_file_name =clean_string($product_media_id."_".$product_id."_".date('Y-m-d')."_".$_FILES['attach_position_description']['name']);
                $product_media = $this->Product_Media_Model->create(array("product"=>$product_id,"source_url"=>$product_file_name,"notes"=>"attach_position_description"));
                $file_id = $this->db->insert_id();
                $config['file_name'] = clean_string($file_id."_".$product_id."_".date('Y-m-d')."_".$_FILES['attach_position_description']['name']);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                    //  do upload
                if (!$this->upload->do_upload('attach_position_description')) {
                  $error                     = array(
                    'error_attach' => $this->upload->display_errors()
                );
                  $page_content              = array();
                  $page_content['page_path'] = 'customer/submit_job';
                  $page_content['data']      = '';
                  $page_content['error']     = $error;
                  $data                      = array(
                    'page_content' => $page_content
                );
                  $this->load->view('customer/main_page', $data);
              } else {
                $data                      = array(
                    'upload_data' => $this->upload->data()
                );
                $page_content              = array();

                $page_content['page_path'] = 'customer/submit_job';
                $result        = '<script> window.location.href="' . base_url() . 'thank-you";  </script>';
                $page_content['data']      = '';
                $page_content['result']    = $result;
                $data                      = array(
                    'page_content' => $page_content
                );
                $this->load->view('customer/main_page', $data);
                } //End do upload
            } 
                }  // None Exists Supplier  
                else {
                    $result_supplier        = $this->Supplier_Model->create($contact_detail);
                    $last_supplier          = $this->db->insert_id();
                    $job_detail['supplier'] = $last_supplier;
                    $result_Job             = $this->Product_Model->create($job_detail);
                    $product_id = $this->db->insert_id();
                    //Check file upload
                    // Check exists file upload and config
                    if (isset($_FILES['attach_position_description']['name'])&&$_FILES['attach_position_description']['name']!= null) {
                        $config['upload_path']   = upload_file('position_description');
                        $config['allowed_types'] = 'csv|pdf';
                        $config['max_size']      = '2048';
                        $product_media_id = $this->Product_Media_Model->next_id();
                        $product_file_name = clean_string($product_media_id."_".$product_id."_".date('Y-m-d')."_".$_FILES['attach_position_description']['name']);
                        $product_media = $this->Product_Media_Model->create(array("product"=>$product_id,"source_url"=>$product_file_name,"notes"=>"attach_position_description"));
                        $file_id = $this->db->insert_id();
                        $config['file_name'] = clean_string($file_id."_".$product_id."_".date('Y-m-d')."_".$_FILES['attach_position_description']['name']);
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                    //  do upload
                        if (!$this->upload->do_upload('attach_position_description')) {
                          $error                     = array(
                            'error_attach' => $this->upload->display_errors()
                        );
                          $page_content              = array();
                          $page_content['page_path'] = 'customer/submit_job';
                          $page_content['data']      = '';
                          $page_content['error']     = $error;
                          $data                      = array(
                            'page_content' => $page_content
                        );
                          $this->load->view('customer/main_page', $data);
                      } else {
                        $data                      = array(
                            'upload_data' => $this->upload->data()
                        );
                        $page_content              = array();
                        $page_content['page_path'] = 'customer/submit_job';
                        $page_content['data']      = '';
                        $data                      = array(
                            'page_content' => $page_content
                        );
                        $this->load->view('customer/main_page', $data);
                      } //End do upload
            } //end check has upload file
            if ($result_Job && $result_supplier) {
                $error                     = array(
                    'error_attach' => $this->upload->display_errors()
                );
                $result        = '<script> window.location.href="' . base_url() . 'thank-you";  </script>';
                $page_content              = array();
                $page_content['page_path'] = 'customer/submit_job';
                $page_content['result']    = $result;
                $page_content['data']      = '';
                $data                      = array(
                    'page_content' => $page_content
                );
                $this->load->view('customer/main_page', $data);
            }


             
        }
           $result        = '<script> window.location.href="' . base_url() . 'thank-you";  </script>';
                $page_content              = array();
                $page_content['page_path'] = 'customer/submit_job';
                $page_content['result']    = $result;
                $page_content['data']      = '';
                $data                      = array(
                    'page_content' => $page_content
                );
                $this->load->view('customer/main_page', $data);

    }

}



public function do_add_prefer()
{
   $cv_id = '';
   $result = '';
   $this->form_validation->set_rules('name', '', 'required');
   $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[users.email]');
   $this->form_validation->set_rules('contact_number');
   $this->form_validation->set_rules('classification');
   $this->form_validation->set_rules('location');
   $this->form_validation->set_rules('comments');
   if ($this->form_validation->run() == FALSE) {
    $page_content              = array();
    $page_content['page_path'] = 'customer/refer_a_friend';
    $page_content['data']      = 'long';
    $data                      = array(
        'page_content' => $page_content
    );
    $this->load->view('customer/main_page', $data);
} else {
    $value = $this->input->post();
    if ($this->CV_Model->create($value)) {
        $cv_id = $this->db->insert_id();
        $result                    = '<script>  window.location.href="' . base_url() . 'thank-you"; </script>';
        $page_content              = array();
        $page_content['page_path'] = 'customer/refer_a_friend';
        $page_content['result']    = $result;
        $page_content['data']      = '';
        $data                      = array(
            'page_content' => $page_content
        );
        $this->load->view('customer/main_page', $data);
    }
    if (isset($_FILES['attach_resume']['name'])&&$_FILES['attach_resume']['name'] != '') {
        $config['upload_path']   = upload_file('cv');
        $config['allowed_types'] = 'jpeg|jpg|png|gif|bmp|pdf|docx|pptx|ppt|doc| csv|mp4|3gp|mkv';
        $config['max_size']      = '2048';

                /*$exten = get_mime_by_extension($_FILES['attach_resume']['name']);
                print_r($exten);*/
                

                $cv_media_id = $this->Cv_Media_Model->next_id();
                $cv_file_name = clean_string($cv_media_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['attach_resume']['name']);

                $cv_media = $this->Cv_Media_Model->create(array("cv"=>$cv_id,"source_url"=> $cv_file_name,"notes"=>"attach_resume"));

                $file_id = $this->db->insert_id();

                $config['file_name'] = clean_string($file_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['attach_resume']['name']);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                if (!$this->upload->do_upload('attach_resume')) {
                    $error                     = array(
                        'error_attach' => $this->upload->display_errors()
                    );
                    $page_content              = array();
                    $page_content['page_path'] = 'customer/refer_a_friend';
                    $page_content['data']      = '';
                    $page_content['error']     = $error;
                    $data                      = array(
                        'page_content' => $page_content
                    );
                    $this->load->view('customer/main_page', $data);
                } else {


                    $dataUpload                = array(
                        'upload_data' => $this->upload->data()
                    );
                    $page_content              = array();
                    $page_content['page_path'] = 'customer/refer_a_friend';
                    $page_content['data']      = $dataUpload;
                    $data                      = array(
                        'page_content' => $page_content
                    );
                    $this->load->view('customer/main_page', $data);
                }
            }
            if (isset($_FILES['cover_letter']['name']) &&$_FILES['cover_letter']['name'] != '' ) {
                $config['upload_path']   = upload_file('cv');
                $config['allowed_types'] = 'jpeg|jpg|png|gif|bmp|pdf|pdf|jpg|docx|doc|pdf|ppt|pptx|csv|mp4|3gp|mkv';
                $config['max_size']      = '2048';



                $cv_media_id = $this->Cv_Media_Model->next_id();
                $cv_file_name = clean_string($cv_media_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['cover_letter']['name']);

                $cv_media = $this->Cv_Media_Model->create(array("cv"=>$cv_id,"source_url"=> $cv_file_name,"notes"=>"cover_letter"));

                $file_id = $this->db->insert_id();

                $config['file_name'] = clean_string($file_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['cover_letter']['name']);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);



                if (!$this->upload->do_upload('cover_letter')) {
                    $error                     = array(
                        'error_letter' => $this->upload->display_errors()
                    );
                    $page_content              = array();
                    $page_content['page_path'] = 'customer/refer_a_friend';
                    $page_content['data']      = '';
                    $page_content['error']     = $error;
                    $data                      = array(
                        'page_content' => $page_content
                    );
                    $this->load->view('customer/main_page', $data);
                } else {
                    $data                      = array(
                        'upload_data' => $this->upload->data()
                    );
                    $page_content              = array();
                    $page_content['page_path'] = 'customer/refer_a_friend';
                    $page_content['data']      = $dataUpload;
                    $data                      = array(
                        'page_content' => $page_content
                    );
                    $this->load->view('customer/main_page', $data);
                }
            }
        }
    }





    public function get_id_cv () {
        echo $this->Product_Model->next_id();
    }


    public function check_upload_file () {
  //   $this->load->helper(array(
  //       'form',
  //       'url'
  //   ));
  //   $this->form_validation->set_rules('name', '', 'required');
  //   $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[users.email]');
  //   $this->form_validation->set_rules('contact_number');
  //   $this->form_validation->set_rules('classification');
  //   $this->form_validation->set_rules('location');
  //   $this->form_validation->set_rules('comments');

  //   if ($this->form_validation->run() == FALSE) {
  //       pre(validation_errors());
  //       echo form_error('email');


  //       // $page_content              = array();
  //       // $page_content['page_path'] = 'customer/refer_a_friend';
  //       // $page_content['data']      = 'long';
  //       // $data                      = array(
  //       //     'page_content' => $page_content
  //       // );
  //       // $this->load->view('customer/main_page', $data);
  //   } else {

  // }

      if ($_FILES['attach_resume']['name']!=null)
      {
         $this->load->library('upload');
         $config['upload_path']   = './public/Upload/test';
         $config['allowed_types'] = 'jpeg|jpg|png|gif|bmp|pdf|csv|mp4|3gp|mkv';
         $config['max_size']      = '1020';
         $config['file_name'] = clean_string(date('Y-m-d')."_".$_FILES['attach_resume']['name']);
         $this->load->library('upload', $config);
         $this->upload->initialize($config);

         echo "Status";
           //$status = $this->upload->do_upload('attach_resume');


         pre($this->upload->data());


         $loi =  $this->upload->display_errors();

         $exten = get_mime_by_extension($_FILES['attach_resume']['name']);
         print_r($exten);
         pre($loi);
        //    if ($status) {
        //     echo "Thanh cong";

        // } else echo $loi;
     } else echo "Khong upload";      


 }



 public function contact () {
    $value = $this->input->post();
    $captcha  = $this->session->userdata('captcha')['word'];
    $captcha_input = $this->input->post('captcha');


    // echo $captcha.$captcha_input;

    
    $value['ip'] = $this->input->ip_address();
    $value['datetime'] = date('Y-m-d h:i:sa');
    $this->load->model('Contact_Model');
    $email = $this->input->post('email');
    $name = $this->input->post('name');
    $phone = $this->input->post('phone');
    $comment = $this->input->post('message');
    $name = $this->input->post('name');


    $this->form_validation->set_rules('name', '', 'required');
    $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('captcha', '', 'required');




    if ($this->form_validation->run() == FALSE) {
        $page_content              = array();
        $page_content['data'] = '';
        $page_content['page_path'] = 'customer/connect';
        $data = array('page_content' => $page_content
    );

        $this->load->view('customer/main_page', $data);

    } else {
       if ($captcha == $captcha_input) {

        unset($value['captcha']);
        $server_email = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_username'))->config_value;
        if ($server_email!=''){

            if ($this->Contact_Model->create($value))
            {            
                $page_content              = array();
                $page_content['page_path'] = 'customer/connect';

                $result = '<script> location.href ="'.base_url().'thank-you";</script>';
                $page_content['data'] = $result;
                $data = array('page_content' => $page_content
            );
                $this->send_email($email,array('userName'=>$name));

                $this->send_infor(array('name'=>$name,'email'=>$email,'phone'=>$phone,'comment'=>$comment));
            //$this->load->view ('customer/main_page', $data);
                redirect(base_url().'thank-you');
            }
        } else {
            $page_content              = array();
            $page_content['page_path'] = 'customer/connect';

            $result = 'Mail server has not config';
            $page_content['data'] = $result;
            $data = array('page_content' => $page_content,'result'=>$result);
            $this->load->view ('customer/main_page', $data);
        }





    }  
    //Captcha false
    else {

        $page_content              = array();
        $page_content['data'] = '';
        $page_content['page_path'] = 'customer/connect';
        $data = array('page_content' => $page_content,'captcha_error'=>'Captcha error! Please input again!'
    );

        $this->load->view('customer/main_page', $data);

    }

} 





}


public function send_email ($admin_email,$body_data){
    $this->load->model("Site_Config_Model");
    $smtp_host = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_url'))->config_value;
    $smtp_username = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_username'))->config_value;
    $smtp_password = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_password'))->config_value;
             //$email = $this->input->post('email');
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => $smtp_host,
        'smtp_port' => 587,
        'smtp_user' => $smtp_username,
        'smtp_pass' => $smtp_password,
        'smtp_crypto' => 'tls', 
        'mailtype'  => 'html', 
        'charset' => 'utf-8',
        'wordwrap' => TRUE
    );            
            /* 
            *
            * Send email with #temp_pass as a link
            *
            */

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($smtp_username, "NLSTECH support");
            $this->email->to($admin_email);
            $this->email->subject("Contact NLSTECH");

            $body = $this->load->view('email/contact-template',$body_data ,TRUE);

            $this->email->message($body); 
           // $message = "<p>Your Account ************</p>";
            //$this->email->message($message);
            $result = $this->email->send();
            // return $result;
            pre ($result);
        }


        public function send_infor ($body_data){
            $this->load->model("Site_Config_Model");
            $smtp_host = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_url'))->config_value;
            $smtp_username = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_username'))->config_value;
            $smtp_password = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_password'))->config_value;
            $contact_email = $this->Site_Config_Model->get_info_rule(array('config_name'=>'contact_email'))->config_value;
             //$email = $this->input->post('email');
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => $smtp_host,
                'smtp_port' => 587,
                'smtp_user' => $smtp_username,
                'smtp_pass' => $smtp_password,
                'smtp_crypto' => 'tls', 
                'mailtype'  => 'html', 
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );            
            /* 
            *
            * Send email with #temp_pass as a link
            *
            */

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($smtp_username, "NLSTECH Contact Information");
            $this->email->to($contact_email);
            $this->email->subject("Contact NLSTECH");

            $body = $this->load->view('email/contact-infor',$body_data ,TRUE);

            $this->email->message($body); 
           // $message = "<p>Your Account ************</p>";
            //$this->email->message($message);
            $result = $this->email->send();
            // return $result;
            pre ($result);
        }



   // 
        public  function get_ars() 
        {
    // Load RSS Parser
            $this->load->library('rssparser');

    // Get 6 items from arstechnica
            $rss = $this->rssparser->set_feed_url('http://118.69.62.13/nlsearch/news')->set_cache_life(30)->getFeed(6);

    // foreach ($rss as $item)
    // {
    //     echo $item['title'];
    //     echo $item['description'];
    // }

            pre ($rss);
        }


 //   public function TestPage () {
 //    $data =$this->Blog_Model->get_current_page_records_where(10,10,"status = 2");

 // $total_records = $this->Blog_Model->get_total(array('where'=>array('status'=>2)));
 //    pre ($total_records);
 //   } 





  public function get_view_all_job () {

       $this->load->model('Product_Model');
       $results = $this->Product_Model->get_list();
       return print_r($results);
      
       

  }

    public function view_all_jobs ($page =1)
    {
       $this->load->library('pagination');
       
        // load URL helper
       $this->load->helper('url');

       $this->load->database();
       $this->load->model('Product_Model');
       
        // init params
       $params = array();
       $limit_per_page = 5;
       $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
       $total_records = $this->Product_Model->get_total();
       
       if ($total_records > 0)
       {
            // get current page records
        $params["results"] = $this->Product_Model->get_current_page_records($limit_per_page, $page*$limit_per_page);
        
        $config['base_url'] = base_url() . 'view-all-job/';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 2;
        
            // custom paging configuration
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<span class="firstlink">';
        $config['first_tag_close'] = '</span>';
        
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<span class="lastlink">';
        $config['last_tag_close'] = '</span>';
        
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<span class="nextlink">';
        $config['next_tag_close'] = '</span>';
        
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<span class="prevlink">';
        $config['prev_tag_close'] = '</span>';
        
        $config['cur_tag_open'] = '<span class="curlink">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = '<span class="numlink">';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
            // build paging links
        $params["links"] = $this->pagination->create_links();
    }

    $page_content              = array();
    $page_content['page_path'] = 'customer/view_all_jobs';
    $page_content['data']      = '';
    $data = array('page_content' => $page_content,'links'=>$params["links"],'results'=>$params['results'] 
);

    $this->load->view('customer/main_page', $data);


        // $page_content              = array();
        // $page_content['page_path'] = 'customer/news';
        // $page_content['data']      = '';
        // $data                      = array(
        //     'page_content' => $page_content,'news'=>$news
        // );
    
        // 
    
}

public function add_job_alert () {
   


         $value = $this->input->post();
         unset($value['country']);
  
         $this->load->model('Job_Alert');

        if ($this->Job_Alert->create($value)){
           
         $result        = '<script> window.location.href="' . base_url() . 'thank-you";  </script>';
                $page_content              = array();
                $page_content['page_path'] = 'customer/create_job_alert';
                $page_content['result']    = $result;
                $page_content['data']      = '';
                $data                      = array(
                    'page_content' => $page_content
                );
                $this->load->view('customer/main_page', $data);

        }


}

public function get_job_detail ($id) {

    $jobs_detail = $this->Product_Model->get_info($id);

        // pre($news_detail);

    $page_content              = array();
    $page_content['page_path'] = 'customer/job_detail';
    $page_content['data']      = '';
    $data                      = array(
        'page_content' => $page_content,'jobs_detail'=>$jobs_detail 
    );
    $this->load->view('customer/main_page', $data);

}


public function get_city () {
    $coutry_id = $this->input->post('countryId');
    $this->load->model('City_Model');
    $city_list = $this->City_Model->get_list(array('where'=>array('country'=>$coutry_id)));
    // pre ($city_list);
    echo json_encode($city_list);

       

}


        



    }