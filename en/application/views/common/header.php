<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<?php 
	        if(isset($state) && !empty($state))
	        {
      	?>
      			<title><?php echo $state->engname;?> Election History, Constituencies List, MLA & MP Candidates, 2018 Schedule</title>

				<meta name="description" content="Find <?php echo $state->engname;?> Assembly Election History, List of Constituencies with Codes, MLA & MP Candidates with Photos, Assembly & Lok Sabha Elections, Current & Previous MLA’s & Ruling Parties Till Now, 2018 Election Schedule" />


				<meta name="abstract" content="Find <?php echo $state->engname;?> Assembly Election History, List of Constituencies with Codes, MLA & MP Candidates with Photos, Assembly & Lok Sabha Elections, Current & Previous MLA’s & Ruling Parties Till Now, 2018 Election Schedule" />


				<meta name="keywords" content="<?php echo $state->engname;?> Election History, <?php echo $state->engname;?> Constituencies List, <?php echo $state->engname;?> MLA Candidates, <?php echo $state->engname;?> MP Candidates, Ruling Parties Till Now, Current MLA & MP’s, <?php echo $state->engname;?> Election Schedule" />
      	<?php
      		}
      	?>

      	<?php 
	        if(isset($district) && !empty($district) )
	        {
	        	if( !empty($district->engname)){
      	?>
      			<title><?php echo $district->engname;?> District Constituencies List, MLA & MP Candidates, Seats | Telangana Elections</title>

			<meta name="description" content="Find <?php echo $district->engname;?> District Constituencies List with Codes, <?php echo $district->engname;?> District MLA & MP Candidates with Photos, Ruling Parties Till Now, No of Voters, Current & Previous Government, <?php echo $district->telname;?> జిల్లా, Number of Seats" />


			<meta name="abstract" content="Find <?php echo $district->engname;?> District Constituencies List with Codes, <?php echo $district->engname;?> District MLA & MP Candidates with Photos, Ruling Parties Till Now, No of Voters, Current & Previous Government, <?php echo $district->telname;?> జిల్లా, Number of Seats" />


			<meta name="keywords" content="<?php echo $district->engname;?> District Constituencies List, <?php echo $district->engname;?> District Constituencies Codes, Adialabad District MLA Candidates, <?php echo $district->engname;?> MP Candidates, Number of Voters, <?php echo $district->engname;?> Election History" />
      	<?php
      		} else {
      	?>
      		<title> District Constituencies List, MLA & MP Candidates, Seats | Telangana Elections</title>

			<meta name="description" content="Find  District Constituencies List with Codes,  District MLA & MP Candidates with Photos, Ruling Parties Till Now, No of Voters, Current & Previous Government, Number of Seats" />


			<meta name="abstract" content="Find  District Constituencies List with Codes,  District MLA & MP Candidates with Photos, Ruling Parties Till Now, No of Voters, Current & Previous Government,  Number of Seats" />


			<meta name="keywords" content=" District Constituencies List,  District Constituencies Codes, Adialabad District MLA Candidates,  MP Candidates, Number of Voters,  Election History" />
      <?php } }?>
      	<?php 
	        if(isset($const) && !empty($const) )
	        {
	        	if(!empty($const->engname)){
      	?>
      			<title><?php echo $const->engname;?> Constituency History, Codes, MLA & MP Candidates | Telangana Elections</title>

				<meta name="description" content="Find <?php echo $const->engname;?> Assembly & Lok Sabha Election History, <?php echo $const->engname;?> Constituency Code, MLA & MP Candidates, Ruling Parties till Now, Current MLA & MP’s, <?php echo $const->telname;?> నియోజకవర్గం, Number of Voters" />


				<meta name="abstract" content="Find <?php echo $const->engname;?> Assembly & Lok Sabha Election History, <?php echo $const->engname;?> Constituency Code, MLA & MP Candidates, Ruling Parties till Now, Current MLA & MP’s, <?php echo $const->telname;?> నియోజకవర్గం, Number of Voters" />


				<meta name="keywords" content="<?php echo $const->engname;?> Constituency, <?php echo $const->engname;?> Constituency History, <?php echo $const->engname;?> Constituency Code, <?php echo $const->engname;?> Constituency MLA & MP Candidates, <?php echo $const->engname;?> Assembly Constituency, <?php echo $const->engname;?> Voters" />
      	<?php
      		} else {
      	?>
      		<title>Constituency History, Codes, MLA & MP Candidates | Telangana Elections</title>

			<meta name="description" content="Find  Assembly & Lok Sabha Election History,  Constituency Code, MLA & MP Candidates, Ruling Parties till Now, Current MLA & MP’s,Number of Voters" />


			<meta name="abstract" content="Find  Assembly & Lok Sabha Election History,  Constituency Code, MLA & MP Candidates, Ruling Parties till Now, Current MLA & MP’s, Number of Voters" />


			<meta name="keywords" content=" Constituency,  Constituency History,  Constituency Code,  Constituency MLA & MP Candidates,  Assembly Constituency,  Voters" />
      	<?php 
      		}
      	}
      	?>
      	<?php if(isset($nav) && $nav == 1) { ?>
  			<title>Telangana Election Results 2018: Candidate, Party, Constituency Wise, Winners List, Seats</title>
			<meta name="description" content="Check out Telangana Assembly Election Results 2018, Candidate Winners List, Constituency Wise, Party Wise, Live Updates, TRS Setas, Praja Front Seats, Congress Seats, Counting of Votes, District Wise Results with Votes" />
			<meta name="abstract" content="Check out Telangana Assembly Election Results 2018, Candidate Winners List, Constituency Wise, Party Wise, Live Updates, TRS Setas, Praja Front Seats, Congress Seats, Counting of Votes, District Wise Results with Votes" />
			<meta name="keywords" content="Telangana Election Results, Telangana Election Results Candidates Wise, Telangana Election Results Constituency Wise, Telangana Election Results Party Wise, Telangana Assembly Election Results 2018 Winners List, TRS Seats, Praja Front Seats" />
			<meta http-equiv="refresh" content="300">
  		<?php } ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
		
		<div class="container-fluid" style="min-height:1000px;">
			<div class="container main_container">
				
				<header id="election_header" >
					
					<div class="row" >
						<a href="https://english.sakshi.com">
							<img src="<?php echo base_url().'assets/images/top_header1.png';?>" width="100%">

							<img src="<?php echo base_url().'assets/images/header.jpg';?>" width="100%" style="margin-top:10px;">
						</a>
					</div>
					
				</header>
				<br>

				<div class="row" >
					<?php if(isset($show) && $show==1){ ?>
						<iframe src="/elections-2018/en/results/results_tally.html"  height="620px" width="100%" frameborder="0"></iframe>
						<iframe src="/elections-2018/en/results/results_winners.html"  height="380px" width="100%" frameborder="0"></iframe>
					<?php } ?>
					<div class="col-md-8 col-sm-12 col-xs-12" style="border-right: 1px solid #ddd;">
				
	
