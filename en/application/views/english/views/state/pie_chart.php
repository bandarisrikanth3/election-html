
<div id="reportGraph1" ></div>
     

<script type="text/javascript">

   // Load the Visualization API and the piechart package.
  google.charts.load('current', {'packages':['corechart']});
    
  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);
 

  function drawChart() {
     var report = new google.visualization.DataTable();
     report = $.ajax({
        url: "<?php echo '/elections-2018/en/Jsons/telangana/vote_share_state.json';?>",
        dataType: "json",
        async: false
        }).responseText;
   //alert(report);
  
   // Create our data table out of JSON data loaded from server.
    var reportData = new google.visualization.DataTable(report);
    
  var w = document.body.width;
  var h = document.body.height;
  
  var pageViewsOption = {title: '',pieHole: 0.5,pieSliceText: 'label',pieSliceTextStyle: {color: '#000',bold:true},titleTextStyle:{fontSize:45},height:450,width:w,legend:'none',focusTarget:"category",enableInteractivity:true ,tooltip: {isHtml:true,},annotations: {alwaysOutside: true,textStyle: {fontSize: 20,color: "#000", bold:true}},vAxis: { gridlines: { count: 0 },minValue:0 },hAxis: { gridlines: { count: 0 },minValue:0 },colors: ['#ef01f7','#55d3f9','#f6f763','#40ff00','#ff7b00','#eee'],is3D:true};
  
 
  

 
    // Instantiate and draw our chart, passing in some options.
    var reportChart = new google.visualization.PieChart(document.getElementById('reportGraph1'));
    
    
    reportChart.draw(reportData, pageViewsOption);  
  }
   $(window).resize(function(){
      drawChart();
      
    });

 </script>