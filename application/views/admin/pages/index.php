<?php $this->load->view('admin/pages/header')?>
<body>

	<div class="wrapper">
		<?php 


   if ($this->session->userdata('student_data')!= null) {  
     
 
  	    $this->load->view('admin/pages/student_slidebar');
  } elseif ($this->session->userdata('teacher_data')!= null) {
  		$this->load->view('admin/pages/teacher_slidebar');
  } elseif ($this->session->userdata('admin_data')!= null){
  	$this->load->view('admin/pages/slidebar');
  }
 

		 ?>
		
		<div class="main-panel">
			<?php $this->load->view('admin/pages/navbar') ?>

			<div class="content">
				<div class="container-fluid main-content">  
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo admin_url('job');?>">Admin</a>
						</li>
						<li class="breadcrumb-item active"><?php $bred = $this->uri->segment(2); echo $bred ?></li>
						<?php if ($this->uri->segment(3))  { ?> 

							<li class="breadcrumb-item active">
						<?php echo $this->uri->segment(3) ?></li>

					<?php } ?>
					</ol>     
					
					<?php   

					if (isset($variable))
					{
						$this->load->view($content,$variable); 
					} else {
						$this->load->view($content); 
					}
					

					?>

				</div>
			</div>               
			

			<?php //$this->load->view('admin/pages/footer') ?>
		</div>
		<?php if (isset($result)) echo  $result; ?> 
	</div>
</body> 

</html>
