<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<?php if(isset($nav) && $nav == 1) { ?>
  			<title>Telangana Election Results: LIVE Updates | 2018 | Constituency & Party Wise</title>
			<meta name="description" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="abstract" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="keywords" content="Telangana Election Results, Telangana Election Results Live, Telangana Assembly Election Results 2018, Telangana Election Results Constituency Wise, Telangana Election Results Party Wise, Rajasthan Election Results 2018, Madhya Pradesh Election Results 2018, Mizoram Election Results 2018, Chhattisgarh Election Results 2018" />
			<meta http-equiv="refresh" content="120">
  		<?php } if(isset($nav) && $nav == 2) { ?>
  			<title>Telangana Election Results: LIVE Updates | 2018 | Constituency & Party Wise</title>
			<meta name="description" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="abstract" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="keywords" content="Telangana Election Results, Telangana Election Results Live, Telangana Assembly Election Results 2018, Telangana Election Results Constituency Wise, Telangana Election Results Party Wise, Rajasthan Election Results 2018, Madhya Pradesh Election Results 2018, Mizoram Election Results 2018, Chhattisgarh Election Results 2018" />
			<meta http-equiv="refresh" content="300">
  		<?php } else { ?>
  			<title>Telangana Election Results: LIVE Updates | 2018 | Constituency & Party Wise</title>
			<meta name="description" content="Telangana Assembly Election Results 2018: Get TS Eelection Results Constituency, Party, District, Wise with Votes, Winners List" />
			<meta name="abstract" content="LIVE: Telangana Assembly Election Results 2018, Constituency, Candidates & Party Wise, Winners, Counting of Votes, Majority List, Rajasthan, Madhya Pradesh, Mizoram and Chhattisgarh Election Results 2018" />
			<meta name="keywords" content="Telangana Election Results, Telangana Election Results Live, Telangana Assembly Election Results 2018, Telangana Election Results Constituency Wise, Telangana Election Results Party Wise, Rajasthan Election Results 2018, Madhya Pradesh Election Results 2018, Mizoram Election Results 2018, Chhattisgarh Election Results 2018" />
		<?php } ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="https://www.sakshi.com/sites/all/themes/sakshi/favicon.ico" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/calender/jquery-ui.css'); ?>" />
		 <script src="<?php echo base_url().'assets/js/jquery.min.js' ;?>"></script>
		 <script src="<?php echo base_url().'assets/js/main.js' ;?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
		<!-- Graph JS -->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<style>
			/* table {
			        table-layout: fixed;
			        word-wrap: break-word;
			}

		        table th, table td {
		            overflow: hidden;
		        }*/

			body{font-family: Calibri,'Mandali',Gautami,Pothana,sans-serif;font-size: 14px;line-height: 22px;}
			.t-yellow{background-color:#B3E5FC;background-image: linear-gradient(#ddddff,#c992e0);}
			.t-red{background-color:#E1F5FE;    background-image: linear-gradient(#f5cdcd,#e8e8b1);}
			.bg-color{background-image: linear-gradient(#e4f3fe,#FAFAFA,#e4f3fe);}
			.bg-color>td{font-size:18px;}
			.menu{text-align: right;width: 100%;padding:5px;margin-bottom: 0px;}
			.menu>li{display:inline-block;list-style: none;}
			.menu>li>a{padding: 0px 0px 1px 20px;color: #17479e !important;font-weight: bold;text-shadow: none;font-size: 15px;}
			.menu>li>a:hover{color:#fff !important;}
			.tb-megamenu-nav>li{display:inline-block;list-style: none;}
			.tb-megamenu-nav>li>a{color:#fff !important;font-family: 'Mandali',Gautami,Pothana,sans-serif;font-size: 18px !important;font-weight: normal;padding: 5px 15px !important;padding-top: 10px !important;}
			.tb-megamenu-nav>li>a:hover{color:#000 !important;}
			.tb-megamenu-nav>.active{background-color:#fff !important;}
			.tb-megamenu-nav>.active>a{color:#000 !important;}
			#election_footer{background-color:#0C4471;padding:5px;}
			#election_footer>p{color:#fff;text-align:center;margin:0;}
			legend{padding:6px 0px;}
			a{font-size:16px !important;}
			p{text-align: justify}
			.margin-bottom{margin-bottom:20px;}
			.right,.left{background-image:none !important;}
			.photo_para>p{text-align:center !important;font-size:16px;font-weight:bold;}
			.photo_para>p:nth-of-type(2){color:#069;}
			.photo_para>p:nth-of-type(3){color: #ca2828;}

			.prev_heading{background-color:#FFEBEE;}
			.prev_heading:nth-of-type(2){background-color:#E3F2FD;}
			.highlight_heading,.prev_heading > td > a {color:#C62828 !important;font-weight:bold;font-size:18px !important;}
			.highlight_heading:hover,.prev_heading > td > a:hover{color:#069 !important;}
			.highlight_heading::after,.prev_heading > td > a::after{content: url("<?php echo base_url().'assets/images/hand.gif'?>");margin-bottom:-10px;position:relative;top:3px;left:2px;}
			a{color:#444 !important;}
			a:hover{color:#eb6a14 !important;}
			.hyper_link{color:#C62828 !important;font-weight:bold;font-size:18px !important;}
			.red_color{background-color:#FFEBEE;}
			/* Map Css */
			path{stroke:rgb(110, 110, 110) !important;stroke-width:1 !important;}
			path:hover{fill:#069;stroke:red;cursor:pointer !important;box-shadow: 6px 4px 10px 10px #888888;-webkit-box-shadow: 6px 4px 10px 10px #888888;-moz-box-shadow: 6px 4px 10px 10px #888888;cursor:pointer;}
			text{font-family:Helvetica, Arial, sans-serif !important;}
			
			#svg{box-shadow: 0px 0px 10px #888888;-web-box-shadow: 0px 0px 10px #888888;-moz-box-shadow: 0px 0px 10px #888888;margin-bottom:20px;}
			.img-border>a>img{box-shadow: 0px 0px 10px #888888;-web-box-shadow: 0px 0px 10px #888888;-moz-box-shadow: 0px 0px 10px #888888;padding:10px;}
			svg{width:100%;height:auto;}
			#mapDiv{position:absolute;width:50%%;height:auto;background-color:#444;text-align:center;padding:10px;opacity:0.9;display: none;border-radius:5px;border:0.5px solid red;}
			#mapDiv::after{content:"";position: absolute;top: 100%; left: 50%;margin-left: -10px;margin-top:-2px;border-width: 10px;border-style: solid; border-color: #444 transparent transparent transparent;}
			.main_container{box-shadow: 0px 0px 5px #888888;-webkit-box-shadow: 0px 0px 5px  #888888;-moz-box-shadow: 0px 0px 5px #888888;}
			p{text-align:justify;}
			.well{background-color:#fff !important;box-shadow: 2px 4px 5px #888888;-webkit-box-shadow: 2px 4px 5px  #888888;-moz-box-shadow: 2px 4px 5px #888888;border:1px solid grey;margin-top:-10px !important;}
			legend{color:#0D47A1;text-shadow: 0.5px 0.5px grey;border-bottom:2px solid #eb6a14;font-size:20px !important;}
			
			#election_table>div>table>tbody>tr>th{width:20% !important;}
			::-webkit-scrollbar {
				    width: 5px;
				}
				/* Track */
			::-webkit-scrollbar-track {
			    background: #f1f1f1; 
			}
			 
			/* Handle */
			::-webkit-scrollbar-thumb {
			    background: #888; 
			}

			/* Handle on hover */
			::-webkit-scrollbar-thumb:hover {
			    background: #555; 
			}*/
			.wordwrap{word-wrap: break-word;border:1px solid #069;border-radius:10px;margin:10px 0px;}
			input,label,select{margin:5px 0px;}
			/*  #thead th{text-align:center;}
			#thead th,#tbody td{width:5%;}
			table #tbody, table #thead{display: block;}
			table #tbody{overflow: auto;height: 800px;}*/
			a{text-decoration:none !important;cursor:pointer !important;}
		

			@media screen and (max-width:970px){
				
			}

			@media and (max-width:570px){
				.headingStyle{border-bottom:1px solid #000;padding:10px 0px;}

			}
			.bgimg{background: url(<?php echo base_url('assets/images/bg.jpg');?>);background-repeat: no-repeat;background-size: cover;}
		</style>
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
		
		<div class="container-fluid" >
				
				

				<div class="row" >
				
	
