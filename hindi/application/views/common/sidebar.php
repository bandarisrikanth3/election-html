	</div>
	<style>
	.t-yellow{background-color:#B3E5FC;}
	.t-red{background-color:#E1F5FE;}
</style>
	<!-- sidebar -->
	<div class="col-md-4 col-sm-12 col-xs-12">

		<!-- Election Schedule -->
		
		
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				
	            <legend>विधानसभा निर्वाचन सारिणी</legend>
	            <?php include('election_schedule_slider.php');?>
	       		 

			</div>
		

	
			<!-- Star Candidates -->
			<?php /*
	        	if(isset($star_candidate) && !empty($star_candidate))
	          	{
	        ?>
					<div class="col-md-12 col-sm-12 col-xs-12 ">
					   <legend>नेतागण और उनकी किस्मत</legend>
					  <div id="starCarosuel" class="well carousel slide" data-ride="carousel" style="background-color:#e7e8f5 !important;">
					    <!-- Indicators -->
					    <!--
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
									        		<p ><strong>'.$row['hindiname'].'</strong></p>
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
									        		<p ><strong>'.$row['hindiname'].'</strong></p>
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
					<?php  } */ ?>

	
			<!-- Candidate Details -->
		<?php 
          if(isset($candidate_details_side) && !empty($candidate_details_side))
          {
        ?>
			<div class="col-md-12 col-sm-12 col-xs-12 " >
			
	            <legend>2018 के उम्मीदवार</legend>
	            <div class="table-responsive well" id="candidate_table" style="max-height:600px !important">
            		<table class="table table-bordered">
              				<thead>
	              				<tr>
	              					
	              					<th width="10%">पार्टी</th>
	              					<th>नाम</th>
	              				</tr>
              				</thead>
              				<tbody >
              					<?php 
              						$const = array();
              						foreach($candidate_details_side as $row)
              						{
              							if(!in_array($row['const'],$const))
              							{
              					?>
			              					<tr class="text-center prev_heading" >
			              						<td colspan = 2> <a><?php echo $row['const'];?></a></td>
			              					</tr>
		              			<?php 	}
		              			?>
		              					<tr>
		              						
		              						<td><?php echo $row['party'];?></td>
		              						<td><?php echo $row['hindiname'];?></td>
		              					</tr>
              					<?php
              							$const[] = $row['const'];
              						}
              					?>
              				</tbody>
                    </table>	           
	            </div>
	       

			</div>
			<?php 
				} 
	        ?>

			
	        <!-- Campaigners Details -->
    
      <?php /*
        if(isset($campaigners_details) && !empty($campaigners_details))
        {
      ?>
        
        <div class="col-md-12 col-sm-12 col-xs-12  margin " >
            <legend>चुनाव प्रचारक का विवरण</legend>
              <div class="table-responsive well">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>नाम</th>
                      <th>पार्टी</th>                   
                      <th>विवरण</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($campaigners_details as $row) { ?>
                  <tr id="<?php echo 'id_'.$row['id']?>">
                    <td><?php echo $row['hindiname'];?></td>
                    <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_shortname'];?></a></td>
                    <td><?php echo $row['hindidescription'];?></td>
                  </tr>
                <?php } ?>             
                  </tbody>
                </table>
           
             </div>
        </div>
       <?php 
			} 
        ?>
      
       <!-- Campaigns -->
       <?php 
          if(isset($campaigns_data) && !empty($campaigns_data))
          {
        ?>
        
      <div class="col-md-12 col-sm-12 col-xs-12  margin ">
          
              <legend>प्रमोशन</legend>
              <div class="table-responsive well">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      
                      <th>प्रचारक</th>
                      <th>पार्टी</th>
                    <!--  <th>State</th>
                      <th>District</th>
                      <th>Contituency</th>-->                    
                      <th>स्थान</th>
                      <th>विवरण</th>
                      <th>लिंक</th>
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
                    <td><?php echo $row['tel_campaigner'];?></td>
                    <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_partyname'];?></a></td>
                   
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
		} */	
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
						
				    pos = top_position.scrollTop();
				    top_position.scrollTop(pos + 1);
				
			}, 50);
        });
</script>