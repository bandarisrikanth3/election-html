<?php $_GLOBALS['graph_partyname'] = $graph_partyname;?>


	<!-- Symbol Path -->
	<div class="col-md-12 col-sm-12 col-xs-12">		
		
		<div class="col-md-3 col-sm-12 col-xs-12 text-center">
			<img src="<?php echo base_url().$party->symbolpath;?>" width="100%">
			<caption><?php echo $party->hindiname;?></caption>
		</div>	
		<!-- Description -->
		<div class="col-md-9 col-sm-12 col-xs-12" >
      <legend>विवरण</legend>
			<p><?php echo str_ireplace('div', 'p', $party->descriptionhindi);?></p>	
		</div>
	</div>	

	

	<!-- Candidate Details -->
	<div class="col-md-12 col-sm-12 col-xs-12 " style="margin-top:10px;">
		<legend>अभ्यर्थी विवरण</legend>
		<div class="table-responsive well">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>नाम</th>
                <th>
चुनाव क्षेत्र</th>
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
        <div class="col-md-5 col-sm-12 col-xs-12 ">
		        <legend>पिछला चुनाव विवरण</legend>
		        <div class="table-responsive well">
		          <table class="table table-bordered">
		                        <tr>
		                          <th>वर्ष</th>
		                          <th>जीती गई सीटें</th>
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
        <div class="col-md-5 col-sm-12 col-xs-12   ">
          <legend>2014 चुनाव परिणाम</legend>
          <div class="col-md-12 col-sm-12 col-xs-12 well  ">
           <?php include('column_chart.php');?>
         </div>

    </div>
	</div>

	 

    <!-- Campaigners Details -->
       <?php 
            if(isset($campaigners_details) && !empty($campaigners_details))
            {
          ?>
      <div class="col-md-12 col-sm-12 col-xs-12  margin-top10 " >
         
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
      <div class="col-md-12 col-sm-12 col-xs-12  margin-top10 ">
          
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
                        <th colspan="5"><?php echo date_format(date_create($row['campaign_date']),'d M Y');?></th>
                      </tr>
                <?php 
                    }
                ?>
                 <tr>
                    <td><?php echo $row['tel_campaigner'];?></td>
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
            }
          ?>

