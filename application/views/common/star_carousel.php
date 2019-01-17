 <style>
	.manual-carousel-control-star>.glyphicon-chevron-left::before{content:"\2770" !important;font-size:30px;}
	.manual-carousel-control-star>.glyphicon-chevron-right::before{content:"\2771" !important;font-size:30px;}
</style>
 <div class="col-md-12 col-sm-12 col-xs-12 " >
		<legend>లైఫ్ లైన్</legend>
 		<div id="starCarosuel" class="bg-white-shadow carousel slide" data-ride="carousel" style="background-image: linear-gradient(#d9defb,#F3E5F5,#d9defb); !important;">

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		    <?php 
		    	$j=0;
		    	foreach($star_candidate as $row) 
		    	{ 
		    		if($j == 0)
		    		{
		    			echo '<div class="item active">
		    					<a href="'.$row['telstorylink'].'">
							        <div class="col-md-12 col-sm-12 col-xs-12">
							        	<div class="col-md-1 col-sm-12 col-xs-12" ></div>
			    						<div class="col-md-6 col-sm-12 col-xs-12 text-center" style="padding:5px">
							        		<img src="'.base_url().$row['imagepath'].'" alt="'.$row['engname'].'" style="width:165px;height:200px;padding:25px;">
							        	</div>
							        	<div class="col-md-5 col-sm-12 col-xs-12 photo_para photo_para1 text-center">
							        		<h5 ><strong>'.$row['telname'].'</strong></h5>
							        		<h5 style="color: #069"><strong>'.$row['telpartyname'].'</strong></h5>
							        		<h5 style="color: #ca2828;"><strong>'.$row['telconstname'].'</strong></h5>
							        	</div>
							        </div>
							       </a>
						      </div>';
		    		}
		    		else
		    		{
		    			echo '<div class="item ">
		    					<a href="'.$row['telstorylink'].'">
			    					<div class="col-md-12 col-sm-12 col-xs-12">
			    						<div class="col-md-1 col-sm-12 col-xs-12" ></div>
			    						<div class="col-md-6 col-sm-12 col-xs-12 text-center" style="padding:5px">
							        		<img src="'.base_url().$row['imagepath'].'" alt="'.$row['engname'].'" style="width:165px;height:200px;padding:25px;">
							        	</div>
							        	<div class="col-md-5 col-sm-12 col-xs-12 photo_para photo_para1 text-center">

							        		<h5 ><strong>'.$row['telname'].'</strong></h5>
							        		<h5 style="color: #069"><strong>'.$row['telpartyname'].'</strong></h5>
							        		<h5 style="color: #ca2828;"><strong>'.$row['telconstname'].'</strong></h5>
							        	</div>
							        </div>
							    </a>
						      </div>';
		    		}
		    		$j++;
		    	}
		    ?>
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control manual-carousel-control-star" href="#starCarosuel" data-slide="prev" >
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control manual-carousel-control-star" href="#starCarosuel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Next</span>
		    </a>
		</div>
</div>