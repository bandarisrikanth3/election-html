<div class="col-md-12 col-sm-12 col-xs-12  margin ">

<?php 
    if(isset($pre_result) && !empty($pre_result))
    {
?>
      
      <!-- Previous Election Details - Data -->
      <div class="col-md-6 col-sm-12 col-xs-12  margin ">
           
        <legend>2014 ఎన్నికలు : పార్టీలు గెలుచుకున్న స్థానాలు</legend>
            <div class="table-responsive ">
              <table class="table table-bordered bg-white-shadow">
                <tr class="bg-color-green">
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
                  <td><img src="<?php echo '/elections-2019/'.$row['symbol'];?>" width="25px" height="20px">&nbsp;<?php echo $row['tel_partyname'];?></td>
                  <td><?php echo $row['votes'];?></td>
                </tr>

        <?php
            $i[] = $row['year'];
              }
        ?>        
                </table>
            </div>            
        </div>

        <!-- Previous Election Details  - Graph-->
        <div class="col-md-6 col-sm-12 col-xs-12  ">
        <!-- <legend>గత ఎన్నికలు : పార్టీల గెలుపు</legend>
        <div class="col-md-12 col-sm-12 col-xs-12 well ">
          
          <?php //include('pie_chart.php');?>
        </div>-->    
          <legend>2014 ఎన్నికల ఫలితాలు</legend>
          <div class="col-md-12 col-sm-12 col-xs-12  bg-white-shadow">
            <?php include('column_chart.php');?>
          </div>
        </div>
<?php 
      }
?>
</div>