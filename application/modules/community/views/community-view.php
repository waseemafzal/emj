<?php getHead();
$controller=$this->router->class;?>
<div class="content-wrapper">
<section class="content-header">
    <?php  $heading = "Community Management";?>
    <?php 
       echo '<h1>'.$heading.'</h1>';
    ?>
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
                <th>Name</th>
                <th>Title</th>
                <th>Location</th>
                <th>Comments</th>
                <th>Appropriate/ Inappropriate</th>
                <th>Action</th>
            </tr>
    </thead>
    <tbody>
        <?php
              foreach ($res as $value) {
            ?>
        <tr id="<?php echo $value['id']?>">
            <td><img src="uploads/<?php echo $value['image']?>">&nbsp;<?php echo $value['name'];?></td>
            <td><?php echo $value['title'];?></td> 
            <td><button data-target="#map_modal_<?php echo $value['id'];?>" data-toggle="modal" class="btn btn-success btn-xs">
          <i class="fa fa-map-marker"></i> See Location</button>
 <div class="modal fade" id="map_modal_<?php echo $value['id'];?>" tabindex="-1" data-backdrop="static">
     <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Location of <?=$value['name']?></h4>
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
  src="https://maps.google.com/maps?q=<?=$value['latitude'].$value['longitude']?>&hl=es&z=14&amp;output=embed"
 >
 </iframe>
 <br />
 <small>
   <a 
    href="https://maps.google.com/maps?q=<?=$value['latitude'].$value['longitude']?>" 
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
</div></td>
            <td>
              <div class="modal fade" id="comments_modal_<?php echo $value['id'];?>" tabindex="-1" data-backdrop="static">
     <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Comments of <?=$value['name']?></h4>
       <button class="close" data-dismiss="modal"><span>&times;</span></button>
       </div>
       <div  class="modal-body">
         	<?php
                $comments=$this->db->query("SELECT c.body,c.posted_time,u.name,u.image FROM `comments` as c 
JOIN users as u on u.id=c.user_id
WHERE c.report_id=".$value['id']);
    ?>           	
        <table class="table table-bordered table-striped">
          <thead>
           <tr> 
            <th>Name</th>
            <th>Comments</th>
            <th>Posted Time</th>
          </tr>
          </thead>
<tbody>
  <?php
   if($comments->num_rows()>0){
          foreach($comments->result() as $comment){
            ?>
  <tr>
     <td><img src="uploads/<?php echo $comment->image?>">&nbsp;<?php echo $comment->name?></td>
     <td><?php echo $comment->body?></td>
     <td><?php echo $comment->posted_time?></td>
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

                  <button data-toggle="modal" data-target="#comments_modal_<?php echo $value['id']?>" class="btn btn-success btn-xs"><i class="fa fa-comment">&nbsp;</i>Comments</button>
            </td>
            <td>
            	<button class="btn btn-danger btn-xs">
            	Flag count (<?php echo count_where('report_votes', array('status'=>'Flag','report_id'=>$value['id']));?>)
            		
            	</button>
            	<button class="btn btn-primary btn-xs">
            	Corroborate count (<?php echo count_where('report_votes', array('status'=>'Corroborate','report_id'=>$value['id']));?>)
            	</button>
            </td>
            <td> <a class="btn btn-danger" onclick="deleteConfirm('<?php echo $value['id'];?>')">Delete</a></td>
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
   
</div>
  <?php  getFooter(); ?>
<script>
$('#post_table').dataTable( {
  "ordering": false
} );
</script>

<script>
        function deleteConfirm(id){
           if(confirm("Are you really want to delete?")){
            window.location.href='<?php echo base_url()?>/community/delete/'+id;
         }else{
          return false;
         }

        }
  </script>
  
  
  
