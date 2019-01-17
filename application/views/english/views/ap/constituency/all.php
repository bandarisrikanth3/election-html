<?php /*
 if(isset($const) && !empty($const)) 
		{ 
?>			
			<div class="col-md-12 col-sm-12 col-xs-12 well table-responsive">
				<legend>నియోజకవర్గం</legend>
			  	<table class="table table-bordered">
			  		<thead>
			  			<tr>
			  				<th>పేరు</th>
			  				<th>మొత్తం ఓటర్ల సంఖ్య</th>
			  				<th>పురుషులు</th>
			  				<th>మహిళలు</th>
			  				<!--<th>SC Voters</th>
			  				<th>ST Voters</th>-->
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php 
			  				$i = array();
			  				$j = array();
			  				foreach($const as $row) 
			  				{
		  						if(!in_array(strtoupper($row['eng_statename']),$i))
	  							{
	  						?>
	  								<tr><td colspan="10"></td></tr>
	  								<tr class="text-center"><td colspan="10"><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'.html';?>"><?php echo $row['tel_statename'];?> &nbsp;</a></td></tr>
	  								
	  						<?php
	  							}
	  							if(!in_array(strtoupper($row['engdistrictname']),$j))
	  							{
	  						?>
	  								<tr><td colspan="10"></td></tr>
	  								<tr class="text-center"><td colspan="10"><a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['engdistrictname'])).'.html';?>"><?php echo $row['teldistname'];?>&nbsp;</a></td></tr>
	  								
	  						<?php 
	  							}		  						
		  					?>		
		  						<tr>
		  							<td><a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['engname'])).'.html';?>"><?php echo $row['telname']; ?></a></td>
		  							<td><?php echo number_format($row['noofvoters']); ?></td>
		  							<td><?php echo number_format($row['malevoters']); ?></td>
		  							<td><?php echo number_format($row['femalevoters']); ?></td>
		  							<!--<td><?php // echo number_format($row['scvoters']); ?></td>
		  							<td><?php // echo number_format($row['stvoters']); ?></td>-->
		  						</tr>
		  				<?php
		  						
			  			?>
			  			<?php
			  					$i[] = strtoupper($row['eng_statename']);
			  					$j[] = strtoupper($row['engdistrictname']);
			  				}
			  			?>
			  		</tbody>
			  	</table>			 
			</div>
<?php 
		} */
?>

<style>
	.state_heading{margin-top:25px;border-bottom:2px solid navy;background-image: linear-gradient(#dcdbdc,#FAFAFA,#dbd9dc);}
	.state_heading>a{font-size:20px !important;font-weight:bold;padding:5px 8px;margin-left:-8px;}
	.state_heading>a::after,.district_heading>a::after{content: url(/elections-2018/assets/images/hand.gif);margin-bottom: -10px;position: relative;top: 3px;left: 2px;}
	.district_heading{padding:15px;float:left;}
	/*.district_heading>a{font-size:15px !important;font-weight: bold;padding:5px;background-color: #fff;border:1px solid red;border-radius:25px 25px;box-shadow:3px 3px 5px #8888;}*/
	.district_heading>a{font-size:18px !important;font-weight: bold;padding:5px;background-color: #fff;    background-image: linear-gradient(#f5cdcd,#fff,#e8e8b1); }
</style>
<?php
 if(isset($const) && !empty($const)) 
		{ 
?>			
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<legend>నియోజకవర్గం</legend>
				<?php 
			  				$i = array();
			  				foreach($const as $row) 
			  				{

		  						if(!in_array($row['eng_distname'],$i))
	  							{ 
	  			?>					<div class="col-md-12 col-sm-12 col-xs-12 state_heading"  >
	  									<a class="highlight_heading" href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'district/'.str_ireplace(' ','-',strtolower($row['eng_distname'])).'.html';?>"><?php echo $row['teldistname'];?>&nbsp;</a>
	  								</div>
	  								
	  			<?php 			}	

	  			?>	
	  							<div class="district_heading" >
	  								<a href="<?php echo base_url().str_ireplace(' ','',strtolower($row['eng_statename'])).'/'.'constituency/'.str_ireplace(' ','-',strtolower($row['engname'])).'.html';?>"><?php echo $row['telname']; ?></a>
	  							</div>
	  			<?php
	  							$i[] = $row['eng_distname'];
	  						}	  						
		  		?>		
			</div>
<?php 
		} 
?>
<br/>