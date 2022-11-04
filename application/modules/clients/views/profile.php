<?php getHead();


 ?>
   <style>
    .box-primary {
	margin:5px 2px;	
		}
    .box-primary img{
		min-width:200px;
		min-height: 200px;
	
	}
	div.center{
background-color: #fff;
    border-radius: 5px;
    box-shadow: -2px 2px 7px 1px;
    left: 0;
    margin-left: -100px;
    padding: 11px;
    position: absolute;
    top: 10%;
    width: 50%;
}
.btn{
    border: none;
    box-shadow: 1px 2px 2px 1px #443c3c;
}
.btnAdd{
    margin: 0 0 6px 0;
}
   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">
<?php 

 if($row->image==''){
							$row->image=base_url().'uploads/noimg.png';
							 }
?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?=$row->image?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?=ucfirst($row->name)?></h3>

              <?php /*?><p class="text-muted text-center"><a href="clients/edit/<?=$row->id?>"><i class="glyphicon glyphicon-pencil"></i> Edit </a></p><?php */?>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i class="fa fa-user"></i>Gender</b> <a class="pull-right"><?=ucfirst($row->gender)?></a>
                </li>
                <li class="list-group-item">
                  <b><i class="fa fa-birthday-cake"></i> Birthday</b> <a class="pull-right"><?=ucfirst($row->dob)?></a>
                </li>
                 <li class="list-group-item">
                  <b><i class="fa fa-envelope"></i> Email</b> <a class="pull-right"><?=$row->email?></a>
                </li>
                <li class="list-group-item">
                  <b><i class="fa fa-phone"></i> Phone</b> <a class="pull-right"><?=$row->phone?></a>
                </li>
               
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary hidden">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!--<strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>-->

             <?php /*?> <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?=ucfirst($row->address)?></p>
<?php */?>
              
              <hr>

             <?php /*?> <strong><i class="fa fa-file-text margin-r-5"></i> Notes</strong>

              <p><?=ucfirst($row->notes)?></p><?php */?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">History</a></li>
              <!-- <li><a href="#Invoices" data-toggle="tab">Invoices</a></li>-->
          <!--    <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
             
          -->  </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
            <div class="row">
            <div class="col-md-12">
            <a href="clients/workorder/<?=$this->uri->segment(3)?>/0" class="btn btn-success pull-right btn-xs btnAdd"><i class="fa fa-plus"></i>Add Work order</a>
          
            </div>
            
            <div class="col-md-12">
            <table id="work_table" class="table table-striped table-bordered   responsive">
    <thead>
    <tr>
        <th>Date </th>
        <th>Consultation </th>
        <th>indications </th>
        <th>Notes </th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($clients_workorder->result())){
	foreach ($clients_workorder->result() as $row){
		
		?>
		<tr id="row_<?php echo$row->id;?>">
        <td><?php echo $row->created_date;?></td>
        <td class="center"><?php echo html_cut($row->notes,50); ?></td>
        <td class="center"><?php echo html_cut($row->indications,50); ?></td>
        <td class="center"><?php echo html_cut($row->notes,50); ?></td>
        
       
        <td class="center">
        <a href="clients/invoice/<?=$this->uri->segment(3)?>/<?=$row->id?>" class="btn btn-success  btn-xs ">Invoice</a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-xs" href="clients/workorder/<?=$this->uri->segment(3)?>/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-xs btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo$row->id;?>','clients_workorder');">
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
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="Invoices">
            <div class="row">
           
            <div class="col-md-12">
            
            </div>
            <div class="col-md-12">
            <table id="post_table" class="table table-striped table-bordered   responsive">
    <thead>
    <tr>
        <th>Amount </th>
        <th>Due Date </th>
        <th>Created Date </th>
        <th>Notes </th>
        <th>Status  </th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($clients_invoice->result())){
	foreach ($clients_invoice->result() as $row){
		
		?>
		<tr id="row_<?php echo$row->id;?>">
        <td><?php echo $row->amount;?></td>
        <td><?php echo $row->due_date;?></td>
        <td><?php echo $row->created_date;?></td>
        <td class="center"><?php echo html_cut($row->notes,10); ?></td>
        <td class="center">
        <?PHP if($row->paid=='No'){
        $class="label-danger";
        $text='UnPaid';
        }else{
        $class="label-success";
        $text='Paid';
        } 
        ?> 
        <span id="div_status_<?PHP echo $row->id;?>">
        <a id="anchor_<?PHP echo $row->id;?>" href="javascript:void(0);"  
        >
        <span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
        </a>
        </span>   
        </td>
       
        <td class="center">
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-sm btn-info" href="clients/invoice/<?=$this->uri->segment(3)?>/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-sm btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo$row->id;?>','clients_invoice');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
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
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
   

  <?php  getFooter(); ?>
   <script>
$('#work_table').dataTable( {
  "ordering": false
} );
$('#post_table').dataTable( {
  "ordering": false
} );
</script>
  <script>
   

	
  /**********************************save************************************/
	 $('#form_add_update').on("submit",function(e) {
		e.preventDefault();
		
	var formData = new FormData();
	var other_data = $('#form_add_update').serializeArray();
	
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
	//$('#form_add_update')
	
	 if($('#image').val()!=''){
		formData.append("image", document.getElementById('image').files[0]);
		}
		
		/*description = CKEDITOR.instances.editor1.getData();
		formData.append("description", description);*/
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'clients/save'; ?>",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
			beforeSend: function() {
			$('#loader').removeClass('hidden');
		//	$('#form_add_update .btn_au').addClass('hidden');
			},
			success: function(data) {
			$('#loader').addClass('hidden');
			$('#form_add_update .btn_au').removeClass('hidden');
			//alert(data.status);
			//var obj = jQuery.parseJSON(data);
            if (data.status == 1)
            {   
				$(".alert").addClass('alert-success');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				setTimeout(function(){
				$(".alert").addClass('hidden');
				$('#form_add_update')[0].reset();
				window.location='clients';
				},2000);
            }
           else if (data.status ==0)
            {  
			$(".alert").addClass('alert-danger');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				setTimeout(function(){
				$(".alert").addClass('hidden');
				},3000);
            }
			else if (data.status == 2)
            {   
			$(".alert").addClass('alert-success');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				setTimeout(function(){
				window.location='clients';
				},1000);
            }
			else if (data.status == "validation_error")
            {   
			$(".alert").addClass('alert-warning');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				
            }
			
           }
	 });

	//ajax end    
    });
 
  </script>
  