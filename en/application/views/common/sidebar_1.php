
	<!-- sidebar -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		
		<?php if( $block == 'schedule' || $block == 'ALL' ) { ?>
		<!-- Election Schedule -->
		
			<div class="col-md-12 col-sm-12 col-xs-12 ">
			
	            <legend>Assembly Election Schedule </legend>
	          <?php include('election_schedule_slider.php');?>

	           <div style="height:230px;text-align:center">
				 	<br>
				 	
				  <a  href="https://www.sakshi.com/elections-2018/en/telangana.html" target="_blank"><img src="/elections-2018/en/assets/images/tselectionlogo.jpg" width="100%" /></a>
				  <br>
				</div>
			</div>
			
		<?php } ?>

		<?php if( $block == 'star_candidate' || $block == 'ALL' ) { ?>
			<!-- Star Candidates -->
			<?php 
	        	if(isset($star_candidate) && !empty($star_candidate))
	          	{
	        ?>
					<div class="col-md-12 col-sm-12 col-xs-12 ">
					   <legend>నేతలు : తలరాతలు</legend>
					  <div id="starCarosuel" class="well carousel slide" data-ride="carousel" style="background-color:#e7e8f5 !important;">
					    <!-- Indicators -->
					    <!--
					    <ol class="carousel-indicators">
					    <?php /*for($i=0;$i<count($star_candidate);$i++)
					    		{
					    			if($i == 0)
					    			{
					    				echo '<li data-target="#starCarosuel" data-slide-to="'.$i.'" class="active"></li>';
					    			}
					    			else
					    			{
					    				echo '<li data-target="#starCarosuel" data-slide-to="'.$i.'"></li>';
					    			}
					    		} */
					    ?>
					    </ol>-->

					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">
					    <?php 
					    	$j=0;
					    	foreach($star_candidate as $row) 
					    	{ 
					    		if($j == 0)
					    		{
					    			echo '<div class="item active">
									        <div class="col-md-12 col-sm-12 col-xs-12">
					    						<div class="col-md-7 col-sm-12 col-xs-12" style="border:1px solid #ddd;padding:5px">
									        		<img src="'.base_url().$row['image'].'" alt="'.$row['engname'].'" style="width:100%;height:200px">
									        	</div>
									        	<div class="col-md-5 col-sm-12 col-xs-12 photo_para">
									        		<br>
									        		<br>
									        		<br>
									        		<p ><strong>'.$row['telname'].'</strong></p>
									        		<p ><strong>'.$row['telpartyname'].'</strong></p>
									        		<p ><strong>'.$row['telconstname'].'</strong></p>
									        	</div>
									        </div>
									      </div>';
					    		}
					    		else
					    		{
					    			echo '<div class="item  text-center">
					    					<div class="col-md-12 col-sm-12 col-xs-12">
					    						<div class="col-md-7 col-sm-12 col-xs-12" style="border:1px solid #ddd;padding:5px">
									        		<img src="'.base_url().$row['image'].'" alt="'.$row['engname'].'" style="width:100%;height:200px">
									        	</div>
									        	<div class="col-md-5 col-sm-12 col-xs-12 photo_para">
									        		<br>
									        		<br>
									        		<br>
									        		<p ><strong>'.$row['telname'].'</strong></p>
									        		<p ><strong>'.$row['telpartyname'].'</strong></p>
									        		<p ><strong>'.$row['telconstname'].'</strong></p>
									        	</div>
									        </div>
									      </div>';
					    		}
					    		$j++;
					    	}
					    ?>
					    </div>

					    <!-- Left and right controls -->
					    <a class="left carousel-control" href="#starCarosuel" data-slide="prev" >
					      <span class="glyphicon glyphicon-chevron-left"></span>
					      <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#starCarosuel" data-slide="next">
					      <span class="glyphicon glyphicon-chevron-right"></span>
					      <span class="sr-only">Next</span>
					    </a>
					  </div>
					</div>
		<?php  } } ?>

<?php if( $block == 'candidate_details_side' || $block == 'ALL' ) { ?>
			<!-- Candidate Details -->
		<?php 
          if(isset($candidate_details_side) && !empty($candidate_details_side))
          {
        ?>
			<div class="col-md-12 col-sm-12 col-xs-12 " >
			
	            <legend>ఎన్నికలు : అభ్యర్థులు</legend>
	            <div class="table-responsive well" id="candidate_table" style="max-height:600px !important">
            		<table class="table table-bordered">
              				<thead>
	              				<tr>
	              					<th>పేరు</th>
	              					<th>పార్టీ</th>
	              				</tr>
              				</thead>
              				<marquee direction = "up">
              				<tbody >
              					<?php 
              						$const = array();
              						foreach($candidate_details_side as $row)
              						{
              							if(!in_array($row['telconstname'],$const))
              							{
              					?>
			              					<tr class="text-center prev_heading" >
			              						<td colspan = 2> <a><?php echo $row['telconstname'];?></a></td>
			              					</tr>
		              			<?php 	}
		              			?>
		              					<tr>
		              						<td><?php echo $row['telname'];?></td>
		              						<td><?php echo $row['telpartyname'];?></td>
		              					</tr>
              					<?php
              							$const[] = $row['telconstname'];
              						}
              					?>
              				</tbody>
              			</marquee>
                    </table>	           
	            </div>
	       

			</div>
			<?php 
				} }
	        ?>

	<?php if( $block == 'campaigners_details' || $block == 'ALL' ) { ?>		
	        <!-- Campaigners Details -->
    
      <?php 
        if(isset($campaigners_details) && !empty($campaigners_details))
        {
      ?>
        
        <div class="col-md-12 col-sm-12 col-xs-12  margin " >
            <legend>Campaigners Details</legend>
              <div class="table-responsive well">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Party</th>                   
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($campaigners_details as $row) { ?>
                  <tr id="<?php echo 'id_'.$row['id']?>">
                    <td><?php echo $row['engname'];?></td>
                    <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_partyname'];?></a></td>
                    <td><?php echo $row['teldescription'];?></td>
                  </tr>
                <?php } ?>             
                  </tbody>
                </table>
           
             </div>
        </div>
       <?php 
			} }
        ?>
      
	  <?php if( $block == 'campaigns_data' || $block == 'ALL' ) { ?>		
       <!-- Campaigns -->
       <?php 
          if(isset($campaigns_data) && !empty($campaigns_data))
          {
        ?>
        
      <div class="col-md-12 col-sm-12 col-xs-12  margin ">
          
              <legend>Campaigns</legend>
              <div class="table-responsive well">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      
                      <th>Campaigner</th>
                      <th>Party</th>
                    <!--  <th>State</th>
                      <th>District</th>
                      <th>Contituency</th>-->                    
                      <th>Place</th>
                      <th>Description</th>
                      <th>Link</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php 
                  $i = array();
                  foreach($campaigns_data as $row) 
                  { 
                    if(!in_array($row['campaign_date'], $i))
                    {
                ?>
                      <tr class="text-center">
                        <td colspan="5"><b><?php echo date_format(date_create($row['campaign_date']),'d M Y');?></b></td>
                      </tr>
                <?php 
                    }
                ?>
                  <tr>
                    <td><?php echo $row['eng_campaigner'];?></td>
                    <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_partyname'];?></a></td>
                    <?php /* ?>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_partyname'];?></a></td>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'state/'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_statename'];?></a></td>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['eng_distname'];?></a></td>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['eng_constname'];?></a></td>
                    <?php */ ?>
                    <td><?php echo $row['place'];?></td>
                    <td><?php echo $row['teldescription'];?></td>
                    <td><?php echo $row['eng_url'];?></td>
                  </tr>
                <?php 
                    $i[] = $row['campaign_date'];
                   } 
                ?>             
                  </tbody>
                </table>
              </div>
      </div>
      <?php 
		} }
        ?>
	      
	</div>

<script>
	$(document).ready(function(){
		//alert();
	     /* $('html, body').animate({
				//scrollTop: $("candidate_table").offset().top
				scrollTop: $("#candidate_table").offset().top
			},1000);
			setInterval(function(){ alert("Hello"); }, 3000);
			*/
			//setInterval(function(){ alert("Hello"); }, 3000);
			
			var top_position = $('#candidate_table');
			var pos = 0;
			setInterval(function(){	
					if(pos >= 13340)
					{

						top_position.animate({scrollTop:0})
					}			
				    pos = top_position.scrollTop();
				    top_position.scrollTop(pos + 10);
				
			}, 500);
        });
</script>