<!--Model add country -->

<!-- Modal -->

<div class="content-detail">
   <div class=" content_dissertation">
      
      <div class=" header">
         <h4 class="title title_add">Thông Tin Luận Văn, Tiểu Luận</h4>
      </div>
      <div class="body">
         <div class>
            <div class="form-error">  <?php //echo validation_errors(); ?> </div>
            <?php if (isset ($variable)) { ?>
            <form role="form">
               <div class="form-group">
                  <label for="name"></span>Mã đề tài:</label>           
                  <div <span id="view_name"> <?php echo $variable->dissertation_code ?> </span> </div>       
               </div>
                 <div class="form-group">
                  <label for="name"></span>Tên đề tài:</label>           
                  <div <span id="view_name"> <?php echo $variable->title ?> </span> </div>       
               </div>
              
                 <div class="form-group">
                  <label for="name"></span>Sinh viên thực hiện:</label>           
                  <ul>
                    <?php foreach ($student_list as $key => $sd) {
                    ?>
                        <li><?php echo $sd->name ?></li>
                   <?php } ?>
                  </ul>    
               </div>
                 <div class="form-group">
                  <label for="name"></span>Giáo viên hướng dẫn:</label>           
                  <ul>
                    <?php foreach ($teacher_list as $key => $tc) {
                    ?>
                        <li><?php echo $tc->name ?></li>
                   <?php } ?>
                  </ul>    
               </div>
                
               
              
             
         <?php } ?>
    <div class="come-back">
      
     
    <a id = "back_link" href="#"><i style="font-size: 40px;" class="  fa fa-arrow-circle-left"></i></a>
   </div>

   </div>
</div>
</div>
<script type="text/javascript">
  var refer = document.referrer;
  $("#back_link").attr('href',refer);
</script>