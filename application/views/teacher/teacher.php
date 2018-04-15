<<<<<<< HEAD

<?php  $this->load->view('admin/notification');  ?>
<style>
      .dissertation_list {

         margin-top: 50px;
      }
</style>
<div class="">
<div class=" content">
<div class=" header">
   <h4 class="title title_add">Thông Tin Giang Vien</h4>
</div>
<div class=" body">
  
      <div class="form-group">
         <label for="name"></span>Mã GV</label>
         <div> <span id="view_name_url"><?php echo $teacher->code ?></span> </div>
      </div>
      <div class="form-group">
         <label for="name"></span>Ho Ten:</label>           
         <div> <span id="view_name"> <?php echo $teacher->name ?></span> </div>
         <?php if ($dissertation!= null) { ?>
         <div class="form-group">
            <div class = "row dissertation_list">
               <div class="col-md-12"> 

               
               <table id="job_table" class="table table-striped table-bordered hover"  cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th style="display: none;">ID</th>
                        <th>STT</th>
                        <th>Tên</th>
                        <th style = "text-align: center;" width="18%">Hoạt động</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        if (isset($dissertation)) {
                        foreach ($dissertation as $key => $values) {  ?>
                     <tr>
                        <td style="display: none;"><?=$values->id?></td>
                        <td><?=++$key?></td>
                        <td><?=$values->title?></td>
                        <td style ="text-align: center;">
                           <a href="dfdfsdfsdfsdf"><span> <i class="fas fa-download"></i> </span></a>
                           <a href=""><span>  <i class="fas fa-tv"></i> </span></a>

                        </td>
                     </tr>
                     <?php } } }?>
                  </tbody>
               </table>
               </div>
 
   </div>
   </div>
   </div>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
=======
 
<?php  $this->load->view('admin/notification');  ?>




<div class="">

   

  <div class=" content">
    


    <div class=" header">

      <h4 class="title title_add">Thông Tin Giang Vien</h4>
    </div>
    <div class=" body">
     <div class="form-error">   <?php echo validation_errors(); ?> </div> 


    <!--  <?php pre ($teacher); ?> -->


<form name='add_master_category' action='<?php echo admin_url();?>teacher_manager/do_add_teacher' id="add_form" method='POST'  enctype="multipart/form-data" >   
  <span id="error">   </span>


  
    <form role="form">
              <div class="form-group">
                  <label for="name"></span>Mã GV</label>
                  <div> <span id="view_name_url"><?php echo $teacher->code ?></span> </div>
               </div>
               <div class="form-group">
                  <label for="name"></span>Ho Ten:</label>           
                  <div> <span id="view_name"> <?php echo $teacher->name ?></span> </div>     



                     <?php if ($dissertation!= null) { ?>
               <div class="form-group">
                  <div class = "row">
                   
                  <div class = "col-md-6">
                        <label for="name"></span>Danh Sach De Tai</label>
                        <div> 
                          <ul>
                             
                             <?php foreach ($dissertation as $key => $value) {
                               ?>
                                  <li><?php echo $value->title; ?></li>
                             <?php }  }?>
                             
                            
                          </ul>
                        </div>
                  </div>
                  </div>
                  
               </div>  
             
<!-- 
               <?php if ($dissertation!= null) { ?>
               <div class="form-group">
                  <div class = "row">
                    <div class="col-md-6">
                      <label for="name"></span>Tên đề tài</label>
                  <div> <span id="view_name_url"><a href=""><?php echo $dissertation->title ?></a> </span> </div>
                </div>
                  <div class = "col-md-6">
                        <label for="name"></span>Giáo viên hướng dẫn</label>
                        <div> 
                          <ul>
                             
                             <?php foreach ($teacher as $key => $value) {
                               ?>
                                  <li><?php echo $value->name; ?></li>
                             <?php }  }?>
                             
                            
                          </ul>
                        </div>
                  </div>
                  </div>
                  
               </div> -->
             <!--   <div class="form-group">
                  <label for="code"></span>Description</label>
                  <textarea name="">
                    NGuyễn Văn A
                  </textarea>    
               </div> -->
              

  
</form>



  
  <button type="submit" class="btn btn-default btn-success btn-block" id="btnAdd" ></span>Thêm</button>
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
>>>>>>> 702aaf6fd34cf96f5ffd1f4767b337e106637866
