<style>
	.pagination {
		
	}
</style>
<div class="ds-title">
	<h3>Danh Sách Đề Tài Tiểu Luận</h3>
</div>
<ul>
<?php 
	
	if (isset ($results)) { 

		foreach ($results as $key => $value) {
		?>
		

		
			
			
				<li>
					
                                    <h4 class="title"><a target="_blank" href="<?=base_url('chi-tiet-de-tai'.'/'. str_replace('+','-',urlencode(htmlspecialchars_decode($value->title))).'/'.$value->id)?>"><?php echo $value->title ?> </a>
                                    </h4>
				</li>
			

	<?php } } ?>

</ul>


<div>
	<?php echo $links; ?> 
</div>