<?php if(isset($district) && !empty($district)) 
		{ 
?>			
			<div class="col-md-12 col-sm-12 col-xs-12 well table-responsive">
				<legend>जिला</legend>
			  	<table class="table table-bordered">
			  		<thead>
			  			<tr>
			  				<th>नाम</th>
			  				<th>विधानसभा सीटें</th>
			  				<!--<th>SC Seats</th>
			  				<th>ST Seats</th>-->
			  				<th>मतदाताओं की संख्या</th>
			  				<th>पुरुष मतदाता</th>
			  				<th>महिला मतदाता</th>
			  				<!--<th>SC Voters</th>
			  				<th>ST Voters</th>-->
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php 
			  				$i = array();
			  				foreach($district as $row) 
			  				{
		  						if(!in_array($row['eng_statename'],$i))
	  							{ ?>
	  								<tr class="text-center"><td colspan="10"><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_statename'];?>&nbsp;</a></td></tr>
	  								<tr><td colspan="10"></td></tr>
	  					<?php 	}		  						
		  				?>		
		  						<tr>
		  							<td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['engname'])).'.html';?>"><?php echo $row['hindiname']; ?></a></td>
		  							<td><?php echo number_format($row['noofassemcont']); ?></td>
		  							<!--<td><?php // echo number_format($row['scseats']); ?></td>
		  							<td><?php // echo number_format($row['stseats']); ?></td>-->
		  							<td><?php echo number_format($row['noofvoters']); ?></td>
		  							<td><?php echo number_format($row['malevoters']); ?></td>
		  							<td><?php echo number_format($row['femalevoters']); ?></td>
		  							<!--<td><?php // echo number_format($row['scvoters']); ?></td>
		  							<td><?php //echo number_format($row['stvoters']); ?></td>-->
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