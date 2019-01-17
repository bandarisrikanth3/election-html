 <!-- Campaigners Details -->
    <div class="col-md-12 col-sm-12 col-xs-12  margin-top10 " >
      <!--<div class="col-md-4 col-sm-12 col-xs-12 well margin-top10 " >-->
          
              <legend>Notifications</legend>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Date</th>
					  <th>Description</th>
					  <th>PDF</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($notifications as $row) { ?>
                  <tr>
                   <td><?php echo date('d/m/Y',strtotime($row['date']));?></td>
                    <td><?php echo $row['engdesc'];?></td>
					<td><a href='http://192.168.150.157/election_beta/<?php echo $row['pdfurl'];?>' target='_blank'><?php echo $row['pdfurl'];?></a></td>
                  </tr>
                <?php } ?>             
                  </tbody>
                </table>
              </div>
        
      <!--</div>-->
    </div>