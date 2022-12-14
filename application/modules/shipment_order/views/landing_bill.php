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
<body>
	<div class="container">
<p style="color:purple;display: inline-block; ">Bill of Landing</p>
<p style="color:purple; display: inline-block;float: right;margin-right: 80px">©Copyright Bill of landing—app 2022.</p>
<div style="background-color: silver;width: 90%;height: 100px"></div>
  	<form method="post" id ="form_add_update" action="<?php echo base_url()?>shipment_order/save_landing_bill">
	      <div class="form-gorup mb-3" style="margin-top: 5px">
	      	<div class="row">
	      	<label>Exporter's Name:</label>
	      	<input type="text" name="exporter_name" class="form-control" placeholder="Exporter's Name" value="<?php if(isset($row)){echo $row->exporter_name;}?>" style="border-radius: 25px;width: 90%">
	      </div></div>
	     <div class="form-gorup mb-3" style="margin-top: 5px">
	     	<div class="row">
	      	<label>Exporter's Address:</label>
	      	<input type="text" name="exporter_address" class="form-control" placeholder="(Principal or seller license and address including Zip Code)" value="<?php if(isset($row)){echo $row->exporter_address;}?>" style="border-radius: 25px;width: 90%">
	      </div></div>
	       <div class="form-gorup mb-3" style="margin-top: 5px">
	      	<div class="row">
	      	<label>Consignet To:</label>
	      	<input type="text" name="consigned_to" class="form-control" placeholder="Name" value="<?php if(isset($row)){echo $row->consigned_to;}?>"style="border-radius: 25px;width: 90%">
	      </div></div>
	       <div class="form-gorup mb-3" style="margin-top: 5px">
	      	<div class="row">
	      	<label>Address:</label>
	      	<input type="text" name="address" class="form-control" placeholder="Address" value="<?php if(isset($row)){echo $row->address;}?>"style="border-radius: 25px;width: 90%">
	      </div></div>
	       <div class="form-gorup mb-3" style="margin-top: 5px">
	      	<div class="row">
	      	<label>Notify Party/Intermediate Consignee:</label>
	      	<input type="text" name="notify_party" class="form-control" placeholder="Name" value="<?php if(isset($row)){echo $row->notify_party;}?>"style="border-radius: 25px;width: 90%">
	      </div></div>
	       <div class="form-gorup mb-3" style="margin-top: 5px">
	      	<div class="row">
	      	<label>Address:</label>
	      	<input type="text" name="notify_party_address" class="form-control" placeholder="Address" value="<?php if(isset($row)){echo $row->notify_party_address;}?>" style="border-radius: 25px;width: 90%">
	      </div></div>
	       <div class="form-gorup mb-3" style="margin-top: 5px;margin-left:-15px">
	      	<div class="row">
	      		<div class="col-md-6">
	      	<label>Document Number:</label>
	      	<input type="text" name="document_number" class="form-control" placeholder="Document No" value="<?php if(isset($row)){echo $row->document_number;}?>" style="border-radius: 25px">
	      </div>
          	<div class="col-md-6">
	      	<label>B/L Number:</label>
	      	<input type="text" name="bl_number" class="form-control" placeholder="B/L No" value="<?php if(isset($row)){echo $row->bl_number;}?>" style="border-radius: 25px;width: 82%">
	      </div>
	  </div>
	</div>
	<div class="form-gorup mb-3" style="margin-top: 5px">
	      	<div class="row">
	      	<label>Forwording Agent:</label>
	      	<input type="text" name="forwording_agent" class="form-control" placeholder="Name-References" value="<?php if(isset($row)){echo $row->forwording_agent;}?>" style="border-radius: 25px;width: 90%">
	      </div></div>
	      <div class="form-gorup mb-3" style="margin-top: 5px">
	      	<div class="row">
	      	<label>Agent Address:</label>
	      	<input type="text" name="agent_address" class="form-control" placeholder="Address-References" value="<?php if(isset($row)){echo $row->agent_address;}?>" style="border-radius: 25px;width: 90%">
	      </div></div>
	      <div class="form-gorup mb-3" style="margin-top: 5px;margin-left: -15px">
	      	<div class="row">
	      		<div class="col-md-6">
	      	<label>Point (State) of origin or FTZ Number:</label>
	      	<input type="text" name="point_of_origin" class="form-control" placeholder="Point (State) of origin or FTZ Number" value="<?php if(isset($row)){echo $row->point_of_origin;}?>" style="border-radius: 25px">
	      </div>
          	<div class="col-md-6">
	      	<label>Loading Pier/ Terminal:</label>
	      	<input type="text" name="loading_pier" class="form-control" placeholder="Loading Pier/ Terminal" value="<?php if(isset($row)){echo $row->loading_pier;}?>" style="border-radius: 25px;width: 82%">
	      </div>
	  </div>
	</div>
	<div class="form-gorup mb-3" style="margin-top: 5px">
	      	<div class="row">
	      	<label>Domestic Routing/ Export Instructions:</label>
	      	<input type="text" name="domestic_routing" class="form-control" placeholder="Domestic Routing/ Export Instructions" value="<?php if(isset($row)){echo $row->domestic_routing;}?>" style="border-radius: 25px;width: 90%">
	      </div></div>
	      <div class="form-gorup mb-3" style="margin-top: 5px;margin-left: -15px">
	      	<div class="row">
	      		<div class="col-md-6">
	      	<label>Type of Move:</label>
	      	<input type="text" name="type_of_move" class="form-control" placeholder="Type of Move" value="<?php if(isset($row)){echo $row->type_of_move;}?>" style="border-radius: 25px">
	      </div>
          	<div class="col-md-6">
	      	<label>Containarized<br>(Vessel only)</label>
	      	
	      	Yes <input type="checkbox" name="containarized" <?php if(isset($row)){echo setChecked($row->containarized, 'yes');}?> value="yes">
	      	&nbsp;&nbsp;&nbsp;No <input type="checkbox" <?php if(isset($row)){echo setChecked($row->containarized, 'no');}?> name="containarized" placeholder="" value="no">
	      </div>
	  </div>
	</div>
	<div class="form-gorup mb-3" style="margin-top: 5px;margin-left:-15px">
	      	<div class="row">
	      		<div class="col-md-6">
	      	<label>Pre-Carriage by:</label>
	      	<input type="text" name="pre_carriage_by" class="form-control" placeholder="Pre-Carriage by"value="<?php if(isset($row)){echo $row->pre_carriage_by;}?>" style="border-radius: 25px">
	      </div>
          	<div class="col-md-6">
	      	<label>Exporting Carrier:</label>
	      	<input type="text" name="exporting_carrier" class="form-control" placeholder="Exporting Carrier" value="<?php if(isset($row)){echo $row->exporting_carrier;}?>" style="border-radius: 25px;width: 82%">
	      </div>
	  </div>
	</div>
	<div class="form-gorup mb-3" style="margin-top: 5px;margin-left:-15px"> 
	      	<div class="row">
	      		<div class="col-md-6">
	      	<label>Place of Receipt by Pre-Carrier:</label>
	      	<input type="text" name="place_of_receipt" class="form-control" placeholder="Place of Receipt by Pre-Carrier" value="<?php if(isset($row)){echo $row->place_of_receipt;}?>" style="border-radius: 25px">
	      </div>
          	<div class="col-md-6">
	      	<label>Foreign Port of Unloading:</label>
	      <input type="text" name="foreign_port" class="form-control" placeholder="Vessel and air only" value="<?php if(isset($row)){echo $row->foreign_port;}?>" style="border-radius: 25px;width: 82%">
	      </div>
	  </div>
	</div>
	<div class="form-gorup mb-3" style="margin-top: 5px;margin-left: -15px">
	      	<div class="row">
	      		<div class="col-md-6">
	      	<label>Port of Loading/Export:</label>
	      	<input type="text" name="port_of_loading" class="form-control" placeholder="Port of Loading/Export" value="<?php if(isset($row)){echo $row->port_of_loading;}?>" style="border-radius: 25px">
	      </div>
          	<div class="col-md-6">
	      	<label>Place of Delivery by on-Carrier:</label>
	      	<input type="text" name="place_of_delivery" class="form-control" placeholder="Place of Delivery by on-Carrier" value="<?php if(isset($row)){echo $row->place_of_delivery;}?>" style="border-radius: 25px;width: 82%">
	      </div>
	  </div>
	</div>
	<div class="form-gorup mb-3" style="margin-top: 5px;margin-left:-15px">
	      	<div class="row">
	      		<div class="col-md-6">
	      	<label>Marks and Numbers:</label>
	      	<input type="text" name="marks_and_numbers" class="form-control" placeholder="Marks and Numbers" value="<?php if(isset($row)){echo $row->marks_and_numbers;}?>" style="border-radius: 25px">
	      </div>
          	<div class="col-md-6">
	      	<label>Number of Package:</label>
	      	<input type="text" name="number_of_package" class="form-control" placeholder="Number of Package" value="<?php if(isset($row)){echo $row->number_of_package;}?>" style="border-radius: 25px;width: 82%">
	      </div>
	  </div>
	</div>
	<div class="form-gorup mb-3" style="margin-top: 5px;margin-left:-15px">
	      	<?php if(isset($row)){
	      		  
                $detail = json_decode($row->commodities);
         $count = count($detail['commodities']);
     for($i=0;$i<$count;$i++){
         $item = $detail['commodities'][$i];
	      	}
	      	?>
	      	<div class="row">
	      		<div class="col-md-6 mb-3">
	      	<label>Description of Commodities:</label>
	      	
	      	<input type="text" name="commodities[]" class="form-control" placeholder="" style="border-radius: 25px" value="<?php echo $item;?>">
	      	<?php
	      }
	      	else{?>
	      	<div class="row">
	      		<div class="col-md-6 mb-3">
	      	<label>Description of Commodities:</label>
	      	
	      	<input type="text" name="commodities[]" class="form-control" placeholder="" style="border-radius: 25px"><br>
	      	<input type="text" name="commodities[]" class="form-control" placeholder="" style="border-radius: 25px"><br>
        	<input type="text" name="commodities[]" class="form-control" placeholder="" style="border-radius: 25px"><br>
	      	<input type="text" name="commodities[]" class="form-control" placeholder="" style="border-radius: 25px">
	      </div>
          	<div class="col-md-3">
	      	<label>Gross Weight(kilos):</label>
	      	    <input type="text" name="gross_weight[]" class="form-control" placeholder="" style="border-radius: 25px"><br>
	      	  	<input type="text" name="gross_weight[]" class="form-control" placeholder="" style="border-radius: 25px"><br>
	      	  	<input type="text" name="gross_weight[]" class="form-control" placeholder="" style="border-radius: 25px"><br>
	      	   	<input type="text" name="gross_weight[]" class="form-control" placeholder="" style="border-radius: 25px">
	      </div>
	      <div class="col-md-3">
	      	<label>Measurement:</label>
	      	    <input type="text" name="measurement[]" class="form-control" placeholder="" style="border-radius: 25px;width: 70%"><br>
	      		<input type="text" name="measurement[]" class="form-control" placeholder="" style="border-radius: 25px;width: 70%"><br>
	      	    <input type="text" name="measurement[]" class="form-control" placeholder="" style="border-radius: 25px;width: 70%"><br>
	      	    <input type="text" name="measurement[]" class="form-control" placeholder="" style="border-radius: 25px;width: 70%">	
	      </div>
	  </div>
	</div><?php }?><br>
	<p>Carrier has a policy against payment, solicitation, or receipt of any rebate, directly or indirectly, which would be unlawful under the United 
States Shipping Act, 1984<br> as amended.</p>
<p><b>DECLARED VALUE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; READ CLAUSE 29 HEREOF CONCERNING EXTRA FREIGHT AND CARRIER S LIMITATION OF LIABILITY.
PLACE OF RECEIPT BY<br> PRE-CARRIER *
PORT OF LOADING/ EXPORT *
MARKS AND NUMBERS
DESCRIPTION OF COMMODITIES GROSS WEIGHT(Kilos) MEASUREMENT.</b></p>     
<div class="form-gorup mb-3" style="margin-left: -15px">
	<div class="row">
		<div class="col-md-6">
			<label>Description of Commodities:</label>
			<input type="text" name="commodity_description" class="form-control" placeholder="Subject to Correction" value="<?php if(isset($row)){echo $row->commodity_description;}?>" style='border-radius:25px'>
		</div>
		<div class="col-md-3">
			<label>Prepaid</label>
			<input type="text" name="prepaid" value="<?php if(isset($row)){echo $row->prepaid;}?>" class="form-control" style='border-radius:25px'>
		</div>
		<div class="col-md-3">
			<label>Collect</label>
			<input type="text" name="collect" class="form-control" style='border-radius:25px;width: 70%' value="<?php if(isset($row)){echo $row->collect;}?>">
		</div>
	</div>
</div>
<div class="form-group mb-3" style="margin-top: 5px;">
	<div class="row">
	
			<label>Dated By:</label>
	         <input type="text" name="date_by" class="form-control" style="border-radius:25px;width: 90%" value="<?php if(isset($row)){echo $row->date_by;}?>" placeholder="Agent for the Carrier">
	</div>
</div>
<div class="form-group mb-3" style="margin-top: 5px;margin-left: -15px">
	<div class="row">
		<div class="col-md-6">
			<label>Dated At</label>
			 <input type="text" name="dated_at" value="<?php if(isset($row)){echo $row->dated_at;}?>" class="form-control" placeholder="Dated At" style="border-radius:25px">
		</div>
		<div class="col-md-6">
			<label>Date:</label>
			<input type="date" name="date" value="<?php if(isset($row)){echo $row->date;}?>" class="form-control" style="border-radius: 25px;width: 82%">
		</div>
	</div>
</div>
<p>Received by the Carrier for shipment by ocean vessel between port of loading and port ofdischarge, and for arrangement or procurement 
pre-carriage from place of receipt<br> and on-carriage to place of delivery, where stated above, the goods as specified above in apparentgood 
order and condition unless otherwise stated. The goods to be <br>delivered at the abovementioned port of discharge or place of delivery, whichever is applicable, subject always to theexceptions, limitations, conditions and liberties set out<br> on the reverse side hereof, to which 
theShipper and / or Consignee agree to accepting this Bill of Lading.IN WITNESS WHEREOF three (3) original Bills of Lading have <br>been 
signed, not otherwisestated above, one of which being accomplished the others shall be void</p>
	      <button type="submit" style="border-radius: 20px;border: none;color:white;background-color: purple;padding: 3px 20px 3px 20px;text-align: center;display: inline-block;">Submit</button>&nbsp;&nbsp;&nbsp;<p style="display: inline-block;color: purple">By clicking <b>Submit,</b>you agree to our <b>User Agreement, Privacy Policy</b> and <b>Cookie Policy</b> </p>
	    </form>
	
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
<script>
 $('#form_add_update').on("submit",function(e) {
         e.preventDefault();    
         var formData = new FormData();
          var other_data = $('#form_add_update').serializeArray();
        $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
        });
    // ajax start
            $.ajax({
            type: "POST",
            url: "<?php echo base_url().$controller.'/save_landing_bill'; ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
         
            success: function(data) {
            //alert(data.status);
            //var obj = jQuery.parseJSON(data);
         if(data.status==1){
          window.location.href='<?php echo base_url()?>/view_landing_bill';
         }
            
           }
     });

    //ajax end    
    });
 
  /******************************/
  </script>