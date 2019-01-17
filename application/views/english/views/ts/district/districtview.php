
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
<?php if(isset($district->teldescription) && strlen($district->teldescription)>5)
{
?>
  <div class="col-md-12 col-sm-12 col-xs-12 ">
    <legend>జిల్లా ముఖచిత్రం</legend>

   <?php

    if(stripos($district->teldescription, 'div') > 0)
    {
      echo str_ireplace('div', 'p', $district->teldescription);
    }
    else
    {
       echo '<p>'.$district->teldescription.'</p>';
    }
    ?>
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
                          <td><b>పార్టీ</b></td>
                          <td><b>పేరు</b></td>
                          
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
<?php } ?>

  <!-- District Details -->
  <div class="col-md-12 col-sm-12 col-xs-12 margin-top10">
    <div class="col-md-6 col-sm-12 col-xs-12  ">
     <?php 
        if(isset($district) && !empty($district))
        {
      ?>
          <legend>జిల్లా వివరాలు</legend>
          <div class="table-responsive well">
            <table class="table table-bordered width-5">
              <tbody>
                <tr>
                  <th>జిల్లా</th>
                  <td><?php echo $district->telname;?></td>
                </tr>
                <tr>
                  <th>రాష్ట్రం</th>
                  <td><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($district->statename)).'.html';?>"><?php echo $district->tel_statename;?></a></td>
                </tr>

               <tr>
                  <th>అసెంబ్లీ నియోజకవర్గాలు</th>
                  <td><?php echo number_format($district->noofassemcont);?></td>
                </tr>
             <!--    <tr>
                  <th>రాష్ట్రీయ గుర్తింపు పొందిన పార్టీలు</th>
                  <td><?php //echo number_format($district->noofparconst);?></td>
                </tr>-->
                 <tr>
                  <th>మొత్తం ఓటర్ల సంఖ్య</th>
                  <td><?php echo number_format($district->noofvoters);?></td>
                </tr>
                 <tr>
                  <th>పురుషులు</th>
                  <td><?php echo number_format($district->malevoters);?></td>
                </tr>
                 <tr>
                  <th>మహిళలు</th>
                  <td><?php echo number_format($district->femalevoters);?></td>
                </tr>
              </tbody>
            </table>
          </div>
      <?php 
        }
      ?>
    </div>
   <!-- Previous Election Details -->
    <div class="col-md-6 col-sm-12 col-xs-12  ">      
        <legend>2014 ఎన్నికల ఫలితాలు</legend>
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
           
            
                <legend>2014 ఎన్నికలు : పార్టీలు గెలుచుకున్న స్థానాలు</legend>
                <div class="table-responsive well">
                  <table class="table table-bordered">
                                <tr>
                                  <th width="5%">సంవత్సరం</th>
                                  <th>పార్టీ</th>
                                  <th>గెలుచుకున్న సీట్లు</th>
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
                                  <td><img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px">&nbsp;<?php echo $row['tel_partyname'];?></td>
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
      <legend>గత ఎన్నికలు : పార్టీల గెలుపు</legend>
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
            <legend>గత ఎన్నికల ఫలితాలు</legend>
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
                            <td colspan="3"><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['tel_constname'];?></a></td>
                          </tr>
                           <?php 
                                  $party = explode(',',$row['tel_partyname']);
                                  $candidate = explode(',',$row['tel_candidatename']);
                                  $votes = explode(',',$row['noofvotes']);
                                  $symbol1 = explode(',',$row['symbol']);
                            ?>
                            <tr>
                                <td width="50%"><span style="color:green;font-weight: bold">గెలుపు</span></td>
                                <td width="50%"><span style="color:red;font-weight: bold">ఓటమి</span></td>
                            </tr>
                            <tr>
                              <td><?php if(isset($candidate[0])){ echo $candidate[0];}?></td>
                              <td><?php if(isset($candidate[1])){echo $candidate[1];}?></td>
                            </tr>
                            <tr>
                              <td><img src="<?php if(isset($symbol1[0])){echo base_url().$symbol1[0];}?>" width="25px" height="20px">&nbsp;<?php if(isset($party[0])){ echo $party[0];}?></td>
                              <td><img src="<?php if(isset($symbol1[1])){echo base_url().$symbol1[1];}?>" width="25px" height="20px">&nbsp;<?php if(isset($party[1])){ echo $party[1];}?></td>
                            </tr>
                            <tr>
                              <td><?php if(isset($votes[0])){ echo number_format($votes[0]);}?></td>
                              <td><?php if(isset($votes[1])){echo number_format($votes[1]);}?></td>
                            </tr>
                            <tr>
                              <td colspan="2"> <b>మెజారిటీ ఓట్లు:-</b> <?php  if(isset($votes[0]) && isset($votes[1])){ echo number_format($votes[0]- $votes[1]);}?></td>
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
      <?php 
        if(isset($campaigners_details) && !empty($campaigners_details))
        {
      ?>
      <div class="col-md-12 col-sm-12 col-xs-12  margin-top10 " >
          
              <legend>ప్రచారకర్త వివరాలు</legend>
              <div class="table-responsive well">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>పేరు</th>
                      <th>పార్టీ</th>                   
                      <th>వివరణ</th>
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
      <div class="col-md-12 col-sm-12 col-xs-12  margin-top10 ">
          
              <legend>ప్రచారాలు</legend>
              <div class="table-responsive well">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      
                      <th>ప్రచారకుడు</th>
                      <th>పార్టీ</th>
                    <!--  <th>State</th>
                      <th>District</th>
                      <th>Contituency</th>-->                    
                      <th>స్థానం</th>
                      <th>వివరణ</th>
                      <th>లింక్</th>
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
                    <td><?php echo $row['eng_partyname'];?></td>
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

 



<script type="text/javascript">

  // Seats Ajax
  function get_seats_data(params)
  {
     //alert(params);
      $.ajax({
            type: "POST",
            url: '<?php echo base_url('ajax/ajax_get_seats_data_distid').'?';?>'+params,
            //data: id='stateid',
            success: function(data){
          //  alert(data);
              $('#seats_data').html(data);

            },
        });
  }


  function getdistrictDetails(district)
    {
        
      //alert(district);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('ajax/ajax_get_district_details').'/';?>'+district,
            //data: id='districtid',
            success: function(data){
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
