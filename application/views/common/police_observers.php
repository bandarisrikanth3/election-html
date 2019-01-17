	<style>
		.table-fixed {
			        table-layout: fixed;
			        word-wrap: break-word;
			}

		        .table-fixed th, .table-fixed td {
		            overflow: hidden;
		        }
	</style>
	<?php 
          if(isset($police_observers) && !empty($police_observers))
          {
        ?>
			<div class="col-md-12 col-sm-12 col-xs-12 " >
			
	            <legend>ఎన్నికల సంఘం నియమించిన పోలీసు పరిశీలకులు</legend>
	            <div class=" well "  >
              				<p></p>
              					<?php 
              					$observer = array();
              						foreach($police_observers as $row)
              						{
              							
              							
          					 	if(!in_array($row['observer'],$observer))
              							{
              							
              					?>
              							
              								<h2 style="color:#C62828 !important;font-size:18px;font-weight: bold;"><?php echo $row['observer'].' - '.$row['cadre'].' - '.$row['mobileno'];?></h2>
              							
              							
              					<?php 

              							}
              					?>
			              			
		              					<p ><?php echo str_ireplace(',',', ' ,$row['constituency']);?></p>
		              						
		              					
              					<?php
              						$observer[] = $row['observer'];
              						}
              					?>
              				           
	            </div>
	       

			</div>
			<?php 
				} 
	        ?>