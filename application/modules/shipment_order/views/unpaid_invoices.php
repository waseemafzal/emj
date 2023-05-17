<?php getHead();
$controller=$this->router->class;
$Heading=	'Unpaid Invoices';
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
        <th></th>
        <th>User</th>
        <th>Email</th>
        <th>Created Date</th>
        <th>Due Date</th>
        <th>Booking No</th>
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
    <td><input type='checkbox' id='invoiceMail' value='<?php echo $invoice['user_id']?>'></td>
        <td><?php echo $invoice['name'];?></td>
        <td><?php echo $invoice['email'];?></td>
        <td><?php echo $invoice['created_date'];?></td>
        <td><?php echo $invoice['due_date'];?></td>
        <td><?php echo $invoice['booking_no'];?></td>
        <td><?php echo $invoice['paid'];?></td>
    <td class="center">
            
           <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-xs" href="<?=$controller?>/generateinvoice/<?php echo $invoice['id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-xs" href="javascript:void(0)" id="deleteion" onClick="deleteRecord('<?php echo $invoice['id'];?>', 'clients_invoice);">
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
                    
     <div class="modal fade" id="invoiceMailModal_<?php echo $invoice['user_id']?>" tabindex="-1" data-bs-backdrop="static">
     <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
         <div class="modal-header bg-black">
           <h3 class="modal-title">Mail Invoice Modal</h3>
             <button class="close" data-dismiss="modal"><span>&times;</span></button>
       </div>
       <div class="modal-body">
       <form id="sendMailInvoice">
         <label>From:</label>
         <input type="text" readonly name="name" style='width:50%' class="form-control" value="EMJ Global"><br>
         <label>To:</label>
         <input type="email" readonly style='width:50%' value='<?php echo $invoice['email'];?>' name="email" class="form-control">
         <br><label>Template:</label>
             <select style='width:50%' class='form-control' id="mail_templates">
              <option>Choose Template</option>
             <?php 
             $data = $this->db->get('mailing')->result_array();
            if($data){
              foreach($data as $template){            
                ?>
                  <option value='<?php echo $template['id']?>'><?php echo $template['title']?></option>
                <?php }}?>
                  </select>
          <br>
          <label>Description:</label>
          <textarea id='description' class='form-control'></textarea>
       </form>
       <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
       <script type="text/javascript" src="bower_components/ckeditor/ckeditor.js"></script>   
<script type="text/javascript">
    $(function(){
           CKEDITOR.replace('description');

    });
</script> 
       </div>
     <div class="modal-footer">
       <button class="btn btn-success" id="saveData" type="button">Save</button>
       <button class="btn btn-danger" data-dismiss="modal" >Cancel</button>
     </div>
     <script>
     $(function() {
    $("#mail_templates").change(function(){
      var id = $('#mail_templates').val();
        $.ajax({
          type: "POST",
          url:  "<?=base_url()?>shipment_order/autocomplete_mailtemplate_description",
          data:{id:id},
          dataType: 'JSON',
          success:function(response){
            if(response.status==200){
              //alert(response.description);
              CKEDITOR.instances['description'].setData(response.description);
              //$('#description').val(response.description);
            }
          }
        })
    })
  })

</script>
     </div>
</div>
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
<script>
  $(function(){
    $("input[type='checkbox']").on('change', function(e){
      if(e.target.checked){
        $('#invoiceMailModal_<?php echo $invoice["user_id"]?>').modal('show');
        // var id = $('#invoiceMail').val();
        // alert(id);
        // $('#QueryId').val(id);
      }
    })
  })
</script>  
  

  
  
  