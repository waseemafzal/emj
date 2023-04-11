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
        <li><button type='button' class='btn btn-primary mb-3' id='showFormBtn'>Add Shipment</button></li>
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
        <th></th>
        <th>Employ Name</th>
		    <th>Shipper Name</th>
        <th>Consignee Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	
	if($data!=''){
	foreach ($data->result() as $row){
		
		?>
		<tr id="row_<?php echo $row->id;?>">
     
    <td><input type='checkbox' class='myCheckbox' value='<?php echo $row->id;?>' id='<?php echo $row->id;?>'></td>

    <td><?php echo $row->employ_name;?></td>
    
    
    <td><?php echo $row->shipper_name;?></td>
    <td><?php echo $row->consignee_name;?></td>   
    <td>
      <a href='<?=$controller?>/pdf_document/<?php echo $row->id?>' class='btn btn-primary'>Print</a>
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
   <div class='modal fade' id='ShipmentModal'>
     <div class='modal-dialog modal-lg'>
       <div class='modal-content'>
           <div class='modal-header bg-black text-white'>
            <h2 class='modal-title'>Add Shipment</h2>
            <button class='close' data-dismiss='modal'>&times;</button>
           </div>
           <style>
    .remove_button{position: absolute;top: 25px;left: 0;}
    .add_button{position: absolute;top: 25px;left: 0;}
    .button>.active{
  border-bottom: 2px solid red;
}
.button{
  display: inline-block;
}
    </style>
             <div class='modal-body'>
            <!-- /.box-header -->
            <div class="row">
<div class="col-md-12">

<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class=""><a href="#general" data-toggle="tab">General</a></li>
<li><a href="#entitles" data-toggle="tab">Entitles</a></li>
<li><a href="#routing_information" data-toggle="tab">Routing Information</a></li>
<li><a href="#tab_4" data-toggle="tab">Carrier</a></li>
<li><a href="#tab_5" data-toggle="tab">Commodity</a></li>
<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
</ul>
             <form id="form_add_update" name="form_add_update" role="form">
             <div class="alert hidden"></div>
                    <div class='tab-content'>
                      <div class='tab-pane' id="general">
                      <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-4'>
                            <label>Shipment Name</label>
                               <input type='text' name='shipment_name' class='form-control'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-4'>
                            <label>Bill of Landing Number</label>
                               <input type='text' name='landing_bill_no' class='form-control'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-4'>
                            <label>Booking Number</label>
                               <input type='text' name='booking_no' class='form-control'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-4'>
                            <label>Executed Place</label>
                               <input type='text' name='executed_place' class='form-control'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-4'>
                            <label>Executed By</label>
                               <input type='text' name='executed_by' class='form-control'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-4'>
                            <label>Executed Date</label>
                               <input type='date' name='executed_date' class='form-control'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-6'>
                            <label>Departure Date/Time</label>
                               <input type='date' name='departure_date' class='form-control'></div>
                               <div class='col-md-6'>
                                <label></label>
                               <input type='time' name='departure_time' class='form-control'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-6'>
                            <label>Arrival Date/Time</label>
                               <input type='date' name='arrival_date' class='form-control'></div>
                               <div class='col-md-6'>
                                <label></label>
                               <input type='time' name='arrival_time' class='form-control'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'>
                          <div class='row'>
                            <div class='col-md-6'>
                              <label>Declared Value</label>
                                <input type='text' name='declared_value' class='form-control'>
                            </div>
                          </div>
                        </div>
                        <div class='form-group'>
                          <div class='row'>
                            <div class='col-md-12'>
                              <label>Description of Goods</label>
                                <textarea name='description_goods' class='form-control'></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='tab-pane' id='entitles'>
                        <h2>Select the entitles</h2>
                        <hr>
                          <div class='row'>
                            <div class='col-md-6'>
                              <label>Shipper</label>
                                <input type='text' name='shipper_name' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                              <label>Ultimate Consignee</label>
                                <input type='text' name='ultimate_consignee' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='shipper_address' class='form-control'></textarea>
                            </div>
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='consignee_address' class='form-control'></textarea>
                            </div>
                            <div class='col-md-6'>
                              <label>Notify Party</label>
                                <input type='text' name='notify_party' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                              <label>Intermediate</label>
                                <input type='text' name='intermediate' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='notify_party_address' class='form-control'></textarea>
                            </div>
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='intermediate_address' class='form-control'></textarea>
                            </div>
                            <div class='col-md-6'>
                              <label>Forwording Agent</label>
                                <input type='text' name='forwording_agent' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                              <label>Destination Agent</label>
                                <input type='text' name='destination_agent' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='forwording_agent_address' class='form-control'></textarea>
                            </div>
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='destination_agent_address' class='form-control'></textarea>
                            </div>
                          </div>
                      </div>
                      <div class='tab-pane' id='routing_information'>
                        <h2>Routing Information</h2>
                        <hr>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Service Type</label>
                                   <input type='text' name='service_type' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Route</label>
                                   <input type='text' name='route' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Mode of Transport</label>
                                   <input type='text' name='mode_of_transport' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <b>Origin</b><hr style='margin-top:-10px;width:90%'>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>port of Origin or FTZ No</label>
                                   <input type='text' name='port_of_origin' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Pre Carriage By</label>
                                   <input type='text' name='pre_carriage_by' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Place of Receipt by Pre-Carrier</label>
                                   <input type='text' name='place_of_receipt' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <b>Export</b><hr style='margin-top:-10px;width:90%'>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Loading Pier or Terminal</label>
                                   <input type='text' name='loading_pier' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Port of Loading</label>
                                   <input type='text' name='port_of_loading' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Exporting Carrier</label>
                                   <input type='text' name='exporting_receipt' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Vessel Name and Flag</label>
                                   <input type='text' name='vessel_name' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Voyage Identification</label>
                                   <input type='text' name='voyage_identification' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <b>Destination</b><hr style='margin-top:-10px;width:90%'>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Port of Unloading</label>
                                   <input type='text' name='port_of_unloading' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>On Carriage By</label>
                                   <input type='text' name='on_carriage_by' class='form-control'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Place of Delivery by on-Carrier</label>
                                   <input type='text' name='place_of_delievry' class='form-control'>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>                       
                                        <div class="clearfix">&nbsp;</div>
             <div class="modal-footer">
                           <button type="submit" class="btn btn-success">Save</button>
                           <button class='btn btn-danger' data-dismiss='modal'>Close</button>
                      
                   </div>
           </div> 

                    
                       <div class="clearfix">&nbsp;</div>
                    
                </form>
              
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

    <!-- Scroll to Top Button-->
 <?php // commonjs() ?>
  
</body>

</html>
        </div>
      </div>
    </div>
   </div>

<script>
  $(document).ready(function() {
            $('#showFormBtn').click(function() {
              $('#ShipmentModal').modal('show');
                var selectedIds = [];
                $('.myCheckbox:checked').each(function() {
                    selectedIds.push($(this).val());
                });
                if (selectedIds.length > 0) {
                    $('#form_add_update').on("submit",function(e) {
         e.preventDefault();    
    //      var inputFile = $('input#file');
    // var filesToUpload = inputFile[0].files;
         var formData = new FormData();
          var other_data = $('#form_add_update').serializeArray();
        $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
        });
        
         //if (filesToUpload.length > 0) {
      // provide the form data
      // that would be sent to sever through ajax
    //   for (var i = 0; i < filesToUpload.length; i++) {
    //     var file = filesToUpload[i];
    //     formData.append("file[]", file, file.name);
    //   }
    // }
       
    //     if(window.CKEDITOR){
    //         item_description = CKEDITOR.instances.editor1.getData();
    //     formData.append("item_description", item_description);
    //      }
    // ajax start
            $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>/warehouse_receipt/SaveShipment",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            beforeSend: function() {
            $('#loader').removeClass('hidden');
        //  $('#form_add_update .btn_au').addClass('hidden');
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
                //$('#form_add_update')[0].reset();
                },3000);
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
                window.location='<?php echo base_url().$controller; ?>';
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
  //   $('#ShipmentModal').hide();

    //ajax end    
    });
 
                }
            });
        });  

  </script>
  
  