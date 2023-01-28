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
<li><a href="#tab_6" data-toggle="tab">Container</a></li>
<li><a href="#tab_7" data-toggle="tab">Charges</a></li>
<li><a href="#tab_8" data-toggle="tab">Attachment</a></li>

<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
<div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Warehouse Name</label>
                                    <select name='warehouse_name' class='form-control'>
                                    <?php if(isset($general)){
                          foreach($general as $warehouse){?>
                                            <option value='<?php echo $warehouse['warehouse_name']?>'><?php echo $warehouse['warehouse_name']?></option>          
                                    <?php }}?>
                      </select>
                                        </div>
                                          <div  class="col-md-6">
                                          <label>Employ Name</label>
                                          <select name='employ_name' class='form-control'>
                                    <?php if(isset($general)){
                          foreach($general as $warehouse){?>
                                            <option value='<?php echo $warehouse['employ_name']?>'><?php echo $warehouse['employ_name']?></option>          
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
                          foreach($general as $warehouse){?>
                                            <option value='<?php echo $warehouse['issued_by']?>'><?php echo $warehouse['issued_by']?></option>          
                                    <?php }}?>
                      </select>
                                        </div>
                                          <div class="col-md-6">
                                          <label>Date</label>
                                          <select name='date' class='form-control'>
                                    <?php if(isset($general)){
                          foreach($general as $warehouse){?>
                                            <option value='<?php echo $warehouse['date']?>'><?php echo $warehouse['date']?></option>          
                                    <?php }}?>
                      </select> 
                                
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                 <label>Time</label>
                                 <select name='time' class='form-control'>
                                    <?php if(isset($general)){
                          foreach($general as $warehouse){?>
                                            <option value='<?php echo $warehouse['time']?>'><?php echo $warehouse['time']?></option>          
                                    <?php }}?>
                      </select>  
                                        </div>
                                          <div class="col-md-6">
                                          <label>Entry No</label>
                                          <select name='entry_no' class='form-control'>
                                    <?php if(isset($general)){
                          foreach($general as $warehouse){?>
                                            <option value='<?php echo $warehouse['entry_no']?>'><?php echo $warehouse['entry_no']?></option>          
                                    <?php }}?>
                      </select>
                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                 <label>Transaction Number</label>
                                 <select name='transaction_number' class='form-control'>
                                    <?php if(isset($general)){
                          foreach($general as $warehouse){?>
                                            <option value='<?php echo $warehouse['transaction_number']?>'><?php echo $warehouse['transaction_number']?></option>          
                                    <?php }}?>
                      </select>
                                    
                                        </div>
                                        <div class="col-md-6">
                                          <label>Division</label>
                                    
                                    <input type="text" class="form-control" id="division" name="division">
                                   
                                  </div>
                      </div>                      </div>
<div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                 <label>Bonded Warehouse</label>
                                    
                                    <input type="text" class="form-control" id="bonded_warehouse" name="bonded_warehouse">
                                    
                                        </div>
                                        <div class="col-md-6">
                                          <label>Destination Agent</label>
                                    
                                    <input type="text" class="form-control" id="destination_agent" name="destination_agent">
                                   
                                  </div>
</div></div>
</div>

<div class="tab-pane" id="tab_2">
<div class='row'>
  <div class='col-md-6'>
<h3>Shipper</h3>
<label>Shipper Name</label>
<select name='shipper_name' class='form-control'>
  <?php if(isset($shipment)){
    foreach($shipment as $detail){?>
<option value='<?php echo $detail['shipper_name'];?>'><?php echo $detail['shipper_name'];?>
                      </option>
                      <?php }}?>
                      </select>
                    </div>
                    <div class='col-md-6'>
<h3>Consignee</h3>
<label>Consignee Name</label>
<select name='consignee_name' class='form-control'>
  <?php if(isset($shipment)){
    foreach($shipment as $detail){?>
<option value='<?php echo $detail['consignee_name'];?>'><?php echo $detail['consignee_name'];?>
                      </option>
                      <?php }}?>
                      </select>
                    </div>
    <div class='col-md-6'>
      <label>Address</label>
       <textarea type='text' class='form-control' name='shipper_address'></textarea>
    </div>
    <div class='col-md-6'>
      <label>Address</label>
       <textarea type='text' class='form-control' name='consignee_address'></textarea>
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
      <label>Model of Transp</label>
        <input type='text' name='model_of_transp' class='form-control'>
    </div>
    <div class='col-md-6'>
    <label></label>
      <input type='text' class='form-control'>
    </div>
    </div>
    <div class='row'>
    <div class='col-md-6'>
      <label>Origin</label>
         <input type='text' name='origin' class='form-control'>
    </div>
    <div class='col-md-6'>
      <label>Destination</label>
         <input type='text' name='destination' class='form-control'>
    </div>
    </div></div>
<div class="tab-pane" id="tab_3">
   <div class='row'>
    <div class='col-md-6'>
      <h3>Suppliers</h3>
      <label>Name</label>
        <select name='supplier_name' class='form-control'>
          <?php if(isset($suppliers)){
            foreach($suppliers as $supplier){?>
              <option value='<?php echo $supplier["supplier_name"];?>'><?php echo $supplier["supplier_name"];?></option>
              <?php }}?>
        </select>
    </div>
    <div class='col-md-6'>
      <br><br><br>
      <label>Invoice Number</label>
      <select name='invoice_number' class='form-control'>
          <?php if(isset($suppliers)){
            foreach($suppliers as $supplier){?>
              <option value='<?php echo $supplier["invoice_number"];?>'><?php echo $supplier["invoice_number"];?></option>
              <?php }}?>
        </select>
   </div>
   <div class='col-md-6'>
    <label>Address</label>
     <textarea name='supplier_address' class='form-control'></textarea>
   </div>
   <div class='col-md-6'>
    <label>Purchase Order Number</label>
    <select name='purchase_order_number' class='form-control'>
          <?php if(isset($suppliers)){
            foreach($suppliers as $supplier){?>
              <option value='<?php echo $supplier["purchase_order_number"];?>'><?php echo $supplier["purchase_order_number"];?></option>
              <?php }}?>
        </select>
   </div>
            </div>
</div>
<div class="tab-pane" id="tab_4">
<div class='row'>
  <div class='col-md-6'>
  <h3>Carrier</h3>
  <label>Carrier</label>
     <input type='text' name='carrier' class='form-control'>
  </div></div><br>
  <div class='row'>
  <div class='col-md-6'>
    <label>Driver's Name:</label>
    <select name='driver_name' class='form-control'>
      <?php if(isset($drivers)){
          foreach($drivers as $driver){?>
          <option value='<?php echo $driver['driver_name']?>'><?php echo $driver['driver_name']?></option>
          <?php }}?>
          </select>
  </div>
  <div class='col-md-6'>
    <label>Driver's License Number:</label>
    <select name='driver_license_number' class='form-control'>
      <?php if(isset($drivers)){
          foreach($drivers as $driver){?>
          <option value='<?php echo $driver['driver_license_number']?>'><?php echo $driver['driver_license_number']?></option>
          <?php }}?>
              </select>
  </div></div>
  <br>
  <div class='row'>
  <div class='col-md-6'>
    <label>PRO Number:</label>
    <select name='pro_number' class='form-control'>
      <?php if(isset($drivers)){
          foreach($drivers as $driver){?>
          <option value='<?php echo $driver['pro_number']?>'><?php echo $driver['pro_number']?></option>
          <?php }}?>
          </select>
  </div>
  <div class='col-md-6'>
    <label>Tracking Number:</label>
    <select name='tracking_number' class='form-control'>
      <?php if(isset($drivers)){
          foreach($drivers as $driver){?>
          <option value='<?php echo $driver['tracking_number']?>'><?php echo $driver['tracking_number']?></option>
          <?php }}?>
              </select>
  </div>
          </div>
            </div>

<div class="tab-pane" id="tab_5">
<div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Status</label>
                                    
                                    <input type="text" class="form-control" id="status" name="status">
                                    
                                        </div>
                                          <div  class="col-md-6">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description"  class="form-control"></textarea>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Package Type</label>
                                    <select name='package_type' class='form-control'>
                                      <option selected value='Not Selected'>Choose Package Type</option>
                                    <option value='extra large box'>Extra Large Box</option>
                                    <option value='large box'>Large Box</option>
                                    <option value='medium box'>Medium Box</option>
                                    <option value='letter'>Letter</option>
                                    </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Pieces</label>
                                    <input type="number" name="pieces" id="pieces"  class="form-control">
                                
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Part Number</label>
                                    
                                    <input type="text" class="form-control" id="part_number" name="part_number">
                                    
                                        </div>
                                          <div  class="col-md-6">
                                    <label>Model</label>
                                    <input type="text" name="model" id="model"  class="form-control">
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Location</label>
                                    
                                    <input type="text" class="form-control" id="location" name="location">
                                    
                                        </div>
                                     
                                 </div></div> <div class="form-group">
                                <h3>Dimensions(LxWxH)</h3>
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-3">
                                    <label>Length</label>
                                    
                                    <input type="text" class="form-control" id="length" name="length">
                                    
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                    <label>Width</label>
                                    
                                    <input type="text" class="form-control" id="width" name="width">
                                    
                                        </div><div class="col-xs-12 col-md-3">
                                    <label>Height</label>
                                    
                                    <input type="text" class="form-control" id="height" name="height">
                                    
                                        </div><div class="col-xs-12 col-md-3">
                                          <label>Unit</label>
                                    <select name='dimension_unit' class='form-control'>
                                      <option value='Not Selected'>Choose Unit</option>
                                      <option value='inches'>Inches</option>
                                      <option value='cm'>cm</option>
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
                                        <input type='number' class='form-control' name='quantity'>
</div>
                                    <div class='col-sm-3'>
                                      <label>Unit</label>
                                        <input type='number' class='form-control' name='unit'>
                  </div>
                                    <div class='col-sm-3'>
                                      <label>Unitary Value</label>
                                        <input type='number' class='form-control' name='unitary_value'>
</div>
                                    <div class='col-sm-3'>
                                      <label>Total Value</label>
                                        <input type='number' class='form-control' name='total_value'>
</div>
          </div>          </div></div>

<div class="tab-pane" id="tab_6">
<div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Container Type</label>
                                    <select class="form-control" id="container_type" name="container_type">
                                    <?php if(isset($containers)){
                                       foreach($containers as $container){?>
                                    <option value='<?php echo $container['container_type']?>'><?php echo $container['container_type']?></option>
                                    <?php }}?>
                                       </select>     
                                  </div>
                                          <div  class="col-md-6">
                                    <label>Description</label>
                                    <textarea type="text" name="container_description" id="container_description"  class="form-control"></textarea>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Number</label>
                                    
                                    <select class="form-control" id="container_number" name="container_number">
                                       <?php foreach($containers as $container){?>
                                     <option value='<?php echo $container['number']?>'><?php echo $container['number']?></option>
                                    <?php }?>   
                                    </select>
                                        </div>
                                          <div class="col-md-6">
                                    <label>Serial Number 1</label>
                                    <select class="form-control" id="serial_number_1" name="serial_number_1">
                                       <?php foreach($containers as $container){?>
                                     <option value='<?php echo $container['serial_number_1']?>'><?php echo $container['serial_number_1']?></option>
                                    <?php }?>   
                                    </select>
                                
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Serial Number 2</label>
                                    <select class="form-control" id="serial_number_2" name="serial_number_2">
                                       <?php foreach($containers as $container){?>
                                     <option value='<?php echo $container['serial_number_2']?>'><?php echo $container['serial_number_2']?></option>
                                    <?php }?>   
                                    </select>                                 
                                        </div>
                                          <div class="col-md-6">
                                    <label>Location</label>
                                    <select class="form-control" id="container_location" name="container_location">
                                       <?php foreach($containers as $container){?>
                                     <option value='<?php echo $container['location']?>'><?php echo $container['location']?></option>
                                    <?php }?>   
                                    </select>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                 <h4>Dimensions</h4>

                                <div class="row"> 
                                 <div class="col-xs-12 col-md-4">
                                    <label>Length</label>
                                    <select class="form-control" id="container_length" name="container_length">
                                       <?php foreach($containers as $container){?>
                                     <option value='<?php echo $container['length']?>'><?php echo $container['length']?></option>
                                    <?php }?>   
                                    </select>
                                    
                                        </div>
                                          <div class="col-md-4">
                                    <label>Weight</label>
                                    <select class="form-control" id="container_weight" name="container_weight">
                                       <?php foreach($containers as $container){?>
                                     <option value='<?php echo $container['weight']?>'><?php echo $container['weight']?></option>
                                    <?php }?>   
                                    </select>

                                  </div>
                                  <div class="col-md-4">
                                    <label>Width</label>
                                    <select class="form-control" id="container_width" name="container_width">
                                       <?php foreach($containers as $container){?>
                                     <option value='<?php echo $container['width']?>'><?php echo $container['width']?></option>
                                    <?php }?>   
                                    </select>

                                  </div>
</div></div>
                          <div class='form-group'>
                            <div class='row'>
                                  <div class="col-md-4">
                                    <label>Height</label>
                                    <select class="form-control" id="container_height" name="container_height">
                                       <?php foreach($containers as $container){?>
                                     <option value='<?php echo $container['height']?>'><?php echo $container['height']?></option>
                                    <?php }?>   
                                    </select>

                                  </div>
                                  <div class="col-md-4">
                                    <label>Volume</label>
                                    <select class="form-control" id="container_volume" name="container_volume">
                                       <?php foreach($containers as $container){?>
                                     <option value='<?php echo $container['volume']?>'><?php echo $container['volume']?></option>
                                    <?php }?>   
                                    </select>

                                  </div>
                                 </div></div>
</div>
<div class="tab-pane" id="tab_7">
<div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Status</label>
                                    
                                    <select class="form-control" id="charges_status" name="charges_status">
                                    <?php if(isset($charges)){
                                       foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['status']?>'><?php echo $charge['status']?></option>
                                    <?php }}?>
                                    </select>
                                    
                                        </div>
                                          <div  class="col-md-6">
                                    <label>Description</label>
                                    <textarea type="text" name="charges_description" id="charges_description"  class="form-control"></textarea>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Prepaid</label>
                                    
                                    <select class="form-control" id="prepaid" name="prepaid">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['prepaid']?>'><?php echo $charge['prepaid']?></option>
                                     <?php }?>
                                       </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Quantity</label>
                                    <select class="form-control" id="quantity" name="quantity">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['quantity']?>'><?php echo $charge['quantity']?></option>
                                     <?php }?>
                                       </select>
                                                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Price</label>
                                    <select class="form-control" id="price" name="price">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['price']?>'><?php echo $charge['price']?></option>
                                     <?php }?>
                                       </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Amount</label>
                                    <select class="form-control" id="amount" name="amount">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['amount']?>'><?php echo $charge['amount']?></option>
                                     <?php }?>
                                       </select>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Tax Code</label>
                                    <select class="form-control" id="tax_code" name="tax_code">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['tax_code']?>'><?php echo $charge['tax_code']?></option>
                                     <?php }?>
                                       </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Tax Rate</label>
                                    <select class="form-control" id="tax_rate" name="tax_rate">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['tax_rate']?>'><?php echo $charge['tax_rate']?></option>
                                     <?php }?>
                                       </select>
                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Tax Amount</label>
                                    <select class="form-control" id="tax_amount" name="tax_amount">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['tax_amount']?>'><?php echo $charge['tax_amount']?></option>
                                     <?php }?>
                                       </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Amount + Tax</label>
                                    <select class="form-control" id="amount_with_tax" name="amount_with_tax">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['amount_with_tax']?>'><?php echo $charge['amount_with_tax']?></option>
                                     <?php }?>
                                       </select>
                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Currency</label>
                                    
                                    <select class="form-control" id="currency" name="currency">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['currency']?>'><?php echo $charge['currency']?></option>
                                     <?php }?>
                                       </select>
                                   
                                        </div>
                                          <div class="col-md-6">
                                    <label>Final Amount</label>
                                    <select class="form-control" id="final_amount" name="final_amount">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['final_amount']?>'><?php echo $charge['final_amount']?></option>
                                     <?php }?>
                                       </select>
                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Expense</label>
                                    
                                    <select class="form-control" id="expense" name="expense">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['expense']?>'><?php echo $charge['expense']?></option>
                                     <?php }?>
                                       </select>
                                   
                                        </div>
                                          <div class="col-md-6">
                                    <label>Income</label>
                                    <select class="form-control" id="income" name="income">
                                    <?php foreach($charges as $charge){?>  
                                    <option value='<?php echo $charge['income']?>'><?php echo $charge['income']?></option>
                                     <?php }?>
                                       </select>
                                  </div>
                                 </div></div>
</div>
<div class="tab-pane" id="tab_8">
  <div class='row'>
    <div class='col-md-6'>
<label>Image</label>
<input type='file' class='form-control' name='file' id='file'>
                                    </div>
                                  </div> <br>
        <div class='row'>
            <div class="col-md-6">
              <input type='hidden' name='id'>
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
