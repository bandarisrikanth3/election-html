
<div id="reportGraph2" ></div>
     
<script type="text/javascript">
 // alert($('#constid').val());
  var district = "<?php echo $graph_distname;?>";
  
   // Load the Visualization API and the piechart package.
  google.charts.load('current', {'packages':['corechart']});
    
  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);
 

  function drawChart() {
     var report = new google.visualization.DataTable();
     report = $.ajax({
        url: "<?php echo '/elections-2018/en/Jsons/telangana/district/pre_all_results_';?>"+district+".json",
        dataType: "json",
        async: false
        }).responseText;
    //alert(report);
  
   // Create our data table out of JSON data loaded from server.
    var reportData = new google.visualization.DataTable(report);
    
  var w = document.body.width;
  var h = document.body.height;
  
  var pageViewsOption = {title: '',titleTextStyle:{fontSize:25},height:500,width:w,legend: 'none',focusTarget:"category",enableInteractivity:true ,tooltip: {isHtml:false,},annotations: {alwaysOutside: true,textStyle: {fontSize: 15,color: "black"}},vAxis: { gridlines: { count: 0 },minValue:0 },hAxis: { gridlines: { count: 0 },minValue:0 },colors: [ '#ec0289','#f97d09']};
  
 
  

 
    // Instantiate and draw our chart, passing in some options.
    var reportChart = new google.visualization.BarChart(document.getElementById('reportGraph2'));
    
    
    reportChart.draw(reportData, pageViewsOption);  
  }
   $(window).resize(function(){
      drawChart();

    });

 </script>