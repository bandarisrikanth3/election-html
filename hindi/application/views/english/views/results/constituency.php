
<style>
	@media screen and (max-width:970px)
	{
		.graph_div{display:none;}
	}
</style>

<div class="col-md-12 col-sm-12 col-xs-12 ">
	<div class="col-md-3 col-sm-12 col-xs-12 col-md-offset-9">
		<select id="select_district" class="form-control" onchange="showDiv(this.value)">
			<option value="0">Select District</option>
									<option value="Adilabad">आदिलाबाद</option>
									<option value="Bhadradri_Kothagudem">भद्राद्री कोत्तागुडेम</option>
									<option value="Hyderabad">हैदराबाद</option>
									<option value="Jagtial">जगित्याल</option>
									<option value="Jangaon">जनगाम</option>
									<option value="Jayashankar_Bhupalpally">जयशंकर भूपलपल्ली</option>
									<option value="Jogulamba_Gadwal">जोगुलांबा गद्वाल</option>
									<option value="Kamareddy">कामारेड्डी</option>
									<option value="Karimnagar">करीमनगर</option>
									<option value="Khammam">खम्मम</option>
									<option value="Kumuram_Bheem">कुमरम भीम आसिफाबाद</option>
									<option value="Mahabubnagar">महबूबनगर</option>
									<option value="Mahbubabad">महबूबाबाद</option>
									<option value="Mancherial">मंचेरियाल</option>
									<option value="Medak">मेदक</option>
									<option value="Medchal">मेड्चल</option>
									<option value="Nagarkurnool">नागरकर्नूल</option>
									<option value="Nalgonda">नलगोंडा</option>
									<option value="Nirmal">निर्मल</option>
									<option value="Nizamabad">निजामाबाद</option>
									<option value="Peddapalli">पेद्दापल्ली</option>
									<option value="Rajanna_Sircilla">राजन्ना सिरिसिल्ला</option>
									<option value="Rangareddy">रंगारेड्डी</option>
									<option value="Sangareddy">संगारेड्डी</option>
									<option value="Siddipet">सिद्दीपेट</option>
									<option value="Suryapet">सूर्यापेट</option>
									<option value="Vikarabad">विकाराबाद</option>
									<option value="Wanaparthy">वनपर्ती </option>
									<option value="Warangal_Rural">वरंगल ग्रामीण</option>
									<option value="Warangal_Urban">वरंगल शहरी </option>
									<option value="Yadadri_Bhuvanagiri">यादाद्री भुवनगिरि</option>
									
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
				if(!in_array($row['eng_constname'],$const))
				{

				$c1= $row['eng_constname'];
				$c2= str_ireplace(' ', '_',strtolower($row['eng_constname']));
	?>
				<div class="col-md-12 col-sm-12 col-xs-12 district <?php echo str_ireplace(' ', '_', $row['eng_distname']);?>" >
					<legend><?php echo $row['hindi_constname'];?></legend>
						
						<div class="col-md-6 col-sm-6 col-xs-12 table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>पार्टी</th>
										<th>नाम</th>
										<th>वोटों की संख्या</th>
									</tr>
								</thead>
								<tbody>
				
	<?php 
								foreach($results1 as $row1)
								{
									if($c1 == $row1['eng_constname'])
									{
								
	?>
										<tr <?php if($row1['status'] == 1) { echo 'style="background-color:#b6eac6;"';}?>>
											<?php 
												if(!empty($row1['symbol'])) 
												{ 
											?>
												<td><?php echo '<img src="'.base_url().$row1['symbol'].'" width="25px" height="20px">&nbsp;&nbsp;'.$row1['hindi_partyname'];?></td>
											<?php } else { ?>
												<td><?php echo $row1['hindi_partyname'];?></td>
											<?php } ?>
											<td><?php echo $row1['hindi_candidate_name'];?></td>
											<td><?php echo number_format($row1['noofvotes']);?></td>
										</tr>
						
	<?php
	
									}
								}
	?>
								</tbody>
							</table>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 graph_div">
							<div id="<?php echo $c2;?>"></div>
						</div>
					</div>
	<?php 							
									

					}
					$const[] = $row['eng_constname'];
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

 </script>


