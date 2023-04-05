<?php getHead();
$controller=$this->router->class;
 $Heading = 'Purchase Orders';
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

        <li > <a href="<?=$controller?>/add_purchase_order" class="btn btn-sm btn-success txt-white"><i class="fa fa-plus icon-white"></i> Add Purchase Order</a></li>
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
        <th>Seller Name</th>
        <th>Contact Address</th>
        <th>Phone No</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
  
  if($result!=''){
  foreach ($result as $row){
    
    ?>
    <tr id="row_<?php echo $row['id'];?>">
        
    <td><?php echo $row['seller_name'];?></td>
    <td><?php echo $row['contact_address'];?></td>
    <td><?php echo $row['phone_no'];?></td> 
    <td><?php echo $row['email'];?></td>
         
    <td class="center">
            
           <button data-target="#purchase_orders_<?php echo $row['id'];?>" class="btn btn-primary btn-xs" data-toggle="modal" ><i class="fa fa-eye"></i></button> 
           <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-xs" href="<?=$controller?>/edit_purchase_order/<?php echo $row['id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-xs" href="javascript:void(0)" id="deleteion" onClick="deleteRecord('<?php echo $row['id'];?>','purchase_orders');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
            <div class="modal fade" id="purchase_orders_<?php echo $row['id'];?>" tabindex="-1" data-backdrop="static">
     <div class="modal-dialog-lg modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header bg-green">
         <h4 class="modal-title pull-left" style="font-weight: bolder"> Details of Purchase order</h4>
       <button class="close" data-dismiss="modal">x</button>
       </div>
       
       <div  class="modal-body">
        <div class="col-md-6">
          <h4 class="bg-red text-center"><b>Seller Details</b></h4>
       
          <table class="table table-striped">
            <tr>
              <td><b>Name:</b> <?php echo $row['seller_name']?></td>
              <td><b>Address:</b> <?php echo $row['contact_address']?></td>
            </tr>
            <tr>
              <td><b>Phone #:</b> <?php echo $row['phone_no']?></td>
              <td><b>Email:</b> <?php echo $row['email']?></td>
            </tr>
            <tr>
              <td><b>Payment Terms:</b> <?php echo $row['payment_terms']?></td>
              <td><b>Shop:</b> <?php echo $row['shop_via']?></td>
            </tr>
           
          </table>
        </div>
       

        <div class="col-md-6">
          <h4 class="bg-red text-center"><b>Receiver Details</b></h4>
       
          <table class="table table-striped">
            <tr>
              <td><b>Name:</b> <?php echo $row['receiver_name']?></td>
              <td><b>Address:</b> <?php echo $row['receiver_address']?></td>
            </tr>
             <tr>
              <td><b>Reference #:</b> <?php echo $row['reference_number']?></td>
              <td><b>Part #:</b> <?php echo $row['part_number']?></td>
            </tr>
             <tr>
              <td><b>Date:</b> <?php echo $row['date']?></td>
            </tr>
          </table>
        </div>
         <div class="col-md-6">
          <h4 class="bg-red text-center"><b>Item Details</b></h4>
       
          <table class="table table-striped">
            <tr>
              <td><b>Quantity:</b><?php echo $row['quantity']?></td>
              <td><b>Description:</b> <?php echo $row['description']?></td>
              <td><b>Additional Information:</b> <?php echo $row['additional_information']?></td>
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

  

  
  
  