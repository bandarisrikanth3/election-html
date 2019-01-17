

<?php if(isset($parties) && !empty($parties)) 
		{ 
?>			
			<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
				<legend>Parties</legend>
			  	<table class="table table-bordered">
			  		<thead>
			  			<tr>
			  				<th>Name</th>
			  				<th>President Name</th>
			  				<th>No Of Assembly Seats</th>
			  				<th>Description</th>
			  				<th>Manifest</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php 
			  				$i = array();
			  				foreach($parties as $row) 
			  				{
		  						if(!in_array($row['eng_statename'],$i))
	  							{
	  								echo '<tr class="text-center"><td colspan="10"><b>'.$row['eng_statename'].'</b></td></tr>';
	  								echo '<tr><td colspan="10"></td></tr>';
	  							}		  						
		  				?>		
		  						<tr>
		  							<td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'party/'.str_ireplace(' ','-',strtolower($row['engname'])).'_'.str_ireplace(' ','',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['engname'].' ('.$row['shortname'].')'; ?></a></td>
		  							<td><?php echo number_format($row['presidentename']); ?></td>
		  							<td><?php echo number_format($row['noofassemseats']); ?></td>
		  							<td><?php echo number_format($row['descriptioneng']); ?></td>
		  							<td><?php echo number_format($row['manifesto_eng']); ?></td>
		  						</tr>
		  				<?php
		  						
			  			?>
			  			<?php
			  					$i[] = $row['eng_statename'];
			  				}
			  			?>
			  		</tbody>
			  	</table>			 
			</div>
<?php 
		} 
?>

<br/>