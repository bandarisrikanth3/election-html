<div class="row">

	<!-- Symbol Path -->
<!--	<div class="col-md-12 col-sm-12 col-xs-12">		
		<legend>Description</legend>
		<div class="col-md-4 col-sm-12 col-xs-12 text-center">
			<img src="<?php echo base_url().$party->symbolpath;?>" width="100%">
			<caption><?php echo $party->engname;?></caption>
		</div>	
		<!-- Description -->
	<!--	<div class="col-md-8 col-sm-12 col-xs-12" style="margin-top:10px;">
			<p><?php echo $party->descriptioneng;?></p>	
		</div>
	</div>	-->

  <!-- Candidate Details -->
	<div class="col-md-12 col-sm-12 col-xs-12 well" >
    <legend>Candidate Details</legend>
    <div class="col-md-3 col-sm-6 col-xs-6" >
      <img src="<?php if(!empty($candidate_details->imagepath)){echo base_url().$candidate_details->imagepath;} else{echo base_url().'assets/images/profile.png';}?>" width="100%" />
    </div>
    <div class="col-md-9 col-sm-6 col-xs-6">
      <p><label>Name:</label> <?php echo $candidate_details->engname;?></p>
      <p><label>Gender:</label> <?php echo strtoupper($candidate_details->gender);?></p>
      <p><label>State:</label> <a href="<?php echo base_url().str_ireplace(' ','',strtolower($candidate_details->statename)).'/'.'state/'.str_ireplace(' ','-',strtolower($candidate_details->statename)).'.html';?>"><?php echo $candidate_details->statename;?></a></p>
      <p><label>District:</label> <a href="<?php echo base_url().str_ireplace(' ','',strtolower($candidate_details->statename)).'/'.'district/'.str_ireplace(' ','-',strtolower($candidate_details->distname)).'.html';?>"><?php echo $candidate_details->distname;?></a></p>
      <p><label>Constituency:</label> <a href="<?php echo base_url().str_ireplace(' ','',strtolower($candidate_details->statename)).'/'.'constituency/'.str_ireplace(' ','-',strtolower($candidate_details->constname)).'.html';?>"><?php echo $candidate_details->constname;?></a></p>
      <p><label>Party:</label> <a href="<?php echo base_url().str_ireplace(' ','',strtolower($candidate_details->statename)).'/'.'party/'.str_ireplace(' ','',strtolower($candidate_details->partyname)).'_'.str_ireplace(' ','',strtolower($candidate_details->statename)).'.html';?>"><?php echo $candidate_details->partyname;?></a></p>
      <p style="text-align: justify;"><label>Description:</label> <?php echo $candidate_details->engdescription;?></p>
    </div>
  </div>

<?php /*	<!-- Candidate Details -->
  <div class="col-md-12 col-sm-12 col-xs-12 well" style="margin-top:10px;">
    <legend>Candidate Details</legend>
    <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>State</th>
                <th>District</th>
                <th>Contituency</th>
                <th>PartyName</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $candidate_details->engname;?></td>
                <td><?php echo strtoupper($candidate_details->gender);?></td>
                <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($candidate_details->statename)).'/'.'state/'.str_ireplace(' ','-',strtolower($candidate_details->statename)).'.html';?>"><?php echo $candidate_details->statename;?></a></td>
                <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($candidate_details->statename)).'/'.'district/'.str_ireplace(' ','-',strtolower($candidate_details->distname)).'.html';?>"><?php echo $candidate_details->distname;?></a></td>
                <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($candidate_details->statename)).'/'.'constituency/'.str_ireplace(' ','-',strtolower($candidate_details->constname)).'.html';?>"><?php echo $candidate_details->constname;?></a></td>
                <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($candidate_details->statename)).'/'.'party/'.str_ireplace(' ','',strtolower($candidate_details->partyname)).'_'.str_ireplace(' ','',strtolower($candidate_details->statename)).'.html';?>"><?php echo $candidate_details->partyname;?></a></td>
                <td><?php echo $candidate_details->engdescription;?></td>
              </tr>    
            </tbody>
          </table>
        </div>
  </div>

*/?>
 

  <!-- Previous Constituency Details -->
  <div class="col-md-12 col-sm-12 col-xs-12 well">

     <?php 
      if(isset($seats_data) && !empty($seats_data))
      {
    ?>
        <legend>Previous Constituency Results</legend>
        <div class="table-responsive">
        
          <table class="table table-bordered">
              <tr>
                <th width="5%">Year</th>
                <th>Party</th>
                <th>State</th>
                <th>District</th>
                <th>Contituency</th>
                <th>No of Votes</th>
              </tr>
           <?php $p=array(); foreach($seats_data as $row) { ?>
              <tr>
                <?php if(!in_array($row['year'], $p)){ ?>
                  <th ><?php echo $row['year'];?> </th>
                <?php } else { ?>
                  <td></td>
                <?php } ?>
              <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_partyname'];?></a></td>
              <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_statename'];?></a></td>
              <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['eng_distname'];?></a></td>
              <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['eng_constname'];?></a></td>
              <td><?php echo number_format($row['noofvotes']);?></td>
            </tr>
          <?php 
               $p[] = $row['year'];
            } ?>
             
          </table>
        </div>
    <?php 
      }
    ?>


</div>

    <!-- Election Details -->
    <div class="col-md-12 col-sm-12 col-xs-12 well margin-top10 "  id="election_table">
        <?php 
          if(isset($election_data) && !empty($election_data))
          {
        ?>
            <legend>Election Schedule</legend>
            <div class="table-responsive">
              <?php foreach($election_data as $row) { ?>
              <table class="table table-bordered">
               
                   <tr class="text-center">
                    
                    <td colspan="2"><strong><?php echo date_format(date_create($row['election_date']),'d M Y');?></strong></td>
                  </tr>
                  <?php /* ?>
                  <tr>
                    <th>State</th>
                    <?php foreach($election_data as $row) { ?>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'state/'.str_ireplace(' ','',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_statename'];?></a></td>
                      <?php } ?>
                  </tr>
                   <tr>
                    <th>District</th>
                    <?php foreach($election_data as $row) { ?>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['eng_distname'];?></a></td>
                      <?php } ?>
                  </tr>
                  <tr>
                    <th>Contituency</th>
                    <?php foreach($election_data as $row) { ?>
                       <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['eng_constname'];?></a></td>
                      <?php } ?>
                  </tr>
                 
                  <tr>
                    <th>Parliament Constituency</th>
                    <?php foreach($election_data as $row) { ?>
                      <td><?php echo $row['parconst'];?></td>
                      <?php } ?>
                  </tr>
                  <?php */ ?>

                   <tr>
                    <th>Assembly Constituency</th>
                      <td><?php echo $row['assemconst'];?></td>
                  </tr>

                  <tr>
                    <th>Description</th>
                      <td><?php echo $row['engdescription'];?></td>
                  </tr>

                  <tr>
                    <th>Notification</th>
                      <td><?php echo date_format(date_create($row['notification']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Nomination</th>
                      <td><?php echo date_format(date_create($row['nomination']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Scrutiny</th>
                      <td><?php echo date_format(date_create($row['scrutiny']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Withdrawal</th>
                      <td><?php echo date_format(date_create($row['withdrawal']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Counting</th>
                      <td><?php echo date_format(date_create($row['counting']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Completion</th>
                      <td><?php echo date_format(date_create($row['completion']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Ascconst</th>
                      <td><?php echo $row['ascconst'];?></td>
                  </tr>

                  <tr>
                    <th>Astconst</th>
                      <td><?php echo $row['astconst'];?></td>
                  </tr>

                  <tr>
                    <th>Pscconst</th>
                      <td><?php echo $row['pscconst'];?></td>
                  </tr>

                  <tr>
                    <th>Pstconst</th>
                      <td><?php echo $row['pstconst'];?></td>
                  </tr>

                  <tr>
                    <th>Noofvoters</th>
                      <td><?php echo $row['noofvoters'];?></td>
                  </tr>

                  <tr>
                    <th>Malevoters</th>
                      <td><?php echo $row['malevoters'];?></td>
                  </tr>

                  <tr>
                    <th>Femalevoters</th>
                      <td><?php echo $row['femalevoters'];?></td>
                  </tr>
              </table>
            <?php } ?>
            </div>
        <?php 
          }
        ?>

    </div>

    <!-- Campaigners Details -->
    <div class="col-md-12 col-sm-12 col-xs-12  margin-top10 " >
      <div class="col-md-4 col-sm-12 col-xs-12 well margin-top10 " >
          <?php 
            if(isset($campaigners_details) && !empty($campaigners_details))
            {
          ?>
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
          <?php 
            }
          ?>

      </div>
      
      <div class="col-md-1 col-sm-12 col-xs-12  margin-top10 "></div>
       <!-- Campaigns -->
      <div class="col-md-6 col-sm-12 col-xs-12 well margin-top10 ">
          <?php 
            if(isset($campaigns_data) && !empty($campaigns_data))
            {
          ?>
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
          <?php 
            }
          ?>

      </div>
    </div>
</div>


<script>
  function showDiv(id)
  {
      //alert(id);
      $(document).ready(function(){
          $('#campaigners_div').show();
          $('#'+id).show();
      });
  }
</script>