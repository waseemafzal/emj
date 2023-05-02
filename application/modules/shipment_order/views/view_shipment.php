<?php getHead();
$controller=$this->router->class;
$Heading=$controller;
if(isset($module_heading) and $module_heading!=''){
$Heading=	$module_heading;
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
      <li > <a href="<?=$controller?>/add_personal_effects?shipment_type=1" class="btn btn-sm btn-info txt-white"><i style='font-size:20px' class="fa fa-user"></i> Personal Effects</a></li>
      <li > <a href="<?=$controller?>/add_ocean_shipment?shipment_type=2" class="btn btn-sm btn-info txt-white"><i style='font-size:20px' class="fa fa-ship icon-white"></i> Ocean Freight</a></li>
      <li > <a href="<?=$controller?>/add_air_shipment?shipment_type=3" class="btn btn-sm btn-info txt-white"><i style='font-size:20px' class="fa fa-plane icon-white"></i> Air Freight</a></li>
        <li > <a href="<?=$controller?>/add_vehicle_shipment?shipment_type=4" class="btn btn-sm btn-info txt-white"><i style='font-size:20px' class="fa fa-truck icon-white"></i> Vehicle Shipment</a></li>
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
        <th>Dock Receipt</th>
        <th>Invoice</th>
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
            if($status['status_id']==$row->shipment_status){
              $selected='selected="selected"';
            }
          }
           echo '<option value = "'.$status['status_id'].'" '.$selected.'>'.$status['status_title'].'</option>';
           } ?>
            
          
         </select></td> 
         <td>
          <select onchange="dockreceipt('<?php echo $row->id?>')">
            <option>Dock Receipt</option>
          </select>
         </td>
          <td>
            <a href="<?=$controller?>/generateinvoice/<?php echo $row->id;?>" class="btn btn-xs btn-success txt-white"><i class="fa fa-plus icon-white"></i>Invoice</a>
         </td>
         
    <td class="center">
            
           <button data-target="#shipment_modal_<?php echo $row->id;?>" class="btn btn-primary btn-xs" data-toggle="modal" ><i class="fa fa-eye"></i></button> 
           <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-xs" href="<?=$controller?>/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-xs" href="javascript:void(0)" id="deleteion" onClick="deleteRecord('<?php echo $row->id;?>','<?=$tbl?>');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
            <div class="modal fade" id="shipment_modal_<?php echo $row->id;?>" tabindex="-1" data-backdrop="static">
     <div class="modal-dialog-lg modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header bg-green">
         <h4 class="modal-title pull-left" style="font-weight: bolder">Shipment Details of <?php echo ucfirst($row->shipper_name)?></h4>
       <button class="close" data-dismiss="modal">x</button>
       </div>
       
       <div  class="modal-body">
        <div class="col-md-6">
          <h4 class="bg-red text-center"><b>Shipper Details</b></h4>
       
          <table class="table table-striped">
            <tr>
              <td><b>Name:</b> <?php echo $row->shipper_name?></td>
              <td><b>Phone:</b> <?php echo $row->shipper_phone?></td>
            </tr>
            <tr>
              <td><b>Tracking Number:</b> <?php echo $row->track_number?></td>
              <td><b>State:</b> <?php echo $row->shipper_state?></td>
            </tr>
            <tr>
              <td><b>City:</b> <?php echo $row->shipper_city?></td>
              <td><b>Address:</b> <?php echo $row->shipper_address?></td>
            </tr>
           
          </table>
        </div>
       

        <div class="col-md-6">
          <h4 class="bg-red text-center"><b>Consignee Details</b></h4>
       
          <table class="table table-striped">
            <tr>
              <td><b>Name:</b> <?php echo $row->consignee_name?></td>
              <td><b>Country:</b> <?php echo $row->consignee_country?></td>
            </tr>
             <tr>
              <td><b>State:</b> <?php echo $row->consignee_state?></td>
              <td><b>City:</b> <?php echo $row->consignee_city?></td>
            </tr>
             <tr>
              <td><b>Address:</b> <?php echo $row->consignee_address?></td>
              <td><b>Phone:</b> <?php echo $row->consignee_phone?></td>
            </tr>
          </table>
        </div>
         <div class="col-md-12">
          <h4 class="bg-red text-center"><b>Item Details</b></h4>
       
          <table class="table table-striped">
            <tr>
              <td><b>Description:</b><?php echo $row->item_description?></td>
              <td><b>Quantity:</b> <?php echo $row->quantity?></td>
              <td><b>Length:</b> <?php echo $row->length?></td>
              <td><b>Width:</b> <?php echo $row->width?></td>
            </tr>
             <tr>
              <td><b>Height:</b> <?php echo $row->height?></td>
              <td><b>Package Type:</b> <?php echo $row->package_type?></td>
              <td><b>Package Weight:</b> <?php echo $row->package_weight?></td>
              <td><b>Carriage Value:</b> <?php echo $row->carriage_value?></td>
            </tr>
             <tr>
              <td><b>Amount:</b> <?php echo $row->amount?></td>
              <td><b>Shipment Type:</b> <?php echo $row->shipment_type?></td>
              <td><b>Shipment From:</b> <?php echo $row->shipment_from?></td>
              <td><b>Shipment To:</b> <?php echo $row->shipment_to?></td>
            </tr>
             <tr>
              <td><b>Shipment Date:</b> <?php echo $row->shipment_date?></td>
              <td><b>Request Pickup:</b> <?php echo $row->request_pickup?></td>
              <td><b>Request Insurance:</b> <?php echo $row->request_insurance?></td>
              <td><b>Pickup Location:</b> <?php echo $row->pickup_location?></td>
            </tr>
             <tr>
              <td><b>Delivery Type:</b> <?php echo $row->delivery_type?></td>
             
            </tr>
            
          </table>
        </div>
         <div class="col-md-6">
          <h4 class="bg-red text-center"><b>Images</b></h4>
           
             <?php 
                   $select = $this->db->where('order_id', $row->id)->get('shipment_orders_files')->result_array();
                  
             ?>
           <?php foreach($select as $image){?>
            <div style="display: inline-block;">
              <a href="<?php echo setImage($image['file'])?>" class='fancybox'><img src="<?php echo setImage($image['file']);?>" width="70"></a>
                  </div>
           <?php }?>
           
         </div>
     
       </div>
       <?php if($row->shipment_type==4){?>
        <div class="col-md-6">
          <h4 class="bg-red text-center"><b>Vehicle Details</b></h4>
           
             <?php 
                   $vehicles = $this->db->where('order_id', $row->id)->get('shipment_orders_oceanfreight')->result_array();
                  
             ?>
            <table class="table table-striped">
               <?php foreach($vehicles as $vehicle){?>
              <tr>
                <td><b>Vin Number:</b> <?php echo $vehicle['vin_number']?></td>
                <td><b>Vehicle Description:</b> <?php echo $vehicle['vehicle_description']?></td>
                </tr>
                <tr>
                <td><b>Purchase Cost:</b> <?php echo $vehicle['purchase_cost']?></td>
                <td><b>Company Preference:</b> <?php echo $vehicle['company_preference']?></td>
              </tr>
            <?php }?>
            </table>
       </div>
     <?php }?>
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
      url: "<?php echo base_url()?>shipment_order/updateStatus",
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
          alert('Status has been changed successfully');
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
<script>
  function dockreceipt(id){
    $.ajax({
      type: "get",
      url: '<?php echo base_url()?>shipment_order/dock_receipt'
    });
  }
</script>
  

  
  
  