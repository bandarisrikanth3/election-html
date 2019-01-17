	</div>
		<style>
		.photo_para1{margin-top: 70px;   margin-left: -25px;}
		@media screen and (max-width:970px)
		{
			.photo_para1{margin-top: -30px;   margin-left: 0px;}
		}
</style>

<!-- sidebar -->	
<div class="col-md-4 col-sm-12 col-xs-12">

		<!-- Election Schedule -->			
	    <?php include('election_schedule_slider.php');?>
	       
		<!-- Star Candidates -->
		<?php 
	        if(isset($star_candidate) && !empty($star_candidate))
	        {
	    ?>
	    		<?php include('star_carousel.php');?>					
		 
		<?php  
			}
		?>

	
			<!-- Candidate Details -->
		<?php 
        	if(isset($candidate_details_side) && !empty($candidate_details_side))
        	{
        ?>
				<?php include('candidate_details.php');?>	
		<?php 
			} 
        ?>

			
	  
	</div>

