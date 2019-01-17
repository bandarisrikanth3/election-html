<!-- Prev election Results & Pie Chart - Vote Share -->   
    <div class="col-md-12 col-sm-12 col-xs-12  margin margin-top-10">
      <?php 
        if(isset($pre_result) && !empty($pre_result))
          {
      ?>
              <div class="col-md-6 col-sm-12 col-xs-12  margin ">
                 
                  
                      <legend>2014 లో పార్టీలు : గెలుచుకున్న సీట్లు</legend>
                      <div class="table-responsive ">
                        <table class="table table-bordered bg-white-shadow ">
                                      <tr class="bg-color-green" >
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
          <legend>2014 లో పార్టీలు : ఓట్ల శాతం</legend>
          <div class="col-md-12 col-sm-12 col-xs-12  margin bg-white-shadow ">
            <?php include('pie_chart.php');?>
          </div>
        </div>     

        <!-- Div End --> 
    </div>