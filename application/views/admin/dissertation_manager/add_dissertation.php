 
<?php  $this->load->view('admin/notification');  ?>

<style type="text/css">
    .cbStudent {
        display: block;
    }
     .cbTeacher {
        display: block;
    }
</style>


<div class="">

   

  <div class=" content">
    


    <div class=" header">

      <h4 class="title title_add">Thêm Luận Văn, Tiểu Luận</h4>
    </div>
    <div class=" body">
     <div class="form-error">   <?php echo validation_errors(); ?> </div> 





<form name='add_master_category' action='<?php echo admin_url();?>Dissertation_Manager/do_add_dissertation' id="add_form" method='POST'  enctype="multipart/form-data" >   
  <span id="error">   </span>

    <div class="form-group">
    <label for="name"></span>Mã đề tài</label> 

    <input type="text" class="form-control" id="dissertation_code"  name="dissertation_code"   placeholder="Enter Dissertation Code">            
    <div class="form-error"> <?php echo form_error('title')?> </div> 
  </div>


  <div class="form-group">
    <label for="name"></span>Tên đề tài</label> 

    <input type="text" class="form-control" id="dissertation_title"  name="title"  value="<?php echo set_value('title'); ?>"  placeholder="Enter Dissertation Name">            
    <div class="form-error"> <?php echo form_error('title')?> </div> 
  </div>


  <div class="form-group">
    <label for="name"></span>Loai</label> 
    <select name="type" id="type">
      <option value="1">Luan Van</option>
      <option value="2">Tieu luan</option>
    </select>
 
  </div>

  <div class="form-group">

    <label for="name"></span>Sinh viên</label> 
    <div class="row">
       <div class="col-md-6">
        <input type="text" class="form-control" id="student_code"  name="student_code"  placeholder="Nhập mã số sinh viên">

    </div >

    <div class="col-md-6">
       <input type="button" class ="add_student_list" value = "Thêm">

   </div>  


</div>

<div class = "student_list" >      
    

</div>


</div>
        
      
   
  </div>


  <!-- Add GV -->

  <div class="form-group">

    <label for="name"></span>Giảng Viên</label> 
    <div class="row">
       <div class="col-md-6">
        <input type="text" class="form-control" id="teacher_code"  name="teacher_code"  placeholder="Nhập mã số sinh viên">

    </div >

    <div class="col-md-6">
       <input type="button" class ="add_teacher_list" value = "Thêm">

   </div>  


</div>

<div class = "teacher_list" >      
    

</div>

<!-- <input type="button" class ="test_get_value" value = "Get Value"> -->
</div>
        
      
   
  </div>




  
  <button type="button" class="btn btn-default btn-success btn-block test_get_value" id="addDissertation" ></span>Thêm</button>
</form>
</div>


</div>
</div>
</div>





  <script type="text/javascript">

    $( document ).ready(function() {

          var canUpLoadDescription = true;
      $( "input[name='attach_position_description'").change (function(){
        var fileExtension = ['jpeg', 'jpg', 'png','pdf','csv','doc','docx','ppt', 'pptx'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {     
            $(".result_upload_file").addClass('form-error')
            $(".result_upload_file").html("Only formats are allowed : "+fileExtension.join(', '));
            canUpLoadDescription =false;
        }else {
            canUpLoadDescription = true;
            $(".result_upload_file").html("");
        }
            CheckUpload();
      })

     
       function CheckUpload () {
          if (canUpLoadDescription){
            $(".btn-success.btn-block").removeAttr('disabled');
           
            
         } else {
            $(".btn-success.btn-block").attr( 'disabled', true)
         }
    }
       
});    
 
  </script>
<script> 
  tinymce.init({
    selector: '#description',
     mode : "textareas",
        theme : "advanced",
    height: 400,
    theme: 'modern',
    plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    image_advtab: true,
    templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
  });

</script>