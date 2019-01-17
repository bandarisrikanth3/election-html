
  <div id="reportGraph" ></div>

 

<script type="text/javascript">
//alert();
   // Load the Visualization API and the piechart package.
  google.charts.load('current', {'packages':['corechart']});
    
  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);
 
 
 
  function drawChart() {
     var report = new google.visualization.DataTable();
     report = $.ajax({
        url: "/elections-2018/Jsons/telangana/results/constituency/results_adilabad.json",
        dataType: "json",
        async: false
        }).responseText;
    //alert(report);
  
 
   // Create our data table out of JSON data loaded from server.
    var reportData = new google.visualization.DataTable(report);
    
  var w = document.body.width;
  var h = document.body.height;
  
  var pageViewsOption = {title: '', titleTextStyle:{fontSize:25},height:200,width:w,legend: 'none',is3D:true,focusTarget:"category",enableInteractivity:true ,tooltip: {isHtml:false,},annotations: {alwaysOutside: true,textStyle: {fontSize: 20,color: "black", bold:true}},vAxis: { gridlines: { count: 0 },minValue:0 },hAxis: { gridlines: { count: 0 },minValue:0 },colors: [ '#ec008a','green','navy','#fa7e00','#fff']};
  
 
  

 
    // Instantiate and draw our chart, passing in some options.
    var reportChart = new google.visualization.PieChart(document.getElementById('reportGraph'));
    
    
    reportChart.draw(reportData, pageViewsOption);  
  }
   $(window).resize(function(){
      drawChart();

    });

 </script>
 <script>
  $('#reportGraph').attr('viewBox','200 30 25 135');
 </script>