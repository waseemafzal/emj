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
                                <!--Body-->
                                <div class="row">
<div class="col-md-12">

<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab_1" data-toggle="tab">General</a></li>
<li><a href="#tab_2" data-toggle="tab">Shipper</a></li>
<li><a href="#tab_3" data-toggle="tab">Consignee</a></li>
<li><a href="#tab_4" data-toggle="tab">Supplier</a></li>
<li><a href="#tab_5" data-toggle="tab">Carriers</a></li>
<li><a href="#tab_6" data-toggle="tab">POD</a></li>
<li><a href="#tab_7" data-toggle="tab">Notes</a></li>
<li><a href="#tab_8" data-toggle="tab">Attachment</a></li>


<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
                                <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Number</label>
                                    
                                    <input type="number" class="form-control" id="number" name="number"  value= "<?php if(isset($row)){echo $row->number;}?>">
                                    
                                        </div>
                                    
                                 </div></div>
                                <div class="form-group">
                                <div class="row"> 
                                <div  class="col-md-6">
                                    <label>Creation Date</label>
                                    <input type="date" name="creation_date" id="creation_date"  class="form-control" value='<?php if(isset($row)){echo $row->creation_date;}?>'>
                                  </div>
                                  <div class='col-md-6'>
                                    <label>Time:</label>
                                     <input type='time' name='creation_time' class='form-control' value='<?php if(isset($row)){echo $row->creation_time;}?>'>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                <div  class="col-md-6">
                                    <label>Pick-up Date</label>
                                    <input type="date" name="pickup_date" id="pickup_date"  class="form-control" value='<?php if(isset($row)){echo $row->pickup_date;}?>'>
                                  </div>
                                  <div class='col-md-6'>
                                    <label>Time:</label>
                                     <input type='time' name='pickup_time' class='form-control' value='<?php if(isset($row)){echo $row->pickup_time;}?>'>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                <div  class="col-md-6">
                                    <label>Delivery Date</label>
                                    <input type="date" name="delivery_date" id="delivery_date"  class="form-control" value='<?php if(isset($row)){echo $row->delivery_date;}?>'>
                                  </div>
                                  <div class='col-md-6'>
                                    <label>Time:</label>
                                     <input type='time' name='delivery_time' class='form-control' value='<?php if(isset($row)){echo $row->delivery_time;}?>'>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Employ</label>
                                       <input type='text' name='employee_name' class='form-control' value='<?php if(isset($row)){echo $row->employee_name;}?>'>
                               </div>
                                    </div></div>
                                 <div class='form-group'>
                                  <div class='row'>     
                                  <div class="col-xs-12 col-md-6">
                                    
                                    <label>Issued By</label>
                                    <input type="text" name="issued_by" id="issued_by" class="form-control" value= "<?php if(isset($row)){echo $row->issued_by;}?>">
                                    <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
                                    </div>
                                 </div></div>
                                 <div class='form-group'>
                                  <div class='row'>     
                                  <div class="col-xs-12 col-md-6">
                                    
                                    <label>Destination Agent</label>
                                    <input type="text" name="destination_agent" id="destination_agent"class="form-control" value= "<?php if(isset($row)){echo $row->destination_agent;}?>">
                                    </div>
                                 </div></div>
                              
</div>
    <div class='tab-pane' id='tab_2'>
                       <div class='form-group'>
                           <div class='row'>
                             <div class='col-md-6'>
                              <h3>Shipper</h3>
                             <label>Name</label>    
                             <input type='text' name='shipper_name' class='form-control' value='<?php if(isset($row)){echo $row->shipper_name;}?>'>       
                            </div>
                            <div class='col-md-6'>
                              <h3>Pickup Location</h3>
                             <label>Name</label>    
                             <input type='text' name='pickup_location_name' class='form-control' value='<?php if(isset($row)){echo $row->pickup_location_name;}?>'>       
                            </div>
                                    </div></div>
                                    <div class='form-group'>
                           <div class='row'>
                             <div class='col-md-6'>
                             <label>Address</label>    
                             <textarea name='shipper_address' class='form-control'> <?php if(isset($row)){echo $row->shipper_address;}?></textarea>      
                            </div>
                            <div class='col-md-6'>
                             <label>Address</label>    
                             <textarea name='pickup_location_address' class='form-control'><?php if(isset($row)){echo $row->pickup_location_address;}?></textarea>       
                            </div>
                                    </div></div>
                                    </div>
            <div class='tab-pane' id='tab_3'>
            <div class='form-group'>
                           <div class='row'>
                             <div class='col-md-6'>
                              <h3>Consignee</h3>
                             <label>Name</label>    
                             <input type='text' name='consignee_name' class='form-control' value='<?php if(isset($row)){echo $row->consignee_name;}?>'>       
                            </div>
                            <div class='col-md-6'>
                              <h3>Delivery Location</h3>
                             <label>Name</label>    
                             <input type='text' name='delivery_location_name' class='form-control' value='<?php if(isset($row)){echo $row->delivery_location_name;}?>'>       
                            </div>
                                    </div></div>
                                    <div class='form-group'>
                           <div class='row'>
                             <div class='col-md-6'>
                             <label>Address</label>    
                             <textarea name='consignee_address' class='form-control'> <?php if(isset($row)){echo $row->consignee_address;}?></textarea>      
                            </div>
                            <div class='col-md-6'>
                             <label>Address</label>    
                             <textarea name='delivery_location_address' class='form-control'><?php if(isset($row)){echo $row->delivery_location_address;}?></textarea>       
                            </div>
                                    </div></div>
            </div>
            <div class='tab-pane' id='tab_4'>
              <div class='form-group'>
                <div class='row'>
                  <div class='col-md-6'>
                    <h3>Supplier</h3>
                    </div></div></div>
                    <div class='form-group'>
                      <div class='row'>
                        <div class='col-md-6'>
                    <label>Name</label>
                      <input type='text' name='supplier_name' class='form-control' id='supplier_name' value='<?php if(isset($row)){echo $row->supplier_name;}?>'>
                  </div>
                  <div class='col-md-6'>
                    <label>Invoice Number</label>
                      <input type='number' name='supplier_invoice_number' class='form-control' value='<?php if(isset($row)){echo $row->supplier_invoice_number;}?>'>
                  </div></div></div>
                  <div class='form-group'>
                <div class='row'>
                  <div class='col-md-6'>
                    <label>Address</label>
                      <textarea type='text' name='supplier_address' class='form-control' id='supplier_address'><?php if(isset($row)){echo $row->supplier_address;}?></textarea>
                  </div>
                  <div class='col-md-6'>
                    <label>Purchase Order Number</label>
                      <input type='number' name='supplier_purchase_order_number' class='form-control' value='<?php if(isset($row)){echo $row->supplier_purchase_order_number;}?>'>
                  </div></div></div>
</div>
<div class='tab-pane' id='tab_5'>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-6'>
      <h3>Inland Carrier</h3>
    </div>
    <div class='col-md-6'>
      <h3>Main Carrier</h3>
    </div>
  </div>
</div>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-6'>
      <label>Carrier</label>
       <input type='text' name='inland_carrier' class='form-control' value='<?php if(isset($row)){echo $row->inland_carrier;}?>'>
    </div>
    <div class='col-md-6'>
      <label>Carrier</label>
       <input type='text' name='main_carrier' class='form-control' value='<?php if(isset($row)){echo $row->main_carrier;}?>'>
    </div>
  </div>
</div>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-6'>
      <label>Mode of Transportation</label>
        <input type='text' name='mode_of_transport' class='form-control' value='<?php if(isset($row)){echo $row->mode_of_transport;}?>'>
    </div>
    <div class='col-md-6'>
      <label>Return Address</label>
        <textarea name='return_address' class='form-control'><?php if(isset($row)){echo $row->return_address;}?></textarea>
    </div>
  </div>
</div>
<div class='form-group'>
  <div class='row'>
  <div class='col-md-6'>
      <label>PRO Number</label>
        <input type='number' name='pro_number' class='form-control' value='<?php if(isset($row)){echo $row->pro_number;}?>'>
    </div>
  </div>
</div>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-6'>
      <label>Driver's Name</label>
        <input type='text' name='driver_name' class='form-control' value='<?php if(isset($row)){echo $row->driver_name;}?>'>
    </div>
    <div class='col-md-6'>
      <label>Booking Number</label>
        <input type='number' name='booking_number' class='form-control' value='<?php if(isset($row)){echo $row->booking_number;}?>'>
    </div>
  </div>
</div>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-6'>
      <label>Driver's License Number</label>
        <input type='number' name='driver_license_number' class='form-control' value='<?php if(isset($row)){echo $row->driver_license_number;}?>'>
    </div>
    <div class='col-md-6'>
      <label>Preferred Mode of Transport</label>
        <input type='text' name='prefrred_mode_of_transport' class='form-control' value='<?php if(isset($row)){echo $row->prefrred_mode_of_transport;}?>'>
    </div>
  </div>
</div>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-6'>
      <label>Tracking Number</label>
        <input type='number' name='tracking_number' class='form-control' value='<?php if(isset($row)){echo $row->tracking_number;}?>'>
    </div>
  </div>
</div>
</div>
<div class='tab-pane' id='tab_6'>
  <div class='form-group'>
    <div class='row'>
      <div class='col-md-3'>
        <label>Delivery Date</label>
          <input type='date' class='form-control' name='pod_delivery_date' value='<?php if(isset($row)){echo $row->pod_delivery_date;}?>'>
      </div>
      <div class='col-md-3'>
        <label>Delivery Time</label>
          <input type='time' class='form-control' name='pod_delivery_time' value='<?php if(isset($row)){echo $row->pod_delivery_time;}?>'>
      </div>
    </div>
  </div>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-6'>
      <label>Received By</label>
        <input type='text' name=received_by' class='form-control' value='<?php if(isset($row)){echo $row->received_by;}?>'>
    </div>
  </div>
</div>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-12'>
    <label>Comments</label>
      <textarea name='comments' class='form-control'><?php if(isset($row)){echo $row->comments;}?></textarea>
  </div>
</div>
</div>
<div class='form-group'>
  <div class='row'>
    <div class='col-md-12'>
    <label>Internal Comments</label>
      <textarea name='internal_comments' class='form-control'><?php if(isset($row)){echo $row->internal_comments;}?></textarea>
  </div>
</div>
</div>
</div>
<div class='tab-pane' id='tab_7'>
  <div class='form-group'>
    <div class='row'>
      <div class='col-md-12'>
      <label>Notes</label>
        <input type='text' name='notes' class='form-control' value='<?php if(isset($row)){echo $row->notes;}?>'>
    </div>
</div>
  </div>
</div>
<div class='tab-pane' id='tab_8'>
  <div class='form-group'>
    <div class='row'>
      <div class='col-md-6'>
        <label>Image</label>
          <input type='file' name='image' class='form-control'>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-md-12">
                           <button type="submit" class="btn btn-info">Submit</button>
                      
                   </div>
</div>             
                </div>
              </div>
            </div>
            </form>

           </div> 
                                    </div></div></div>              
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
    var pieces = $('#pieces').val();
    var unit_weight = $('#unit_weight').val();
    $('#pieces').on('change', function(){
      var multiple = pieces*unit_weight;
      $('#total_weight').val(multiple);
    });
  </script>