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
                                <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Name</label>
                                    
                                    <input type="text" class="form-control" id="name" name="name"  value= "<?php if(isset($row)){echo $row->name;}?>">
                                    
                                        </div>
                                          <div  class="col-md-6">
                                    <label>Phone</label>
                                    <input type="number" name="phone" id="phone"  class="form-control" value='<?php if(isset($row)){echo $row->phone;}?>'>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Mobile</label>
                                    
                                    <input type="number" class="form-control" id="mobile" name="mobile"  value= "<?php if(isset($row)){echo $row->mobile;}?>">
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>Email</label>
                                       <input type="email" class="form-control" id="email" name="email"  value= "<?php if(isset($row)){echo $row->email;}?>">                                   
                                        </div>
</div></div>
                              <div class="form-group">
                                 <div class="row"> 
                                    <div class="col-xs-12 col-md-6">
                                    <label>Fax</label>
                                    
                                    <input type="text" class="form-control" id="fax" name="fax"  value= "<?php if(isset($row)){echo $row->fax;}?>">
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>Website</label>
                                       <input type="url" class="form-control" id="website" name="website"  value= "<?php if(isset($row)){echo $row->website;}?>">                                   
                                        </div>
</div></div>
                                  <div class='form-group'>
                                    <div class='row'>
                                        <div class="col-xs-12 col-md-6">
                                          <label>Entity Id</label>
                                             <input type='number' name='entity_id' class='form-control' value='<?php if(isset($row)){echo $row->entity_id;} ?>'>
                                        </div>
                                   <div class='col-md-6'>
                                        <label>Carrier Type</label>
                                    
                                    <select name="carrier_type" class="form-control">
                                    <option value=''>Choose Carrier</option>
                                    <?php $air='';
                                          $ocean='';
                                          $land='';
                                    if(isset($row)){
                                      switch($row->carrier_type){
                                        case "air": $air='selected';
                                        break;
                                        case "ocean": $ocean='selected';
                                        break;
                                        case "land": $land = 'selected';
                                        break;
                                      }}
                                      ?>
                                      <option <?php echo $air?> value='air'>Air</option>
                                      <option <?php echo $ocean?> value='ocean'>Ocean</option>
                                      <option <?php echo $land?> value='land'>Land</option>
</select>
                                    <input type='hidden' name='id' value='<?php if(isset($row)){echo $row->id;}?>'>
                                        </div>
                                 </div></div>
                                 <div class="form-group">
                                 <div class="row"> 
                                    <div class="col-xs-12 col-md-6">
                                    <label>Account Number</label>
                                    
                                    <input type="number" class="form-control" id="account_no" name="account_no"  value= "<?php if(isset($row)){echo $row->account_no;}?>">
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>Identification Number</label>
                                       <input type="number" class="form-control" id="identification_no" name="identification_no"  value= "<?php if(isset($row)){echo $row->identification_no;}?>">                                   
                                        </div>
                            </div></div>
                            <div class="form-group">
                                 <div class="row"> 
                                    <div class="col-xs-12 col-md-6">
                                    <label>First Name</label>
                                    
                                    <input type="text" class="form-control" id="f_name" name="f_name"  value= "<?php if(isset($row)){echo $row->f_name;}?>">
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>Last Name</label>
                                       <input type="text" class="form-control" id="l_name" name="l_name"  value= "<?php if(isset($row)){echo $row->l_name;}?>">                                   
                                        </div>
                            </div></div>
                            <div class="form-group">
                                 <div class="row"> 
                                    <div class="col-xs-12 col-md-6">
                                    <label>Country</label>
                                    
                                    <input type="text" class="form-control" id="country" name="country"  value= "<?php if(isset($row)){echo $row->country;}?>">
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>State</label>
                                       <input type="text" class="form-control" id="state" name="state"  value= "<?php if(isset($row)){echo $row->state;}?>">                                   
                                        </div>
                            </div></div>
                            <div class="form-group">
                                 <div class="row"> 
                                    <div class="col-xs-12 col-md-6">
                                    <label>City</label>
                                    
                                    <input type="text" class="form-control" id="city" name="city"  value= "<?php if(isset($row)){echo $row->city;}?>">
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>Address</label>
                                       <textarea class="form-control" id="address" name="address"><?php if(isset($row)){echo $row->address;}?></textarea>                                   
                                        </div>
                            </div></div>
                            <div class="form-group">
                                 <div class="row"> 
                                    <div class="col-xs-12 col-md-6">
                                    <label>Zip Code</label>
                                    
                                    <input type="number" class="form-control" id="zip_code" name="zip_code"  value= "<?php if(isset($row)){echo $row->zip_code;}?>">
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>Port Id</label>
                                       <input type='number' class="form-control" id="port_id" name="port_id" value='<?php if(isset($row)){echo $row->port_id;}?>'>                                   
                                        </div>
                            </div></div>
                            <div class="form-group">
                              <h3>Billing Info</h3>
                                 <div class="row"> 
                                    <div class="col-xs-12 col-md-6">
                                    <label>Billing Country</label>
                                    
                                    <input type='text' class="form-control" id="billing_country" name="billing_country" value='<?php if(isset($row)){echo $row->billing_country;}?>'>
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>Billing State</label>
                                        <input type='text' class="form-control" id="billing_state" name="billing_state" value='<?php if(isset($row)){echo $row->billing_state;}?>'>
                                      </div>
                            </div></div>
                            <div class='form-group'>
                            <div class='row'>
                            <div class="col-xs-12 col-md-6">
                                    <label>Billing City</label>
                                    
                                    <input type='text' class="form-control" id="billing_city" name="billing_city" value='<?php if(isset($row)){echo $row->billing_city;}?>'>
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>Billing Address</label>
                                        <textarea class="form-control" id="billing_address" name="billing_address"><?php if(isset($row)){echo $row->billing_address;}?></textarea>
                                      </div>
                                    </div>
                            </div></div>
                            <div class='form-group'>
                            <div class='row'>
                            <div class="col-xs-12 col-md-6">
                                    <label>Billing Zip Code</label>
                                    
                                    <input type='number' class="form-control" id="billing_zipcode" name="billing_zipcode" value='<?php if(isset($row)){echo $row->billing_zipcode;}?>'>
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>Billing Port Id</label>
                                        <input type='number' class="form-control" id="billing_port_id" name="billing_port_id" value='<?php if(isset($row)){echo $row->billing_port_id;}?>'>
                                      </div>
                                    </div>
                            </div>
                            <div class='form-group'>
                            <div class='row'>
                            <div class="col-xs-12 col-md-6">
                                    <label>Country of Citizenship</label>
                                    
                                    <input type='text' class="form-control" id="country_of_citizenship" name="country_of_citizenship" value='<?php if(isset($row)){echo $row->country_of_citizenship;}?>'>
                                    
                                        </div>
                                        <div class='col-md-6'>
                                        <label>D.O.B</label>
                                        <input type='date' class="form-control" id="date_of_birth" name="date_of_birth" value='<?php if(isset($row)){echo $row->date_of_birth;}?>'>
                                      </div>
                                    </div>
                            </div>
                            <div class='form-group'>
                            <div class='row'>
                            <div class="col-xs-12 col-md-6">
                                    <label>Notes</label>
                                      <input type='text' class="form-control" id="notes" name="notes" value='<?php if(isset($row)){echo $row->notes;}?>'>
                                  </div>
                                        
                            </div>
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