<?php 
	if(isset($district))
	{
?>
		<legend>District Details</legend>
	    <table class="table table-bordered">
	        <tr>
	        	<th>Name:</th>
	        	<td><a href="<?php echo base_url();?>"><?php echo $district->engname;?></a></td>
	        </tr>
	        <tr>
	        	<th>State:</th>
	        	<td><?php echo $district->sengname;?></td>
	        </tr>
	        <tr>
	        	<th>No of Assembly Seats:</th>
	        	<td><?php echo $district->noofassemcont;?></td>
	        </tr>
	         <tr>
	        	<th>No of Parties:</th>
	        	<td><?php echo $district->noofparconst;?></td>
	        </tr>
	         <tr>
	        	<th>No of Voters:</th>
	        	<td><?php echo $district->noofvoters;?></td>
	        </tr>
	         <tr>
	        	<th>Male Voters:</th>
	        	<td><?php echo $district->malevoters;?></td>
	        </tr>
	         <tr>
	        	<th>Female Voters:</th>
	        	<td><?php echo $district->femalevoters;?></td>
	        </tr>
	      <thead>
	    </table>
<?php 
	}
?>

<?php 
	if(isset($prev_election_data))
	{
?>
		<legend>Previous Election Details</legend>
	    <table class="table table-bordered">
	    <?php foreach($prev_election_data as $row)
	    		{
	    ?>
			        <tr>
			        	<th colspan="2"><?php echo $row['tecname'];?></th>	        	
			        </tr>
			        <tr>
			        	<th>Won:</th>
			        	<td><?php echo $row['win'];?></td>
			        </tr>
	    <?php 
	 			} 
	 	?>
	    </table>
<?php 
	}
?>