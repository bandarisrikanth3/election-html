<style>
#dropdown-submenu{display:none;}
	
</style>
<div class="col-md-12 ">
	<h4 class="text-right" ><a href="<?php echo base_url().'dashboard';?>">Home</a> | <a>  <span class="glyphicon glyphicon-user"></span></a> <?php echo $this->session->userdata('empname');?>&nbsp; &nbsp;<a style="border:1px solid #17479e;padding:5px;font-size:15px;border-radius:5px;" href="<?php echo base_url('login/logout');?>" >Logout</a></h4>
</div>
<br/>

<?php 
$empid=$this->session->userdata('empid');
$query = $this->db->query("select menu,title,controller,group_concat(model order by morder separator ',') as model,group_concat(modelname order by morder separator ',') as modelname from permission where empid=".$empid." and status=1 and mobile = 0 group by menu,title order by morder");
$menu = $query->result_array();

//print_r($menu);
?>
<a id="main_nav">
	<img src="<?php  echo base_url('assets/images/nav.png');?>" id="nav_img" width="40" >
	<img id="close_img" src="<?php echo base_url('assets/images/close.png');?>" width="40" >
</a>

<div class="col-md-3" id="main_nav_div">
	<h6 class="text-right" ><a> <span class="glyphicon glyphicon-user"></span></a> <?php echo $this->session->userdata('empname');?>&nbsp; &nbsp;<a style="border:1px solid #17479e;padding:5px;border-radius:5px;" href="<?php echo base_url('login/logout');?>" >Logout</a></h6>
	
	
	<ul id="dropdown-menu">
					<?php if($menu) {
						$m=array();
						foreach($menu as $row) { 
					?>

					
						<?php if (!in_array($row['menu'], $m)) {?>
						<h4 style="font-size:16px;border-bottom:1px solid #000;"><label><?php echo $row['menu'];?></label></h4>
					
						<?php } ?>
					<li id="submenu" >
						
							<a style="font-size:12px;color:#000;text-align:left;"><?php echo $row['title'];?></a><span class="caret"></span>
							<ul id="dropdown-submenu">
							<?php 
								$model = explode(',',$row['model']);
								$modelname = explode(',',$row['modelname']);
								for($i=0;$i<count($model);$i++)
								{
								?>
								
									<li class="text-left"><a href="<?php echo base_url('').trim($row['controller']).'/'.trim($model[$i]);?>" style="font-size:11px;"><?php echo $modelname[$i];?></a></li>
								
								<?php 
								}
								
								?>
							</ul>
							
					</li>
					<?php 
						
						$m[] = $row['menu'];
						}
						
					} ?>
	</ul>
</div>

<script>
	$(document).ready(function(){
		$("#nav_img").click(function(){
			$("#main_nav_div").show();
			$("#nav_img").hide();
			$("#close_img").show();
		});		

		$("#close_img").click(function(){
			$("#main_nav_div").hide();
			$("#nav_img").show();
			$("#close_img").hide();
		});	
	
	});

	$(document).ready(function(e){
		$('li#submenu').click(function(){
			
			$(this).children('#dropdown-submenu').slideToggle();
			$(this).siblings().children('#dropdown-submenu').slideUp();
			e.preventDefault();
		});
	});
	
	


</script>