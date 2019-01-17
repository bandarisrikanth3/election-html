<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:20px">
            <?php 
              if(!empty($district))
              {
            ?>
                <span style="font-weight:bold;"><a href="<?php echo base_url();?>">ఆంధ్రప్రదేశ్ »</a></span>
                <span style="color:#17479e;font-weight: 700"><?php echo $district->telname; ?></span>
                
            <?php
              }
            ?>
</div>
<?php $_GLOBALS['graph_distname'] = $graph_distname; ?>

  <!-- Map -->
  <?php include('district_map.php');?>

  <!-- Description -->
  <?php include('description.php');?>

  <!-- District Details -->
  <?php include('district_details.php');?>

  <!-- Previous Election Details -->
<?php include('pre_results.php');?>


 
   




<script type="text/javascript">

  // Seats Ajax
  function get_seats_data(params)
  {
     //alert(params);
      $.ajax({
            type: "POST",
            url: '<?php echo base_url('ajax/ajax_get_seats_data_distid').'?';?>'+params,
            //data: id='stateid',
            success: function(data){
          //  alert(data);
              $('#seats_data').html(data);

            },
        });
  }


  function getdistrictDetails(district)
    {
        
      //alert(district);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('ajax/ajax_get_district_details').'/';?>'+district,
            //data: id='districtid',
            success: function(data){
            //  alert(data);
                $('#district_data').html(data);

            },
        });
     }
</script>
<script>
function search_function() {
    var input, filter, tr, td,i,a;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    tab = document.getElementById("tab_search");
    tr = tab.getElementsByTagName("tr");
   //alert(tr.length);
   for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[3].innerHTML;
      td = td.toUpperCase();
      a= document.getElementById('sdetails_'+i).value;
      a= a.toUpperCase();
      if(a.search(filter) > -1)
      {
        tr[i].style.display = '';
        //alert();
      }
      else
      {
        tr[i].style.display = "none";
        //alert(tr[i]);
      }
      
    }
 
}
</script>
