<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">	
  		<?php if(isset($nav) && $nav == 1) { ?>
  			<title>Telangana Election Results: LIVE Updates | 2018 | Constituency & Party Wise|Telangana Election Results: LIVE Updates | 2018 | Constituency & Party Wise</title>
			<meta name="description" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="abstract" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="keywords" content="Telangana Election Results, Telangana Election Results Live, Telangana Assembly Election Results 2018, Telangana Election Results Constituency Wise, Telangana Election Results Party Wise, Rajasthan Election Results 2018, Madhya Pradesh Election Results 2018, Mizoram Election Results 2018, Chhattisgarh Election Results 2018" />
			
  		<?php } if(isset($nav) && $nav == 2) { ?>
  			<title>Telangana Election Results: LIVE Updates | 2018 | Constituency & Party Wise|Telangana Election Results: LIVE Updates | 2018 | Constituency & Party Wise</title>
			<meta name="description" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="abstract" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="keywords" content="Telangana Election Results, Telangana Election Results Live, Telangana Assembly Election Results 2018, Telangana Election Results Constituency Wise, Telangana Election Results Party Wise, Rajasthan Election Results 2018, Madhya Pradesh Election Results 2018, Mizoram Election Results 2018, Chhattisgarh Election Results 2018" />
			
  		<?php } else { ?>
  			<title>Telangana Election Results: LIVE Updates | 2018 | Constituency & Party Wise|Telangana Election Results: LIVE Updates | 2018 | Constituency & Party Wise</title>
			<meta name="description" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="abstract" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="keywords" content="Telangana Election Results, Telangana Election Results Live, Telangana Assembly Election Results 2018, Telangana Election Results Constituency Wise, Telangana Election Results Party Wise, Rajasthan Election Results 2018, Madhya Pradesh Election Results 2018, Mizoram Election Results 2018, Chhattisgarh Election Results 2018" />
		<?php } ?>
		<link rel="shortcut icon" href="https://www.sakshi.com/sites/all/themes/sakshi/favicon.ico" />
		<link rel="stylesheet" href="<?php echo '/elections-2018/assets/css/bootstrap.min.css';?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo '/elections-2018/assets/css/main.css';?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo '/elections-2018/assets/calender/jquery-ui.css'; ?>" />
		 <script src="<?php echo '/elections-2018/assets/js/jquery.min.js' ;?>"></script>
		 <script src="<?php echo '/elections-2018/assets/js/main.js' ;?>"></script>
		<script src="<?php echo '/elections-2018/assets/js/bootstrap.min.js';?>"></script>
		<!-- Graph JS -->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		
		<script>
			// Hide Campainers Div
			  function showDiv(id)
			  {
			    /*  //alert(id);
			      $(document).ready(function(){
			          $('#campaigners_div').show();
			          $('tr#'+id).show();
			          $('tr#'+id).siblings().hide();
			      });
*/			  }
		</script>
		<script>
			
			$(document).ready(function(){

				$('g').mouseover(function(){
					x = $(this).children('text').attr('x');
					y = $(this).children('text').attr('y');
					var div  = '<div style="position:absolute;left:"'+x+'";top:"'+y+'";width:20px;height:35px;border:1px solid #000;"><p>'+Name+'</p></div>';
					alert(x);
				});

				/*$('g').mouseleave(function(){
					x = $(this).children('text').attr('x');
					y = $(this).children('text').attr('y');
					//alert( $(this).children('text').attr('x'));
					$(this).children('text').attr('x',x+20);
					$(this).children('text').attr('y',y+20);
				});*/
			});
		</script>
		<script>/*
			$(document).ready(function(){

				if(window.location != window.parent.location)
				{
					//alert('no');
					$('#election_header').hide();
					$('#election_footer').hide();
					
				}
				else
				{
					//alert('yes');
					
					$('#election_header').show();
					$('#election_footer').show();
				}
			});*/
		</script>

		
		
		

	</head>
	<body >
		
		<div class="" style="">
				

				<div class="row" >
				
	
