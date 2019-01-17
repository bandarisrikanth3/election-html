
<?php $_GLOBALS['graph_distname'] = $graph_distname; ?>

   <!-- Map & Description -->
  <div class="col-md-12 col-sm-12 col-xs-12 margin">
    <div class="col-md-1 col-sm-12 col-xs-12 margin"></div>
    <div class="col-md-10 col-sm-12 col-xs-12 ">
      <?php  $this->load->view('english/map/ts/district/'.str_ireplace(' ','-',strtolower($district->engname)));?>
    </div>
     <div class="col-md-1 col-sm-12 col-xs-12 margin"></div>
       <br/>
   </div>
  <div class="col-md-12 col-sm-12 col-xs-12 ">
    <legend>Description</legend>
    <p><?php echo str_ireplace('div>', 'p>', $district->engdescription);?></p>
       <br/>
    <?php 
          if(isset($candidate_details_district) && !empty($candidate_details_district))
          {
        ?>
      <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-2" >
      
              <div class="table-responsive well " style="background-image: linear-gradient(#fee4f4,#FAFAFA,#fee4ef) !important;" >
                <table class="table table-bordered">
                      <thead>
                        <tr class="bg-color text-center">
                          <td><b>Party</b></td>
                          <td><b>Name</b></td>
                          
                        </tr>
                      </thead>
                      <tbody >
                        <?php 
                          $const = array();
                          foreach($candidate_details_district as $row)
                          {
                            //if(!in_array($row['telconstname'],$const))
                            if(!in_array($row['const'],$const))
                            {
                        ?>
                              <tr class="text-center prev_heading" >
                                <td colspan = 2> <a><?php echo $row['const'];?></a></td>
                              </tr>
                        <?php   }
                        ?>
                            <tr>
                              <td><img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px">&nbsp;    <?php echo $row['party'];?></td>
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
  </div>


  <!-- District Details -->
  <div class="col-md-12 col-sm-12 col-xs-12 margin-top10">
    <div class="col-md-6 col-sm-12 col-xs-12  ">
     <?php 
        if(isset($district) && !empty($district))
        {
      ?>
          <legend>District Profile</legend>
          <div class="table-responsive well">
            <table class="table table-bordered">
                <tr>
                  <th>District</th>
                  <td><?php echo $district->engname;?></td>
                </tr>
                <tr>
                  <th>State</th>
                  <td><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($district->statename)).'.html';?>"><?php echo $district->hindi_statename;?></a></td>
                </tr>

               <tr>
                  <th>Assembly Constituencies</th>
                  <td><?php echo number_format($district->noofassemcont);?></td>
                </tr>
                 <tr>
                  <th>Total Votes</th>
                  <td><?php echo number_format($district->noofvoters);?></td>
                </tr>
                 <tr>
                  <th>Men</th>
                  <td><?php echo number_format($district->malevoters);?></td>
                </tr>
                 <tr>
                  <th>Women</th>
                  <td><?php echo number_format($district->femalevoters);?></td>
                </tr>
            </table>
          </div>
      <?php 
        }
      ?>
    </div>
   <!-- Previous Election Details -->
    <div class="col-md-6 col-sm-12 col-xs-12  ">      
        <legend>2014 Election Results</legend>
     <div class="col-md-12 col-sm-12 col-xs-12 well ">
        <?php include('column_chart.php');?>
      </div>

    </div>
  </div>


   <!-- Block -->   
    <div class="col-md-12 col-sm-12 col-xs-12  margin ">
      <!-- Div Start -->
     

        <!-- Previous Election Details -->
      <?php 
        if(isset($pre_result) && !empty($pre_result))
          {
      ?>
        <div class="col-md-6 col-sm-12 col-xs-12  margin ">
           
            
                <legend>Seats Won Party-wise In 2014 Elections</legend>
                <div class="table-responsive well">
                  <table class="table table-bordered">
                                <tr>
                                  <th width="5%">Year</th>
                                  <th>Party</th>
                                  <th>Winning Seats</th>
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
                                  <td> <!--<a href="<?php //echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"></a> --><?php echo $row['tel_partyname'];?></td>
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
   <!-- Previous Election Details -->
    <div class="col-md-6 col-sm-12 col-xs-12  ">
      <legend>Party-wise Win in Previous Election</legend>
      <div class="col-md-12 col-sm-12 col-xs-12 well ">
        
        <?php include('pie_chart.php');?>
      </div>

    </div>

       
    </div>

 <!-- Previous Constituency Results -->
    <?php 
          if(isset($seats_data) && !empty($seats_data))
          {
    ?>
            <legend>Previous Election Results: Constituency-wise</legend>
            <div class="col-md-12 col-sm-12 col-xs-12  margin " >
              
              <?php 
                  foreach($seats_data as $row) 
                  {
                    if(!empty($row['eng_constname']))
                    {
              ?>
                    <div class="col-md-6 col-sm-12 col-xs-12   text-center" >
                      <div class="col-md-12 col-sm-12 col-xs-12 table-responsive well " >
                        <table class="table table-bordered">
                          <tr class="text-center red_color">
                            <td colspan="3"><a class="hyper_link"><?php echo $row['year'];?></a></td>
                          </tr>
                           <tr class="text-center prev_heading" >
                            <td colspan="3"><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['eng_constname'];?></a></td>
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
      


       <!-- Campaigns -->
      <?php 
        if(isset($campaigns_data) && !empty($campaigns_data))
        {
      ?>
      <div class="col-md-12 col-sm-12 col-xs-12  margin-top10 ">
          
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
          }*/
        ?>

 



<script type="text/javascript">

  // Seats Ajax
  function get_seats_data(params)
  {
     //alert(params);
      $.ajax({
            type "POST",
            url '<?php echo base_url('ajax/ajax_get_seats_data_distid').'?';?>'+params,
            //data id='stateid',
            success function(data){
          //  alert(data);
              $('#seats_data').html(data);

            },
        });
  }


  function getdistrictDetails(district)
    {
        
      //alert(district);
        $.ajax({
            type "POST",
            url '<?php echo base_url('ajax/ajax_get_district_details').'/';?>'+district,
            //data id='districtid',
            success function(data){
            //  alert(data);
                $('#district_data').html(data);

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