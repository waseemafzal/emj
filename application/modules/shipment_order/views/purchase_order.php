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
   	<div class="container">
<p style="color:purple;display: inline-block; ">Purchase Order</p>
<p style="color:purple; display: inline-block;float: right; margin-right: 80px">©Copyright delivery—app 2022.</p>
<div style="background-color: silver;width: 92%;height: 100px"></div>
  	<form method='post' action='<?php echo base_url()?>shipment_order/save_purchase_orders'>
	      <div class="form-gorup mb-3" style="margin-top: 10px">
	      	<div class="row">
	      	<label>Seller's Name:</label>
	      	<input type="text" name="seller_name" class="form-control" placeholder="Seller's Name" value="<?php if(isset($row)){echo $row->seller_name;}?>" style="border-radius: 25px;width:90%">
	      </div></div>
	     <div class="form-gorup mb-3" style="margin-top: 10px">
	     	<div class="row">
	      	<label>Contact Address:</label>
	      	<input type="text" name="contact_address" class="form-control" placeholder="Contact Address" value="<?php if(isset($row)){echo $row->contact_address;}?>" style="border-radius: 25px;width:90%">
	      </div></div></div>
	        <div class="form-group mb-3" style='margin-top: 10px'>
	      	<div class="row">
	      		<div class="col-md-6">
	      			<label>Phone no</label>
	      			  <input type="text" name="phone_no" class="form-control" placeholder="Phone" value="<?php if(isset($row)){echo $row->phone_no;}?>" style="border-radius: 25px ">
	      		</div>
	      
	      		<div class="col-md-6" style="margin-left: -15px">
	      			<label>Email</label>
	      			  <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if(isset($row)){echo $row->email;}?>" style="border-radius: 25px;">
	      </div>		
	  </div>
	 </div>
	  <div class="form-group mb-3">
	      	<div class="row">
	      		<div class="col-md-6">
	      			<label>Payment Terms</label>
	      			  <input type="text" name="payment_terms" class="form-control" placeholder="Payment Terms" value="<?php if(isset($row)){echo $row->payment_terms;}?>" style="border-radius: 25px ">
	      		</div>
	      
	      		<div class="col-md-6" style="margin-left: -15px">
	      			<label>Shop Via</label>
	      			  <input type="text" value="<?php if(isset($row)){echo $row->shop_via;}?>" name="shop_via" class="form-control" placeholder="Shop Via" style="border-radius: 25px;">
	      </div>		
	  </div>
	 </div>
	 <h1><b>Purchase Details:</b></h1>
	 <div class="form-gorup mb-3" style="margin-left: 15px;margin-top: 10px">
	      	<div class="row">
	      	<label>Receiver's Name:</label>
	      	<input type="text" name="receiver_name" class="form-control" placeholder="Receiver's Name" value="<?php if(isset($row)){echo $row->receiver_name;}?>" style="border-radius: 25px;width:97%">
	      </div></div>
	      <div class="form-gorup mb-3" style="margin-left: 15px;margin-top: 10px">
	      	<div class="row">
	      	<label>Receiver's Address:</label>
	      	<input type="text" name="receiver_address" class="form-control" placeholder="Receiver's Address" value="<?php if(isset($row)){echo $row->receiver_address;}?>" style="border-radius: 25px;width:97%">
	      </div></div>
	      <div class="form-group mb-3" style="margin-top: 10px">
	      	<div class="row">
	      		<div class="col-md-6">
	      			<label>Date:</label>
	      			  <input type="date" name="date" class="form-control" placeholder="" value="<?php if(isset($row)){echo $row->date;}?>"style="border-radius: 25px ">
	      		</div>
	      
	      		<div class="col-md-6">
	      			<label>Reference #</label>
	      			  <input type="text" name="reference_number" class="form-control" placeholder="Reference Number" value="<?php if(isset($row)){echo $row->reference_number;}?>" style="border-radius: 25px;width:97%">
	      </div>		
	  </div>
	 </div>
	 <div class="form-group mb-3">
	      	<div class="row">
	      		<div class="col-md-6">
	      			<label>Part Number</label>
	      			  <input type="text" name="part_number" class="form-control" placeholder="Part Number" value="<?php if(isset($row)){echo $row->part_number;}?>" style="border-radius: 25px ">
	      		</div>
	      
	      		<div class="col-md-6">
	      			<label>Quantity</label>
	      			  <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="<?php if(isset($row)){echo $row->quantity;}?>" style="border-radius: 25px;width: 97%">
	      </div>		
	  </div>
	 </div>
	 
	  <div class="form-gorup mb-3" style="margin-left: 15px"> 
	     	<div class="row">
	      	<label>Description:</label>
	      	<input type="text" name="description" class="form-control" placeholder="Description" value="<?php if(isset($row)){echo $row->description;}?>" style="border-radius: 25px;width: 97%">
	      	<input type="hidden" name="id" value="<?php if(isset($row)){echo $row->id;}?>">
	      </div></div>
	       <div class="form-gorup" style="margin-left: 15px;margin-top: 10px">
	     	<div class="row">
	      	<label>Additional Information:</label>
	      	<textarea type="text" name="additional_information" class="form-control" placeholder="Description" style="border-radius: 25px;width: 97%" rows="10" ><?php if(isset($row)){echo $row->additional_information;}?>
	      	</textarea>
	      </div></div><br>
	      <button  type="submit" style="border-radius: 20px;border: none;color:white;background-color: purple;padding: 3px 20px 3px 20px;text-align: center;display: inline-block;">Submit</button>&nbsp;&nbsp;&nbsp;<p style="display: inline-block;color: purple">By clicking <b>Submit,</b>you agree to our <b>User Agreement, Privacy Policy</b> and <b>Cookie Policy</b> </p>
	    </form>
	
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>