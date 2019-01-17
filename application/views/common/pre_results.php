  <style>
      .div_border{border-bottom:3px solid #5098cd;border-radius:0px;padding-left: 0px !important;padding-right: 0px !important;}
      .bg_blue{background-color: #5098ce !important;color: #fff;border-radius:0px;}
      .border_blue{border:3px solid #5098cd !important;border-radius:4px;}
      .toggleConst{display:none;}
      .text_mob{display:none;}
      #divSlideUp,.divSlide{display:none;}
      @media screen and (max-width:970px)
      {
        .div_border{text-align:left !important;}
        .text_mob{display:block;}
        .border-top-mob{border-top:1px solid #ddd;}
      }
    </style>
    <div class="col-md-12 col-sm-12 col-xs-12  margin-top-10" >
    <?php 
        if(isset($seats_data) && !empty($seats_data))
          {
    ?>
            <legend>2014 ఎన్నికల ఫలితాలు</legend>
            <div class="col-md-12 col-sm-12 col-xs-12   form-inline" >
              <div class="col-md-4 col-sm-12 col-xs-12 ">
                    <label >Search Any:</label>
                    <input class="form-control" type="text" placeholder="Search Name / Party / Constituency" onkeyup="showPreResults(this.value)" />
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12 form-inline">
                    <label >Select District:</label>
                   <select class="form-control" onchange="showPreResults(this.value)">

                      <option value="">Select District</option>
                      <?php 
                          $eng_district = array();
                          foreach($seats_data as $drow)
                          {
                            if(!in_array($drow['eng_district_name'],$eng_district,false))
                            {
                                echo '<option value="'.$drow['eng_district_name'].'"> '.$drow['tel_district_name'].'</option>';
                            }
                            $eng_district[] = $drow['eng_district_name'];
                          }
                      ?>
                   </select>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12  margin  bg-white-shadow " style="padding-left: 0px !important; padding-right: 0px !important;">
            

            <div class="col-md-12 col-sm-12 col-xs-12   div_border bg_blue " >

                <div class="col-md-3 col-sm-12 col-xs-12 " >
                  <h5><strong>నియోజకవర్గం</strong></h5>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12 ">
                  <h5><strong>పార్టీ</strong></h5>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 ">
                  <h5><strong>అభ్యర్థి పేరు</strong></h5>
                </div>
                <div class="col-md-1 col-sm-12 col-xs-12 ">
                  <h5><strong>ఓట్లు</strong></h5>
                </div>
                <div class="col-md-1 col-sm-12 col-xs-12 ">
                  <h5><strong>ఓట్ల శాతం</strong></h5>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12 ">
                  <h5><strong>మెజారిటీ ఓట్లు</strong></h5>
                </div>

              </div>
              <input type="hidden" id="total_seats_count" value="<?php echo count($seats_data)?>"  />
            <?php 
                  //print_r($seats_data[0]);
                  $eng_const_name = array();
                  $i = 0;

                  foreach($seats_data as $row) 
                  {

                 
                    
                    echo '<div class="col-md-12 col-sm-12 col-xs-12  margin div_border   " id="id_'.$i.'" >';
                  
                    echo '<input type="hidden" value="'.$row['eng_district_name'].'_'.$row['eng_const_name'].'_'.$row['eng_winner_party_name'].'_'.$row['eng_winner_candidate_name'].'" id="value_'.$i.'"/>';
                    
            ?>  
                <!-- First Row -->
                     <div class="col-md-12 col-sm-12 col-xs-12 ">
                       <div class="col-md-3 col-sm-12 col-xs-12 ">
                          <h5 ><span style="font-size:18px;font-weight:bold;color:#444 !important"><?php echo $row['tel_const_name'];?></span></h5>
                        </div> 
              
                        <div class="col-md-2  col-sm-12 col-xs-12 ">
                          <span class="text_mob" style="color:green;font-weight:bold;padding:8px"><?php if($row['winner_status'] == 1) echo 'Won' ;?></span>
                          <h5><?php echo '<img src="/elections-2019/'.$row['winner_symbol'].'" width="25px" height="25px"/>&nbsp;&nbsp;'.$row['tel_winner_party_name'];?></h5>
                        
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12 ">
                          <h5>
                            <?php 
                                echo $row['tel_winner_candidate_name'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                                if($row['winner_status'] == 1)
                                {
                                  echo '<span style="font-size:15px;font-weight:bold;color:green ;" class="glyphicon glyphicon-thumbs-up">';
                                }
                             /*   if($row['status'] == 2)
                                {
                                  echo '<span style="font-size:15px;font-weight:bold;color:red ;" class="glyphicon glyphicon-thumbs-down">';
                                }*/

                            ?>
                          </h5>
                        </div>
                        <div class="col-md-1 col-sm-12 col-xs-12 ">
                          <h5><?php echo number_format($row['winner_votes']);?></h5>
                        </div>
                        <div class="col-md-1 col-sm-12 col-xs-12 ">
                          <h5><?php echo number_format(($row['winner_votes']/($row['winner_votes']+$row['loser_votes']))*100,2).'%';?></h5>
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 ">
                          <h5><?php echo number_format(($row['winner_votes']-$row['loser_votes']));?></h5>
                        </div>
                      </div>

                    <!-- Second Row -->
                       <div class="col-md-12 col-sm-12 col-xs-12 border-top-mob">
                            <div class="col-md-3 col-sm-12 col-xs-12 ">
                            </div> 
                
                            <div class="col-md-2  col-sm-12 col-xs-12 ">
                              <span class="text_mob" style="color:red;font-weight:bold;padding:8px"><?php if($row['loser_status'] == 2) echo 'Loss' ;?></span>
                              <h5><?php echo '<img src="/elections-2019/'.$row['loser_symbol'].'" width="25px" height="25px"/>&nbsp;&nbsp;'.$row['tel_loser_party_name'];?></h5>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 ">
                               <h5>
                                  <?php 
                                    echo $row['tel_loser_candidate_name'];
                                  ?>
                              </h5>
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 ">
                              <h5><?php echo number_format($row['loser_votes']);?></h5>
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 ">
                              <h5><?php echo number_format(($row['loser_votes']/($row['winner_votes']+$row['loser_votes']))*100,2).'%';?></h5>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 ">
                            </div>
                      </div>


                    


            <?php
                  echo '</div>';
                  $eng_const_name[] = $row['eng_const_name'];
                  $i++;
                  }
            ?>
                   <!-- <div class="col-md-12 col-sm-12 col-xs-12 text-center" id="divSlideDown">
                      <h5><a>Load More...</a></h5>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 text-center" id="divSlideUp">
                      <h5><a>Load Less...</a></h5>
                    </div>-->
          </div>
    <?php
          }
    ?>
    </div>
    <script type="text/javascript">

      function showPreResults(val)
      {
               
       
        var input,filter,row,total_count,row_value;
        total_count= document.getElementById('total_seats_count').value;
        input = val.toUpperCase();
        $('.toggleConst').hide();
       // alert(total_count);
       for(i=0;i<total_count;i++)
       {
          row = document.getElementById('id_'+i);
          row_value=document.getElementById('value_'+i).value;
          filter = row_value.toUpperCase();
          if(filter.search(input) > -1)
          {
              row.style.display='block';
             $('.toggleConst').show();
              //alert(val);   
          }
          else
          {
              row.style.display='none';

          }
       }

      }


    

      /*

          $('#divSlideDown>h5>a').on('click',function(){
          $('.divSlide').slideDown('slow');
          $('#divSlideUp').show();
          $('#divSlideDown').hide();
        });
        $('#div_slideDown>div>a').on('click',function(){
          $('#div_prev_data').slideDown('slow');
          $('#div_slideUp').show();
          $('#div_slideDown').hide();
        });
        $('#div_slideUp>div>a').on('click',function(){
          $('#div_prev_data').slideUp('slow');
          $('#div_slideUp').hide();
          $('#div_slideDown').show();
        });
        */
    </script>
