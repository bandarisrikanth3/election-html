

<?php $_GLOBALS['graph_constname'] = $graph_constname; ?>

<div class="col-md-12 col-sm-12 col-xs-12 margin-bottom">
  
    <div class="col-md-3 col-sm-12 col-xs-12"></div>
    <div class="col-md-6 col-xs-12 colsm-12 img-border text-center" >
      <?php if(!empty($const->engname)) { ?>
        <a href=""><img src="<?php echo base_url('assets/maps/constituency/').str_ireplace(' ','-',strtolower($const->engname)).'.jpg';?>" width="300px"  /> </a>
      <?php } else { ?>
        <a href=""><img src="<?php echo base_url('assets/maps/constituency/telangana.jpg');?>" width="300px"  /> </a>
      <?php } ?>
      
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12"></div>
    <br/>
</div>

<?php if(isset($const->teldescription) && strlen($const->teldescription)>5)
{
?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <legend>నియోజకవర్గం ముఖచిత్రం</legend>
  <p> <?php echo str_ireplace('div', 'p', $const->teldescription);?></p>
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
                          <td><b>పార్టీ</b></td>
                          <td><b>పేరు</b></td>
                          
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
<?php } ?>

<div class="col-md-12 col-sm-12 col-xs-12 ">
  <div class="col-md-6 col-sm-12 col-xs-12 margin-top10 ">
   <?php 
      if(isset($const) && !empty($const))
      {
    ?>
        <legend>నియోజకవర్గం </legend>
        <div class="table-responsive well">
          <table class="table table-bordered">
              <tr>
                <th>పేరు</th>
                <td><?php echo $const->telname;?></td>
              </tr>
              <tr>
                <th>జిల్లా</th>
                <td><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($const->statename)).'/'.'district/'.str_ireplace(' ','-',strtolower($const->distname)).'.html';?>"><?php echo $const->teldistname;?></a></td>
              </tr>
              <tr>
                <th>రాష్ట్రం</th>
                <td><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($const->statename)).'.html';?>"><?php echo $const->telstatename;?></a></td>
              </tr>
             
               <tr>
                <th>మొత్తం ఓటర్ల సంఖ్య</th>
                <td><?php echo number_format($const->noofvoters);?></td>
              </tr>
               <tr>
                <th>పురుషులు</th>
                <td><?php echo number_format($const->malevoters);?></td>
              </tr>
               <tr>
                <th>మహిళలు</th>
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
        <legend>2014 ఎన్నికల ఫలితాలు</legend>
        <div class="table-responsive well">
          <table class="table table-bordered">
              <tr>
                <th>పార్టీ</th>
                <th>పోలైన ఓట్లు</th>
                <th>ఫలితం</th>
              </tr>
              <?php 
              $votes = array();
              foreach($election_result as $row) {?>
              <tr>
                <!-- <td><a href="<?php //echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php //echo $row['tel_partyname'];?></a></td> -->
                <td><img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px">&nbsp;<?php echo $row['tel_partyname'];?></td>
                <td><?php echo number_format($row['noofvotes']);?> </td>
                <td><?php if($row['status']==1){ echo '<span style="color:green">గెలుపు</span>';} else {echo '<span style="color:red">ఓటమి</span>';}?> </td>
              </tr>
            <?php
                $votes[] = $row['noofvotes'];
               } ?>
               <tr class="text-center">
                  <td colspan="3"><b>మెజారిటీ : </b><?php if(isset($votes[0]) && isset($votes[1])){echo number_format($votes[0] - $votes[1]);}?></td>
               </tr>
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
           
            
                <legend>గత ఎన్నికలు : గెలిచిన పార్టీ</legend>
                <div class="table-responsive well">
                  <table class="table table-bordered">
                                <tr>
                                  <th width="5%">సంవత్సరం</th>
                                  <th>పార్టీ</th>
                                  <th>వచ్చిన ఓట్లు</th>
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
                                  <!-- <td><a href="<?php //echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['eng_partyname'])).'_'.str_ireplace(' ','-',strtolower($row['eng_statename'])).'.html';?>"><?php //echo $row['tel_partyname'];?></a></td>-->
                                  <td><img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px">&nbsp;<?php echo $row['tel_partyname'];?></td>
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
          <legend>గత ఎన్నికలు : పార్టీల గెలుపు</legend>
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
            <legend>గత ఎన్నికల ఫలితాలు</legend>
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
                              <td><?php if(isset($symbol1[0])){ ?><img src="<?php echo base_url().$symbol1[0];?>" width="25px" height="20px">&nbsp;<?php } ?><?php if(isset($party[0])){ echo $party[0];}?></td>
                              <td><?php if(isset($symbol1[1])){ ?><img src="<?php echo base_url().$symbol1[1];?>" width="25px" height="20px">&nbsp;<?php } ?><?php if(isset($party[1])){ echo $party[1];}?></td>
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
      
      
      <?php 
            if(isset($campaigns_data) && !empty($campaigns_data))
            {
          ?>
       <!-- Campaigns -->
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
         

      </div>
       <?php 
            }
          ?>





<script type="text/javascript">
  function getconstDetails(const)
    {
        
      //alert(const);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('ajax/ajax_get_const_details').'/';?>'+const,
            //data: id='constid',
            success: function(data){
            //  alert(data);
                $('#const_data').html(data);

            },
        });
     }
</script>