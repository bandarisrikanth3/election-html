
	<style>
	.t-yellow{background-color:#B3E5FC;background-image: linear-gradient(#ddddff,#c992e0);}
	.t-red{background-color:#E1F5FE;    background-image: linear-gradient(#f5cdcd,#e8e8b1);}
	.width-5>tbody>tr>th{width:45%;font-size:14px;}
	.width-5>tbody>tr>tr{font-size:14px;}
	.photo_para1{margin-top: 70px;   margin-left: -25px;}
		@media screen and (max-width:970px)
		{
			.photo_para1{margin-top: -30px;   margin-left: 0px;}
		}
</style>
	<!-- sidebar -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		
		<?php if( $block == 'schedule' || $block == 'ALL' ) { ?>
		<!-- Election Schedule -->
		
			<div class="col-md-12 col-sm-12 col-xs-12 " style="padding-right:10px !important;padding-left:10px !important;margin-top:-18px !important;">
			<?php /*
	           <!-- <legend>ఎన్నికల షెడ్యూలు </legend> -->
	            <div class="table-responsive ">
	              <table class="table table-bordered width-5" >
	               
	                 <!--  <tr class="text-center">
	                    
	                    <td colspan="2"><strong>06.11.2018</strong></td>
	                  </tr> -->
	                 

	                   <tr class="t-yellow">
	                    <th>మొత్తం స్థానాలు</th>
	                      <td>119</td>
	                  </tr>
	                  <tr class="t-red">
	                    
	                    <th ><strong>ఎన్నికల షెడ్యూలు</strong></th>
	                    <td >06.10.2018 (శనివారం)</td>
	                  </tr>
	                 <tr class="t-yellow">
	                    <th>నోటిఫికేషన్</th>
	                      <td>12.11.2018 (సోమవారం)</td>
	                  </tr>

	                  <!-- <tr>
	                    <th>నామినేషన్ల ప్రక్రియ</th>
	                      <td>12.11.2018<br/>(సోమవారం)</td>
	                  </tr> --> 

	                  <tr class="t-red">
	                    <th>నామినేషన్ల గడువు</th>
	                      <td>19.11.2018 (సోమవారం)</td>
	                  </tr>

	                  <tr class="t-yellow">
	                    <th>పరిశీలన</th>
	                      <td>20.11.2018 (మంగళవారం)</td>
	                  </tr>

	                  <tr class="t-red">
	                    <th>ఉపసంహరణ</th>
	                      <td>22.11.2018 (గురువారం)</td>
	                  </tr>

	                  <tr class="t-yellow">
	                    <th>పోలింగ్</th>
	                      <td>07.12.2018 (శుక్రవారం)</td>
	                  </tr>

	                  <tr class="t-red">
	                    <th>ఓట్లు లెక్కింపు</th>
	                      <td>11.12.2018 (మంగళవారం)</td>
	                  </tr>

	                  <!-- <tr>
	                    <th>ప్రక్రియ పూర్తి కావలసిన గడువు</th>
	                      <td>13.12.2018<br/>(గురువారం)</td>
	                  </tr> -->

	                 
	              </table>
	            </div>
	       */ ?>
	        <?php include('election_schedule_slider.php');?>

			</div>
			
		
<!-- Star Candidates -->
			<?php 
	        	if(isset($star_candidate) && !empty($star_candidate))
	          	{
	        ?>
					<div class="col-md-12 col-sm-12 col-xs-12 " style="padding-right:10px !important;padding-left:10px !important;margin-top:-18px !important;">
					   <legend>లైఫ్ లైన్</legend>
					  <div id="starCarosuel" class="well carousel slide" data-ride="carousel" style="background-image: linear-gradient(#d9defb,#F3E5F5,#d9defb); !important;">
					

					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">
					    <?php 
					    	$j=0;
					    	foreach($star_candidate as $row) 
					    	{ 
					    		if($j == 0)
					    		{
					    			echo '<div class="item active">
					    					<a href="'.$row['story_link'].'" target="_blank">
										        <div class="col-md-12 col-sm-12 col-xs-12">
										        	<div class="col-md-1 col-sm-12 col-xs-12" ></div>
						    						<div class="col-md-6 col-sm-12 col-xs-12 text-center" style="padding:5px">
										        		<img src="'.base_url().$row['img_path'].'" alt="'.$row['engname'].'" style="width:165px;height:200px;padding:25px;">
										        	</div>
										        	<div class="col-md-5 col-sm-12 col-xs-12 photo_para photo_para1 text-center">
										        		<h5 ><strong>'.$row['telname'].'</strong></h5>
										        		<h5 style="color: #069"><strong>'.$row['telpartyname'].'</strong></h5>
										        		<h5 style="color: #ca2828;"><strong>'.$row['telconstname'].'</strong></h5>
										        	</div>
										        </div>
										       </a>
									      </div>';
					    		}
					    		else
					    		{
					    			echo '<div class="item ">
					    					<a href="'.$row['story_link'].'" target="_blank">
						    					<div class="col-md-12 col-sm-12 col-xs-12">
						    						<div class="col-md-1 col-sm-12 col-xs-12" ></div>
						    						<div class="col-md-6 col-sm-12 col-xs-12 text-center" style="padding:5px">
										        		<img src="'.base_url().$row['img_path'].'" alt="'.$row['engname'].'" style="width:165px;height:200px;padding:25px;">
										        	</div>
										        	<div class="col-md-5 col-sm-12 col-xs-12 photo_para photo_para1 text-center">

										        		<h5 ><strong>'.$row['telname'].'</strong></h5>
										        		<h5 style="color: #069"><strong>'.$row['telpartyname'].'</strong></h5>
										        		<h5 style="color: #ca2828;"><strong>'.$row['telconstname'].'</strong></h5>
										        	</div>
										        </div>
										    </a>
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
					<?php  }   ?>

	
			<!-- Candidate Details -->
		<?php 
          if(isset($candidate_details_side) && !empty($candidate_details_side))
          {
        ?>
			<div class="col-md-12 col-sm-12 col-xs-12 " style="padding-right:10px !important;padding-left:10px !important;margin-top:-18px !important;" >
			
	            <legend>ఎన్నికల బరిలో ఎవరెవరు</legend>
	            <div class="table-responsive well" id="candidate_table" style="max-height:600px !important;overflow: auto;">
            		<table class="table table-bordered">
              				<thead>
	              				<tr>
	              					<th>పార్టీ</th>
	              					<th>పేరు</th>
	              					
	              				</tr>
              				</thead>
              				<tbody >
              					<?php 
              						$const = array();
              						foreach($candidate_details_side as $row)
              						{
              							//if(!in_array($row['telconstname'],$const))
              							if(!in_array($row['const'],$const))
              							{
              					?>
			              					<tr class=" prev_heading" >
			              						<td colspan = 2> <a><?php echo $row['const'];?></a></td>
			              					</tr>
		              			<?php 	}
		              			?>
		              					<tr>
		              						<td><img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px">&nbsp;<?php echo $row['party'];?>&nbsp;<?php if($row['alignid']!=0){echo "(".$row['alignname'].")";}else{echo "";}?></td>
		              						<td><?php echo $row['telname'];?></td>
		              						
		              						<!--<td><?php // echo $row['telpartyname'];?></td>-->
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

<?php } ?>
	<?php if( $block == 'campaigners_details' || $block == 'ALL' ) { ?>		
	        <!-- Campaigners Details -->
    
      <?php 
        if(isset($campaigners_details) && !empty($campaigners_details))
        {
      ?>
        
        <div class="col-md-12 col-sm-12 col-xs-12  margin " style="padding-right:10px !important;padding-left:10px !important;margin-top:-18px !important;">
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
        
      <div class="col-md-12 col-sm-12 col-xs-12  margin " style="padding-right:10px !important;padding-left:10px !important;margin-top:-18px !important;">
          
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