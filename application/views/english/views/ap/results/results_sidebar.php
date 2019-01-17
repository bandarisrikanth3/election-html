	</div>
		
	<!-- sidebar -->
	
	<div class="col-md-4 col-sm-12 col-xs-12">

		<!-- Election Winner List -->
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				
				<?php include('winner_scroll.php');?>
	       

			</div>
	      	
	      	<!-- Election candidate List -->
	    <?php 
          if(isset($candidate_details_side) && !empty($candidate_details_side))
          {
        ?>
			<div class="col-md-12 col-sm-12 col-xs-12 " >
			
	            <legend>ఎన్నికల బరిలో ఎవరెవరు</legend>
	            <div class="table-responsive well" id="candidate_table" style="max-height:600px !important;overflow: auto;">
            		<table class="table table-bordered">
              				<thead>
	              				<tr>
	              					<th>పార్టీ</th>
	              					<th>పేరు</th>
	              					
	              				</tr>
              				</thead>
              				<tbody >
              					<?php 
              						$const = array();
              						foreach($candidate_details_side as $row)
              						{
              							//if(!in_array($row['telconstname'],$const))
              							if(!in_array($row['const'],$const))
              							{
              					?>
			              					<tr class=" prev_heading" >
			              						<td colspan = 2> <a><?php echo $row['const'];?></a></td>
			              					</tr>
		              			<?php 	}
		              			?>
		              					<tr>
		              						<td><img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px">&nbsp;<?php echo $row['party'];?></td>
		              						<td><?php echo $row['telname'];?></td>
		              						
		              						<!--<td><?php // echo $row['telpartyname'];?></td>-->
		              					</tr>
              					<?php
              							$const[] = $row['const'];
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


<script>
	$(document).ready(function(){
		//alert();
	     /* $('html, body').animate({
				//scrollTop: $("candidate_table").offset().top
				scrollTop: $("#candidate_table").offset().top
			},1000);
			setInterval(function(){ alert("Hello"); }, 3000);
			*/
			//setInterval(function(){ alert("Hello"); }, 3000);
		
		var top_position = $('#candidate_table');
			var pos = 0;
			setInterval(function(){	
						
				    pos = top_position.scrollTop();
				    top_position.scrollTop(pos + 1);
				
			}, 50);
        });
</script>
