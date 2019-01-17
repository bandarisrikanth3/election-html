
<?php $_GLOBALS['graph_constname'] = $graph_constname; ?>

<div class="col-md-12 col-sm-12 col-xs-12 margin-bottom">
  
    <div class="col-md-3 col-sm-12 col-xs-12"></div>
    <div class="col-md-6 col-xs-12 colsm-12 img-border text-center" >
      <a href=""><img src="<?php echo base_url('assets/maps/constituency/').str_ireplace(' ','-',strtolower($const->engname)).'.png';?>" width="300px"  /> </a>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12"></div>
    <br/>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <legend>Description</legend>
<p> <?php echo str_ireplace('div>', 'p>', $const->engdescription);?></p>
  <br/>
   <?php 
          if(isset($candidate_details_const) && !empty($candidate_details_const))
          {
        ?>
      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2" >
      
              <div class="table-responsive well" style="background-image: linear-gradient(#fee4f4,#FAFAFA,#fee4ef) !important;">
                <table class="table table-bordered table_border" >
                      <thead>
                        <tr class="bg-color text-center">
                          <td><b>Party</b></td>
                          <td><b>Name</b></td>
                          
                        </tr>
                      </thead>
                      <tbody >
                        <?php 
                          foreach($candidate_details_const as $row)
                          {
                           
                        ?>
                            <tr>
                              <td><img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px">&nbsp;<?php echo $row['party'];?></td>
                              <td><?php echo $row['telname'];?></td>
                              
                              <!--<td><?php // echo $row['telpartyname'];?></td>-->
                            </tr>
                        <?php
                           
                          }
                        ?>
                      </tbody>
                    </table>             
              </div>
         

      </div>
      <?php 
        } 
          ?>
</div>


<div class="col-md-12 col-sm-12 col-xs-12 ">
  <div class="col-md-6 col-sm-12 col-xs-12 margin-top10 ">
   <?php 
      if(isset($const) && !empty($const))
      {
    ?>
        <legend>Constituency Profile</legend>
        <div class="table-responsive well">
          <table class="table table-bordered">
              <tr>
                <th>Name</th>
                <td><?php echo $const->engname;?></td>
              </tr>
              <tr>
                <th>District</th>
                <td><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($const->statename)).'/'.'district/'.str_ireplace(' ','-',strtolower($const->distname)).'.html';?>"><?php echo $const->teldistname;?></a></td>
              </tr>
              <tr>
                <th>State</th>
                <td><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($const->statename)).'.html';?>"><?php echo $const->telstatename;?></a></td>
              </tr>
             
               <tr>
                <th>Total Voters</th>
                <td><?php echo number_format($const->noofvoters);?></td>
              </tr>
               <tr>
                <th>Men</th>
                <td><?php echo number_format($const->malevoters);?></td>
              </tr>
               <tr>
                <th>Women</th>
                <td><?php echo number_format($const->femalevoters);?></td>
              </tr>
          </table>
        </div>

    <?php 
      }
    ?>
  </div>

   <div class="col-md-6 col-sm-12 col-xs-12 margin-top10 ">
   <?php 
      if(isset($election_result) && !empty($election_result))
      {
    ?>
        <legend>2014 Election Results</legend>
        <div class="table-responsive well">
          <table class="table table-bordered">
              <tr>
                <th>Party</th>
                <th>Total Votes</th>
                <th>Status</th>
              </tr>
              <?php foreach($election_result as $row) {?>
              <tr>
                <td><!-- <a href="<?php //echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"></a> --><?php echo $row['tel_partyname'];?></td>
                <td><?php echo number_format($row['noofvotes']);?> </td>
                <td><?php if($row['status']==1){ echo 'Won';} else {echo 'Lost';}?> </td>
              </tr>
            <?php } ?>
          </table>
        </div>
    <?php 
      }
    ?>
  </div>

</div>
  


   <!-- Block -->   
    <div class="col-md-12 col-sm-12 col-xs-12  margin ">
      <!-- Div Start -->
      <?php 
        if(isset($pre_result) && !empty($pre_result))
          {
      ?>

        <!-- Previous Election Details -->
        <div class="col-md-6 col-sm-12 col-xs-12  margin ">
           
            
                <legend>Votes Won Party-wise In Previous Elections</legend>
                <div class="table-responsive well">
                  <table class="table table-bordered">
                                <tr>
                                  <th width="5%">Year</th>
                                  <th>Party</th>
                                  <th>No of Votes</th>
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
                                  <td> <!-- <a href="<?php //echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>">--><?php echo $row['tel_partyname'];?></td>
                                  <td><?php echo number_format($row['noofvotes']);?> </td>
                                </tr>

                      <?php
                          $i[] = $row['year'];
                            }
                      ?>        
                  </table>
                </div>            
        </div>
         <!-- Gap -->
        <?php 
          }
        ?>

        <!-- Previous Election Details -->
        <div class="col-md-6 col-sm-12 col-xs-12  ">
          <legend>Party-wise Win in Previous Election</legend>
        <div class="col-md-12 col-sm-12 col-xs-12 well ">
            
            <?php include('column_chart.php');?>
          </div>

        </div>
    </div>

<!-- Previous Constituency Details -->
 <?php 
          if(isset($seats_data) && !empty($seats_data))
          {
    ?>
            <legend>Previous Election Results: Constituency-wise</legend>
            <div class="col-md-12 col-sm-12 col-xs-12  margin " >
              
              <?php 
                  foreach($seats_data as $row) 
                  {
              ?>
                    <div class="col-md-6 col-sm-12 col-xs-12   text-center" >
                      <div class="col-md-12 col-sm-12 col-xs-12 well table-responsive " >
                        <table class="table table-bordered">
                          <tr class="text-center red_color">
                            <td colspan="3"><a class="hyper_link"><?php echo $row['year'];?></a></td>
                          </tr>
                           <?php 
                                  $party = explode(',',$row['tel_partyname']);
                                  $candidate = explode(',',$row['tel_candidatename']);
                                  $votes = explode(',',$row['noofvotes']);
                            ?>
                            <tr>
                                <td width="50%"><span style="colorgreen;font-weight bold">Won</span></td>
                                <td width="50%"><span style="colorred;font-weight bold">Loss</span></td>
                            </tr>
                            <tr>
                              <td><?php if(isset($candidate[0])){ echo $candidate[0];}?></td>
                              <td><?php if(isset($candidate[1])){echo $candidate[1];}?></td>
                            </tr>
                            <tr>
                              <td><?php if(isset($party[0])){ echo $party[0];}?></td>
                              <td><?php if(isset($party[1])){ echo $party[1];}?></td>
                            </tr>
                            <tr>
                              <td><?php if(isset($votes[0])){ echo number_format($votes[0]);}?></td>
                              <td><?php if(isset($votes[1])){echo number_format($votes[1]);}?></td>
                            </tr>
                            <tr>
                              <td colspan="2"> <b>Majority Votes-</b> <?php  if(isset($votes[0]) && isset($votes[1])){ echo number_format($votes[0]- $votes[1]);}?></td>
                            </tr>
                            
                        </table>
                      </div>
                    </div>
              <?php
                  }
              ?>
            </div>
    <?php 
          }
    ?>
   <!-- Campaigners Details -->
     <?php /*
            if(isset($campaigners_details) && !empty($campaigners_details))
            {
          ?>
      <div class="col-md-12 col-sm-12 col-xs-12  margin-top10 " >
         
              <legend>Campaigner Details</legend>
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
      
      
      <?php 
            if(isset($campaigns_data) && !empty($campaigns_data))
            {
          ?>
       <!-- Campaigns -->
      <div class="col-md-12 col-sm-12 col-xs-12  margin-top10 ">
          
              <legend>Campaigners</legend>
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
            } */
          ?>





<script type="text/javascript">
  function getconstDetails(const)
    {
        
      //alert(const);
        $.ajax({
            type "POST",
            url '<?php echo base_url('ajax/ajax_get_const_details').'/';?>'+const,
            //data id='constid',
            success function(data){
            //  alert(data);
                $('#const_data').html(data);

            },
        });
     }
</script>