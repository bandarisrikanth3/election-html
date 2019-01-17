<style>
	.bg-color-grey{background-color:#607d8b;font-size: 18px;color:#fff;}	
	.border-grey{border:3px solid #607d8b;border-radius:4px}
</style>

<div class="col-md-12 col-sm-12 col-xs-12 margin-top-10"  >
			
	            <legend>ఎన్నికల బరిలో ఎవరెవరు</legend>
	           <!-- <div>
	              <input class="form-control" type="text" id="myInput" onkeyup="search_function()" placeholder="Search for names.." title="Type in a name" />
	            </div>-->
	            <div class="table-responsive border-grey">
		            <table class="table">
	              				<thead>
		              				<tr class="bg-color-grey">
		              					<th>పార్టీ</th>
		              					<th>పేరు</th>
		              					
		              				</tr>
	              				</thead>
	              	</table>
             	</div>
	            <div class="table-responsive  bg-white-shadow" id="candidate_table" style="max-height:600px !important;overflow: auto;margin-top:-25px">
            		<table class="table table-bordered  ">
              				<!--<thead>
	              				<tr class="bg-color-grey">
	              					<th>పార్టీ</th>
	              					<th>పేరు</th>
	              					
	              				</tr>
              				</thead>-->
              				<tbody >
              					 <input type="hidden" value="<?php echo count($candidate_details_side);?>" id="table_count" />
              					<?php 
              						$const = array();
              						$i=0;
              						foreach($candidate_details_side as $row)
              						{
              							//if(!in_array($row['telconstname'],$const))
              							if(!in_array($row['const'],$const))
              							{
              					?>
			              					<tr class=" prev_heading" id="<?php echo 'row_'.$i;?>">
			              						<td colspan = 2> <a><?php echo $row['const'];?></a></td>
			              					</tr>
		              			<?php 	}
		              			?>
		              					<tr id="<?php echo 'row_'.$i;?>">
		              						<td><img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px">&nbsp;<?php echo $row['party'];?>&nbsp;<?php //if($row['alignid']!=0){echo "(".$row['alignname'].")";}else{echo "";}?></td>
		              						<td><?php echo $row['telname'];?></td>
		              						
		              						<!--<td><?php // echo $row['telpartyname'];?></td>-->
		              						<input type="hidden" value="<?php echo $row['const'].'_'.$row['party'].'_'.$row['telname'];?>" id="<?php echo 'sdetails_'.$i;?>">
		              					</tr>
              					<?php
              							$const[] = $row['const'];
              							$i++;
              						}
              					?>
              				</tbody>
                    </table>	           
	            </div>
	       

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

<script>
function search_function() {
    var input, filter, tr, td,i,a;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    count = document.getElementById("table_count").value;
    
    
   for (i = 0; i < count; i++) {
      a= document.getElementById('sdetails_'+i).value;
      row= document.getElementById('row_'+i);
      tb_head= document.getElementById('tb_head__'+i);
      a= a.toUpperCase();
      if(a.search(filter) > -1)
      {
        row.style.display = '';
        //alert();
      }
      else
      {
        row.style.display = "none";
        //alert(tr[i]);
      }
      
    }
 
}
</script>