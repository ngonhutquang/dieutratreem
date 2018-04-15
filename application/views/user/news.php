<style type="text/css">

</style>
<div class="row">
  <div class="col-md-8">
    <?php
     foreach ($results as $key => $value) { ?>

                         
                         
                                    <h2 class="title"><a target="_blank" href="<?=base_url('news'.'/'. str_replace('+','-',urlencode(htmlspecialchars_decode($value->title))).'/'.$value->id)?>"><?php echo $value->title ?> </a>
                                    </h2>

                                 
                                     <div class="description hidden-xs">
                                    <?php echo $value->description ?> 

                                    </div>
                                   
                                  
                     

                     

                      <?php          
                    }
                    ?>
 <nav>             

                       <?php 

                       echo $links ;
                       ?>


                     </nav>

             









  </div>
  <div class="col-md-4">
    dfdsjbfdjkb
  </div>
</div>





	