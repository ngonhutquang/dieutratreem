
<div class="">
  <div class=" content">
    <div class=" header">

      <h4 class="title title_add">Add News Page</h4>
    </div>
    <div class=" body">
    <div class="form-error">   <?php echo validation_errors(); ?> </div> 

      <form id="add_form" name='add_master_category' action='<?php echo admin_url();?>News/do_add_news' method='POST'>   
        <span id="error">   </span>

        <div class="form-group">
          <label for="title"></span>Title</label> 
         
          <input type="text" class="form-control" id="add_title"  name="title"  value=""  placeholder="Enter title">            
         
        </div>     

            <div class="form-group">
          <label for="name"></span>Description</label> 
        
          <input type="text" class="form-control" id="add_description"  name="description"   placeholder="Enter  Name">            
          <div class="form-error"> <?php echo form_error('description')?> </div>        </div>     
       
       

      



          <div class="form-group">
            <label for="name"></span>Status</label> 

            <select class="form-control" name="status" id="">
              <option value = "1"> Active</option>
              <option value = "0"> InActive</option>
            </select>
         <!--    <div class="form-error"> <?php echo form_error('name')?> </div>  -->
          </div>
          
          


           <div class="form-group">
            <label for="name"></span>Content</label> 
              <div class="form-error"> <?php echo form_error('content')?> </div> 
           <textarea name ="content" id="content">
                    
           </textarea>        
          
          </div>
          
        <button type="submit" class="btn btn-default btn-success btn-block" id="btnAdd" ></span>Add</button>
      </form>
    </div>


  </div>
</div>
</div>


<!-- <script>
  $("#content").html('<?=$variable->status?>');

</script> -->
 
<script> 
  tinymce.init({
    selector: 'textarea',
     mode : "textareas",
        theme : "advanced",
    height: 500,
    theme: 'modern',
    plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc autosave insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help emoticons ',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat |  contextmenu | colorpicker textpattern | imagetools',
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