<style>
	.hscroll{overflow-x: hidden;overflow-y: scroll;white-space: nowrap;  }
	.hscroll>li{list-style-type: none;display: inline-block;float:left; transform:rotate(90deg);
  transform-origin: right top;}
  #winner_table>table>tbody>tr>td{border:1px solid #ddd;vertical-align: top !important;padding:2px 8px !important;}

</style>

<?php 
	if(isset($winner_list) && !empty($winner_list)) 
	{
?>

<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:-25px;">
<br>
	<legend>बढ़त / जीते / हारे</legend>
	<div class="table-responsive" id="winner_table" style="overflow-x: scroll !important;overflow-y: hidden !important;">
		<table class="table" >
			
			<tr class="text-center">
			<?php 
					
						
						foreach($winner_list as $row)
						{
			?>
										<td>

													<h5 style="font-size:18px;font-weight:bold;color:#C62828 ;"><?php echo $row['hindi_constname'] ; ?>&nbsp;<img src="<?php echo base_url().$row['symbol'];?>" width="25px" height="20px"></h5>

													<?php 	

															if(!empty($row['candidate_image']))
															{
													?>
														<img src="<?php echo '/elections-2018/'.$row['candidate_image'];?>" width="170px" height="110px">
													<?php 	

															}
															else
															{
													?>
														<img src="<?php echo '/elections-2018/assets/images/profile.png';?>" width="170px" height="110px">
													<?php }	?>
													<h5 style="font-size:15px;font-weight:bold;color:#069 ;"><?php echo $row['hindi_candidate_name'];?></h5>
													<h5 style="font-size:12px;font-weight:bold;color:#eb6a14 ;"><?php echo  $row['hindi_partyname'];?></h5>
													<?php 	

															if($row['home_winner'] == 1)
															{
													?>
														
																<h5 style="font-size:15px;font-weight:bold;color:green ;">जीत&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span></h5>
													<?php
															}
													?>
													<?php 	

															if($row['home_looser'] == 1)
															{
													?>
														
																<h5 style="font-size:15px;font-weight:bold;color:red ;">हार&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-down"></span></h5>
													<?php
															}
													?>
													<?php 	

															if(!empty($row['hindi_article']) && $row['hindi_article'] != 'null')
															{
													?>
														
																<a href="<?php echo $row['hindi_article'];?>" target="_blank">
																	<h5 style="float:right;font-size:12px;font-weight:bold;color:#ed1e24 ;    margin-top: -10px;">कुछ और »</h5>
																</a>
													<?php
															}
													?>


												
											</td>
								
			<?php
						}
					
			?>
			</tr>
		</table>
	</div>
</div>
<?php } ?>
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
	
		var left_position = $('#winner_table');
		var table_width = $('#winner_table>table').width();
		var tt = table_width-left_position.width();

			var pos = 0;
			setInterval(function(){	

				if(pos == tt)
				{
					left_position.animate({scrollLeft:0},'linear');
					pos=0;
				}
				else
				{
						
				    pos = left_position.scrollLeft();
				    left_position.scrollLeft(pos + 1);
				}
				
			},50);
        });
</script>