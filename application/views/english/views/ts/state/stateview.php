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
      <legend>రాష్ట్ర ముఖచిత్రం</legend>
      <?php echo str_ireplace('div', 'p', $state->teldescription);?>
    <br>
  </div>

  <!-- State Details & Column Chart - prev Results-->
  <div class="col-md-12 col-sm-12 col-xs-12 margin">

    <div class="col-md-6 col-sm-12 col-xs-12 wid "  id="state" >
     <?php 
        if(isset($state) && !empty($state))
        {
      ?>
          <legend>తెలంగాణ</legend>
          <?php include('details.php');?>
      <?php 
        }
      ?>
    </div>

    <!-- Column Chart - Prev Results -->
    <div class="col-md-6 col-sm-12 col-xs-12 ">
      <legend>2014 ఎన్నికలు : ఏ పార్టీ ఎన్ని సీట్లు</legend>
      <div class="col-md-12 col-sm-12 col-xs-12 well   ">
        
        <?php include('column_chart.php');?>
      </div>
      <div class="table-responsive well" style="background-image: linear-gradient(#fee4f4,#FAFAFA,#fee4ef) !important;">
        <table class="table table-bordered width-5">
          <tbody>
            <tr><td>రాష్ట్ర పక్షి</td><td>పాలపిట్ట</td></tr>
            <tr><td>రాష్ట్ర జంతువు</td><td>జింక</td></tr>
            <tr><td>రాష్ట్ర చెట్టు</td><td>జమ్మి చెట్టు</td></tr>
            <tr><td>రాష్ట్ర పువ్వు</td><td>తంగేడు</td></tr>
            <tr><td>పెద్ద జిల్లా (భౌగోళికంగా)</td><td>భద్రాద్రి కొత్తగూడెం</td></tr>
            <tr><td>చిన్న జిల్లా (భౌగోళికంగా)</td><td>హైదరాబాద్</td></tr>
            <tr><th>గ్రామీణ జనాభా (2011) </th><td>61.12 %</td></tr>
            <tr><th>పట్టణ జనాభా</th><td>38.88 %</td></tr>
          </tbody>
        </table>
      </div>
      <div class="table-responsive well" style="background-image: linear-gradient(#fee9e4,#FAFAFA,#fee8e4) !important;">
        <table class="table table-bordered width-5">
          <tbody>
            <tr><th>ఉత్తరం <span style="font-size:12px;">(రాష్ట్ర సరిహద్దులు)</span></th><td>మహారాష్ట్ర, చత్తీస్ గఢ్</td></tr>
            <tr><th>పశ్చిమ</th><td>కర్నాటక</td></tr>
            <tr><th>తూర్పు, దక్షిణ</th><td>ఆంధ్రప్రదేశ్</td></tr>
            
          </tbody>
        </table>
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
                 
                  
                      <legend>2014 లో పార్టీలు : గెలుచుకున్న సీట్లు</legend>
                      <div class="table-responsive well">
                        <table class="table table-bordered">
                                      <tr>
                                        <th>పార్టీలు</th>
                                        <th>గెలుచుకున్న సీట్లు</th>
                                      </tr>
                           <?php 
                           $i = array();
                                foreach($pre_result as $row)  
                                  {
                           ?>                                     
                                      <tr>                                     
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
       
       <!-- Pie Chart  -->
        <div class="col-md-6 col-sm-12 col-xs-12  margin ">
          <legend>2014 లో పార్టీలు : సాధించిన ఓట్ల శాతం</legend>
          <div class="col-md-12 col-sm-12 col-xs-12 well margin ">
            <?php include('pie_chart.php');?>
          </div>
        </div>     

        <!-- Div End --> 
    </div>
<?php 
          if(isset($candidate_details_side) && !empty($candidate_details_side))
          {
        ?>
      <div class="col-md-12 col-sm-12 col-xs-12 " id="candidate_details_side">
      
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
                        <?php   }
                        ?>
                            <tr>
                              <td><img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px">&nbsp;<?php echo $row['party'];?></td>
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
    <!-- Previous Constituency Results -->
    <?php 
          if(isset($seats_data) && !empty($seats_data))
          {
    ?>
            <legend>2014 ఎన్నికల ఫలితాలు</legend>
            <div class="col-md-12 col-sm-12 col-xs-12  margin " >
              
              <?php 
                  foreach($seats_data as $row) 
                  {
              ?>
                    <div class="col-md-6 col-sm-12 col-xs-12   text-center" >
                      <div class="col-md-12 col-sm-12 col-xs-12 table-responsive well " >

                        <table class="table table-bordered">
                          <tr class="text-center prev_heading">
                            <td colspan="3"><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['tel_distname'];?></a></td>
                          </tr>
                           <tr class="text-center prev_heading" >
                            <td colspan="3"><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['tel_constname'];?></a></td>
                          </tr>
                           <?php 
                                  $party = explode(',',$row['tel_partyname']);
                                 // $candidateid = explode(',',$row['candidatecode']);
                                  $candidate = explode(',',$row['tel_candidatename']);
                                  $symbol1 = explode(',',$row['symbol']);
                                  $votes = explode(',',$row['noofvotes']);
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
                              <td colspan="2"><b>మెజారిటీ ఓట్లు:-</b> <?php if(isset($votes[0]) && isset($votes[1])){ echo number_format($votes[0]- $votes[1]);}?></td>
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
       
        <div class="col-md-12 col-sm-12 col-xs-12  margin " >
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
      
       <!-- Campaigns -->
       <?php 
          if(isset($campaigns_data) && !empty($campaigns_data))
          {
        ?>
        
      <div class="col-md-12 col-sm-12 col-xs-12  margin ">
          
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
          } */
        ?>






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
 



