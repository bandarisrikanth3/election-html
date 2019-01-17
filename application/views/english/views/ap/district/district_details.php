<!-- District Details -->
<div class="col-md-12 col-sm-12 col-xs-12 margin-top-10 ">
     <?php 
        if(isset($district) && !empty($district))
        {
      ?>
          <legend class="legend_heading">జిల్లా వివరాలు</legend>
          <div class="table-responsive  ">
            <table class="table table-bordered width-5  bg-white-shadow">
              <tbody>
                <tr>
                  <th>జిల్లా</th>
                  <td><?php echo $district->telname;?></td>
                </tr>
                <tr>
                  <th>రాష్ట్రం</th>
                  <td><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','_',strtolower($district->statename)).'.html';?>"><?php echo $district->tel_statename;?></a></td>
                </tr>

               <tr>
                  <th>అసెంబ్లీ నియోజకవర్గాలు</th>
                  <td><?php echo number_format($district->noofstassembly);?></td>
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


  
