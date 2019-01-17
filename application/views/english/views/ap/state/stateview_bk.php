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
      <p> <?php echo $state->teldescription;?></p>
    <br>
  </div>

  <!-- State Details & Column Chart - prev Results-->
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
    <div class="col-md-1 col-sm-12 col-xs-12    "></div>

    <!-- Column Chart - Prev Results -->
    <div class="col-md-5 col-sm-12 col-xs-12 well   ">
        <legend>2014 Election Result</legend>
        <?php include('column_chart.php');?>

    </div>
  </div>


   <!-- Prev election Results & Pie Chart - Vote Share -->   
    <div class="col-md-12 col-sm-12 col-xs-12  margin ">
      <?php 
        if(isset($pre_result) && !empty($pre_result))
          {
      ?>
              <div class="col-md-5 col-sm-12 col-xs-12 well margin ">
                 
                  
                      <legend>2014 Election Details</legend>
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
        <?php 
          }
        ?>       
        <div class="col-md-1 col-sm-12 col-xs-12    "></div>
       
       <!-- Pie Chart  -->
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
    <div class="col-md-12 col-sm-12 col-xs-12 well margin " >

        
            <div class="col-md-12 col-sm-12 col-xs-12">
              <legend>2014 Constituency Results</legend>
            </div>
           <?php /* <div class="col-md-4 col-sm-12 col-xs-12">
              <input class="form-control" type="text" id="myInput" onkeyup="search_function()" placeholder="Search for names.." title="Type in a name" />
            </div>
            */?>
            
                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
                  <table class="table table-bordered" >
                    <thead>
                      <tr>
                        
                        <!-- <th width="8%">Year</th> -->
                        <th width="30%">Candidate</th>
                        <th width="25%">Party</th>
                        <!--<th>State</th>-->
                        <!--<th>District</th>-->
                        <th width="25%">Contituency</th>
                        
                        <th width="12%">No of Votes</th>
                      </tr>
                    </thead>
                    
                  <tbody id="tab_search">
                    <input type="hidden" value="<?php echo count($seats_data);?>" id="table_count" />
                  <?php 
                  $p = array();
                  $i=0;
                  $dist = array();

                  foreach($seats_data as $row) 
                    { 
                      if(!in_array($row['tel_distname'],$dist))
                      {?>
                        <tr><td colspan="6"></td></tr>
                        <tr class="text-center prev_heading"><td colspan='5'><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['tel_distname'];?>&nbsp;<span style="font-size:14px;margin-top:-12px">»</span></a></td></tr>
                        <?php 
                      }
                  ?>
                  <tr id="<?php echo 'row_'.$i;?>"  <?php if($row['status'] == 1) echo 'style="background-color:#E0F2F1"';?>>
                      <?php /* if(!in_array($row['year'], $p)){ ?>
                        <th ><?php echo $row['year'];?> </th>
                      <?php } else { ?>
                        <th></th>
                      <?php } */ ?>
                      <td><a><?php echo $row['tel_candidatename'];?></a></td>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_partyname'];?></a></td>
                      <!--<td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['tel_distname'];?></a></td>-->
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['tel_constname'];?></a></td>
                      <?php /* <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'candidate/'.str_ireplace(' ','',strtolower($row['eng_candidatename'])).'_'.str_ireplace(' ','',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_candidatename'];?></a></td> */?>
                       
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
 



