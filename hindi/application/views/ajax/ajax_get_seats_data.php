<?php 
	if(isset($seats_data))
	{
?>
		<legend>Constituency Details</legend>
	    <table class="table table-bordered">
	        <tr>
	        	<th>Year</th>
	        	<th>Partyname</th>
	        	<th>State</th>
	        	<th>District</th>
	        	<th>Contituency</th>
	        	<th>No of Votes</th>
	        </tr>
	    <?php foreach($seats_data as $row) { ?>
    		<tr>
    			<td><?php echo $year;?></td>
    			<td><?php echo $row['partyname'];?></td>
    			<td><a href="<?php echo base_url().'english/stateview/'.$row['statename'];?>"><?php echo $row['statename'];?></a></td>
    			<td><a href="<?php echo base_url().'english/districtview/'.$row['distname'];?>"><?php echo $row['distname'];?></a></td>
    			<td><a href="<?php echo base_url().'english/constview/'.$row['shortname'];?>"><?php echo $row['engname'];?></a></td>
    			<td><?php echo $row['noofvoters'];?></td>
    		</tr>
	    <?php } ?>
	       
	      <thead>
	    </table>
<?php 
	}
?>

