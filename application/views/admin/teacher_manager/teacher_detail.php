<!--Model add country -->

<!-- Modal -->

<div class="content-detail">
   <div class=" content">
      <div class=" header">
         <h4 class="title title_add">Thông Tin Giảng Viên</h4>
      </div>
      <div class=" body">
         <div class>
            <div class="form-error">  <?php //echo validation_errors(); ?> </div>
            <?php if (isset ($variable)) { ?>
            <form role="form">
               <div class="form-group">
                  <label for="name"></span>Họ và Tên:</label>           
                  <div <span id="view_name"> <?php echo $variable->name ?> </span> </div>       
               </div>
                
               
              
             
         <?php } ?>
    <div class="come-back">
      
    
    <a  href="<?php echo admin_url('teacher-manager/') ?>"><i style="font-size: 40px;" class="  fa fa-arrow-circle-left"></i></a>
   </div>

   </div>
</div>
</div>
