
  <div class="col-md-12 col-sm-12 col-xs-12 margin  ">
      <!-- Map -->
      <div class="col-md-12 col-sm-12 col-xs-12 bg-white-shadow">
        <?php   $this->load->view('english/map/ap/ap.php');?>    
      </div>
      <!-- Description -->
      <div class="col-md-12 col-sm-12 col-xs-12 margin-top-10">
        <legend><img src="/elections-2019/assets/images/ap-icon.jpg" width="20px" />&nbsp;రాష్ట్ర ముఖచిత్రం</legend>
        <div class="first_letter " >
          <?php  echo str_ireplace('div', 'p', $state->teldescription);?>
        </div>
      </div>

  </div>


  <!-- Details -->
  <div class="col-md-12 col-sm-12 col-xs-12 margin wid margin-top-10">              
          <?php include('details.php');?>    
  </div>

   <!-- Prev Results - 2014-->
  <div class="col-md-12 col-sm-12 col-xs-12 margin wid margin-top-10"  >       
          <?php include('results.php');?>      
  </div>






<script type="text/javascript">

  // Seats Ajax
  function get_seats_data(params)
  {
    // alert(params);
      $.ajax({
            type: "POST",
            url: '<?php echo base_url('ajax/ajax_get_seats_data').'?';?>'+params,
            //data: id='stateid',
            success: function(data){
          //   alert(data);
              $('#seats_data').html(data);

            },
        });
  }

  // State Ajax
  function getstateDetails(state)
    {
        
      //alert(state);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('ajax/ajax_get_state_details').'/';?>'+state,
            //data: id='stateid',
            success: function(data){
            //  alert(data);
                $('#state_data').html(data);

            },
        });
     }
</script>

<script>
function search_function() {
    var input, filter, tr, td,i,a;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    count = document.getElementById("table_count").value;
    
    
   for (i = 0; i < count; i++) {
      a= document.getElementById('sdetails_'+i).value;
      row= document.getElementById('row_'+i);
      tb_head= document.getElementById('tb_head__'+i);
      a= a.toUpperCase();
      if(a.search(filter) > -1)
      {
        row.style.display = '';
        //alert();
      }
      else
      {
        row.style.display = "none";
        //alert(tr[i]);
      }
      
    }
 
}
</script>
 



