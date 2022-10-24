<?php getHead();
$controller=$this->router->class;
$Heading=$controller;
if(isset($module_heading) and $module_heading!=''){
$Heading=	$module_heading;
	}
 ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      <?=$Heading?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>home"><i class="fa fa-dashboard"></i> Home</a></li>
<!--        <li > <a href="<?=$controller?>/add" class="btn btn-sm btn-success">Add New Record</a></li>
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
              <div class="table-responsive">
                                <table class="table table-bordered" id="post_table" width="100%" cellspacing="0">
                               
        <thead>
            <tr>
                <th>Body</th>
                <th>Action</th>
            </tr>
    </thead>
    <tbody>
        <?php
              foreach ($data as $value) {
            ?>
        <tr>
            <td><?php echo $value->body;?></td>
            
            
        
     
     <td>
                <a class="btn btn-warning" href="<?php echo base_url()?>conversation/edit?id=<?php echo $value->id;?>">Edit</a>
                <a class="btn btn-danger" href="<?php echo base_url()?>conversation/delete?id=<?php echo $value->id;?>">Delete</a>


            </td>





        </tr>
<?php } ?>




    </tbody>




    </table>
                            </div>
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
  
  
  
