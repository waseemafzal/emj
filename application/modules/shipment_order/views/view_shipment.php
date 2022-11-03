<?php getHead();
$controller=$this->router->class;
$Heading=$controller;
if(isset($module_heading) and $module_heading!=''){
$Heading=	$module_heading;
	}
 ?>
   <style>
   .txt-white{ color:#fff !important}
  
   </style>
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      <?=$Heading?>
        
      </h1>
      <ol class="breadcrumb">
        <li > <a href="<?=$controller?>/add" class="btn btn-sm btn-success txt-white"><i class="fa fa-plus icon-white"></i> Add New Record</a></li>
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
        <th>Track Number</th>
        <th>Shipper Name</th>
		    <th>Shipper Address</th>
        <th>Consignee Name</th>
        <th>Consignee Phone</th>
        <th>Consignee Address</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	
	if($data!=''){
	foreach ($data->result() as $row){
		
		?>
		<tr id="row_<?php echo $row->id;?>">
        
		<td align="center"><?php echo $row->track_number;?></td>
    <td><?php echo $row->shipper_name;?></td>
    <td><?php echo $row->shipper_address;?></td>
    
    
    <td><?php echo $row->consignee_name;?></td>
    <td><?php echo $row->consignee_phone;?></td>   
    <td><?php echo $row->consignee_address;?></td>
    <td>  
      <select id="status_change" onchange="updateStatus('<?php echo $row->id;?>', this.value)">
           <?php 
             $query = $this->db->get('shipment_status')->result_array();

           foreach($query as $status){
            $selected="";
          if(isset($row)){
            if($status['status_title']==$row->Shipment_status){
              $selected='selected="selected"';
            }
          }
           echo '<option '.$selected.'>'.$status['status_title'].'</option>';
           } ?>
            
          
         </select></td> 
    <td class="center">
            
           <button data-target="#shipment_modal_<?php echo $row->id;?>" class="btn btn-primary btn-xs" data-toggle="modal" >View Details</button> 
           <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-xs" href="<?=$controller?>/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-xs" href="javascript:void(0)" id="deleteion" onClick="deleteRecord('<?php echo $row->id;?>','<?=$tbl?>');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
            <div class="modal fade" id="shipment_modal_<?php echo $row->id;?>" tabindex="-1" data-backdrop="static">
     <div class="modal-dialog-lg modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Shipment Details of <?=$row->shipper_name?></h4>
       <button class="close" data-dismiss="modal"><span>&times;</span></button>
       </div>
       
       <div  class="modal-body">
        <div class="col-md-6">
          <h5>Shipper Details</h5>
       
          <table class="table table-striped">
            <tr>
              <td>Name: <?php echo $row->shipper_name?></td>
              <td>Phone: <?php echo $row->shipper_phone?></td>
            </tr>
            <tr>
              <td>Trcking Number: <?php echo $row->track_number?></td>
              <td>State: <?php echo $row->shipper_state?></td>
            </tr>
            <tr>
              <td>City: <?php echo $row->shipper_city?></td>
              <td>Address: <?php echo $row->shipper_address?></td>
            </tr>
           
          </table>
        </div>
       

        <div class="col-md-6">
          <h5>Consignee Details</h5>
       
          <table class="table table-striped">
            <tr>
              <td>Name: <?php echo $row->consignee_name?></td>
              <td>Country: <?php echo $row->consignee_country?></td>
            </tr>
             <tr>
              <td>State: <?php echo $row->consignee_state?></td>
              <td>City: <?php echo $row->consignee_city?></td>
            </tr>
             <tr>
              <td>Address: <?php echo $row->consignee_address?></td>
              <td>Phone: <?php echo $row->consignee_phone?></td>
            </tr>
          </table>
        </div>
         <div class="col-md-12">
          <h5>Item Details</h5>
       
          <table class="table table-striped">
            <tr>
              <td>Description: <?php echo $row->item_description?></td>
              <td>Quantity: <?php echo $row->quantity?></td>
              <td>Length: <?php echo $row->length?></td>
              <td>Width: <?php echo $row->width?></td>
            </tr>
             <tr>
              <td>Height: <?php echo $row->height?></td>
              <td>Package Type: <?php echo $row->package_type?></td>
              <td>Package Weight: <?php echo $row->package_weight?></td>
              <td>Carriage Value: <?php echo $row->carriage_value?></td>
            </tr>
             <tr>
              <td>Amount: <?php echo $row->amount?></td>
              <td>Shipment Type: <?php echo $row->shipment_type?></td>
              <td>Shipment From: <?php echo $row->shipment_from?></td>
              <td>Shipment To: <?php echo $row->shipment_to?></td>
            </tr>
             <tr>
              <td>Shipment Date: <?php echo $row->shipment_date?></td>
              <td>Request Pickup: <?php echo $row->request_pickup?></td>
              <td>Request Insurance: <?php echo $row->request_insurance?></td>
              <td>Pickup Location: <?php echo $row->pickup_location?></td>
            </tr>
             <tr>
              <td>Delivery Type: <?php echo $row->delivery_type?></td>
             
            </tr>
            
          </table>
        </div>
         
     
       </div>
     <div class="modal-footer">
     <button class="btn btn-danger" data-dismiss="modal" >Cancel</button>
     </div>
     
     </div>
</div>
</div>
        </td>
    </tr>
    
		<?php }
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

  

  
  
  