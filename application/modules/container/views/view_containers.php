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
        <th>Container Type</th>
        <th>Number</th>
		    <th>Serial No 1</th>
        <th>Serial No 2</th>
        <th>Location</th>
        <th>Description</th>
        <th>Length</th>
        <th>Width</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Volume</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	
	if($data!=''){
	foreach ($data->result() as $row){
		
		?>
		<tr id="row_<?php echo $row->id;?>">
        
    <td><?php echo $row->container_type;?></td>
    <td><?php echo $row->number;?></td>
    
    
    <td><?php echo $row->serial_number_1;?></td>
    <td><?php echo $row->serial_number_2;?></td>
    <td><?php echo $row->location;?></td>
    <td><?php echo $row->description;?></td>
    <td><?php echo $row->length;?></td>
    <td><?php echo $row->width;?></td>
    <td><?php echo $row->height;?></td>
    <td><?php echo $row->weight;?></td>
    <td><?php echo $row->volume;?></td>
    <td>
      <a href="<?=$controller?>/edit/<?php echo $row->id;?>" class='btn btn-warning'>Edit</a>
      <a onClick="deleteRecord('<?php echo $row->id;?>','<?=$tbl?>');" class='btn btn-danger'>Delete</a>
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

  

  
  
  