<br>
  <!-- Map & Description -->
  <div class="col-md-12 col-sm-12 col-xs-12 margin">
    <div class="col-md-1 col-sm-12 col-xs-12 margin"></div>
    <div class="col-md-10 col-sm-12 col-xs-12 margin">
        <?php  $this->load->view('english/map/ts/'.strtolower($state->shortname));?>        
    </div> 
    <div class="col-md-1 col-sm-12 col-xs-12 margin"></div>
     <br>
  </div>
    <div class="col-md-12 col-sm-12 col-xs-12 ">
      <legend>Description</legend>
      <p><?php echo str_ireplace('b>', 'p>', $state->engdescription);?></p>
    <br>
  </div>

  <!-- State Details & Column Chart - prev Results-->
  <div class="col-md-12 col-sm-12 col-xs-12 margin">

    <div class="col-md-6 col-sm-12 col-xs-12  "  id="state">
     <?php 
        if(isset($state) && !empty($state))
        {
      ?>
          <legend>State Profile</legend>
          <div class="table-responsive well">
            <table class="table table-bordered">

                <tr>
                  <th>State</th>
                  <td><?php echo $state->engname;?></td>
                </tr>
               <tr>
                  <th>Districts</th>
                  <td>31</td>
                </tr>
                <tr>
                  <th>Assembly Seats</th>
                  <td><?php echo number_format($state->noofassemcont);?></td>
                </tr>
                <tr>
                  <th>Lok Sabha constituencies</th>
                  <td>17</td>
                </tr>
                 <tr>
                  <th>Rashtriya Recognized Parties</th>
                  <td>4 </td>
                </tr>
                 <tr>
                  <th>Total Voters</th>
                  <td><?php echo number_format($state->noofvoters);?></td>
                </tr>
                 <tr>
                  <th>Men</th>
                  <td><?php echo number_format($state->malevoters);?></td>
                </tr>
                 <tr>
                  <th>Women</th>
                  <td><?php echo number_format($state->femalevoters);?></td>
                </tr>
            </table>
          </div>
      <?php 
        }
      ?>
    </div>

    <!-- Column Chart - Prev Results -->
    <div class="col-md-6 col-sm-12 col-xs-12 ">
      <legend>2014 Election Results</legend>
      <div class="col-md-12 col-sm-12 col-xs-12 well   ">
        
        <?php include('column_chart.php');?>
      </div>

    </div>
  </div>


   <!-- Prev election Results & Pie Chart - Vote Share -->   
    <div class="col-md-12 col-sm-12 col-xs-12  margin ">
      <?php 
        if(isset($pre_result) && !empty($pre_result))
          {
      ?>
              <div class="col-md-6 col-sm-12 col-xs-12  margin ">
                 
                  
                      <legend>Seats Won Party-wise In 2014 Elections</legend>
                      <div class="table-responsive well">
                        <table class="table table-bordered">
                                      <tr>
                                        <th>Parties</th>
                                        <th>Winning Seats</th>
                                      </tr>
                           <?php 
                           $i = array();
                                foreach($pre_result as $row)  
                                  {
                           ?>
                                     
                                      <tr>
                                     
                                        <td><!--<a href="<?php //echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"></a>--><?php echo $row['party_shortname'];?></td>
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
        <?php 
          }
        ?>       
       
       <!-- Pie Chart  -->
        <div class="col-md-6 col-sm-12 col-xs-12  margin ">
          <legend>Vote Share In 2014 Elections</legend>
          <div class="col-md-12 col-sm-12 col-xs-12 well margin ">
            <?php include('pie_chart.php');?>
          </div>
        </div>     

        <!-- Div End --> 
    </div>

    <!-- Previous Constituency Results -->
    <?php 
          if(isset($seats_data) && !empty($seats_data))
          {
    ?>
            <legend>2014 Elections: Constituency-wise Winners</legend>
            <div class="col-md-12 col-sm-12 col-xs-12  margin " >
              
              <?php 
                  foreach($seats_data as $row) 
                  {
              ?>
                    <div class="col-md-6 col-sm-12 col-xs-12   text-center" >
                      <div class="col-md-12 col-sm-12 col-xs-12 table-responsive well " >

                        <table class="table table-bordered">
                          <tr class="text-center prev_heading">
                            <td colspan="3"><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['hindi_distname'];?></a></td>
                          </tr>
                           <tr class="text-center prev_heading" >
                            <td colspan="3"><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['hindi_constname'];?></a></td>
                          </tr>
                           <?php 
                                  $party = explode(',',$row['eng_partyname']);
                                  $candidate = explode(',',$row['hindi_candidatename']);
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
                              <td colspan="2"><b>Majority Votes-</b> <?php if(isset($votes[0]) && isset($votes[1])){ echo number_format($votes[0]- $votes[1]);}?></td>
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
    
      <?php 
        if(isset($campaigners_details) && !empty($campaigners_details))
        {
      ?>
       
        <div class="col-md-12 col-sm-12 col-xs-12  margin " >
             <legend>Campaigner details</legend>
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
                    <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_shortname'];?></a></td>
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
        
      <div class="col-md-12 col-sm-12 col-xs-12  margin ">
          
              <legend>Promotions</legend>
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
          }
        ?>






<script type="text/javascript">

  // Seats Ajax
  function get_seats_data(params)
  {
    // alert(params);
      $.ajax({
            type "POST",
            url '<?php echo base_url('ajax/ajax_get_seats_data').'?';?>'+params,
            //data id='stateid',
            success function(data){
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
            type "POST",
            url '<?php echo base_url('ajax/ajax_get_state_details').'/';?>'+state,
            //data id='stateid',
            success function(data){
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
    count = document.getElementById("table_count").value;
    
    
   for (i = 0; i < count; i++) {
      a= document.getElementById('sdetails_'+i).value;
      row= document.getElementById('row_'+i);
      tb_head= document.getElementById('tb_head__'+i);
      a= a.toUpperCase();
      if(a.search(filter) > -1)
      {
        row.style.display = '';
        //alert();
      }
      else
      {
        row.style.display = "none";
        //alert(tr[i]);
      }
      
    }
 
}
</script>
 



