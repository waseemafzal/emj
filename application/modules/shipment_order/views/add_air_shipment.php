<?php getHead();
$controller=$this->router->class;
$Heading=$controller;
if(isset($module_heading) and $module_heading!=''){
$Heading=   $module_heading;
    }

 ?>
   <style>
    .remove_button{position: absolute;top: 25px;left: 0;}
    .add_button{position: absolute;top: 25px;left: 0;}
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
.button>.active{
  border-bottom: 2px solid red;
}
.button{
  display: inline-block;
}

   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1><?=$Heading?></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="<?=$controller?>">View <?=$controller?> </a></li>
      </ol>
    </section>


        <!-- Sidebar -->
       <?php getSidebar()?>
        <!-- End of Sidebar -->

        <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <form id="form_add_update" name="form_add_update" role="form">
             <div class="alert hidden"></div>
                    <div class="form-group wrap_form">
                                <h2>Air Shipment</h2>
                                <hr>
                                <!--Body-->
                                  <h3>Shipper Details</h3>
                                <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-4">
                                    <label>Shipper's Name</label>
                                    <?php if(isset($row)){?>
                                      <input type="hidden" name="shipment_type" value="<?php echo $row->shipment_type;?>">
                                    <?php }else{?>
                                    <input type='hidden' name='shipment_type' value='<?php echo $_GET["shipment_type"];?>'>            
                                    <?php }?>
                                    <input type="text" class="form-control" id="shipper_name" name="shipper_name"  value= "<?php if(isset($row)){echo $row->shipper_name;}?>">
                                    
                                        </div>
                                          <div id="shipper_phone" class="col-md-4">
                                    <label>Shipper's Phone</label>
                                    <input type="number" name="shipper_phone" id="shipper_phone"  class="form-control" value= "<?php if(isset($row)){echo $row->shipper_phone;}?>">
                                  </div>
                                      <div class="col-xs-12 col-md-4">
                                        <label>Select State</label>
                                      <select name="shipper_state" id="shipper_state" class="form-control">
                                        <option value="">Select State</option>
                                        <?php
                                        foreach($nigerianStates as $state)
                                        {
                                          $stateSelected='';
                                            if(isset($row)){
                                        if($state['state_id']==$row->shipper_state){
                                          $stateSelected='selected="selected"';
                                        }
                                          }
                                        echo '<option '.$stateSelected.' value="'.$state['state_id'].'">'.$state['state'].'</option>';
                                        }
                                        ?>
                                      </select>
  </div>
                                      </div></div>
  <div class='form-group'><div class='row'>  
  <div class="col-xs-12 col-md-4">
    <label>Select city</label>
   <select name="shipper_city" id="shipper_city" class="form-control">
    <option>Select City</option>
   <?php 
//nigeriancities
   if(isset($row)){
    foreach($nigerianCities as $city)
    {
      $citySelected='';
      
if($city['city_id']==$row->shipper_city){
  $citySelected='selected="selected"';
}
      }
     echo '<option '.$citySelected.' value="'.$city['city_id'].'">'.$city['city'].'</option>';
    }
    ?>
   
   </select>
  </div>
  <div class="col-md-4">
                                    <label>Pickup Location</label>
                                    
                                    <input type="text" class="form-control" id="pickup_location" name="pickup_location" value="<?php if(isset($row)){echo $row->pickup_location;}?>">
                                    
                                        </div>
  </div>
  </div>
  <div class="form-group"  id="shipper_address">
                                   <label>Address</label>
                                   <textarea type="text" name="shipper_address" class="form-control"><?php if(isset($row)){echo $row->shipper_address;}?></textarea>
                                    </div>
 
 
                                     <div class="form-group">
                                        <div class='row'>
                                          <div class='col-md-4'>
                                          <input type="hidden" name="request_pickup" value="no">
                      Request PickUp  &nbsp;&nbsp;&nbsp; 
                      <input type="checkbox" name="request_pickup" value="yes" <?php if((isset($row) &&$row->request_pickup == 'yes')) echo 'checked'; ?>>

                                    
                                        </div>
                                     <div class="col-md-4">
                                     <?php
                                      $checked = '';
                                      if (isset($row)) {
                                          if ($row->request_insurance == 'yes') {
                                              $checked = 'checked';
                                          }
            }
            ?>
                                    Request Insurance  &nbsp;&nbsp;&nbsp;<input type="checkbox" id="request_insurance" name="request_insurance" value="yes" <?php echo $checked;?>>    
                                  
                                        </div></div></div>

                                     <div class="form-group" id="delivery_option">
                                       <?php
                        $home='';
                        $warehouse='';
                       if(isset($row)){            
                       switch ($row->delivery_type) {
                        case 'home':
                         $home='checked';
                          break;
                        case 'lagos warehouse':
                         $warehouse='checked';                      
                         break;
                      }
                      }
                      ?>
                                    <label>Delivery Type</label>
                                    <br>
                                    <input type="radio" <?php echo $home;?> id="delivery_type" name="delivery_type" value = "home">  Home &nbsp;&nbsp;
                                     <input type="radio" <?php echo  $warehouse;?> id="delivery_type" name="delivery_type" value="lagos warehouse">  Lagos Warehouse
                                        </div><hr>
                               <h3>Consignee Details</h3>
                                
                                         <div class="form-group">
                                          <div class="row">
                                            <div class="col-md-4">
                                    <label>Consignee's Name</label>
                                    
                                    <input type="text" class="form-control" id="consignee_name" name="consignee_name" value="<?php if(isset($row)){ echo $row->consignee_name;} ?>">
                                    
                                        </div>
                                         
                                       
                                        <div class="col-md-4">
                                    <label>Consignee's Phone</label>
                                    
                                    <input type="number" class="form-control" id="consignee_phone" name="consignee_phone" value="<?php if(isset($row)){ echo $row->consignee_phone;} ?>">
                                    
                                        </div>   
                                      </div></div>
                                      <div class="form-group">
                                        <div class="row">
                                          <div class="col-xs-12 col-md-12">
                                            <label>Consignee's Address</label>
                                            <textarea class="form-control" name="consignee_address"><?php if(isset($row)){ echo $row->consignee_address;} ?></textarea>
                                          </div>
                                        </div>
                                      </div>
                                             <div class="form-group">
                                     <div class="row">
                               <div class="col-xs-12 col-md-4">
   <select name="consignee_country" id="consignee_country" class="form-control">
    <option value="">Select Country</option>
    <?php
    
    foreach ($countries as $country) {
      $selectedCountry='';
      if(isset($row)){
          if($country->id == $row->consignee_country){
           $selectedCountry='selected="selected"'; 
          }
          }
echo '<option '.$selectedCountry.' value="'.$country->id.'">'.$country->name.'</option>';
 }
    ?>
   </select>
  </div>
  
  <div class="col-xs-12 col-md-4">
   <select name="consignee_state" id="consignee_state" class="form-control">
    <option value="">Select State</option>
    <?php
    
     foreach ($selectedstates as $selectstate) {  
        $selectedState='';
    if(isset($row)){   

          if($selectstate['state_id'] == $row->consignee_state){
           $selectedState='selected="selected"'; 
          }
          }
        
      
echo '<option '.$selectedState.' value="'.$selectstate['state_id'].'">'.$selectstate['state'].'</option>';    }

 
    ?>
   </select>
  </div>
  
  <div class="col-xs-12 col-md-4">
   <select name="consignee_city" id="consignee_city" class="form-control">
    <option value="">Select City</option>
     <?php

      foreach ($selectedcities as $selectcity) {  
        $selectedCity='';
if(isset($row)){       

          if($selectcity['city_id'] == $row->consignee_city){
           $selectedCity='selected="selected"'; 
          }
          }
        
      
echo '<option '.$selectedCity.' value="'.$selectcity['city_id'].'">'.$selectcity['city'].'</option>';    }

 
    ?>
   </select>
  </div>
  </div>
                                    
                                        </div>
                                 
                                         <div class="form-group">
                                   <label>Item Description</label>
                                     <textarea type="text" class="form-control" id="editor1" name="item_description" required><?php if(isset($row)){ echo $row->item_description;} ?></textarea>
                                
                                </div>
                              
                                         <div class="form-group">
                                        <div class="row">
                                          <div class="col-md-2">
                                    <label>Quantity</label>
                                    
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php if(isset($row)){ echo $row->quantity;} ?>">
                                    
                                    </div>                                      
                                        <div class="col-md-2">       
                                    <label>Length (cm)</label>
                                    
                                    <input type="number" class="form-control" id="length" name="length" value="<?php if(isset($row)){ echo $row->length;} ?>">
                                    
                                         </div>
                                           <div class="col-md-2"> 
                                    <label>Width (cm)</label>
                                    
                                    <input type="number" class="form-control" id="width" name="width" value="<?php if(isset($row)){ echo $row->width;} ?>">
                                    </div>
                                          <div class="col-md-2">
                                            
                                    <label>Height (cm)</label>
                                    
                                    <input type="number" class="form-control" id="height" name="height" value="<?php if(isset($row)){ echo $row->height;} ?>">
                                    
                                       </div> 
                                       <div id="select_packaging" class="col-md-3">
                                    <label>Please Select Your Packaging</label>
                                    
                                   <select class="form-control" name="package_type">
                                       <option value="extra large box" <?php if(isset($row)){ echo setSelect($row->package_type,'extra large box');}?>>Extra Large Box</option>
                                       <option value="large box"  <?php if(isset($row)){ echo setSelect($row->package_type,'large box');}?>>Large Box</option>
                                       <option value="medium box" <?php if(isset($row)){ echo setSelect($row->package_type,'medium box');}?>>Medium Box</option>
                                       <option value="letter" <?php if(isset($row)){ echo setSelect($row->package_type,'letter');}?>>Letter</option> 
                                   </select>
                                        </div>
                                       </div></div> 
                                               <hr>
                                        <section id="package_details">
                                        <h3>Package Details</h3>
                                             <div class="form-group">
                                              <div class="row">
                                                <div class="col-md-4">
                                    <label>Package Weight</label>
                                    
                                    <input type="number" class="form-control" id="package_weight" name="package_weight"  value="<?php if(isset($row)){ echo $row->package_weight;} ?>">
                                    
                                        </div>
                                                <div class="col-md-4">
                                    <label>Carriage Value</label>
                                    
                                    <input type="number" class="form-control" id="carriage_value" name="carriage_value" value="<?php if(isset($row)){ echo $row->carriage_value;} ?>">
                                    
                                        </div> 
                                                 
                                    </div>       
                              </div></section>
                              
                              
                               <div class="form-group">
                                 <div class="row">
                                 
                                   <div class="col-md-4">
                              <label style="color: blue">Front and back of title and Invoice</label>
                                    <input type="file" name="file[]" onchange="preview_image()" class=" file"  id="file" accept=".png,.PNG,.JPG,.jpg,.jpeg,.JPEG,.gif"  multiple>
                                      <div class="col-md-12">
                                   <div id="preview_image"></div>
                                   </div> 
                                    
                                    <?php if(isset($row)){
										 if($files->num_rows()>0){
                                      foreach($files->result() as $image){
                                        $src = base_url() . 'uploads/' . $image->file; { ?>
                        <div style="margin-left:2px " class="col-xs-4 col-md-4 pad0    img_wrap_<?php echo $image->id ?>">
                         <div class="thumbnail" style="margin-bottom: 2px;"><a class="fancybox" href="<?=$src?>">  <img id="img_<?php echo $image->id ?>" src="<?php echo $src ?>" class="img-responsive"></a></div>
                          <center>
                            <!--<a onclick="getImage('<?php echo $image->id ?>','shipment_orders_files')" class="btn btn-xs btn-success" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="Edit">
                              <i class="fa fa-pencil"></i></a>-->
                            <a class="btn btn-xs btn-danger" onclick="deleteImg('<?php echo $image->id ?>','shipment_orders_files')" href="javascript:void(0)" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="Delete"><i class="fa fa-times"></i>
                            </a>
                          </center>

                        </div>
                                     <?php } }}}?>
                     </div>
                               
                                  </div><hr>
                                 
                                 <div class="form-group">
                                  <h3>Shipment Details</h3>
                                   <div class="row">
                                     <div class="col-md-4">
                                       <label>From City</label>
                                       <input type="text" name="shipment_from" class="form-control" value="<?php if(isset($row)){ echo $row->shipment_from;} ?>">
                                     </div>
                                     <div class="col-md-4">
                                       <label>To City</label>
                                       <input type="text" name="shipment_to" class="form-control" value="<?php if(isset($row)){ echo $row->shipment_to;} ?>">
                                     </div>

                                     <div class="col-md-4">
                                       <label>Shipment Date</label>
                                       <input type="date" name="shipment_date" class="form-control" value="<?php if(isset($row)){echo $row->shipment_date;}?>">
                                     <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
                                     </div>
                                   </div>
                                 </div>
                                  
                                        <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-md-12">
                           <button type="submit" class="btn btn-info">Submit</button>
                      
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
    <div class='modal fade' id="saveModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header text-white bg-green">
         <h3 class="modal-title">Directories Modal</h3>
       <button class="close" style='color:white' data-dismiss="modal"><span>&times;</span></button>
       </div>
       <div class="modal-body">
      <?php 
       $categories = getCategory();
foreach($categories as $category){
   $subcategory=getSubcategory($category['id']);
?>
   <h1><?php echo $category['title'];?></h1>
   <?php foreach($subcategory as $subcat){
      $subchilds = getSubchild($subcat['id']);
    ?>
   <div><h1><?php echo '<i class="fa fa-folder" style="font-size:30px"></i>&nbsp;' .$subcat['title'];?></h1></div>
   <?php foreach($subchilds as $subchild){?>
   <h1><?php echo $subchild['title'];?></h1>
   <?php }}}?>
      </div>
     <div class="modal-footer">
       <button class="btn btn-success" type="button">Save</button>
       <button class='btn btn-danger' data-dismiss='modal'>Close</button>
     </div>
     
     </div>
</div>
</div>  
    <!-- /.content -->
  </div>
  <?php  getFooter(); ?>

    <!-- Scroll to Top Button-->
 <?php // commonjs() ?>
</body>
</html>
 <script type="text/javascript" src="bower_components/ckeditor/ckeditor.js"></script>   
 	 

<script type="text/javascript">
function deleteImg(id, table) {
console.log('table'+table);
console.log('id'+id);
		$.confirm({

			title: 'Confirmation!',

			content: 'Are you sure to delete!',

			animation: 'zoom',

			closeAnimation: 'scale',

			autoClose: 'cancel|5000',

			type: 'red',

			buttons: {

				deleteUser: {

					text: 'Yes',

					btnClass: 'btn-primary',

					action: function() {

						//ajax call to delete	

						$.ajax({

							url: "<?php echo base_url() . 'crud/deleteImage'; ?>",

							type: 'POST',

							data: {
								id: id,
								table: table
							},

							dataType: "json",

							success: function(response) {

								if (response.status == 1) {

									$(".img_wrap_" + id).hide('slow');

								} else if (response.status == 0) {

									showAlert('Error :You could not delete');

								} else {

									showAlert(response);

								}

							}

						});

					}

				},

				cancel: function() {

					text: 'Yes'

				},

			}



		});

	}

$(function(){

  $('.button').click(function () {
    $('.button').removeClass("active");
    $(this).addClass("active");
  });

});
</script>
<script type="text/javascript">
function preview_image() 
{
 var total_file=document.getElementById("file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#preview_image').append("<div class='col-md-3'><img width='100' height='100' c src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>
<script type="text/javascript">
    $(function(){
           CKEDITOR.replace('editor1');

    });
</script>
  <script>
  /**********************************save************************************/
     $('#form_add_update').on("submit",function(e) {
         e.preventDefault();    
         var inputFile = $('input#file');
    var filesToUpload = inputFile[0].files;
         var formData = new FormData();
          var other_data = $('#form_add_update').serializeArray();
        $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
        });
        
         if (filesToUpload.length > 0) {
      // provide the form data
      // that would be sent to sever through ajax
      for (var i = 0; i < filesToUpload.length; i++) {
        var file = filesToUpload[i];
        formData.append("file[]", file, file.name);
      }
    }
       
        if(window.CKEDITOR){
            item_description = CKEDITOR.instances.editor1.getData();
        formData.append("item_description", item_description);
         }
    // ajax start
            $.ajax({
            type: "POST",
            url: "<?php echo base_url().$controller.'/save'; ?>",
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
                $('#saveModal').modal('show');
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

    //ajax end    
    });
 
  /******************************/
  </script>
<script>
$(document).ready(function(){
 $('#shipper_country').change(function(){
  var country_id = $('#shipper_country').val();
  if(country_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shipment_order/get_state",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     $('#shipper_state').html(data);
     $('#shipper_city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#shipper_state').html('<option value="">Select State</option>');
   $('#shipper_city').html('<option value="">Select City</option>');
  }
 });

 $('#shipper_state').change(function(){
  var state_id = $('#shipper_state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shipment_order/get_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#shipper_city').html(data);
    }
   });
  }
  else
  {
   $('#shipper_city').html('<option value="">Select City</option>');
  }
 });
 
});
</script>
<script>
$(document).ready(function(){
 $('#consignee_country').change(function(){
  var country_id = $('#consignee_country').val();
  if(country_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shipment_order/get_state",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     $('#consignee_state').html(data);
     $('#consignee_city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#consignee_state').html('<option value="">Select State</option>');
   $('#consignee_city').html('<option value="">Select City</option>');
  }
 });

 $('#consignee_state').change(function(){
  var state_id = $('#consignee_state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shipment_order/get_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#consignee_city').html(data);
    }
   });
  }
  else
  {
   $('#consignee_city').html('<option value="">Select City</option>');
  }
 });
 
});

<?php 

if(isset($row)){

if($row->shipment_type==1){
  $btn='personal_effects';
}
if($row->shipment_type==2){
  $btn='ocean_freight';
}

if($row->shipment_type==3){
  $btn='air_freight';
}
if($row->shipment_type==4){
  $btn='vehicle_shipment';
}
  ?>

$("#<?=$btn?>").click();
$("#<?=$btn?>").addClass('active');


<?php 
}else{?>
	$("#personal_effects").click();
	<?php }
?>
</script>

