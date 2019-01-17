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
	legend{margin-bottom: 4px !important;}
	rect{fill:#d0e8fb;}
	.col-md-12, .col-sm-12, .col-xs-12 {
			padding-right: 5px !important;
			padding-left: 5px !important;
		}
</style>
<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:0px;">
	<?php 
			$sum = 0;
			foreach($results1 as $total)
			{
				$sum += $total['won'];
			}
	?>

				<div class="col-md-4 col-sm-4 col-xs-12" >
					<legend><?php echo $results1[0]['hi_statename'] .'  ( '.$sum.' / 119 )';?></legend>
						<div>
							<?php include('donut_chart.php')?>
						</div>
						<br>
						<div class="table-responsive" style="margin-bottom: 5px;margin-top:-15px;">
							<table class="table tb tb1">
								<thead>
									<tr>
										<th>पार्टी</th>
										<th>बढ़त</th>
										<th>जीत</th>
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
											<td><?php echo '<img src="/elections-2018/'.$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['hi_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['hi_partyname'];?></td>
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
	


<!-- Chattis Garh -->
	<?php 
		
			$sum = 0;
			foreach($results2 as $total)
			{
				$sum += $total['won'];
			}
			
	?>
				<div class="col-md-4 col-sm-4 col-xs-12" >
					<legend><?php echo 'छत्तीसगढ़  ( '.$sum.' / 90 )';?></legend>
						<div class="table-responsive">
							<table class="table tb tb2">
								<thead>
									<tr>
										<th>पार्टी</th>
										<th>बढ़त</th>
										<th>जीत</th>
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
											<td><?php echo '<img src="/elections-2018/'.$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['hi_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['hi_partyname'];?></td>
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

					<!-- Mizoram -->

				<?php 
					$sum = 0;
					foreach($results5 as $total)
					{
						$sum += $total['won'];
					}
					$sum += 8;
				?>

					<legend><?php echo $results5[0]['hi_statename'].'  ( '.$sum.' / 40 )';?></legend>
						<div class="table-responsive">
							<table class="table tb tb5">
								<thead>
									<tr>
										<th>पार्टी</th>
										<th>बढ़त</th>
										<th>जीत</th>
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
											<td><?php echo '<img src="/elections-2018/'.$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['hi_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['hi_partyname'];?></td>
										<?php } ?>
										<td><?php echo $row['lead'];?></td>
										<td><?php echo $row['won'];?></td>
									</tr>
						
	<?php
								}
	?>
								<tr style="height:36px;">
								</tr>
								</tbody>
							</table>
						</div>
					
						
				</div>



	<!-- Rajisthan -->
	<?php 
			$sum = 0;
			foreach($results3 as $total)
			{
				$sum += $total['won'];
			}
			
	?>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<!-- Madhya Pradesh -->
						<legend><?php echo $results3[0]['hi_statename'].'  ( '.$sum.' / 230 )';?></legend>
						<div class="table-responsive">
							<table class="table tb tb3">
								<thead>
									<tr>
										<th>पार्टी</th>
										<th>बढ़त</th>
										<th>जीत</th>
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
											<td><?php echo '<img src="/elections-2018/'.$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['hi_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['hi_partyname'];?></td>
										<?php } ?>
										<td><?php echo $row['lead'];?></td>
										<td><?php echo $row['won'];?></td>
									</tr>
						
						
	<?php
								}
	?>
								<tr style="height:36px;">
								</tr>
								</tbody>
							</table>
						</div>

						<!-- Rajasthan -->
			<?php			
						$sum = 0;
						foreach($results4 as $total)
						{
							$sum += $total['won'];
						}
			?>
						<legend><?php echo $results4[0]['hi_statename'].'  ( '.$sum.' / 199 )';?></legend>
						<div class="table-responsive">
							<table class="table tb tb4">
								<thead>
									<tr>
										<th>पार्टी</th>
										<th>बढ़त</th>
										<th>जीत</th>
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
											<td><?php echo '<img src="/elections-2018/'.$row['symbol_path'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row['hi_partyname'];?></td>
										<?php } else { ?>
											<td><?php echo $row['hi_partyname'];?></td>
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
	

</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<!-- Sticky 1-->
		<div style="height:50px;text-align:center">
			<a href="https://hindi.sakshi.com/topic/Telangana%20Elections%202018" target="_blank">
				<img src="/elections-2018/assets/images/hindi_stories.gif" width="300px">
			</a>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12" style="padding:5px">
		<!-- Sticky 2-->
			<div style="height:50px;text-align:center">
				<a href="https://www.sakshi.com/elections-2018/hindi/telangana/results.html" target="_blank">
				<img src="/elections-2018/assets/images/hin_const.gif" width="300px">
			</a>
			</div>
	</div>
</div>