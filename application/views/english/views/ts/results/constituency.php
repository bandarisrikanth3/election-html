
<style>
	@media screen and (max-width:970px)
	{
		.graph_div{display:none;}
	}
</style>
<div class="col-md-12 col-sm-12 col-xs-12 ">
	<div class="col-md-3 col-sm-12 col-xs-12 col-md-offset-9">
		<select id="select_district" class="form-control" onchange="showDiv(this.value)">
			<option value="0"> -- జిల్లా --</option>
						<option value="Adilabad">ఆదిలాబాద్</option>
						<option value="Bhadradri_Kothagudem">భద్రాద్రి కొత్తగూడెం</option>
						<option value="Hyderabad">హైదరాబాద్</option>
						<option value="Jagtial">జగిత్యాల</option>
						<option value="Jangaon">జనగాం</option>
						<option value="Jayashankar_Bhupalpally">జయశంకర్ భూపాలపల్లి</option>
						<option value="Jogulamba_Gadwal">జోగులంబ గద్వాల్&zwnj;</option>
						<option value="Kamareddy">కామారెడ్డి</option>
						<option value="Karimnagar">కరీంనగర్</option>
						<option value="Khammam">ఖమ్మం</option>
						<option value="Kumuram_Bheem">కొమరంభీం </option>
						<option value="Mahabubnagar">మహబూబ్&zwnj; నగర్&zwnj;</option>
						<option value="Mahbubabad">మహబూబాబాద్</option>
						<option value="Mancherial">మంచిర్యాల</option>
						<option value="Medak">మెదక్</option>
						<option value="Medchal">మేడ్చల్</option>
						<option value="Nagarkurnool">నాగర్ కర్నూల్</option>
						<option value="Nalgonda">నల్గొండ</option>
						<option value="Nirmal">నిర్మల్</option>
						<option value="Nizamabad">నిజామాబాద్</option>
						<option value="Peddapalli">పెద్దపల్లి</option>
						<option value="Rajanna_Sircilla">రాజన్నా సిరిసిల్ల</option>
						<option value="Rangareddy">రంగారెడ్డి</option>
						<option value="Sangareddy">సంగారెడ్డి</option>
						<option value="Siddipet">సిద్దిపేట</option>
						<option value="Suryapet">సూర్యాపేట</option>
						<option value="Vikarabad">వికారాబాద్</option>
						<option value="Wanaparthy">వనపర్తి</option>
						<option value="Warangal_Rural">వరంగల్ రూరల్</option>
						<option value="Warangal_Urban">వరంగల్ అర్బన్</option>
						<option value="Yadadri_Bhuvanagiri">యాదాద్రి భువనగిరి</option>
					</select>
	</div>
</div>
<br>

	<?php 
		$const = array();
		$i =0;
		if(isset($results1) && !empty($results1)) 
		{
			
			foreach($results1 as $row)
			{
				if(!in_array($row['tel_constname'],$const))
				{

				$c1= $row['tel_constname'];
				$c2= str_ireplace(' ', '_',strtolower($row['eng_constname']));
	?>
				<div class="col-md-12 col-sm-12 col-xs-12 district <?php echo str_ireplace(' ', '_', $row['eng_distname']);?>" >
					<legend><?php echo $row['tel_constname'];?></legend>
						
						<div class="col-md-6 col-sm-6 col-xs-12 table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>పార్టీ</th>
										<th>పేరు</th>
										<th>ఓట్లు</th>
									</tr>
								</thead>
								<tbody>
				
	<?php 
								foreach($results1 as $row1)
								{
									if($c1 == $row1['tel_constname'])
									{
								
	?>
										<tr <?php if($row1['status'] == 1) { echo 'style="background-color:#b6eac6;"';}?>>
											<?php 
												if(!empty($row1['symbol'])) 
												{ 
											?>
												<td><?php echo '<img src="'.base_url().$row1['symbol'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row1['tel_partyname'];?></td>
											<?php } else { ?>
												<td><?php echo $row1['tel_partyname'];?></td>
											<?php } ?>
											<td><?php echo $row1['telugu_candidate_name'];?></td>
											<td><?php echo number_format($row1['noofvotes']);?></td>
										</tr>
						
	<?php
	
									}
								}
	?>
								</tbody>
							</table>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 graph_div" >
							<div id="<?php echo $c2;?>"></div>
						</div>
					</div>
	<?php 							
									

					}
					$const[] = $row['tel_constname'];
					$i++;
				}
			}
	?>

	
	<script>
		var select_district =  $('#select_district').val();
		if(select_district == 0)
		{
			$('.district').show();
		}

		function showDiv(districtname)
		{

			var districtid = '.'+districtname;
			//alert(districtid);

			if(districtname == 0)
			{
				$('.district').show();
			}
			else
			{
				
				$('.district').hide();
				$(districtid).show();
			}
		}
	</script>




 

<script type="text/javascript">
//alert();
   // Load the Visualization API and the piechart package.
 var wid = $(window).width();
if(wid > 970)
{
   //alert(wid);
  google.charts.load('current', {'packages':['corechart']});
    
  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);
 
 
 
  function drawChart() {
  	var gData = ["boath","adilabad","kothagudem","pinapaka","aswaraopeta","bhadrachelam","yellandu","secundrabad","musheerabad","sanathnagar","nampally","goshamahal","khairatabad","amberpet","jubileehills","karwan","malakpet","chandrayangutta","yakutpura","charminar","bahdurpura","cantonment","dharmapuri","koratla","jagtial","ghanpur_station","jangaon","palakurthi","bhupalpally","mulug","alampur","gadwal","jukkal","yellareddy","kamareddy","manakondur","choppadandi","huzurabad","karimnagar","madira","sathupalle","palair","wyra","khammam","sirpur","asifabad","dornakal","mahbubabad","jadcherla","makthal","narayanpet","devarkadra","mahabubnagar","chennur","bellampalli","mancherial","narsapur","medak","medchal","malkajgiri","uppal","quthbullapur","kukatpally","achampet","nagarkurnool","kollapur","nakrekal","nalgonda","nagarjunasagar","munugode","devarakonda","miryalguda","khanapur","mudhole","nirmal","balkonda","armur","bodhan","nizamabad_rural","banswada","nizamabad_urban","manthani","ramagundam","peddapalle","vemulawada","sircilla","chevella","ibrahimpatnam","maheshwaram","rajendranagar","serilingampally","lalbahadurnagar","kalwakurthy","shadnagar","andole","zahirabad","sangareddy","narayankhed","patancheru","husnabad","dubbak","gajwel","siddipet","thungathurthi","kodad","suryapet","huzurnagar","vikarabad","pargi","tandur","kodangal","wanaparthy","parkal","narsampet","wardhanapet","warangal_west","warangal_east","alair","bhongir"];
  //	alert(gData.length);

  //var gData = ["boath","adilabad","kothagudem","pinapaka","bhadrachelam","ghanpur_station"];
  	
  	for(i =0 ; i<gData.length;i++)
  	{
  		//alert(gData[i]);
  		
  			var rep = "report_"+i;
		     var rep = new google.visualization.DataTable();
		     rep = $.ajax({
		        url: "/elections-2018/Jsons/telangana/results/constituency/results_"+gData[i]+".json",
		        dataType: "json",
		        async: false
		        }).responseText;
		    //alert("/elections-2018/Jsons/telangana/results/constituency/results_"+gData[i]+".json");

		  
		 
		   // Create our data table out of JSON data loaded from server.
		    var reportData = new google.visualization.DataTable(rep);
		    
		  var w = document.body.width;
		  var h = document.body.height;
		  
		  var pageViewsOption = {title: '', titleTextStyle:{fontSize:25},height:200,width:w,legend: 'right',is3D:true,focusTarget:"category",enableInteractivity:true ,tooltip: {isHtml:false,},annotations: {alwaysOutside: true,textStyle: {fontSize: 20,color: "black", bold:true}},vAxis: { gridlines: { count: 0 },minValue:0 },hAxis: { gridlines: { count: 0 },minValue:0 },colors: [ '#ec008a','green','navy','#fa7e00','#fff']};
		  
		 
		 

		 var graph_id = document.getElementById(gData[i]);
		 if(graph_id)
		 {
		    // Instantiate and draw our chart, passing in some options.
		    var reportChart = new google.visualization.PieChart(graph_id);
		    
		    
		    reportChart.draw(reportData, pageViewsOption);  
		 }
		}
	//	     alert("/election_beta_english/Jsons/telangana/results/constituency/results_"+gData[i]+".json");
	

  }
   $(window).resize(function(){
      drawChart();

    });
}
 </script>


