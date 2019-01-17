<?php $_GLOBALS['graph_partyname'] = $graph_partyname;?>


	<!-- Symbol Path -->
	<div class="col-md-12 col-sm-12 col-xs-12">		
		
		<div class="col-md-3 col-sm-12 col-xs-12 text-center">
			<img src="<?php echo base_url().$party->symbolpath;?>" width="100%">
			<caption><?php echo $party->telnamefull;?></caption>
		</div>	
		<!-- Description -->
		<div class="col-md-9 col-sm-12 col-xs-12" >
      <legend>Description</legend>
			<p><?php echo $party->descriptiontel;?></p>	
		</div>
	</div>	

	

	<!-- Candidate Details -->
	<div class="col-md-12 col-sm-12 col-xs-12 well" style="margin-top:10px;">
		<legend>Candidate Details</legend>
		<div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Contituency</th>
              </tr>
            </thead>
            <tbody>
          <?php 
          $dist = array();
          
          foreach($candidate_details as $row) {
              if(!in_array($row['distname'],$dist)){
           ?>
            
               <tr><td colspan="2"></td></tr>
              <tr class="text-center prev_heading"><td colspan="2"><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['statename'])).'/'.'district/'.str_ireplace(' ','',strtolower($row['distname'])).'.html';?>"><?php echo $row['teldistname'];?></a></td>
                        </tr>
         <?php    } ?>
            <tr>
              <!--<td><a href="<?php // echo base_url().str_ireplace(' ','',strtolower($row['statename'])).'/'.'candidate/'.str_ireplace(' ','',strtolower($row['engname'])).'_'.str_ireplace(' ','',strtolower($row['statename'])).'.html';?>"><?php //echo $row['telname'];?></a></td>-->
              <td><a><?php echo $row['telname'];?></a></td>
            <?php /*  <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['statename'])).'/'.'district/'.str_ireplace(' ','',strtolower($row['distname'])).'.html';?>"><?php echo $row['distname'];?></a></td> */?>
              <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['statename'])).'/'.'constituency/'.str_ireplace(' ','',strtolower($row['constname'])).'.html';?>"><?php echo $row['telconstname'];?></a></td>
            </tr>
          <?php 
            $dist[] = $row['distname'];
            } ?>             
            </tbody>
          </table>
        </div>
	</div>


	<!-- Previous Election Details -->
  
	<div class="col-md-12 col-sm-12 col-xs-12 ">
		   <?php 
          if(isset($pre_result) && !empty($pre_result))
          {
        ?>
        <div class="col-md-5 col-sm-12 col-xs-12 well">
		        <legend>Previous Election Details</legend>
		        <div class="table-responsive">
		          <table class="table table-bordered">
		                        <tr>
		                          <th>Year</th>
		                          <th>No of Seats</th>
		                        </tr>
		             <?php 
		             $i = array();
		                  foreach($pre_result as $row)  
		                    {
		             ?>
		                       
		                        <tr>
		                          <?php if(!in_array($row['year'], $i)){ ?>
		                          <th ><?php echo $row['year'];?> </th>
		                        <?php } else { ?>
		                          <td></td>
		                        <?php } ?>
		                          <td><?php echo number_format($row['votes']);?></td>
		                        </tr>

		              <?php
		                  $i[] = $row['year'];
		                    }
		              ?>        
		          </table>
		        </div>
		    </div>

        <div class="col-md-1 col-sm-12 col-xs-12 "></div>
      <?php 
          }
        ?>
        <div class="col-md-5 col-sm-12 col-xs-12 well  ">
          <legend>2014 Election Result</legend>
          <?php include('column_chart.php');?>

    </div>
	</div>

	 

    <!-- Campaigners Details -->
       <?php 
            if(isset($campaigners_details) && !empty($campaigners_details))
            {
          ?>
      <div class="col-md-12 col-sm-12 col-xs-12 well margin-top10 " >
         
              <legend>Campaigners Details</legend>
              <div class="table-responsive">
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
                    <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_partyname'];?></a></td>
                    <td><?php echo $row['engdescription'];?></td>
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
      <div class="col-md-12 col-sm-12 col-xs-12 well margin-top10 ">
          
              <legend>Campaigns</legend>
              <div class="table-responsive">
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
                        <th colspan="5"><?php echo date_format(date_create($row['campaign_date']),'d M Y');?></th>
                      </tr>
                <?php 
                    }
                ?>
                  <tr>
                    <td><?php echo $row['eng_campaigner'];?></td>
                    <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_partyname'];?></a></td>
                    <?php /* ?>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_partyname'];?></a></td>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'state/'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_statename'];?></a></td>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['eng_distname'];?></a></td>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['eng_constname'];?></a></td>
                    <?php */ ?>
                    <td><?php echo $row['place'];?></td>
                    <td><?php echo $row['engdescription'];?></td>
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
            }
          ?>

