<br>
<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12 margin">
    <div class="col-md-6 col-sm-12 col-xs-12 ">
      <?php  $this->load->view('english/map/ts/'.strtolower($state->shortname));?>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12 ">
      <legend>Description</legend>
      <p> <?php echo $state->teldescription;?></p>
    </div>
  </div>

  <!-- State Details -->
  <div class="col-md-12 col-sm-12 col-xs-12 margin">
    <div class="col-md-5 col-sm-12 col-xs-12  well"  id="state">
     <?php 
        if(isset($state) && !empty($state))
        {
      ?>
          <legend>State Details</legend>
          <div class="table-responsive">
            <table class="table table-bordered">

                <tr>
                  <th>Name:</th>
                  <td><?php echo $state->telname;?></td>
                </tr>
                <!--<tr>
                  <th>Country:</th>
                  <td><a href="<?php //echo base_url();?>">India</a></td>
                </tr>-->
               <tr>
                  <th>No of Assembly Seats:</th>
                  <td><?php echo number_format($state->noofassemcont);?></td>
                </tr>
                 <tr>
                  <th>No of Parties:</th>
                  <td><?php echo number_format($state->noofparconst);?></td>
                </tr>
                 <tr>
                  <th>No of Voters:</th>
                  <td><?php echo number_format($state->noofvoters);?></td>
                </tr>
                 <tr>
                  <th>Male Voters:</th>
                  <td><?php echo number_format($state->malevoters);?></td>
                </tr>
                 <tr>
                  <th>Female Voters:</th>
                  <td><?php echo number_format($state->femalevoters);?></td>
                </tr>
            </table>
          </div>
      <?php 
        }
      ?>
    </div>
  

    <!-- Previous Election Details -->
    <div class="col-md-5 col-sm-12 col-xs-12 well col-md-offset-1  ">
        <legend>2014 Election Result</legend>
        <?php include('column_chart.php');?>

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
        <div class="col-md-5 col-sm-12 col-xs-12 well margin ">
           
            
                <legend>Previous Election Details</legend>
                <div class="table-responsive">
                  <table class="table table-bordered">
                                <tr>
                                  <th width="5%">Year</th>
                                  <th>Party</th>
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
                                  <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_partyname'];?></a></td>
                                  <td><?php echo $row['votes'];?></td>
                                </tr>

                      <?php
                          $i[] = $row['year'];
                            }
                      ?>        
                  </table>
                </div>            
        </div>
         <!-- Gap -->
        <div class="col-md-1 col-sm-12 col-xs-12  margin "></div>
        <?php 
          }
        ?>

       
       
       <!-- Chart 1 -->
        <div class="col-md-5 col-sm-12 col-xs-12 well margin ">
          <legend>2014 Election Vote Share</legend>
            <?php include('pie_chart.php');?>
        </div>     

        <!-- Div End --> 
    </div>


    <!-- Previous Constituency Results -->
    <?php 
      if(isset($seats_data) && !empty($seats_data))
      {
    ?>
    <div class="col-md-12 col-sm-12 col-xs-12 well margin ">
        
            <div class="col-md-8 col-sm-12 col-xs-12">
              <legend>Previous Constituency Results</legend>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <input class="form-control" type="text" id="myInput" onkeyup="search_function()" placeholder="Search for names.." title="Type in a name" />
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                  <table class="table table-bordered" >
                    <thead>
                      <tr>
                        
                        <th width="5%">Year</th>
                        <th>Party</th>
                        <!--<th>State</th>-->
                        <!--<th>District</th>-->
                        <th>Contituency</th>
                        <th>Candidate</th>
                        <th>No of Votes</th>
                      </tr>
                    </thead>
                    <tbody id="tab_search">
                  <?php 
                  $p = array();
                  $i=0;
                  $dist = array();
                  foreach($seats_data as $row) 
                    { 
                      if(!in_array($row['tel_distname'],$dist))
                      {?>
                        <tr><td colspan="5"></td></tr>
                        <tr class="text-center"><td colspan='5'><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['tel_distname'];?></a></td></tr>
                        <?php 
                      }
                  ?>

                  <tr>
                      <?php if(!in_array($row['year'], $p)){ ?>
                        <th ><?php echo $row['year'];?> </th>
                      <?php } else { ?>
                        <th></th>
                      <?php } ?>

                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_partyname'];?></a></td>
                      <!--<td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['tel_distname'];?></a></td>-->
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['tel_constname'];?></a></td>
                       <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'candidate/'.str_ireplace(' ','',strtolower($row['eng_candidatename'])).'_'.str_ireplace(' ','',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_candidatename'];?></a></td>
                      <td><?php echo number_format($row['noofvotes']);?></td>
                      <input type="hidden" value="<?php echo $row['eng_partyname'].'_'.$row['eng_distname'].'_'.$row['eng_constname'].'_'.$row['eng_candidatename'];?>" id="<?php echo 'sdetails_'.$i;?>">
                    </tr>
                  <?php 
                      $p[] = $row['year'];
                      $dist[]=$row['tel_distname'];
                      $i++;
                    } 
                  ?>             
                    </tbody>
                  </table>
                </div>
            </div>
    </div>
     <?php 
        }
      ?>
      

     <!-- Election Details -->
      <?php 
          if(isset($election_data) && !empty($election_data))
          {
        ?>
    <div class="col-md-12 col-sm-12 col-xs-12 well margin margin"  id="election_table">
       
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

    </div>
     <?php 
      }
    ?>
    <!-- Campaigners Details -->
    <div class="col-md-12 col-sm-12 col-xs-12  margin " >
      <?php 
        if(isset($campaigners_details) && !empty($campaigners_details))
        {
      ?>
      <div class="col-md-4 col-sm-12 col-xs-12 well margin " >
          
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
                    <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_partyname'];?></a></td>
                    <td><?php echo $row['teldescription'];?></td>
                  </tr>
                <?php } ?>             
                  </tbody>
                </table>
              </div>
      </div>
       <?php 
          }
        ?>
      
      <div class="col-md-1 col-sm-12 col-xs-12  margin "></div>
       <!-- Campaigns -->
       <?php 
          if(isset($campaigns_data) && !empty($campaigns_data))
          {
        ?>
      <div class="col-md-6 col-sm-12 col-xs-12 well margin ">
          
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
    </div>

   



</div>




<script type="text/javascript">

  // Seats Ajax
  function get_seats_data(params)
  {
    // alert(params);
      $.ajax({
            type: "POST",
            url: '<?php echo base_url('ajax/ajax_get_seats_data').'?';?>'+params,
            //data: id='stateid',
            success: function(data){
          //   alert(data);
              $('#seats_data').html(data);

            },
        });
  }

  // State Ajax
  function getstateDetails(state)
    {
        
      //alert(state);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('ajax/ajax_get_state_details').'/';?>'+state,
            //data: id='stateid',
            success: function(data){
            //  alert(data);
                $('#state_data').html(data);

            },
        });
     }
</script>

<script>
function search_function() {
    var input, filter, tr, td,i,a;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    tab = document.getElementById("tab_search");
    tr = tab.getElementsByTagName("tr");
   //alert(tr.length);
   for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[3].innerHTML;
      td = td.toUpperCase();
      a= document.getElementById('sdetails_'+i).value;
      a= a.toUpperCase();
      if(a.search(filter) > -1)
      {
        tr[i].style.display = '';
        //alert();
      }
      else
      {
        tr[i].style.display = "none";
        //alert(tr[i]);
      }
      
    }
 
}
</script>
 



