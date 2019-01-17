 <!-- Election Details -->
    <div class="col-md-12 col-sm-12 col-xs-12 well margin-top10 "  id="election_table">
        <?php 
          if(isset($election_data) && !empty($election_data))
          {
        ?>
            <legend>Election Schedule</legend>
            <div class="table-responsive">
              <?php foreach($election_data as $row) { ?>
              <table class="table table-bordered">
               
                   <tr class="text-center">
                    
                    <td colspan="2"><strong><?php echo date_format(date_create($row['election_date']),'d M Y');?></strong></td>
                  </tr>
                  <?php /* ?>
                  <tr>
                    <th>State</th>
                    <?php foreach($election_data as $row) { ?>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'state/'.str_ireplace(' ','',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['eng_statename'];?></a></td>
                      <?php } ?>
                  </tr>
                   <tr>
                    <th>District</th>
                    <?php foreach($election_data as $row) { ?>
                      <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['eng_distname'];?></a></td>
                      <?php } ?>
                  </tr>
                  <tr>
                    <th>Contituency</th>
                    <?php foreach($election_data as $row) { ?>
                       <td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','',strtolower($row['eng_constname'])).'.html';?>"><?php echo $row['eng_constname'];?></a></td>
                      <?php } ?>
                  </tr>
                 
                  <tr>
                    <th>Parliament Constituency</th>
                    <?php foreach($election_data as $row) { ?>
                      <td><?php echo $row['parconst'];?></td>
                      <?php } ?>
                  </tr>
                  <?php */ ?>

                   <tr>
                    <th>Assembly Constituency</th>
                      <td><?php echo $row['assemconst'];?></td>
                  </tr>

                  <tr>
                    <th>Description</th>
                      <td><?php echo $row['engdescription'];?></td>
                  </tr>

                  <tr>
                    <th>Notification</th>
                      <td><?php echo date_format(date_create($row['notification']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Nomination</th>
                      <td><?php echo date_format(date_create($row['nomination']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Scrutiny</th>
                      <td><?php echo date_format(date_create($row['scrutiny']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Withdrawal</th>
                      <td><?php echo date_format(date_create($row['withdrawal']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Counting</th>
                      <td><?php echo date_format(date_create($row['counting']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Completion</th>
                      <td><?php echo date_format(date_create($row['completion']),'d M Y');?></td>
                  </tr>

                  <tr>
                    <th>Ascconst</th>
                      <td><?php echo $row['ascconst'];?></td>
                  </tr>

                  <tr>
                    <th>Astconst</th>
                      <td><?php echo $row['astconst'];?></td>
                  </tr>

                  <tr>
                    <th>Pscconst</th>
                      <td><?php echo $row['pscconst'];?></td>
                  </tr>

                  <tr>
                    <th>Pstconst</th>
                      <td><?php echo $row['pstconst'];?></td>
                  </tr>

                  <tr>
                    <th>Noofvoters</th>
                      <td><?php echo $row['noofvoters'];?></td>
                  </tr>

                  <tr>
                    <th>Malevoters</th>
                      <td><?php echo $row['malevoters'];?></td>
                  </tr>

                  <tr>
                    <th>Femalevoters</th>
                      <td><?php echo $row['femalevoters'];?></td>
                  </tr>
              </table>
            <?php } ?>
            </div>
        <?php 
          }
        ?>

    </div>