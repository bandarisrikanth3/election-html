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
      <legend>निर्वाचन क्षेत्र का विवरण</legend>
       <?php echo str_ireplace('b>','p>',$state->hindidescription);?>
    <br>
  </div>

  <!-- State Details & Column Chart - prev Results-->
  <div class="col-md-12 col-sm-12 col-xs-12 margin">

    <div class="col-md-6 col-sm-12 col-xs-12  "  id="state">
     <?php 
        if(isset($state) && !empty($state))
        {
      ?>
          <legend>राज्य का विवरण</legend>
          <div class="table-responsive well">
            <table class="table table-bordered">

                <tr>
                  <th>राज्य:</th>
                  <td><?php echo $state->hindiname;?></td>
                </tr>
               <tr>
                  <th>जिले:</th>
                  <td>31</td>
                </tr>
                <tr>
                  <th>विधानसभा निर्वाचन क्षेत्र:</th>
                  <td><?php echo number_format($state->noofassemcont);?></td>
                </tr>
                <tr>
                  <th>लोकसभा निर्वाचन क्षेत्र:</th>
                  <td>17</td>
                </tr>
                 <tr>
                  <th>मान्यता प्राप्त राजनीतिक दल:</th>
                  <td>4 </td>
                </tr>
				<tr>
                  <th>चुनाव आयोग में पंजीकृत पार्टियां:</th>
                  <td>66 </td>
                </tr>
                 <tr>
                  <th>मतदाताओं की संख्या:</th>
                  <td><?php echo number_format($state->noofvoters);?></td>
                </tr>
                 <tr>
                  <th>पुरुष:</th>
                  <td><?php echo number_format($state->malevoters);?></td>
                </tr>
                 <tr>
                  <th>महिलाएं:</th>
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
      <legend>2014 चुनाव परिणाम</legend>
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
                 
                  
                      <legend>2014 के चुनाव में पार्टियों द्वारा जीती गई सीटें </legend>
                      <div class="table-responsive well">
                        <table class="table table-bordered">
                                      <tr>
                                        <th>पार्टियां</th>
                                        <th>जीती गई सीटें</th>
                                      </tr>
                           <?php 
                           $i = array();
                                foreach($pre_result as $row)  
                                  {
                           ?>
                                     
                                      <tr>
                                     
                                        <!-- <td><a href="<?php //echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php //echo $row['party_shortname'];?></a></td> -->
                                        <td><?php echo $row['party_shortname'];?></td>
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
          <legend>2014 के चुनाव : वोट प्रतिशत</legend>
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
            <legend>2014 के चुनाव : किस निर्वाचन क्षेत्र से कौन</legend>
            <div class="col-md-12 col-sm-12 col-xs-12  margin " >
              <br>
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
                                <td width="50%"><span style="color:green;font-weight: bold">जीत</span></td>
                                <td width="50%"><span style="color:red;font-weight: bold">हार</span></td>
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
                              <td colspan="2"><b>बहुमत वोट
:-</b> <?php if(isset($votes[0]) && isset($votes[1])){ echo number_format($votes[0]- $votes[1]);}?></td>
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
          <br>
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
                  <tbody>
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
        
      <div class="col-md-12 col-sm-12 col-xs-12  margin ">
          
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
                        <td colspan="5"><b><?php echo date_format(date_create($row['campaign_date']),'d M Y');?></b></td>
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
 



