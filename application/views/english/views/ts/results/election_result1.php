<style>
	.tb{box-shadow: 2px 4px 5px #888888;-webkit-box-shadow: 2px 4px 5px #888888; -moz-box-shadow: 2px 4px 5px #888888;}
	.tb,.tb>thead>tr>th,.tb>tbody>tr>td{border:1px solid #444 !important;}
	.tb>thead>tr>th{    text-shadow: 0.5px 0.5px grey;}
	.tb1>thead>tr{    background-image: linear-gradient(#88c7f7,#FAFAFA,#88c7f7);}
	.tb1>tbody>tr{   background-color:#e9f4fd;}

	.tb2>thead>tr{   background-image: linear-gradient(#f78897,#FAFAFA,#f78897);}
	.tb2>tbody>tr{   background-color:#fdeff1;}

	.tb3>thead>tr{   background-image: linear-gradient(#b198fd,#FAFAFA,#b198fd);}
	.tb3>tbody>tr{   background-color:#e8e4f7;}

	.tb4>thead>tr{    background-image: linear-gradient(#79fba1,#FAFAFA,#79fba1);}
	.tb4>tbody>tr{   background-color:#e7fbed;}

	.tb5>thead>tr{    background-image: linear-gradient(#f9d46d,#FAFAFA,#f9d46d);}
	.tb5>tbody>tr{   background-color:#fdf9ed;}

</style>
<div class="col-md-12 col-sm-12 col-xs-12">
	<?php 
		if(isset($results1) && !empty($results1)) 
		{
			
	?>

				<div class="col-md-3 col-sm-12 col-xs-12">
					<legend><?php echo $results1[0]['te_statename'];?></legend>
						<div>
							<?php include('donut_chart.php')?>
						</div>
						<div class="table-responsive">
							<table class="table tb tb1">
								<thead>
									<tr>
										<th>పార్టీ</th>
										<th>అధిక్యం</th>
										<th>గెలుపు</th>
									</tr>
								</thead>
								<tbody>
				
	<?php 
								foreach($results1 as $row)
								{
	?>
									<tr>
										<?php 
											if(!empty($row['symbol_path'])) 
											{ 
										?>
											<td><?php echo '<img src="'.base_url().$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['te_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['te_partyname'];?></td>
										<?php } ?>
										<td><?php echo $row['lead'];?></td>
										<td><?php echo $row['won'];?></td>
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


<!-- Chattis Garh -->
	<?php 
		if(isset($results2) && !empty($results2)) 
		{
			
	?>
				<div class="col-md-1 col-sm-12 col-xs-12"></div>
				<div class="col-md-3 col-sm-12 col-xs-12">
					<legend><?php echo $results2[0]['te_statename'];?></legend>
						<div class="table-responsive">
							<table class="table tb tb2">
								<thead>
									<tr>
										<th>పార్టీ</th>
										<th>అధిక్యం</th>
										<th>గెలుపు</th>
									</tr>
								</thead>
								<tbody>
				
	<?php 
								foreach($results2 as $row)
								{
	?>
									<tr>
										<?php 
											if(!empty($row['symbol_path'])) 
											{ 
										?>
											<td><?php echo '<img src="'.base_url().$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['te_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['te_partyname'];?></td>
										<?php } ?>
										<td><?php echo $row['lead'];?></td>
										<td><?php echo $row['won'];?></td>
									</tr>
						
	<?php
								}
	?>
								</tbody>
							</table>
						</div>

						<!-- Madhya Pradesh -->
						<legend><?php echo $results3[0]['te_statename'];?></legend>
						<div class="table-responsive">
							<table class="table tb tb3">
								<thead>
									<tr>
										<th>పార్టీ</th>
										<th>అధిక్యం</th>
										<th>గెలుపు</th>
									</tr>
								</thead>
								<tbody>
				
	<?php 
								foreach($results3 as $row)
								{
	?>
									<tr>
										<?php 
											if(!empty($row['symbol_path'])) 
											{ 
										?>
											<td><?php echo '<img src="'.base_url().$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['te_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['te_partyname'];?></td>
										<?php } ?>
										<td><?php echo $row['lead'];?></td>
										<td><?php echo $row['won'];?></td>
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


	<!-- Rajisthan -->
	<?php 
		if(isset($results4) && !empty($results4)) 
		{
			
	?>
				<div class="col-md-1 col-sm-12 col-xs-12"></div>
				<div class="col-md-3 col-sm-12 col-xs-12">
					<legend><?php echo $results4[0]['te_statename'];?></legend>
						<div class="table-responsive">
							<table class="table tb tb4">
								<thead>
									<tr>
										<th>పార్టీ</th>
										<th>అధిక్యం</th>
										<th>గెలుపు</th>
									</tr>
								</thead>
								<tbody>
				
	<?php 
								foreach($results4 as $row)
								{
	?>
									<tr>
										<?php 
											if(!empty($row['symbol_path'])) 
											{ 
										?>
											<td><?php echo '<img src="'.base_url().$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['te_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['te_partyname'];?></td>
										<?php } ?>
										<td><?php echo $row['lead'];?></td>
										<td><?php echo $row['won'];?></td>
									</tr>
						
	<?php
								}
	?>
								</tbody>
							</table>
						</div>
						<!-- Rajisthan -->
					<legend><?php echo $results5[0]['te_statename'];?></legend>
						<div class="table-responsive">
							<table class="table tb tb5">
								<thead>
									<tr>
										<th>పార్టీ</th>
										<th>అధిక్యం</th>
										<th>గెలుపు</th>
									</tr>
								</thead>
								<tbody>
				
	<?php 
								foreach($results5 as $row)
								{
	?>
									<tr>
										<?php 
											if(!empty($row['symbol_path'])) 
											{ 
										?>
											<td><?php echo '<img src="'.base_url().$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['te_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['te_partyname'];?></td>
										<?php } ?>
										<td><?php echo $row['lead'];?></td>
										<td><?php echo $row['won'];?></td>
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
</div>