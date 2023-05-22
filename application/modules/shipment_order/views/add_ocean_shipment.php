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
        a[data-id]:hover {
  background-color: black;
  color: #fff;
}
.active_category{
  background-color: red;
  color: #fff;
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
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class='row'>
       <div class='col-md-6'>
     <h1><?=$Heading?></h1>
</div>
<div class='col-md-6'>
     <?php if(isset($_GET['template'])){
      include 'templates.php';
      }?>
    </div>
    </div>
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
                         <div style='float:left'>       
                          <h2>Ocean Freight</h2>
                     </div>
                          <div style='float:right;margin-top:30px'>
                           <button style='margin-top:-10px;margin-right:10px' type="submit" class="btn btn-info">Submit</button>
                         </div>
                                <hr>
                                <!--Body-->
                                  <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#general" data-toggle="tab">General</a></li>
              <li><a href="#shipper_details" data-toggle="tab">Shipper Details</a></li>
              <li><a href="#consignee_details" data-toggle="tab">Consignee Details</a></li>
              <li><a href='#package_details' data-toggle='tab'>Package Details</a></li>
              <li><a href="#entitles" data-toggle="tab">Entitles</a></li>
              <li><a href="#routing_information" data-toggle="tab">Routing Information</a></li>
              <li><a href="#exporting_information" data-toggle="tab">Exporting Information</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="general">
              <div class="form-group">
                                  <h2>Shipment Details</h2><hr>
                                  <div id='shipment_extra_details'>
                                 <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-4'>
                            <label>Shipment Name</label>
                            <?php if(isset($row)){?>
                               <input type='text' readonly name='shipment_name' class='form-control' value='<?php echo $row->shipment_name;?>'>
                               <?php }else{?>
                               <input type='text' readonly name='shipment_name' class='form-control' value='EMJ-<?php echo maxShipmentId();?>'>
                               <?php }?>
                          </div>
                          <div class='col-md-4'>
                            <label>Bill of Landing Number</label>
                            <?php if(isset($row)){?>
                               <input type='text' readonly name='landing_bill_no' class='form-control' value='<?php echo $row->landing_bill_no;?>'>
                          <?php }else{?>
                               <input type='text' readonly name='landing_bill_no' class='form-control' value='EMJ-<?php echo maxShipmentId();?>'>
                           <?php }?>
                              </div>
                          <div class='col-md-4'>
                            <label>Booking Number</label>
                            <?php if(isset($row)){?>
                               <input type='text' name='booking_no' class='form-control' readonly value='<?php echo $row->booking_no;?>'>
                               <?php }else{?>
                            <input type='text' name='booking_no' class='form-control' readonly value='<?php echo uniqid()?>'>
                       <?php }?>
                          </div>
                        </div>
                        </div>
                            </div>
                        <div class='form-group'>
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
                        <div class='form-group'> 
                      <div class='row'>
                        <div class='col-md-3'>
                                          <label>Shipment Status</label><br>
                                          <select class='form-control' name='shipment_status'>
                                            <option value='null'>Choose Status</option>
                                            <?php 
                                            $status = $this->db->get('shipment_status')->result_array();
                                             foreach($status as $shipment_status){
                                            $selected="";
                                            if(isset($row)){
                                              if($shipment_status['status_id']==$row->shipment_status){
                                                $selected='selected="selected"';
                                              }
                                            }
                                             echo '<option value = "'.$shipment_status['status_id'].'" '.$selected.'>'.$shipment_status['status_title'].'</option>';
                                             } ?>
                                          </select>
                                        </div>
                          <div class='col-md-3'>
                            <label>Executed Place</label>
                               <input type='text' name='executed_place' class='form-control' value='<?php if(isset($row)){echo $row->executed_place;}?>'>
                          </div>
                          <div class='col-md-3'>
                            <label>Executed By</label>
                               <input type='text' name='executed_by' class='form-control' value='<?php if(isset($row)){echo $row->executed_by;}?>'>
                          </div>
                          <div class='col-md-3'>
                            <label>Executed Date</label>
                               <input type='date' name='executed_date' class='form-control' value='<?php if(isset($row)){echo $row->executed_date;}?>'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-6'>
                            <label>Departure Date/Time</label>
                               <input type='date' name='departure_date' class='form-control' value='<?php if(isset($row)){echo $row->departure_date;}?>'></div>
                               <div class='col-md-6'>
                                <label></label>
                               <input type='time' name='departure_time' class='form-control' value='<?php if(isset($row)){echo $row->departure_time;}?>'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'> 
                      <div class='row'>
                          <div class='col-md-6'>
                            <label>Arrival Date/Time</label>
                               <input type='date' name='arrival_date' class='form-control' value='<?php if(isset($row)){echo $row->arrival_date;}?>'></div>
                               <div class='col-md-6'>
                                <label></label>
                               <input type='time' name='arrival_time' class='form-control' value='<?php if(isset($row)){echo $row->arrival_time;}?>'>
                          </div>
                        </div>
                        </div>
                        <div class='form-group'>
                          <div class='row'>
                            <div class='col-md-6'>
                              <label>Declared Value</label>
                                <input type='text' name='declared_value' class='form-control' value='<?php if(isset($row)){echo $row->declared_value;}?>'>
                            </div>
                          </div>
                        </div>
                        <div class='form-group'>
                          <div class='row'>
                            <div class='col-md-12'>
                              <label>Description of Goods</label>
                                <textarea name='description_of_goods' class='form-control'><?php if(isset($row)){echo $row->description_of_goods;}?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              <div class="tab-pane" id="shipper_details">
                <h2>Shipper Details</h2><hr>
              <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-4">
                                    <label>Shipper's Name</label>
                                    <?php if(isset($row)){?>
                                      <input type="hidden" name="shipment_type" value="<?php echo $row->shipment_type;?>">
                                   <?php }else{?>
                                    <input type='hidden' name='shipment_type' value='<?php echo $_GET["shipment_type"];?>'>
                                    <?php }?>
                                    <input type="text" class="form-control" id="shipper_name" name="shipper_name"  value= "<?php if(isset($row)){echo $row->shipper_name;}?>" required>
                                    
                                        </div>
                                          <div id="shipper_phone" class="col-md-4">
                                    <label>Shipper's Phone</label>
                                    <input type="number" name="shipper_phone" id="shipper_phone"  class="form-control" value= "<?php if(isset($row)){echo $row->shipper_phone;}?>" required>
                                  </div>
                                 <div class="col-xs-12 col-md-4">
                                        <label>Select State</label>
                                        <select name="shipper_state" id="shipper_state" class="form-control" required>
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
                                        </div></div></div>
  <div class='form-group'><div class='row'>
  <div class="col-xs-12 col-md-4">
    <label>Select city</label>
   <select name="shipper_city" id="shipper_city" class="form-control" required>
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
  <div class="form-group">
                                   <label>Address</label>
                                   <textarea type="text" id="shipper_address" name="shipper_address" class="form-control" required><?php if(isset($row)){echo $row->shipper_address;}?></textarea>
                                    </div>
                <div class="form-group" id="request_pickup">
                  <div class='row'>
                    <div class='col-md-4'>
                        
                                    Request PickUp  &nbsp;&nbsp;&nbsp;<input type="checkbox" id="request_pickup" name="request_pickup" <?php if(isset($row)){ echo setChecked($row->request_pickup,'yes');}?> value="yes">    
                    </div>                                    
                          <div class='col-md-4'>              
                              
                                    Request Insurance  &nbsp;&nbsp;&nbsp;<input type="checkbox" id="request_insurance" name="request_insurance" value="yes" <?php if(isset($row)){ echo setChecked($row->request_insurance,'yes');}?>>    
                                  
                                        </div></div></div>

                                     <div class="form-group" id="delivery_option">
                       
                                    <label>Delivery Type</label>
                                    <br>
                                    <input type="radio" <?php if(isset($row)){ echo setChecked($row->delivery_type,'yes');}?> id="delivery_type" name="delivery_type" value = "home">  Home &nbsp;&nbsp;
                                     <input type="radio" <?php if(isset($row)){ echo setChecked($row->delivery_type,'lagos warehouse');}?> id="delivery_type" name="delivery_type" value="lagos warehouse">  Lagos Warehouse
                                        </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="consignee_details">
              <h2>Consignee's Details</h2><hr>
                                
                                <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-4">
                           <label>Consignee's Name</label>
                           
                           <input type="text" class="form-control" id="consignee_name" name="consignee_name" value="<?php if(isset($row)){ echo $row->consignee_name;} ?>" required>
                           
                               </div>
                          <div class="col-md-4">
                           <label>Consignee's Phone</label>
                           
                           <input type="number" class="form-control" id="consignee_phone" name="consignee_phone" value="<?php if(isset($row)){ echo $row->consignee_phone;} ?>" required>
                           
                               </div>   
                             </div></div>
                             <div class="form-group">
                               <div class="row">
                                 <div class="col-xs-12 col-md-12">
                                   <label>Consignee's Address</label>
                                   <textarea class="form-control" name="consignee_address" id="consignee_address" required><?php if(isset($row)){ echo $row->consignee_address;} ?></textarea>
                                 </div>
                               </div>
                             </div>
                                    <div class="form-group">
                            <div class="row">
                      <div class="col-xs-12 col-md-4">
<select name="consignee_country" id="consignee_country" class="form-control" required>
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
<select name="consignee_state" id="consignee_state" class="form-control" required>
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
<select name="consignee_city" id="consignee_city" class="form-control" required>
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
              </div>
              <!-- /.tab-pane -->
                 <div class='tab-pane' id='package_details'>
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
                              </div>
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
                               
                                  </div></div></div>
              <div class='tab-pane' id='entitles'>                    
                      <h2>Select the entitles</h2>
                        <hr>
                          <div class='row'>
                            
                            <div class='col-md-6'>
                              <label>Ultimate Consignee</label>
                                <input type='text' name='ultimate_consignee' class='form-control' value='<?php if(isset($row)){echo $row->ultimate_consignee;}?>'>
                            </div>
                           
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='ultimate_consignee_address' class='form-control'><?php if(isset($row)){echo $row->ultimate_consignee_address;}?></textarea>
                            </div>
                            <div class='col-md-6'>
                              <label>Notify Party</label>
                                <input type='text' name='notify_party' class='form-control' value='<?php if(isset($row)){echo $row->notify_party;}?>'>
                            </div>
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='notify_party_address' class='form-control'><?php if(isset($row)){echo $row->notify_party_address;}?></textarea>
                            </div>
                            <div class='col-md-6'>
                              <label>Intermediate</label>
                                <input type='text' name='intermediate' class='form-control' value='<?php if(isset($row)){echo $row->intermediate;}?>'>
                            </div>
                            
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='intermediate_address' class='form-control'><?php if(isset($row)){echo $row->intermediate_address;}?></textarea>
                            </div>
                            <div class='col-md-6'>
                              <label>Forwording Agent</label>
                                <input type='text' name='forwording_agent' class='form-control' value='<?php if(isset($row)){echo $row->forwording_agent;}?>'>
                            </div>
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='forwording_agent_address' class='form-control'><?php if(isset($row)){echo $row->forwording_agent_address;}?></textarea>
                            </div>
                            <div class='col-md-6'>
                              <label>Destination Agent</label>
                                <input type='text' name='destination_agent' class='form-control' value='<?php if(isset($row)){echo $row->destination_agent;}?>'>
                            </div>
                            <div class='col-md-6'>
                              <label>Address</label>
                                <textarea name='destination_agent_address' class='form-control'><?php if(isset($row)){echo $row->destination_agent_address;}?></textarea>
                            </div>
                          </div>
                          </div>
                          <div class='tab-pane' id="routing_information">
                          <h2>Routing Information</h2>
                        <hr>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Service Type</label>
                                   <input type='text' name='service_type' class='form-control' value='<?php if(isset($row)){echo $row->service_type;}?>'>
                              </div>
                              <div class='col-md-4'>
                                 <label>Route</label>
                                   <input type='text' name='route' class='form-control' value='<?php if(isset($row)){echo $row->route;}?>'>
                              </div>
                              <div class='col-md-4'>
                                 <label>Mode of Transport</label>
                                   <input type='text' name='mode_of_transport' class='form-control' value='<?php if(isset($row)){echo $row->mode_of_transport;}?>'>
                              </div>
                            </div>
                          </div>
                          <h2>Origin</h2><hr>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>port of Origin or FTZ No</label>
                                   <input type='text' name='port_of_origin' class='form-control' value='<?php if(isset($row)){echo $row->port_of_origin;}?>'>
                              </div>
                              <div class='col-md-4'>
                                 <label>Pre Carriage By</label>
                                   <input type='text' name='pre_carriage_by' class='form-control' value='<?php if(isset($row)){echo $row->pre_carriage_by;}?>'>
                              </div>
                              <div class='col-md-4'>
                                 <label>Place of Receipt by Pre-Carrier</label>
                                   <input type='text' name='place_of_receipt' class='form-control' value='<?php if(isset($row)){echo $row->place_of_receipt;}?>'>
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class='tab-pane' id='exporting_information'>
                          <h2>Export Info</h2><hr>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Loading Pier or Terminal</label>
                                   <input type='text' name='loading_pier' class='form-control' value='<?php if(isset($row)){echo $row->loading_pier;}?>'>
                              </div>
                              <div class='col-md-4'>
                                 <label>Port of Loading</label>
                                   <input type='text' name='port_of_loading' class='form-control' value='<?php if(isset($row)){echo $row->port_of_loading;}?>'>
                              </div>
                              <div class='col-md-4'>
                                 <label>Exporting Carrier</label>
                                   <input type='text' name='exporting_carrier' class='form-control' value='<?php if(isset($row)){echo $row->exporting_carrier;}?>'>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Vessel Name and Flag</label>
                                   <input type='text' name='vessel_name' class='form-control' value='<?php if(isset($row)){echo $row->vessel_name;}?>'>
                          </div>
                              <div class='col-md-4'>
                                 <label>Voyage Identification</label>
                                   <input type='text' name='voyage_identification' class='form-control' value='<?php if(isset($row)){echo $row->voyage_identification;}?>'>
                              </div>
                            </div>
                          </div>
                          <h2>Destination</h2><hr>
                          <div class='form-group'>
                            <div class='row'>
                              <div class='col-md-4'>
                                 <label>Port of Unloading</label>
                                   <input type='text' name='port_of_unloading' class='form-control' value='<?php if(isset($row)){echo $row->port_of_unloading;}?>'>
                              </div>
                              <div class='col-md-4'>
                                 <label>On Carriage By</label>
                                   <input type='text' name='on_carriage_by' class='form-control' value='<?php if(isset($row)){echo $row->on_carriage_by;}?>'>
                              </div>
                              <div class='col-md-4'>
                                 <label>Place of Delivery by on-Carrier</label>
                                   <input type='text' name='place_of_delivery' class='form-control' value='<?php if(isset($row)){echo $row->place_of_delivery;}?>'>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-md-12">
                      
                   </div>
           </div> 
                 <div class="clearfix">&nbsp;</div>
                    
                </form>
                        </div>        
                       
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->
                                
                                               
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 
  <div class='modal fade' id="saveModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
       <div class="modal-header text-white bg-green">
         <h3 class="modal-title">Directories Modal</h3>
       <button class="close" style='color:white' data-dismiss="modal"><span>&times;</span></button>
       </div>
       <div class="modal-body">
       <input type="hidden" id="last_insert_id_input" name='shipment_order_id'>
       <ul class="sidebar-menu" data-widget="tree">
       <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Directory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php 
       $categories = getCategory();
          foreach($categories as $category){
            $subcategory=getSubcategory($category['id']);
              if(count($subcategory)>0){?>
    <li class="treeview">
    <a href="javascript:void(0)" class='selectedId' data-id='<?php echo $category['id'];?>'><i class="fa fa-circle-o"></i><?php echo $category['title'];?> 
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
   <ul class="treeview-menu">
              <?php foreach($subcategory as $subcat){
      $subchilds = getSubchild($subcat['id']);
if(count($subchilds)>0){
    ?>
                <li class="treeview">
                  <a href="javascript:void(0)" class='selectedId' data-id='<?php echo $subcat['id'];?>'><i class="fa fa-circle-o"></i> <?php echo $subcat['title']?>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <?php foreach($subchilds as $subchild){?>
                       <li><a href="javascript:void(0)" class='selectedId' data-id='<?php echo $subchild['id'];?>'><i class="fa fa-circle-o"></i> <?php echo $subchild['title']?></a></li>
                       <?php }}else{?>
                         <li class="treeview">
                         <a href="javascript:void(0)" class='selectedId' data-id='<?php echo $subcat['id'];?>'><i class="fa fa-circle-o"></i> <?php echo $subcat['title']?>
                         </a>
                      <?php }?>
                  </ul>
                </li>
                <?php }}else{?>
            <li class="treeview">
              <a href="javascript:void(0)" class='selectedId' data-id='<?php echo $category['id'];?>'><i class="fa fa-circle-o"></i><?php echo $category['title'];?> 
              </a>
            </li>
            <?php }}?>
            </ul>
        </li>
      </ul>
      </div>
     <div class="modal-footer">
       <button class="btn btn-success" onclick='saveModalData()' type="button">Save</button>
       <input type='hidden' >
       <button class='btn btn-danger' data-dismiss='modal'>Close</button>
     </div>
     
     </div>
</div>
</div>  
  <?php  getFooter(); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

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
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = ' <div class="row"><div class="col-md-3"> <label>Vehicle Description</label> <input type="text" name="vehicle_description[]" class="form-control"> </div><div class="col-md-3"> <label>Vin Number</label> <input type="text" name="vin_number[]" class="form-control"> </div><div class="col-md-2"> <label>Vehicle Purchase Cost</label> <input type="text" name="purchase_cost[]" class="form-control"> </div><div class="col-md-3"> <label>Company Preference</label> <input type="text" name="company_preference[]" class="form-control"> </div><div class="col-md-1"><a  href="javascript:void(0);" class="remove_button"><img height="30" width="30" src="<?php echo base_url()?>image/remove.png"/></a></div></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
      //console.log('remove clicked');
        e.preventDefault();
        $(this).parent().parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
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
                var id = data.primary_id;
                $('#saveModal').modal('show');
                $('#saveModal').find('#last_insert_id_input').val(id); // Set the value of the hidden input field to the id
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
                var id = data.primary_id;
                $('#saveModal').modal('show');
                $('#saveModal').find('#last_insert_id_input').val(id); // Set the value of the hidden input field to the id
                $(".alert").html(data.message);
                $(".alert").removeClass('hidden');
                setTimeout(function(){
                $(".alert").addClass('hidden');
                //$('#form_add_update')[0].reset();
                },3000);
                // setTimeout(function(){
                // window.location='<?php echo base_url().$controller; ?>';
                // },1000);
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
<script>
 function saveModalData(){
    var id = $('#last_insert_id_input').val();
    var cat_id = $('.active_category').attr('data-id');
    //var selectedSubcategoryId = event.target.getAttribute('data-id');   
    var formdata = new FormData();
    formdata.append('cat_id', cat_id);
    formdata.append('shipment_order_id', id);
  $.ajax({
      type: "POST",
      url: "<?php echo base_url()?>shipment_order/storeDirectory",
      data: formdata,
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
          alert(data.message);
        }
        $('#saveModal').modal('hide');
           }
   });

}
</script>
<script>
$(function(){

  $('a').click(function () {
    $('a').removeClass("active_category");
    $(this).addClass("active_category");
  });

});
</script>
<script>
  $(function() {
    $("#shipper_name").autocomplete({
        source: "<?=base_url()?>shipment_order/autocomplete_shipper_data",
        // minLength:2,
        // autoFocus:true,
        select: function( event, ui ) {
            event.preventDefault();
           $(this).val(ui.item.name);
			     $("#shipper_address").val(ui.item.address);
           $("#shipper_phone").val(ui.item.mobile);
        }
    })
	/*.data("ui-autocomplete")._renderItem = function (table, item) {
	return $("<table class='flightstatTable' border='1'><thead><tr><th>Desc</th><th>Length</th><th>Width</th><th>Height</th><th>Volume</th></tr></thead><tbody></tbody></table>")
	.data("item.autocomplete", item)
	.append( "</td>"+"<td>"+item.description+"</td>"+"<td>"+item.length+"</td>"+"<td>"+item.width+"</td>"+"<td>"+item.height+"</td>" +"<td>"+item.volume+"</td>").appendTo(table);
	}*/;
	
});
</script>
<script>
  $(function() {
    $("#consignee_name").autocomplete({
        source: "<?=base_url()?>shipment_order/autocomplete_consignee_data",
        // minLength:2,
        // autoFocus:true,
        select: function( event, ui ) {
            event.preventDefault();
           $(this).val(ui.item.name);
			     $("#consignee_address").val(ui.item.address);
           $("#consignee_phone").val(ui.item.mobile);
        }
    })
	/*.data("ui-autocomplete")._renderItem = function (table, item) {
	return $("<table class='flightstatTable' border='1'><thead><tr><th>Desc</th><th>Length</th><th>Width</th><th>Height</th><th>Volume</th></tr></thead><tbody></tbody></table>")
	.data("item.autocomplete", item)
	.append( "</td>"+"<td>"+item.description+"</td>"+"<td>"+item.length+"</td>"+"<td>"+item.width+"</td>"+"<td>"+item.height+"</td>" +"<td>"+item.volume+"</td>").appendTo(table);
	}*/;
	
});
</script>