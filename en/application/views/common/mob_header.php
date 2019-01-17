<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sakshi Apps</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="https://www.sakshi.com/sites/all/themes/sakshi/favicon.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/calender/jquery-ui.css'); ?>" />
		 <script src="<?php echo base_url().'assets/js/jquery.min.js' ;?>"></script>
		 <script src="<?php echo base_url().'assets/js/main.js' ;?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/datetimepicker.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/datetimepicker_css.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/ckeditor/ckeditor.js';?>"></script>
		<style>
			body{font-family: Verdana, Arial, Helvetica, sans-serif;}
			.global_head{background-color:#f4c225;text-align:center;padding:5px 0px;}
			.global_head > img{height:50px;}
			.dash_title{margin:45px 5px !important;}
			.dash_title a{color:#000 !important;font-size:25px;padding:15px;border:1px solid #000;width:300px;height:100px}
			.dash_title .pback{color:#16419d !important;font-size:25px;background-color:#d6eaf8;}
			.dash_title .pback:hover{color:#fff !important;font-size:25px;background-color:#d6eaf8;}
			.dash_title .cback{color:#16419d !important;font-size:25px;background-color:#d1f2eb;}
			.dash_title .cback:hover{color:#fff !important;font-size:25px;background-color:#d1f2eb;}
			.dash_title .hback{color:#16419d !important;font-size:25px;background-color:#d4efdf;}
			.dash_title .hback:hover{color:#fff !important;font-size:25px;background-color:#d4efdf;}
			.dash_title .sback{color:#16419d !important;font-size:25px;background-color:#E7FADE;}
			.dash_title .sback:hover{color:#fff !important;font-size:25px;background-color:#E7FADE;}
			.gcred{color:red;}
			#startloc,#reachedloc,#clientloc{margin:10px;}
			.gcred:hover{color:red;text-decoration: none !important;cursor:pointer}
			a:hover{text-decoration: none !important,;}
			.dashformNav{display:block;}
			.dashformNav h4{font-size:15px;!important;padding:5px !important;margin:5px 0px !important;}
			.gcgreen{color:green;}
			.max-height{max-height: 700px;}
			.margin{margin:15px 20px}
			.margin h4 a{margin-top:20px;}
			.abbr{padding:10px;background-color:#000 !important;color:#fff !important;position:absolute;border-radius:15px;}
			#dummyImagewidth{width:50%;}
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
			}
			.wordwrap{word-wrap: break-word;border:1px solid #069;border-radius:10px;margin:10px 0px;}
			input,label,select{margin:5px 0px;}
			/*  #thead th{text-align:center;}
			#thead th,#tbody td{width:5%;}
			table #tbody, table #thead{display: block;}
			table #tbody{overflow: auto;height: 800px;}*/
			a{text-decoration:none !important;cursor:pointer !important;}
			#nav_img{position:absolute;top:10px;left:25px;}
			
			#close_img{display:none;position:fixed;top:0;left:200px;z-index:100;background-color:#069;}
			#main_nav_div{display:none;position:fixed;top:0;bottom:0;background-color:#fff;left:0;width:200px;z-index:100;border-right:1px solid #069;box-shadow:0px 0px 5px #444;-webkit-box-shadow:0px 0px 4px #444;-moz-box-shadow:0px 0px 4px #444;overflow-y: scroll}
			#main_nav_div > ul{text-align:left;margin-left:-45px;margin-top:20px;overflow:auto;margin-bottom:0px !important;max-height:900px;}
			#dropdown-submenu{text-align:left;margin-left:-45px;margin-top:10px;margin-left:-30px;display:block;}
			#main_nav_div > ul > li{list-style:none;padding:8px;text-decoration:none;border-bottom:1px solid #fff;}
			#dropdown-submenu > li{list-style:none;padding:5px 0px;text-decoration:none;}
			#main_nav_div > ul > li > a,#dropdown-submenu > li>a{font-size:15px;color:#069;padding:0 10px;}
			#main_nav_div > ul > li:hover{background-color:#fff;border:1px solid #069;}
			#main_nav_div > ul > li:hover>#dropdown-submenu>li>a{color:#069;}
			#dropdown-submenu > li:hover{background-color:#fff;border:1px solid #069;}
			#main_nav_div > ul > li:hover >a{color:#069;}
			#dropdown-submenu > li:hover>a{color:#069;}
			#main_nav_div > ul > .active{background-color:#fff;border:1px solid #069;}
			.headingWidth{width:70%; word-wrap:break-word;white-space: none !important;}

			.table-responsive>.table>tbody>tr>td{white-space: normal !important;}
			.maxWidth{min-width:300px;}
			.fontStyle{font-size: 25px;}
			/*.tableDiv > table >tbody> tr > td:first-child{width:50%;}*/
			.headingStyle{border-bottom:1px solid #000;margin:20px 0px;padding:10px 0px;}
			.dashformDiv{min-height:100px;}
			@media screen and (max-width:970px){
				.tableDiv{width:75%;margin:0 auto;}

				#nav_img{position:absolute;top:15px;left:20px;}
			    #thead th,#tbody td{width:4%;}
			    .global_head>img{width:150px;}
			    #main_nav>img{width:30px;}
			    input[type=submit]{width:100%;}
			    #main_nav_div > ul > li{list-style:none;padding:15px;text-decoration:none;border-bottom:1px solid #fff;margin-bottom:0px !important;}
			    #main_nav_div > ul > li > a,#dropdown-submenu > li>a{font-size:15px;color:#069;}
			    #main_nav_div > ul > li:hover{background-color:#fff;border:1px solid #069;}
			    #main_nav_div > ul > li:hover >a{color:#069;}
			    #main_nav_div > ul > .active{background-color:#fff;border:1px solid #069;}
			    #dummyImagewidth{width:100%;}
			    .dashformDiv{min-height:150px;}
			}

			@media and (max-width:570px){
				.headingStyle{border-bottom:1px solid #000;padding:10px 0px;}

			}
		</style>
	</head>
	<body >
	
		<!-- Main body start -->
		
		<div class="container-fluid" style="min-height:1000px;">
			<div class="row ">
		
	
