<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
       Clients Management
        
      </h1>
      <ol class="breadcrumb">
    <!-- <a  href="clients/add" class="btn btn-success fff"> <i class="fa fa-plus"></i> Add Client</a>
    -->      </ol>
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

                <table id="post_table" class="table table-striped table-bordered   responsive">
    <thead>
    <tr>
        <th>Name </th>
        <th>Email </th>
        <th>Phone  </th>
        <th>Dob</th>
        <th>Work/invoice</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($data->result())){
	foreach ($data->result() as $row){
		
		?>
		<tr id="row_<?php echo$row->id;?>">
        <td>
         <a data-toggle="tooltip" title="View History" href="clients/profile/<?php echo $row->id;?>">
		<?php 
		$src=$row->image;
		if(empty($row->image)){
		$src=base_url().'uploads/noimg.png';
		
		}
				echo '<img  src="'.$src.'" width="50" >';
			
		 ?>
		<?php echo $row->name;?>
        </a>
        </td>
                 <td><?php echo $row->email;?></td>
         <td><?php echo $row->phone;?></td>
         <td><?php echo $row->dob;?></td>

      <td>
     
      <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Add work oder'));?>" class="btn btn-info btn-xs" href="clients/workorder/<?php echo $row->id;?>/0">
                <i class="fa fa-plus"></i> Work Order
            </a>
    <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Add invoice'));?>" class="btn btn-info btn-xs hidden" href="clients/invoice/<?php echo $row->id;?>/0">
                <i class="fa fa-plus "></i>Invoice
            </a>
      </td>
        <td class="center">
        <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('View History/Profile'));?>" class="btn btn-info btn-xs" href="clients/profile/<?php echo $row->id;?>">
                <i class="fa fa-eye"></i> History
            </a>
            <?php /*?><a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-xs" href="clients/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-xs" href="javascript:void(0)" onClick="deleteRecord('<?php echo$row->id;?>','clients');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a><?php */?>
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
$('#post_table').dataTable( {
  "ordering": false
} );
</script>
  
  
  
  