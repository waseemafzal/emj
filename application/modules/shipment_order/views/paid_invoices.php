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
.selectedRow{
    background-color: gainsboro;
}
   </style>
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      <?=$Heading?>
        
      </h1>

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
        <th>User</th>
        <th>Email</th>
        <th>Created Date</th>
        <th>Due Date</th>
	    <th>Booking no</th>    
        <th>Paid</th>    
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	
	if($invoices!=''){
	foreach ($invoices as $invoice){
		
		?>
		<tr id="row_<?php echo $invoice['id'];?>">
        <td><?php echo $invoice['name'];?></td>
        <td><?php echo $invoice['email'];?></td>
	    <td><?php echo $invoice['created_date'];?></td>
    	<td><?php echo $invoice['due_date'];?></td>
        <td><?php echo $invoice['booking_no'];?></td>
        <td><?php echo $invoice['paid'];?></td>

    <td class="center">
            
           <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-xs" href="<?=$controller?>/edit/<?php echo $invoice['id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-xs" href="javascript:void(0)" id="deleteion" onClick="deleteRecord('<?php echo $invoice['id'];?>');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
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
  function redirectMe(id){
    window.location.href="shipment_order/generate/"+id;
  }
$('#post_table').dataTable( {
  "ordering": false
} );
</script>
<script>
  function dockreceipt(id, value){
    // formData = new FormData();
    // formData.append('id', id);
    // formData.append('value', value);
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>shipment_order/dock_receipt',
      data:{id:'id',value:'value'},
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'JSON',
      success:function(response){
        if(response.value=='dock_receipt'){
          alert(response.value);
          // window.location.href = '<?php echo base_url()?>shipment_status/dock_receipt';
        }
        //  if(response.value=='bill_of_receipt'){
        //   window.location.href = '<?php echo base_url()?>shipment_status/bill_of_receipt';
        //        }
              }
    });
  }
  
  
  

// Attach a click event listener to a button with the ID 'check-shipment'
$('.chkshipment').on('click', function() {
	$('.chkshipment').prop('checked', false);
	$(this).prop('checked', true);
	$('#post_table tr').removeClass('selectedRow');
	$(this).parent().parent().addClass('selectedRow');
});
function updateShipment_type(shipment_type){

 var formData = new FormData();
 var id= $('.chkshipment:checked').val();
 formData.append("id", id);
 formData.append("shipment_type", shipment_type);
  // ajax start
        $.ajax({
      type: "POST",
      url: "<?php echo base_url()?>shipment_order/updateShipment_type",
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
          //alert('Status has been changed successfully');
		  window.location.href = '<?php echo base_url()?>shipment_order/edit/'+id+'/'+shipment_type;
        }
           }
   });

  }
</script>
  
  
  
  