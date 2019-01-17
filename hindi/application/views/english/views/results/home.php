</div>
<!-- Election Result -->
<?php 
	if($block == 'result' || $block == 'all' ) 
 	{ 
		 include('election_result.php'); 
	}

	if($block == 'scroll' || $block == 'all' ) 
 	{ 
	 include('winner_scroll.php');
	}

?>
	
	


