<?php getHead();
$controller=$this->router->class;
$Heading=$controller;
if(isset($module_heading) and $module_heading!=''){
$Heading=   $module_heading;
    }

 ?>
   <style>
    table.table-autocomplete thead tr th {
    padding: 3px;
}
table.table-autocomplete .ui-menu-item td {
    border-left: solid 1px #B6B6B6;
    padding: 3px;
}
.ui-autocomplete { 
  
}	
.flightstatTable .arrival{ background-color:#96F;color:#fff}
.flightstatTable .departure{background-color:#96C;color:#fff}
.flightstatTable>thead>tr>th{
	font-size:10px; 
	}
.flightstatTable td{
	font-size:9px; font-weight:normal;	
	}
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
.ui-menu .ui-menu-item:hover{
	background-color:#CCC;
	}
   </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">

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
        <form id="form_add_update" name="form_add_update" role="form">
             <div class="alert hidden"></div>
                    <div class="form-group wrap_form">
        <section class="content">

<div class="row">
<div class="col-md-12">

<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab_1" data-toggle="tab">General</a></li>
<li><a href="#tab_2" data-toggle="tab">Shipper/Consignee</a></li>
<li><a href="#tab_3" data-toggle="tab">Supplier</a></li>
<li><a href="#tab_4" data-toggle="tab">Carrier</a></li>
<li><a href="#tab_5" data-toggle="tab">Commodity</a></li>
<li><a href="#tab_6" data-toggle="tab">Charges</a></li>
<!--<li><a href="#tab_7" data-toggle="tab">Events</a></li>-->
<li><a href="#tab_8" data-toggle="tab">Notes</a></li>
<li><a href="#tab_9" data-toggle="tab">Attachment</a></li>


<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
<div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                 <!-- <label>Transaction Number</label> -->
                                  <!-- <input type='text' name='transaction_number' class='form-control' value='<?php if(isset($row)){echo $row->transaction_number;}else{ echo uniqid();}?>'> -->
                                 <!-- <label>Transaction Number</label> -->
                                 <input type='hidden' name='transaction_number' class='form-control'>
                                 <!-- <select name='transaction_number' class='form-control'>
                                    <?php if(isset($general)){
                          foreach($general as $warehouse){
                                  $selected='';
                          if(isset($row)){
                             if($row->transaction_number == $warehouse['transaction_number']){
                                 $selected = 'selected';
                             }}
                          ?>
                                            <option <?php echo $selected?> value='<?php echo $warehouse['transaction_number']?>'><?php echo $warehouse['transaction_number']?></option>          
                                    <?php }}?>
                      </select> -->

                                    
                                        </div>
                            </div></div>
<div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                <label>Date</label>
                                          <input type='date' name='date' class='form-control' value='<?php if(isset($row)){echo $row->date;}?>'>
                                  
                                
                                        </div>
                                        <div class='col-md-6'>
                                 <label>Time</label>
                                 <input type='time' name='time' value='<?php if(isset($row)){echo $row->time;}?>' class='form-control'>
                            
                                        </div></div></div>
                                        <div class='form-group'>
                                          <div class='row'>
                                          <div  class="col-md-6">
                                          <label>Employ</label>
                                          <select name='employ_name' class='form-control'>
                                    <?php if(isset($general)){
                          foreach($general as $warehouse){
                             $selected = '';
                             if(isset($row)){
                               if($row->employ_name==$warehouse['employ_name']){
                                  $selected = 'selected';
                               }}?>
                                            <option <?php echo $selected?> value='<?php echo $warehouse['employ_name']?>'><?php echo $warehouse['employ_name']?></option>          
                                    <?php }}?>
                      </select>
                      <input type='hidden' name='qr_image'>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                 <label>Issued by</label>
                                 <select name='issued_by' class='form-control'>
                                    <?php if(isset($general)){
                          foreach($general as $warehouse){
                          $selected = '';
                          if(isset($row)){
                             if($row->issued_by == $warehouse['issued_by']){
                                 $selected = 'selected';
                             }}?>
                                            <option <?php echo $selected?> value='<?php echo $warehouse['issued_by']?>'><?php echo $warehouse['issued_by']?></option>          
                                    <?php }}?>
                      </select>
                                        </div>
                                          
                                  </div>
                                 </div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                          <label>Destination Agent</label>
                                          <select name='destination_agent' class='form-control'>
                                          <option>Select</option>
                                    <?php if(isset($destination_agents)){
                          foreach($destination_agents as $agent){
                             $selected = '';
                             if(isset($row)){
                               if($row->destination_agent==$agent['name']){
                                  $selected = 'selected';
                               }}?>
                                            <option <?php echo $selected?> value='<?php echo $agent['name']?>'><?php echo '<i class="fa fa-user">' .$agent["name"]. '</i>';?></option>          
                                    <?php }}?>
                      </select>
                                   
</div></div>
</div>
                            </div>
<div class="tab-pane" id="tab_2">
<div class='row'>
  <div class='col-md-6'>
<h3>Shipper</h3>
<label>Shipper Name</label>

<select name='shipper_name' id='shipper_name' class='form-control'>
 <option>Select</option>
  <?php if(isset($shipment)){
    foreach($shipment as $detail){
    $selected='';
    if(isset($row)){
     if($row->shipper_name==$detail['shipper_name']){
         $selected='selected';
     }}?>
<option <?php echo $selected?> value='<?php echo $detail['shipper_name'];?>'><?php echo $detail['shipper_name'];?>
                      </option>
                      <?php }}?>
                      </select>
                    </div>
                    <div class='col-md-6'>
<h3>Consignee</h3>
<label>Consignee Name</label>
<select name='consignee_name' class='form-control'>
  <?php if(isset($shipment)){
    foreach($shipment as $detail){
    $selected='';
    if(isset($row)){
     if($row->consignee_name==$detail['consignee_name']){
         $selected='selected';
     }}?>
        <option <?php echo $selected?> value='<?php echo $detail['consignee_name'];?>'><?php echo $detail['consignee_name'];?>
                      </option>
                      <?php }}?>
                      </select>
                    </div>
    <div class='col-md-6'>
      <label>Address</label>
       <textarea type='text' class='form-control' id='shipper_address' name='shipper_address'><?php if(isset($row)){echo $row->shipper_address;}?></textarea>
    </div>
    <div class='col-md-6'>
      <label>Address</label>
       <textarea type='text' class='form-control' name='consignee_address'><?php if(isset($row)){echo $row->consignee_address;}?></textarea>
    </div>
    <div class='col-md-6'>
      <label>Client to bill</label>
        <select name='client_to_bill' class='form-control'>
          <option value='ultimate_consignee'>Ultimate Consignee</option>
        </select>
    </div>
    <div class='col-md-6'>
    <label></label>
      <input type='text' class='form-control'>
    </div></div>
    <div class='row'>
    <div class='col-md-6'>
      <label>Mode of Transport</label>
        <select name='mode_of_transport' class='form-control'>
            <option>Choose Mode</option>
          <?php if(isset($mode_of_transport)){
            foreach($mode_of_transport as $transport){
              $selected='';
              if(isset($row)){
                if($row->mode_of_transport==$transport['method']){
                  $selected='selected';
                  }}?>
          <option <?php echo $selected?> value='<?php echo $transport['method']?>'><?php echo $transport['method']?></option>
          <?php }}?>
    </select>
    </div>
    <div class='col-md-6'>
    <label></label>
      <input type='text' class='form-control'>
    </div>
    </div>
    <div class='row'>
    <div class='col-md-6'>
      <label>Origin</label>
         <input type='text' name='origin' id='origin' value='<?php if(isset($row)){echo $row->origin;}?>' class='form-control'>
    </div>
    <div class='col-md-6'>
      <label>Destination</label>
         <input type='text' id='destination' name='destination' value='<?php if(isset($row)){echo $row->destination;}?>' class='form-control'>
    </div>
    </div></div>
<div class="tab-pane" id="tab_3">
   <div class='row'>
    <div class='col-md-6'>
      <h3>Suppliers</h3>
      <label>Name</label>
        <select name='supplier_name' class='form-control'>
          <?php if(isset($suppliers)){
            foreach($suppliers as $supplier){
            $selected='';
            if(isset($row)){
              if($row->supplier_name==$supplier["supplier_name"]){
              $selected='selected';
              }}?>
              <option <?php echo $selected?> value='<?php echo $supplier["supplier_name"];?>'><?php echo $supplier["supplier_name"];?></option>
              <?php }}?>
        </select>
    </div><br><br><br>
    <div class='col-md-6'>
    <label>Address</label>
     <textarea name='supplier_address' class='form-control'><?php if(isset($row)){echo $row->supplier_address;}?></textarea>
   </div>
  </div>
</div>
<div class="tab-pane" id="tab_4">
<div class='row'>
  <div class='col-md-6'>
  <h3>Carrier</h3>
  <label>Carrier</label>
  <select name='carrier' class='form-control'>
          <?php if(isset($carriers)){
            foreach($carriers as $carrier){
            $selected='';
            if(isset($row)){
              if($row->carrier==$carrier["id"]){
              $selected='selected';
              }}?>
              <option <?php echo $selected?> value='<?php echo $carrier["id"];?>'><?php echo $carrier["name"];?></option>
              <?php }}?>
        </select>
  </div></div><br>
  <div class='row'>
  <div class='col-md-6'>
    <label>Driver's Name:</label>
    <select name='driver_name' class='form-control'>
      <?php if(isset($drivers)){
          foreach($drivers as $driver){
          $selected='';
          if(isset($row)){
            if($row->driver_name==$driver['driver_name']){
            $selected='selected';
            }}?>
          <option <?php echo $selected?> value='<?php echo $driver['driver_name']?>'><?php echo $driver['driver_name']?></option>
          <?php }}?>
          </select>
  </div>
  <div class='col-md-6'>
    <label>Driver's License Number:</label>
    <input type='text' name='driver_license_number' class='form-control' value='<?php if(isset($row)){echo $row->driver_license_number;}?>'>
  </div></div>
  <br>
  <div class='row'>
  <div class='col-md-6'>
    <label>PRO Number:</label>
    <input type='text' name='pro_number' class='form-control' value='<?php if(isset($row)){echo $row->pro_number;}?>'>
  </div>
  <div class='col-md-6'>
    <label>Driver's Tracking Number:</label>
    <input type='text' name='driver_tracking_number' class='form-control' value='<?php if(isset($row)){echo $row->driver_tracking_number;}?>'>
  </div>
          </div>
            </div>

<div class="tab-pane" id="tab_5">
   <div class='form-group'>
    <div class='row'>
      <div class='col-md-12'>
      <button type='button' class='btn btn-info btn-sm pull-right' data-toggle='modal' data-target='#AddCommodityModal'>Add Commodity</button>
        <table class='table table-striped'>
        <thead>
        	<tr>
            	<th>Package</th>
            	<th>Description</th>
            	<th>Pieces</th>
            	<th>Length</th>
            	<th>Width</th>
            	<th>Height</th>
            	<th>Weight</th>
            	<th>Volume</th>
                <th>Action</th>
            </tr>
        </thead>
          <tbody id="tbody_comudity">
            <?if(isset($trdata)){
              echo $trdata;}?>
        
          </tbody>
        </table>
      </div>
    </div>
   </div>
          </div>
<div class="tab-pane" id="tab_6">
<div class='form-group'>
  <div class='row'>
  <div class='col-md-12'>
      <button type='button' class='btn btn-info btn-sm pull-right' data-toggle='modal' data-target='#AddChargesModal'>Add Charges</button>
        <table class='table table-striped'>
        <thead>
        	<tr>
            	<th>Status</th>
            	<th>Description</th>
            	<th>Quantity</th>
            	<th>Tax Amount</th>
            	<th>Income</th>
            	<th>Expense</th>
            	<th>Amount</th>
              <th>Final Amount</th>
                <th>Action</th>
            </tr>
        </thead>
          <tbody id="tbody_charges">
        
          </tbody>
        </table>
      </div>
  </div>
</div>
</div>
<div class='tab-pane' id='tab_7'>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-12'>
      <table class='table'>
        <tbody>
          <div class='row'>
            <tr>
            <div class='col-md-10'>
              <td>Event</td>
            </div>
            <div class='col-md-2'>
              <td><button type='button' class='btn btn-info' data-target='#AddEventModal' data-toggle='modal'>Add Event</button></td>
            </div>
          </div>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<div class="tab-pane" id="tab_8">
  <div class='row'>
  <div class='col-md-12' id='inputFormRow'>
            <h4>Notes</h4>
                <div class="notes">
                        <textarea name="notes" class='form-control'> <?php if(isset($row)){echo $row->notes;}?></textarea>
                </div>
               </div></div></div>
<div class="tab-pane" id="tab_9">
  <div class='row'>
    <div class='col-md-6'>
<label>Attachment</label>
 <?php if(isset($row)){
   if($row->file){
	   $attachment='uploads/'.$row->file;
    echo '<a href="'.$attachment.'" class="fancybox"><img src="'.$attachment.'" height="70"></a>';
    }}?>
<input type='file' class='form-control' name='file' id='file'>
                                    </div>
                                  </div> <br>
        <div class='row'>
            <div class="col-md-6">
                                                  <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">

                           <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                    </div>
                                  </div>
                                  

</div>

</div>

</div>

</div>

       </section>
                          
      </form>
                      </div>
    <!-- /.content -->
  </div>
   

  <?php  getFooter(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <!-- Scroll to Top Button-->
 <?php // commonjs() ?>
 
</body>
<div class='modal fade' id='AddCommodityModal'>
  <div class='modal-dialog modal-lg modal-dialog-centered'>
    <div class='modal-content'>
      <div class='modal-header bg-green'>
               <h3 class='modal-title text-white'>Add Commodity</h3>
               <button class='close' data-dismiss='modal' style='color:white'>&times;</button>
      </div>
      <form id="formAddCommodity">
      <div class='modal-body ui-front'>
      <div class="form-group">
                                <div class="row"> 
                                <div class="col-xs-12 col-md-6">
                                    <label>Part Number</label>
                                    
                                    <input type="text" class="form-control" id="part_number" value='<?php if(isset($row)){$row->part_number;}?>' name="part_number">
                                    
                                        </div>
                                        <div  class="col-md-6">
                                    <label>Model</label>
                                    <input type="text" name="model" id="model" value='<?php if(isset($row)){$row->model;}?>' class="form-control">
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Package Type</label>
                                    <input name="package_type" id="package_type" class="form-control" />
                                    </div>
                                 <div class="col-md-6">
                                     <label>Location</label>
                                       <input type="text" class="form-control" id="location" value='<?php if(isset($row)){$row->location;}?>' name="location">
                                     </div>
                                     </div></div>
                                        <div class='form-group'>
                                           <div class='row'>
                                             <div class="col-xs-12 col-md-6">
                                                 <label>Pieces</label>
                                                    <input type="number" name="pieces" id="pieces" value='<?php if(isset($row)){$row->pieces;}?>' class="form-control">
                                  </div>
                                 </div></div>
                                 <div class='form-group'>
                                   <div class='row'>
                                 <div  class="col-md-12">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description"  class="form-control"><?php if(isset($row)){$row->description;}?></textarea>
                                  </div>
                                  </div></div>
                          <div class="form-group">
                                <h3>Dimensions(LxWxH)</h3>
                                <div class="row"> 
                                <div class="col-xs-12 col-md-3">
                                    <label>Length</label>
                                    <input type="number" class="form-control" id="length" value='<?php if(isset($row)){$row->length;}?>' name="length">
                                 </div>
                                <div class="col-xs-12 col-md-3">
                                    <label>Width</label>
                                      <input type="number" class="form-control" id="width" value='<?php if(isset($row)){$row->width;}?>' name="width">
                                  </div>
                                    <div class="col-xs-12 col-md-3">
                                    <label>Height</label>
                                       <input type="number" class="form-control" id="height" value='<?php if(isset($row)){$row->height;}?>' name="height">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                          <label>Unit</label>
                                              <select name='dimension_unit' class='form-control'>
                                        <?php
                                        $inches='';
                                        $cm='';
                                        if(isset($row)){
                                            if($row->dimension_unit=='inches'){
                                                $inches='selected';
                                            }
                                            if($row->dimension_unit=='cm'){
                                                $cm='selected';
                                            }
                                        }
                                        ?>
                                      <option value='Not Selected'>Choose Unit</option>
                                      <option <?php echo $inches?> value='inches'>Inches</option>
                                      <option <?php echo $cm?> value='cm'>cm</option>
                                    </select>
                                    
                                        </div>
                                          
                                 </div></div>
                                 <div class='form-group'>
                                  <div class='row'>
                                    <div class='col-xs-12'>
                                      <table border='1' style='width:100%'>
                                        <thead>
                                        <tr>
                                          <th style='text-align:center'>By totals</th>
                                          <th style='text-align:center'>Piece</th>
                                          <th style='text-align:center'>Total</th>
                                          <th style='text-align:center'>Measure</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                          <td style='text-align:center'>Weight</td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name='unit_weight' id='unit_weight'></td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name='total_weight' id='total_weight'></td>
                                          <td><select class='form-control' name='weight_unit_measure'><option value='lb'>lb</option></select></td>
                                        </tr>
                                        <tr>
                                          <td style='text-align:center'>Volume</td>
                                          <td><input class='form-control' placeholder='0.00' type='number' id='unit_volume' name='unit_volume'></td>
                                          <td><input class='form-control' placeholder='0.00' type='number' id='total_volume' name='total_volume'></td>
                                          <td><select class='form-control' name='volume_unit_measure'><option value='ft3'>ft<sup>3</sup></option></select></td>
                                        </tr>
                                        </tbody>
                                      </table>
                                    </div>
</div>
</div>
                             <div class='form-group'>
                                <div class='row'>
                                   <div class='col-sm-3'>
                                      <label>Quantity</label>
                                        <input type='number' value='<?php if(isset($row)){echo $row->quantity;}?>' class='form-control' name='quantity' id='quantity'>
</div>
                                    <div class='col-sm-3'>
                                      <label>Unit</label>
                                        <input type='number' class='form-control' value='<?php if(isset($row)){echo $row->unit;}?>' name='unit'>
                  </div>
                                    <div class='col-sm-3'>
                                      <label>Unitary Value</label>
                                        <input type='number' class='form-control' value='<?php if(isset($row)){echo $row->unitary_value;}?>' name='unitary_value'>
</div>
                                    <div class='col-sm-3'>
                                      <label>Total Value</label>
                                        <input type='number' class='form-control' value='<?php if(isset($row)){echo $row->total_value;}?>' name='total_value'>
</div>
          </div>          </div></div>

          <div class="modal-footer">
      <button type="button" onclick="setCommudity()" class="btn btn-success">Save changes</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
     
    </div>
  </div>  
</div>
<div class='modal fade' id='AddChargesModal'>
  <div class='modal-dialog modal-lg modal-dialog-centered'>
    <div class='modal-content'>
      <div class='modal-header bg-green'>
               <h3 class='modal-title text-white'>Add Charges</h3>
               <button class='close' data-dismiss='modal' style='color:white'>&times;</button>
      </div>
      <form id='chargesForm'>
      <div class='modal-body'>
      <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Status</label>
                <input type='text' class='form-control' name='charges_status' id='charges_status' value='<?php if(isset($row)){echo $row->charges_status;}?>'>
                                  </div>
                                          <div  class="col-md-6">
                                    <label>Description</label>
                <textarea type="text" name="charges_description" id="charges_description"  class="form-control"><?php if(isset($row)){$row->charges_description;}?></textarea>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Prepaid</label>
                                          <input type='text' name='prepaid' id='prepaid' class='form-control' value='<?php if(isset($row)){echo $row->prepaid;}?>'>
                                        </div>
                                          <div class="col-md-6">
                                    <label>Quantity</label>
                                    <input type='number' class="form-control" id="quantity" name="quantity" value='<?php if(isset($row)){echo $row->quantity;}?>'>                               
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Price</label>
                                    <input type='number' class="form-control" id="price" name="price" value='<?php if(isset($row)){echo $row->price;}?>'>                                                                   
                                        </div>
                                          <div class="col-md-6">
                                    <label>Amount</label>
                                    <input type='number' class="form-control" id="amount" name="amount" value='<?php if(isset($row)){echo $row->amount;}?>'>                                                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Tax Code</label>
                                    <input type='number' class="form-control" id="tax_code" name="tax_code" value='<?php if(isset($row)){echo $row->tax_code;}?>'>                                                                   
                                        </div>
                                          <div class="col-md-6">
                                    <label>Tax Rate</label>
                                    <input type='number' class="form-control" id="tax_rate" name="tax_rate" value='<?php if(isset($row)){echo $row->tax_rate;}?>'>                                                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Tax Amount</label>
                                    <input type='number' class="form-control" id="tax_amount" name="tax_amount" value='<?php if(isset($row)){echo $row->tax_amount;}?>'>                                                                   
                                        </div>
                                          <div class="col-md-6">
                                    <label>Amount + Tax</label>
                                    <input type='number' class="form-control" id="amount_with_tax" name="amount_with_tax" value='<?php if(isset($row)){echo $row->amount_with_tax;}?>'>                                                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Currency</label>
                                    <input type='text' class="form-control" id="currency" name="currency" value='<?php if(isset($row)){echo $row->currency;}?>'>                                                                   
                                  </div>
                                          <div class="col-md-6">
                                    <label>Final Amount</label>
                                    <input type='number' class="form-control" id="final_amount" name="final_amount" value='<?php if(isset($row)){echo $row->final_amount;}?>'>                                                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Expense</label>
                                    <input type='number' class="form-control" id="expense" name="expense" value='<?php if(isset($row)){echo $row->expense;}?>'>                                                                   
                                  </div>
                                          <div class="col-md-6">
                                    <label>Income</label>
                                         <input type='number' class="form-control" id="income" name="income" value='<?php if(isset($row)){echo $row->income;}?>'>                                                                   
                                  </div>
                                 </div></div>
          <div class="modal-footer">
      <button type="button" onclick="addCharges()" class="btn btn-success">Save changes</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
      </div>
    </div>
    <div class='modal fade' id='AddEventModal'>
  <div class='modal-dialog modal-lg modal-dialog-centered'>
    <div class='modal-content'>
      <div class='modal-header bg-green'>
               <h3 class='modal-title text-white'>Add Event</h3>
               <button class='close' data-dismiss='modal' style='color:white'>&times;</button>
      </div>
      <div class='modal-body'>
      <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                <label>Event Type</label>
                                  <select name='event_type' class='form-control'>
                                    <option disable>Choose</option>
                                    <option value='Arrived at warehouse'>Arrived at warehouse</option>
                                    <option value='Cargo has been picked'>Cargo has been picked</option>
                                    <option value='Cargo scanned in'>Cargo scanned in</option>
                                    <option value='Cargo scanned out'>Cargo scanned out</option>
                                    <option value='Cargo Status Update'>Cargo Status Update</option>
                                    <option value='Delivered to consignee'>Delivered to consignee</option>
                                    <option value='Entry Status Update'>Entry Status Update</option>
                                    <option value='External Tracking Update'>External Tracking Update</option>
                                    <option value='Final Mile Pickup'>Final Mile Pickup</option>
                                    <option value='In Transit'>In Transit</option>
                                    <option value='In-bond (7512)'>In-bond (7512)</option>
                                    <option value='Picked up'>Picked up</option>
                                    <option value='Transaction Approved by Customer'>Transaction Approved by Customer</option>
                                    <option value='Transaction Dispute Answer'>Transaction Dispute Answer</option>
                                    <option value='Transaction Dispute Request'>Transaction Dispute Request</option>
                                  </select>
                                  </div>
                                 </div></div>
          <div class="modal-footer">
      <button type="button" class="btn btn-success">Save changes</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </div>
     
    </div>
    
</html>

<script>
function deleteRow(id){
	var del = confirm("are you sure to remove");
	if(del){
		$("#"+id).remove();
		}
	}
	function deleteCharges(id){
	var del = confirm("are you sure to remove");
	if(del){
		$("#"+id).remove();
		}
	}
function editRow(id){
   $('#formAddCommodity').append("<input type='hidden' id='rowid' value='"+id+"' >");
   $('#formAddCommodity .btn-success').addClass("edit_true");
	 $('#part_number').val($('#'+id+ '>#part_number_h').val());
	 $('#model').val($('#'+id+ '>#model_h').val());
	 $('#description').val($('#'+id+ '>#description_h').val());
	 $('#package_type').val($('#'+id+ '>#package_type_h').val());
	 $('#location').val($('#'+id+ '>#location_h').val());
	 $('#pieces').val($('#'+id+ '>#pieces_h').val());
	 $('#length').val($('#'+id+ '>#length_h').val());
	 $('#width').val($('#'+id+ '>#width_h').val());
	 $('#height').val($('#'+id+ '>#height_h').val());
	 $('#dimension_unit').val($('#'+id+ '>#dimension_unit_h').val());
	 $('#unit_weight').val($('#'+id+ '>#unit_weight_h').val());
	 $('#total_weight').val($('#'+id+ '>#total_weight_h').val());
	 $('#weight_unit_measure').val($('#'+id+ '>#weight_unit_measure_h').val());
	 $('#unit_volume').val($('#'+id+ '>#unit_volume_h').val());
	 $('#total_volume').val($('#'+id+ '>#total_volume_h').val());
	 $('#volume_unit_measure').val($('#'+id+ '>#volume_unit_measure_h').val());

	 $('#unit').val($('#'+id+ '>#unit_h').val());
	 $('#unitary_value').val($('#'+id+ '>#unitary_value_h').val());
	 $('#total_value').val($('#'+id+ '>#total_value_h').val());
	 // now show modal
	 	$('#AddCommodityModal').modal('show');

	}	
  function editCharges(id){
	
	
	$('#chargesForm').append("<input type='hidden' id='rowid' value='"+id+"' >");
	$('#chargesForm .btn-success').addClass("edit_true");
	 $('#charges_status').val($('#'+id+ '>#charges_status_h').val());
	 $('#charges_description').val($('#'+id+ '>#charges_description_h').val());
	 $('#amount').val($('#'+id+ '>#amount_h').val());
	 $('#income').val($('#'+id+ '>#income_h').val());
	 $('#expense').val($('#'+id+ '>#expense_h').val());
	 $('#final_amount').val($('#'+id+ '>#final_amount_h').val());
	 $('#tax_amount').val($('#'+id+ '>#tax_amount_h').val());
	 $('#tax_rate').val($('#'+id+ '>#tax_rate_h').val());
	 $('#tax_code').val($('#'+id+ '>#tax_code_h').val());
	 $('#amount_with_tax').val($('#'+id+ '>#amount_with_tax_h').val());
	 $('#currency').val($('#'+id+ '>#currency_h').val());
	 $('#quantity').val($('#'+id+ '>#quantity_h').val());
	 $('#price').val($('#'+id+ '>#price_h').val());
	 $('#prepaid').val($('#'+id+ '>#prepaid_h').val());
	 // now show modal
	 	$('#AddChargesModal').modal('show');

	}	
function setCommudity(){
	
         var formData = new FormData();
          var other_data = $('#formAddCommodity').serializeArray();
        $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
        });
        
    // ajax start
            $.ajax({
            type: "POST",
            url: "<?php echo base_url().$controller.'/setCommudity'; ?>",
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
				console.log('response');
				if($('#formAddCommodity .btn-success').hasClass("edit_true")){
		var rowid = $('#formAddCommodity #rowid').val();
		$('#'+rowid).remove();
		}
            $('#loader').addClass('hidden');
           
            //var obj = jQuery.parseJSON(data);
            if (data.status == 1)
            {   
			console.log('i am in if');
			$('#AddCommodityModal').modal('hide');
			$('#tbody_comudity').append(data.trdata);
               
            }
           else if (data.status ==0)
            {  
            $(".alert").addClass('alert-danger');
                $(".alert").removeClass('hidden');
                $(".alert").html(data.message);
                setTimeout(function(){
                $(".alert").addClass('hidden');
                },5000);
            }
            else if (data.status == 2)
            {   
            $(".alert").addClass('alert-success');
                $(".alert").removeClass('hidden');
                setTimeout(function(){
               // window.location='<?php echo base_url().$controller; ?>';
                },1000);
            }
            
            
           }
     });

    //ajax end    
    
	}
  /**********************************save************************************/
     $('#form_add_update').on("submit",function(e) {
         e.preventDefault();    
         var formData = new FormData();
          var other_data = $('#form_add_update').serializeArray();
        $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
        });
        if($('#file').val()!=''){
		formData.append("file", document.getElementById('file').files[0]);
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
  function addCharges(){
        var formdata = new FormData();
        var other_data = $('#chargesForm').serializeArray();
        $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
        });
        
    // ajax start
            $.ajax({
            type: "POST",
            url: "<?php echo base_url().$controller.'/addCharges'; ?>",
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            beforeSend: function() {
            $('#loader').removeClass('hidden');
        //  $('#form_add_update .btn_au').addClass('hidden');
            },
            success: function(data) {
				if($('#chargesForm .btn-success').hasClass("edit_true")){
		var rowid = $('#chargesForm #rowid').val();
		$('#'+rowid).remove();
		}
            $('#loader').addClass('hidden');
            //alert(data.status);
            //var obj = jQuery.parseJSON(data);
            if (data.status == 1)
            {   
			$('#AddChargesModal').modal('hide');
			$('#tbody_charges').append(data.trdata);
               
            }
           else if (data.status ==0)
            {  
            $(".alert").addClass('alert-danger');
                $(".alert").removeClass('hidden');
                setTimeout(function(){
                $(".alert").addClass('hidden');
                },3000);
            }
            else if (data.status == 2)
            {   
            $(".alert").addClass('alert-success');
                $(".alert").removeClass('hidden');
                setTimeout(function(){
               // window.location='<?php echo base_url().$controller; ?>';
                },1000);
            }
            
            
           }
     });

    //ajax end    
   
 }
</script>

<script>
// $(document).ready(function() {
//     $("#package_type").autocomplete({
//         source: function(request, response) {
//             $.ajax({
//                 url: "<?php echo base_url('warehouse_receipt/autocomplete_data'); ?>",
//                 type: "POST",
//                 dataType: "json",
//                 data: { search: request.term },
//                 success: function(data) {
//                     var table = '<table>';
//                     $.each(data, function(index, item) {
//                         table += '<tr><td>' + item.field1 + '</td></tr>';
//                     });
//                     table += '</table>';
//                     response(table);
//                 }
//             });
//         },
//         select: function(event, ui) {
//             // Extract the selected data from the table
//             var field1 = ui.item.find('td:eq(0)').text();

//             // Fill the desired fields in the form with the selected data
//             $("#description").val(field1);

//             return false;
//         }
//     })
//     .autocomplete("instance")._renderItem = function(ul, item) {
//         // Render the table HTML in the autocomplete dropdown
//         return $("<li>")
//             .append(item)
//             .appendTo(ul);
//     };
// });
</script>
<script>
  $(function() {
    $("#package_type").autocomplete({
        source: "<?=base_url()?>warehouse_receipt/autocomplete_data",
        // minLength:2,
        // autoFocus:true,
        select: function( event, ui ) {
            event.preventDefault();
           $(this).val(ui.item.package_type);
			     $("#description").val(ui.item.description);
           $("#length").val(ui.item.length);
           $("#width").val(ui.item.width);
           $("#height").val(ui.item.height);
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
    $("#origin").autocomplete({
        source: "<?=base_url()?>warehouse_receipt/autocomplete_origin",
        // minLength:2,
        // autoFocus:true,
        select: function( event, ui ) {
            event.preventDefault();
           $(this).val(ui.item.value);
        }
    })
	});
</script>
<script>
  $(function() {
    $("#destination").autocomplete({
        source: "<?=base_url()?>warehouse_receipt/autocomplete_destination",
        // minLength:2,
        // autoFocus:true,
        select: function( event, ui ) {
            event.preventDefault();
           $(this).val(ui.item.value);
        }
    })	
});
</script>
<script>
  $(function() {
    $("#location").autocomplete({
        source: "<?=base_url()?>warehouse_receipt/autocomplete_location",
        // minLength:2,
        // autoFocus:true,
        select: function( event, ui ) {
            event.preventDefault();
           $(this).val(ui.item.value);
        }
    })	
});
</script>
<script>
  $('#shipper_name').change(function(){
    var shipper_name = $(this).val();
  })
  // function shipperAddress(id){
  //   $.ajax({
  //     type: "POST",
  //     url: "<?php echo base_url()?>/warehouse_receipt/shipperAddress",
  //     data: {'id':id},
  //     success:function(response){
  //       if(response.status==200){
  //           $("#shipper_address").val(response.message);
  //       }
  //     }
  //   });
  // }
</script>
<script>
  $("#width ,#length ,#height").on('change keyup keydown', function () {

var width = $("#width").val();
var length = $("#length").val();
var height = $("#height").val();
var result = width * length * height;
result = result/100;
$("#unit_volume").val(result);

});
</script>
<script>
  $('#pieces').on('change', function(){
    var pieces = $(this).val();
    var weight = $('#unit_weight').val();
    var total_weight = pieces * weight;
    $('#total_weight').val(total_weight);

  });
</script>
<script>
  $('#pieces').on('change', function(){
    var pieces = $(this).val();
    var volume = $('#unit_volume').val();
    var total_volume = pieces * volume;
    $('#total_volume').val(total_volume);

  });
</script>