
  <div id="reportGraph" >
  <br>    
  </div>


 

<script type="text/javascript">
//alert();
   // Load the Visualization API and the piechart package.
  google.charts.load('current', {'packages':['corechart']});
    
  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);
 
 
 
  function drawChart() {
     var report = new google.visualization.DataTable();
     report = $.ajax({
        url: "/elections-2018/Jsons/telangana/results/results_telangana.json",
        dataType: "json",
        async: false
        }).responseText;
    //alert(report);
  
 
   // Create our data table out of JSON data loaded from server.
    var reportData = new google.visualization.DataTable(report);
    
  var w = document.body.width;
  var h = document.body.height;
  
  var pageViewsOption = {title: '',  is3D:true,titleTextStyle:{fontSize:25},height:200,width:w,legend: 'none',focusTarget:"category",enableInteractivity:true ,tooltip: {isHtml:false,},annotations: {alwaysOutside: true,textStyle: {fontSize: 20,color: "black", bold:true}},vAxis: { gridlines: { count: 0 },minValue:0 },hAxis: { gridlines: { count: 0 },minValue:0 },colors: ['#ee709f','green','#eb6a14','#0288D1','#512DA8','#C2185B'],chartArea:{left:0,top:0,width:850,height:300}};
  
 
 

 
    // Instantiate and draw our chart, passing in some options.
    var reportChart = new google.visualization.PieChart(document.getElementById('reportGraph'));
    
    
    reportChart.draw(reportData, pageViewsOption);  
  }
   $(window).resize(function(){
      drawChart();

    });
   $('svg').attr('viewBox','200 30 25 135');

 </script>
 <script>
  
  shape = document.getElementsByTagName("svg")[0];
  //alert(shape);
 </script>