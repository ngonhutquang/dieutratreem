<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {

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
    $this->load->model('CV_Model');
    $this->load->model('Product_Model');
    $this->load->model('Supplier_Model');
    $this->load->library('upload');
    $this->load->model('Cv_Media_Model');
    $this->load->model('Product_Media_Model');

    $this->load->model('Site_Config_Model');
    $this->load->model('Blog_Model');

    $this->load->helper(array(
        'form',
        'url'
    ));
}


public function index () {
 $this->load->view('customer/css_url');
}



public function delete_file () {
    $cv_source = $_SERVER['DOCUMENT_ROOT'].'/nlsearch/public/Upload/cv/';
    $candidate_id = 84;
    $attach_resume = $this->db->select('*')->where(array('cv'=>$candidate_id,'notes'=>'attach_resume'))->get('cv_media')->result_array();

    $cover_letter = $this->db->select('*')->where(array('cv'=>$candidate_id,'notes'=>'cover_letter'))->get('cv_media')->result_array();


   if ($attach_resume) {         
       $resume_path= $attach_resume[0]['source_url'];    
       $file_path = $cv_source.$resume_path;
       echo  $file_path;  
       unlink($file_path);
   } 
   if ($cover_letter) {           
    $letter_path = $cover_letter[0]['source_url'];
    unlink($cv_source.$letter_path);
} 

}


  public function change () {
      return $this->load->view ('change_password');
  }


}

?>