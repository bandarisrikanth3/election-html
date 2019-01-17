<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<title>Election - Sakshi Special</title>
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
				
				

				<div class="row" >
					<div class="col-md-8 col-sm-12 col-xs-12" style="border-right: 1px solid #ddd;">
				
	
