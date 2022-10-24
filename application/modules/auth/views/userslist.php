<?php getHead();

 ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo lasturi() ?></h1>
      <ol class="breadcrumb">
       
        <!--<li><a href="#" class="btn btn-info btn-sm">ADD USERS</a></li>
        -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All <?php echo lasturi(); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table class="table table-bordered table-striped data-table">
                     <thead>
                        <tr>
                            <th><?php echo ucwords(this_lang('NAME'));?></th>
                            <th><?php echo ucwords(this_lang('EMAIL'));?></th>
                            <th><?php echo ucwords(this_lang('Image'));?></th>
                            <th><?php echo ucwords(this_lang('status'));?></th>
                            <th><?php echo ucwords(this_lang('Plan'));?></th>
                            <th><?php echo ucwords(this_lang('action'));?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($users as $user):?>
                    <tr id="row_<?PHP echo $user->id;?>" class="user_type<?php echo $user->user_type; 
                    ?>">
                    <td><?php echo htmlspecialchars($user->name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                    <td  class="center">
						<?php
                        $img = $user->image;
                        if(!empty($img)){
                        $res = explode('.',$img);
                        $name = $res[0];
                        $ext = $res[1];
                        $image = base_url().'uploads/'.$name.'.'.$ext;
                        $thumb = $name.'_thumb.'.$ext;
                        {?>
                        <span style="margin:0 !important; display:inline-block" class="thumbnail">
                        <a class="fancybox" title="img" href="<?php echo $image; ?>">
                        <img width="50" height="50" src="<?php echo $image; ?>" alt="img">
                        </a>
                        </span>
                        <?php }
                        } else{
                        echo '<img class="fancybox" width="50" height="50" src="'.base_url().'img/no-image.png">';
                        }
                        ?> 
                    </td>
                    <td class="center">
						<?PHP if($user->active==0){
                        $class="label-danger";
                        $text='Suspended';
                        }else{
                        $class="label-success";
                        $text='Active';
                        } 
                        ?> 
                        <span id="div_status_<?PHP echo $user->id;?>">
                        <a href="javascript:void(0);"  
                        onclick="changeUserStatus('<?PHP echo $user->id;?>','<?PHP echo $user->active;?>','<?PHP echo 'users';?>');" >
                        <span class="label <?PHP echo $class;?>">
                        <?PHP echo ucwords(this_lang($text));?></span>
                        </a>
                        </span>   
                    </td> 
                    <td>
                       
                        <?PHP echo $user->planName;?>
                    </td>
                    <td>
                    <?php
					$hide='';
					if($title='App Users'){
					//$hide='hidden';
					}
					?>
                                            <!------------->
            <div class="modal fade" id="contact_modal_<?php echo $user->id;?>" tabindex="-1" data-backdrop="static">
     <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Contacts of <?=$user->name?></h4>
       <button class="close" data-dismiss="modal"><span>&times;</span></button>
       </div>
       <div  class="modal-body">
          <?php
       $data= $this->db->where('user_id', $user->id)->get('contacts')->result();
       
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
                         <button data-target="#contact_modal_<?php echo $user->id;?>" data-toggle="modal" class="btn btn-success btn-xs">
          <i class="fa fa-phone"></i> Contacts <span class="badge"><?php echo count($data)?></span></button>


                        <a href="auth/edit/<?php echo $user->id;?>"  data-toggle="tooltip" title="Edit User" class="<?php echo $hide ?> btn btn-effect-ripple btn-xs btn-success ">
                        <i class="fa fa-pencil"></i></a>
                         
                        <?php 
						if($user->id!=1){?>
						
                        <a href="javascript:void(0)" onClick="deleteRecord('<?php echo $user->id;?>','users');" data-toggle="tooltip" title="Delete " class="btn btn-effect-ripple btn-xs btn-danger">
                        <i class="fa fa-times">
                        </i>
                        </a>
						<?php } ?>

                    </td>
                    </tr>
                    <?php endforeach;?>
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
  