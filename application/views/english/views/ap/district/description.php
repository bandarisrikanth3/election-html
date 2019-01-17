 <?php 
      if(isset($district->teldescription) && strlen($district->teldescription)>5)
      {
  ?>
        <div class="col-md-12 col-sm-12 col-xs-12 margin-top-10">
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
        </div>

  <?php 
        } 
  ?>


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
