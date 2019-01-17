	<?php 
          if(isset($general_observers) && !empty($general_observers))
          {
        ?>
			<div class="col-md-12 col-sm-12 col-xs-12 " >
			
	            <legend>ఎన్నికల సంఘం నియమించిన సాధారణ పరిశీలకులు</legend>
	            <div class="table-responsive well"  >
            		<table class="table table-bordered">
              				<thead>
	              				<tr>
	              					<th style="width:5%">నియోజకవర్గం</th>
	              					<!--<th>జిల్లా</th>-->
	              					<th >పేరు</th>
	              					<!--<th>క్యాడర్</th>
	              					<th>మొబైల్</th>-->
	              					
	              				</tr>
              				</thead>
              				<tbody >
              					<?php 
              						foreach($general_observers as $row)
              						{
              							//if(!in_array($row['telconstname'],$const))
              							
              					?>
			              			
		              					<tr>
		              						<td ><?php echo $row['constituency'];?></td>
		              						<!--<td><?php //echo $row['district'];?></td>-->
		              						<td><?php echo $row['common_observer'];?>
		              						<br><?php echo $row['mobileno'];?></td>
		              						
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