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
            <ul class="nav nav-pills justify-content-center" id="tabs1">
      <li class="nav-item"><a class="nav-link" href="#general">General</a></li>
      <li class="nav-item"><a class="nav-link"href="#shipper_consignee">Shipper/Consignee</a></li>
      <li class="nav-item"><a class="nav-link" href="#supplier">Supplier</a></li>
      <li class="nav-item"><a class="nav-link" href="#carrier">Carrier</a></li>
      <li class="nav-item"><a class="nav-link" href="#Commodities">Commodities</a></li>
      <li class="nav-item"><a class="nav-link" href="#charges">Charges</a></li>
      <li class="nav-item"><a class="nav-link" href="#attachments">Attachments</a></li>
     </ul>
   
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form id="form_add_update" name="form_add_update" role="form">
             <div class="alert hidden"></div>
                    <div class="form-group wrap_form">
            <div class="tab-content">
    <div class="tab-pane fade active show" id="general">       
         <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Warehouse Name</label>
                      <?php if(isset($general)){?>
                          
                          <input type='text' disabled name='warehouse_name' class='form-control' value='<?php echo $general[0]["warehouse_name"];?>'>
                                                      
                                    <?php }?>
                                        </div>
                                          <div  class="col-md-6">
                                          <label>Employ Name</label>
                      <?php if(isset($general)){?>
                          
                          <input type='text' disabled name='employ_name' class='form-control' value='<?php echo $general[0]["employ_name"];?>'>
                                                      
                                    <?php }?>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                 <label>Issued by</label>
                                    <input type="text" disabled name="issued_by" id="issued_by"  class="form-control" value= "<?php echo $general[0]['issued_by'];?>">
                                        </div>
                                          <div class="col-md-6">
                                          <label>Date</label>
                                    
                                    <input type="date" disabled class="form-control" id="date" name="date"  value= "<?php echo $general[0]['date'];?>">
                                
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                 <label>Time</label>
                                    <input type="time" name="time" id="time" disabled  class="form-control" value= "<?php echo $general[0]['time'];?>">
                                    
                                        </div>
                                          <div class="col-md-6">
                                          <label>Entry No</label>
                                    
                                    <input type="number" disabled class="form-control" id="entry_no" name="entry_no"  value= "<?php echo $general[0]['entry_no'];?>">
                                   
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                 <label>Transaction Number</label>
                                    
                                    <input type="number" disabled class="form-control" id="transaction_number" name="transaction_number"  value= "<?php echo $general[0]['transaction_number'];?>">
                                    
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
</div></div></div>
    <div class="tab-pane fade" id="shipper_consignee"> 
    <div class='col-md-6'>
    <div class='row'>
          <h3>Shipper</h3>
          <label>Shipper Name</label>
          <select name='shipper_name' class='form-control'>
          <?php if(isset($shipment)){
               foreach($shipment as $details){?>
          <option value="<?php echo $details['shipper_name']?>"><?php echo $details['shipper_name']?></option>  
          <?php }}?>
               </select>
                      </div>
               </div>
               <div class='col-md-6'>
               <div class='row'>
                <div class='col-md-10'>
            <h3>Consignee</h3>
            <label>Consignee Name</label>
          <select name='consignee_name' class='form-control'>
          <?php if(isset($shipment)){
               foreach($shipment as $details){?>
          <option value="<?php echo $details['consignee_name']?>"><?php echo $details['consignee_name']?></option>  
          <?php }}?>
               </select>
                      </div>
               </div>
               </div>
               <div class='row'>
                      <div class='col-md-6'>
            <label>Consignee Address</label>
          <select name='consignee_address' class='form-control'>
          <?php if(isset($shipment)){
               foreach($shipment as $details){?>
          <option value="<?php echo $details['consignee_address']?>"><?php echo $details['consignee_address']?></option>  
          <?php }}?>
               </select>
                      
               </div>
               </div>



                      </div>
  </div>    </div>
                                     
                                        <div class="clearfix">&nbsp;</div>
             <div class="col-xs-12 col-md-12">
                           <button type="submit" class="btn btn-info">Submit</button>
                      
                   </div>
           </div> 

                    
                    
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

<script>
  /**********************************save************************************/
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
  $("#tabs1 a").click(function(e){
     e.preventDefault();
     $(this).tab('show');
     $('#tabs1 a').tab('hide');
});
</script>