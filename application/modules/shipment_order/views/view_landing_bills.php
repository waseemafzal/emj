<?php getHead();
$controller=$this->router->class;
$Heading=$controller;
if(isset($module_heading) and $module_heading!=''){
$Heading= $module_heading;
  }
 ?>
   <style>
   .txt-white{ color:#fff !important}
  .close {
    color: #fff; 
    opacity: 1;
}
   </style>
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      <?=$Heading?>
        
      </h1>
      <ol class="breadcrumb">

        <li > <a href="<?=$controller?>/add_landing_bill" class="btn btn-sm btn-success txt-white"><i class="fa fa-plus icon-white"></i> Add Landing Bill</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
             <div class="box-body">
                <table id="post_table" class="table table-bordered responsive">
    <thead>
    <tr>
        <th>Exporter Name</th>
        <th>Exporter Address</th>
        <th>Consignet To</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
  
  if($result!=''){
  foreach ($result as $row){
    
    ?>
    <tr id="row_<?php echo $row['id'];?>">
        
    <td align="center"><?php echo $row['exporter_name'];?></td>
    <td><?php echo $row['exporter_address'];?></td>
    <td><?php echo $row['consigned_to'];?></td> 
    <td><?php echo $row['address'];?></td>
         
    <td class="center">
            
           <button data-target="#landing_bills_<?php echo $row['id'];?>" class="btn btn-primary btn-xs" data-toggle="modal" ><i class="fa fa-eye"></i></button> 
           <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-xs" href="<?=$controller?>/edit_landing_bill/<?php echo $row['id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-xs" href="javascript:void(0)" id="deleteion" onClick="deleteRecord('<?php echo $row['id'];?>','landing_bills');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
            <div class="modal fade" id="landing_bills_<?php echo $row['id'];?>" tabindex="-1" data-backdrop="static">
     <div class="modal-dialog-lg modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header bg-green">
         <h4 class="modal-title pull-left" style="font-weight: bolder"> Details of Landing Bills</h4>
       <button class="close" data-dismiss="modal">x</button>
       </div>
       
       <div  class="modal-body">
        <div class="col-md-6">
          <h4 class="bg-red text-center"><b>Exporter Details</b></h4>
       
          <table class="table table-striped">
            <tr>
              <td><b>Name:</b> <?php echo $row['exporter_name']?></td>
              <td><b>Address:</b> <?php echo $row['exporter_address']?></td>
            </tr>
            <tr>
              <td><b>Consignet to:</b> <?php echo $row['consigned_to']?></td>
              <td><b>Address:</b> <?php echo $row['address']?></td>
            </tr>
            <tr>
              <td><b>Notify Party:</b> <?php echo $row['notify_party']?></td>
              <td><b>Party Address:</b> <?php echo $row['notify_party_address']?></td>
            </tr>
            <tr>
              <td><b>Document Number:</b> <?php echo $row['document_number']?></td>
              <td><b>B/L Number:</b> <?php echo $row['b/l_number']?></td>
            </tr>
          </table>
        </div>
       

        <div class="col-md-6">
          <h4 class="bg-red text-center"><b>Agent Details</b></h4>
       
          <table class="table table-striped">
            <tr>
              <td><b>Name:</b> <?php echo $row['forwording_agent']?></td>
              <td><b>Address:</b> <?php echo $row['agent_address']?></td>
            </tr>
             <tr>
              <td><b>Point of Origin:</b> <?php echo $row['point_of_origin']?></td>
              <td><b>Loading Pier:</b> <?php echo $row['loading_pier']?></td>
            </tr>
             <tr>
              <td><b>Domestic Routing:</b> <?php echo $row['domestic_routing']?></td>
              <td><b>Type of Move:</b> <?php echo $row['type_of_move']?></td>
            </tr>
             <tr>
              <td><b>Containarized:</b> <?php echo $row['containarized']?></td>
              <td><b>Pre Carriage:</b> <?php echo $row['pre_carriage_by']?></td>
            </tr>
             <tr>
              <td><b>Exporting Carrier:</b> <?php echo $row['exporting_carrier']?></td>
              <td><b>Place of Receipt:</b> <?php echo $row['place_of_receipt']?></td>
            </tr>
             <tr>
              <td><b>Foreign Port:</b> <?php echo $row['foreign_port']?></td>
              <td><b>Port of Loading:</b> <?php echo $row['port_of_loading']?></td>
            </tr>
             <tr>
              <td><b>Place of Delivery:</b> <?php echo $row['place_of_delivery']?></td>
              <td><b>Marks & Numbers:</b> <?php echo $row['marks_and_numbers']?></td>
            </tr>
             <tr>
              <td><b>No of Packages:</b> <?php echo $row['number_of_package']?></td>
              <td><b>Commodities:</b> <?php echo $row['commodities']?></td>
            </tr>
             <tr>
              <td><b>Gross Weight:</b> <?php echo $row['gross_weight']?></td>
              <td><b>Measurement:</b> <?php echo $row['measurement']?></td>
            </tr>
             <tr>
              <td><b>Commodity Description:</b> <?php echo $row['commodity_description']?></td>
              <td><b>Prepaid:</b> <?php echo $row['prepaid']?></td>
            </tr>
              <tr>
              <td><b>Collect:</b> <?php echo $row['collect']?></td>
              <td><b>Dated By:</b> <?php echo $row['date_by']?></td>
            </tr>
              <tr>
              <td><b>Dated At:</b> <?php echo $row['dated_at']?></td>
              <td><b>Date:</b> <?php echo $row['date']?></td>
            </tr>
          </table>
        </div>
     <div class="modal-footer">
     <button class="btn btn-danger" data-dismiss="modal" >Cancel</button>
     </div>
     
     </div>
</div>
</div>
</div>
        </td>
    </tr>
 <?php   
  }
    }
  ?>
    
    </tbody>
    </table>
                  </div>  
                    
                
                
          
          </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   

  <?php  getFooter(); ?>
<script>
 function updateStatus(id,status){

var formData = new FormData();
 formData.append("id", id);
 formData.append("status", status);
  // ajax start
        $.ajax({
      type: "POST",
      url: "<?php echo base_url()?>Shipment_order/updateStatus",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'JSON',
      beforeSend: function() {
      $('#loader').removeClass('hidden');
    //  $('#form_add_update .btn_au').addClass('hidden');
      },
      success: function(data){
        $('#loader').addClass('hidden');
        if(data.status==200){
          window.location.href = "<?php echo base_url() .'Shipment_order' ?>";
        }
           }
   });

  }
</script>  
<script>
$('#post_table').dataTable( {
  "ordering": false
} );
</script>

  

  
  
  