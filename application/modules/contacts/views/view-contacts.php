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
        <li > <a href="<?=$controller?>/add" class="btn btn-sm btn-success txt-white">Add New Contact</a></li>
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
              <div class="table-responsive">
                                <table class="table table-bordered" id="post_table" width="100%" cellspacing="0">
                               
        <thead>
            <tr>
                <th>Person</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Type</th>
                <th>City</th>
                <th>Action</th>
            </tr>
    </thead>
    <tbody>
        <?php
              foreach ($row as $value) {
            ?>
        <tr>
            <td>
			<?php
    $FILE= FCPATH.$value['image'];
   //echo $FILE;exit();
if(!is_file($FILE)){

  $value['image']=base_url().'uploads/noimg.png';
}

    echo '<a href="'.$value['image'].'" class="fancybox"><img src="'.$value['image'].'" width="40"></a> ';
     ?>
			<?php echo $value['name'];?></td>
            <td><?php echo $value['email'];?></td>
            <td><?php echo $value['phone'];?></td>
            <td><?php echo $value['address'];?></td>
             <td><?php echo $value['type'];?></td>
             <td><?php echo $value['city'];?></td>
            
             
     <td>
                <a class="btn btn-warning" href="<?php echo base_url()?>contacts/edit?id=<?php echo $value['id'];?>">Edit</a>
                <a class="btn btn-danger" href="<?php echo base_url()?>contacts/delete?id=<?php echo $value['id'];?>">Delete</a>


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
  
  
  
  