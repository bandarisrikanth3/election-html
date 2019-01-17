  <style>
    .candidate_heading{padding:10px   ;background-color: #FFEBEE;}
    .candidate_heading>a{color: #C62828 !important;font-weight: bold;font-size: 18px !important;padding-left:8px;}
    .candidate_heading>a::after{content: url(/elections-2018/assets/images/hand.gif);margin-bottom: -10px;position: relative;top: 3px;left: 2px;}
    .candidate_page_style{margin:10px 20px;padding:5px;}
    @media screen and (max-width:970px)
    {
      .candidate_page_style{margin:10px 0px;padding:5px;}
    }
</style>
  <!-- Candidate Details -->
    <?php 
          if(isset($candidate_details_side) && !empty($candidate_details_side))
          {
        ?>
      <legend>ఎన్నికల బరిలో ఎవరెవరు</legend>

      <?php 
          $const = array();
          foreach($candidate_details_side as $row)
          {
      ?>
              
               
                        <?php 
                         // $const = array();
                        //  foreach($candidate_details_side as $row)
                      //    {
                            //if(!in_array($row['telconstname'],$const))
                            if(!in_array($row['const'],$const))
                            {
                        ?>
                              <div class="col-md-12 col-sm-12 col-xs-12 candidate_heading" style="padding:10px 5px;" >
                                 <a><?php echo $row['const'];?></a>
                                
                              </div>
                        <?php   }
                        ?>
            
            <?php if($row['telname'] != '') { ?>
              <div class="col-md-5 col-sm-6 col-xs-12  bg-color candidate_page_style "  >

                <div class="col-md-5 col-sm-5 col-xs-5 text-right" >
                  <?php if(!empty($row['img_path'])) {?>
                    <img src="<?php echo base_url().$row['img_path'] ;?>" alt="<?php echo $row['engname'];?>" style="width:90px;height:90px;border:1px solid #ddd;padding:5px;">
                  <?php } else { ?>
                    <img src="/elections-2018/assets/images/profile.png" alt="<?php echo $row['engname'];?>" style="width:90px;height:90px;border:1px solid #ddd;padding:5px;">
                  <?php } ?>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 photo_para ">
                    
                    <h5 ><strong><?php echo $row['telname'];?></strong></h5>
			<h6 ><img src="<?php echo base_url().$row['symbol'];?>"  width="25px" height="20px">&nbsp;&nbsp;<strong><?php echo $row['party'];?>&nbsp;<?php if($row['alignid']!=0){echo "(".$row['alignname'].")";}else{echo "";}?></strong></h6>
                  </div>
                </div>

            <?php
              }
                  $const[] = $row['const'];
                }
              ?>
          
      <?php 
        } 
          ?>

      
          <!-- Campaigners Details -->