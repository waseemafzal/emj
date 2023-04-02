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
<li><a href="#tab_7" data-toggle="tab">Notes</a></li>
<li><a href="#tab_8" data-toggle="tab">Attachment</a></li>


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
                                    <?php if(isset($destination_agents)){
                          foreach($destination_agents as $agent){
                             $selected = '';
                             if(isset($row)){
                               if($row->destination_agent==$agent['name']){
                                  $selected = 'selected';
                               }}?>
                                            <option <?php echo $selected?> value='<?php echo $agent['name']?>'><?php echo $agent['name']?></option>          
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
<select name='shipper_name' class='form-control'>
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
       <textarea type='text' class='form-control' name='shipper_address'><?php if(isset($row)){echo $row->shipper_address;}?></textarea>
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
         <input type='text' name='origin' value='<?php if(isset($row)){echo $row->origin;}?>' class='form-control'>
    </div>
    <div class='col-md-6'>
      <label>Destination</label>
         <input type='text' name='destination' value='<?php if(isset($row)){echo $row->destination;}?>' class='form-control'>
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
     <textarea name='supplier_address' class='form-control'></textarea>
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
              if($row->carrier==$carrier["name"]){
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
    <input type='number' name='driver_license_number' class='form-control' value='<?php if(isset($row)){echo $row->driver_license_number;}?>'>
  </div></div>
  <br>
  <div class='row'>
  <div class='col-md-6'>
    <label>PRO Number:</label>
    <input type='number' name='pro_number' class='form-control' value='<?php if(isset($row)){echo $row->pro_number;}?>'>
  </div>
  <div class='col-md-6'>
    <label>Driver's Tracking Number:</label>
    <input type='number' name='driver_tracking_number' class='form-control' value='<?php if(isset($row)){echo $row->driver_tracking_number;}?>'>
  </div>
          </div>
            </div>

<div class="tab-pane" id="tab_5">
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
                                 <div class='form-group'>
                                   <div class='row'>
                                 <div  class="col-md-12">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description"  class="form-control"><?php if(isset($row)){$row->description;}?></textarea>
                                  </div>
                                  </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Package Type</label>
                                    <select name='package_type' class='form-control'>
                                        <?php 
                                        $extralarge='';
                                        $medium='';
                                        $large='';
                                        $letter='';
                                        if(isset($row)){
                                                   if($row->package_type=='extra large box'){
                                                      $extralarge='selected';
                                                      }
                                                      if($row->package_type=='large box'){
                                                      $large='selected';
                                                      }
                                                      if($row->package_type=='mediun box'){
                                                      $medium='selected';
                                                      }
                                                      if($row->package_type=='letter'){
                                                      $letter='selected';
                                                      }}?>
                                      <option selected value='Not Selected'>Choose Package Type</option>
                                    <option <?php echo $extralarge?> value='extra large box'>Extra Large Box</option>
                                    <option <?php echo $large?> value='large box'>Large Box</option>
                                    <option <?php echo $medium?> value='medium box'>Medium Box</option>
                                    <option <?php echo $letter?>value='letter'>Letter</option>
                                    </select>
                                    
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
                         
                                 <div class="form-group">
                                <div class="row"> 
                                
                                     
                                 </div></div> <div class="form-group">
                                <h3>Dimensions(LxWxH)</h3>
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-3">
                                    <label>Length</label>
                                    
                                    <input type="text" class="form-control" id="length" value='<?php if(isset($row)){$row->length;}?>' name="length">
                                    
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                    <label>Width</label>
                                    
                                    <input type="text" class="form-control" id="width" value='<?php if(isset($row)){$row->width;}?>' name="width">
                                    
                                        </div><div class="col-xs-12 col-md-3">
                                    <label>Height</label>
                                    
                                    <input type="text" class="form-control" id="height" value='<?php if(isset($row)){$row->height;}?>' name="height">
                                    
                                        </div><div class="col-xs-12 col-md-3">
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
                                          <td><input class='form-control' placeholder='0.00' type='number' name=''></td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name=''></td>
                                          <td><select class='form-control' name='weight_unit'><option value='lb'>lb</option></select></td>
                                        </tr>
                                        <tr>
                                          <td style='text-align:center'>Volume</td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name=''></td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name=''></td>
                                          <td><select class='form-control' name='volume_unit'><option value='ft3'>ft<sup>3</sup></option></select></td>
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
                                        <input type='number' value='<?php if(isset($row)){echo $row->quantity;}?>' class='form-control' name='quantity'>
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


<div class="tab-pane" id="tab_6">
<div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Status</label>
                                    
                                    <select class="form-control" id="charges_status" name="charges_status">
                                    <?php if(isset($charges)){
                                       foreach($charges as $charge){
                                        $selected='';
                                         if(isset($row)){
                                           if($row->charges_status==$charge['status']){
                                             $selected='selected';
                                             }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['status']?>'><?php echo $charge['status']?></option>
                                    <?php }}?>
                                    </select>
                                    
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
                                    
                                    <select class="form-control" id="prepaid" name="prepaid">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                         if($row->prepaid==$charge['prepaid']){
                                           $selected='selected';
                                           }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['prepaid']?>'><?php echo $charge['prepaid']?></option>
                                     <?php }?>
                                       </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Quantity</label>
                                    <select class="form-control" id="quantity" name="quantity">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                        if(isset($row)){
                                          if($row->quantity==$charge['quantity']){
                                          $selected='selected';
                                           }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['quantity']?>'><?php echo $charge['quantity']?></option>
                                     <?php }?>
                                       </select>
                                                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Price</label>
                                    <select class="form-control" id="price" name="price">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                         if($row->price==$charge['price']){
                                           $selected='selected';
                                           }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['price']?>'><?php echo $charge['price']?></option>
                                     <?php }?>
                                       </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Amount</label>
                                    <select class="form-control" id="amount" name="amount">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                         if($row->amount==$charge['amount']){
                                           $selected='selected';
                                           }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['amount']?>'><?php echo $charge['amount']?></option>
                                     <?php }?>
                                       </select>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Tax Code</label>
                                    <select class="form-control" id="tax_code" name="tax_code">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                        if($row->tax_code==$charge['tax_code']){
                                         $selected='selected';
                                         }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['tax_code']?>'><?php echo $charge['tax_code']?></option>
                                     <?php }?>
                                       </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Tax Rate</label>
                                    <select class="form-control" id="tax_rate" name="tax_rate">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                        if($row->tax_rate==$charge['tax_rate']){
                                          $selected='selected';
                                          }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['tax_rate']?>'><?php echo $charge['tax_rate']?></option>
                                     <?php }?>
                                       </select>
                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Tax Amount</label>
                                    <select class="form-control" id="tax_amount" name="tax_amount">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                        if($row->tax_amount==$charge['tax_amount']){
                                         $selected='selected';
                                         }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['tax_amount']?>'><?php echo $charge['tax_amount']?></option>
                                     <?php }?>
                                       </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Amount + Tax</label>
                                    <select class="form-control" id="amount_with_tax" name="amount_with_tax">
                                    <?php foreach($charges as $charge){
                                      $selected='selected';
                                       if(isset($row)){
                                           if($row->amount_with_tax==$charge['amount_with_tax']){
                                               $selected='selected';
                                     }
                                      }
                                      ?>
                                    <option <?php echo $selected?> value='<?php echo $charge['amount_with_tax']?>'><?php echo $charge['amount_with_tax']?></option>
                                     <?php }?>
                                       </select>
                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Currency</label>
                                    
                                    <select class="form-control" id="currency" name="currency">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                         if($row->currency==$charge['currency']){
                                           $selected='selected';
                                           }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['currency']?>'><?php echo $charge['currency']?></option>
                                     <?php }?>
                                       </select>
                                   
                                        </div>
                                          <div class="col-md-6">
                                    <label>Final Amount</label>
                                    <select class="form-control" id="final_amount" name="final_amount">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                        if($row->final_amount==$charge['final_amount']){
                                         $selected='selected';
                                         }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['final_amount']?>'><?php echo $charge['final_amount']?></option>
                                     <?php }?>
                                       </select>
                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Expense</label>
                                    
                                    <select class="form-control" id="expense" name="expense">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                         if($row->expense==$charge['expense']){
                                          $selected='selected';
                                          }}?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['expense']?>'><?php echo $charge['expense']?></option>
                                     <?php }?>
                                       </select>
                                   
                                        </div>
                                          <div class="col-md-6">
                                    <label>Income</label>
                                    <select class="form-control" id="income" name="income">
                                    <?php foreach($charges as $charge){
                                      $selected='';
                                       if(isset($row)){
                                           if($row->income==$charge['income']){
                                                $selected='selected';                                   
                                                }}
                                       ?>  
                                    <option <?php echo $selected?> value='<?php echo $charge['income']?>'><?php echo $charge['income']?></option>
                                     <?php }?>
                                       </select>
                                  </div>
                                 </div></div>
</div>
<div class="tab-pane" id="tab_7">
  <div class='row'>
  <div class='col-md-12' id='inputFormRow'>
            <h4>Notes</h4>
                <div class="notes">
                    <input style="width:50%"type="text" name="notes[]" autocomplete="off">
                        <button id="removeRow" type="button" class="btn btn-danger btn-sm">Remove</button>
                </div>

            <div id="newRow"></div>
            <button id="addRow" type="button" class="btn btn-info btn-sm">Add Row</button>
                                  </div> <br>
        
                                  </div></div>
                                  <div class="tab-pane" id="tab_8">
  <div class='row'>
    <div class='col-md-6'>
<label>Image</label>
 <?php if(isset($row)){
   if($row->file){
    echo '<img src="uploads/".$row->file height="70">';
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

    <!-- Scroll to Top Button-->
 <?php // commonjs() ?>
   
   
 

</body>

</html>

<script>
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
  $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="notes">';
            html += '<input type="text" name="notes[]" style="width:50%" autocomplete="off">&nbsp';
            html += '<button id="removeRow" type="button" class="btn btn-danger btn-sm">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
</script>