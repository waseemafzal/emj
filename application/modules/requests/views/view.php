<?php getHead();
$controller=$this->router->class;
$Heading=$controller;
if(isset($module_heading) and $module_heading!=''){
$Heading= $module_heading;
  }
 ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      <?=$Heading?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <table id="post_table" class="table table-striped table-bordered responsive">
    <thead>
    <tr>
        <th>User</th>
        <th>Request type</th>
        <th>Description</th>
        <th>Created date</th>
        <th>Status</th>      
        <th>Map</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
  
  if($data!=''){
  foreach ($data->result() as $row){
    
    ?>
           
    <tr id="row_<?php echo$row->id;?>">
        <td><?php
    
    echo '<a href="'.setImage($row->image).'" class="fancybox"><img src="'.setImage($row->image).'" width="50"></a> '.$row->name;
     ?></td>
         <td><?=$row->request_type?></td>
      <td><?=$row->description?></td>
      <td><?=$row->created_date?></td>
       <?php 
      if($row->status==0){
        echo '<td><label class="label-warning label">Pending</label></td>'; 
       } ?>
      
        
       <?php 
      if($row->status==1){
        echo ' <td><label class="label-success label">Complete</label></td>';
        }?>
       
        
         <?php 
      if($row->status==2){
       echo ' <td><label class="label-danger label">Cancel</label></td>';
       } ?>
       
       
       <td>

 
           <button data-target="#map_modal_<?php echo $row->id;?>" data-toggle="modal" class="btn btn-success btn-xs">
          <i class="fa fa-map-marker"></i> See Location</button>
 <div class="modal fade" id="map_modal_<?php echo $row->id;?>" tabindex="-1" data-backdrop="static">
     <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header">
<<<<<<< HEAD
         <h4 class="modal-title">Location of <?=$row->name?></h4>
=======
         <h1 class="modal-title">Location of <?=$row->name?></h1>
>>>>>>> 1ffa46019fb2b2051510ec217955e4d05bb6b4fe
       <button class="close" data-dismiss="modal"><span>&times;</span></button>
       </div>
       <div  class="modal-body">
             <iframe 
   style="width:100%" 
  height="300" 
  frameborder="0" 
  scrolling="no" 
  marginheight="0" 
  marginwidth="0" 
  src="https://maps.google.com/maps?q=<?=$row->latlon?>&hl=es&z=14&amp;output=embed"
 >
 </iframe>
 <br />
 <small>
   <a 
    href="https://maps.google.com/maps?q=<?=$row->latlon?>" 
    style="color:#0000FF;text-align:left" 
    target="_blank"
   >
     See map bigger
   </a>
 </small>
     
       </div>
     <div class="modal-footer">
       <button class="btn btn-danger" data-dismiss="modal" >Cancel</button>
     </div>
     
     </div>
</div>
</div>
       </td>
    <td class="center">
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-xs btn-info" href="<?=$controller?>/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Update Status
            </a>
            
           <button data-target="#contact_modal_<?php echo $row->id;?>" data-toggle="modal" class="btn btn-success btn-xs">
          <i class="fa fa-phone"></i> Contacts</button>
          <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-xs btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo $row->id;?>','<?=$tbl?>');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
           <div class="modal fade" id="contact_modal_<?php echo $row->id;?>" tabindex="-1" data-backdrop="static">
     <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Contacts of <?=$row->name?></h4>
       <button class="close" data-dismiss="modal"><span>&times;</span></button>
       </div>
       <div  class="modal-body">
          <?php
       $data= $this->db->where('user_id', $row->user_id)->get('contacts')->result();
       
          ?>
        <table class="table table-bordered table-striped">
          <thead>
           <tr> 
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            
            <th>Address</th>
          </tr>
          </thead>
<tbody>
  <?php
   if($data){
          foreach($data as $row){
            ?>
  <tr>
     <td><?php echo $row->name?></td>
     <td><?php echo $row->contact?></td>
     <td><?php echo $row->email?></td>
     
     <td><?php echo $row->address?></td>
  </tr>
 <?php }}?>
</tbody>



        </table>
     
       </div>
     <div class="modal-footer">
     <button class="btn btn-danger" data-dismiss="modal" >Cancel</button>
     </div>
     
     </div>
</div>
</div>
        </td>
    </tr>
      <!---Contact Modal-------->

      

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
  
  
  
  