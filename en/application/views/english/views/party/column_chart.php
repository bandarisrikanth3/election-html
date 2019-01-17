
<div id="reportGraph" ></div>
 

<script type="text/javascript">
var party = '<?php echo $graph_partyname;?>';
//alert(district);
   // Load the Visualization API and the piechart package.
  google.charts.load('current', {'packages':['corechart']});
    
  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);
 

  function drawChart() {
     var report = new google.visualization.DataTable();
     report = $.ajax({
        url: "<?php echo base_url('telangana/pre_result_json_by_party/');?>"+party,
        dataType: "json",
        async: false
        }).responseText;
    alert(report);
  
   // Create our data table out of JSON data loaded from server.
    var reportData = new google.visualization.DataTable(report);
    
  var w = document.body.width;
  var h = document.body.height;
  
  var pageViewsOption = {title: '',titleTextStyle:{fontSize:25},height:250,width:w,legend: 'top',focusTarget:"category",enableInteractivity:true ,tooltip: {isHtml:false,},annotations: {alwaysOutside: 'false ',textStyle: {fontSize: 20,color: "black", bold:true}},vAxis: { gridlines: { count: 0 },minValue:0 },hAxis: { gridlines: { count: 0 },minValue:0 },colors: [ '#ec0289','#f97d09']};
  
 
  

 
    // Instantiate and draw our chart, passing in some options.
    var reportChart = new google.visualization.ColumnChart(document.getElementById('reportGraph'));
    
    
    reportChart.draw(reportData, pageViewsOption);  
  }
   $(window).resize(function(){
      drawChart();

    });

 </script>