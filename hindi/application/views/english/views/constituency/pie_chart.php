
<div id="reportGraph1" ></div>
     

<script type="text/javascript">

   // Load the Visualization API and the piechart package.
  google.charts.load('current', {'packages':['corechart']});
    
  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);
 

  function drawChart() {
     var report = new google.visualization.DataTable();
     report = $.ajax({
        url: "<?php echo base_url('telangana/vote_share_json_state/telangana');?>",
        dataType: "json",
        async: false
        }).responseText;
   //alert(report);
  
   // Create our data table out of JSON data loaded from server.
    var reportData = new google.visualization.DataTable(report);
    
  var w = document.body.width;
  var h = document.body.height;
  
  var pageViewsOption = {title: '',titleTextStyle:{fontSize:25},height:250,width:w,legend: 'top',focusTarget:"category",enableInteractivity:true ,tooltip: {isHtml:true,},annotations: {alwaysOutside: 'true',textStyle: {fontSize: 20,color: "black", bold:true}},vAxis: { gridlines: { count: 0 },minValue:0 },hAxis: { gridlines: { count: 0 },minValue:0 },colors: ['#f97d09','#ec0289'],is3D:true};
  
 
  

 
    // Instantiate and draw our chart, passing in some options.
    var reportChart = new google.visualization.PieChart(document.getElementById('reportGraph1'));
    
    
    reportChart.draw(reportData, pageViewsOption);  
  }
   $(window).resize(function(){
      drawChart();
      
    });

 </script>