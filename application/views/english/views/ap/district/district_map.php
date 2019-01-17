<div class="col-md-12 col-sm-12 col-xs-12 margin bg-white-shadow">
    <?php 
       $this->load->view('english/map/ap/district/'.str_ireplace(' ','_',strtolower($district->engname)));
    ?>
</div>