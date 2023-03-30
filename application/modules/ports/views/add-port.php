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
                                    <label>Country</label>
                                    
                                    <input type="text" class="form-control" id="country" name="country"  value= "<?php if(isset($row)){echo $row->country;}?>">
                                    
                                        </div>
                                          <div  class="col-md-6">
                                    <label>Port Id</label>
                                    <input type="text" name="port_id" id="port_id"  class="form-control" value='<?php if(isset($row)){echo $row->port_id;}?>'>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Port Name</label>
                                    
                                    <input type="text" class="form-control" id="port_name" name="port_name"  value= "<?php if(isset($row)){echo $row->port_name;}?>">
                                    
                                        </div>
                                          <div  class="col-md-6">
                                    <label>Sub Division</label>
                                    <input type="text" name="subdivision" id="subdivision"  class="form-control" value='<?php if(isset($row)){echo $row->subdivision;}?>'>
                                  <input type='hidden' name='id' value='<?php if(isset($row)){echo $row->id;} ?>'>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                 <label>Transportation Method</label>
                                 <div class="row"> 
                                <div class="col-xs-12 col-md-2">
                                <?php 
                                  $Maritime = '';
                                 if(isset($row)){
                                      $method = explode(',', $row->transportation_method);
                                    if(in_array('Maritime', $method)){
                                      $Maritime = 'checked';
                                    }
                                     
                                    }?>
                                    <input type="checkbox" <?php echo $Maritime?> class="" id="transportation_method" name="transportation_method[]" value='Maritime'>Maritime
                                    
                                        </div>
                                          <div  class="col-md-2">
                                          <?php 
                                  $Air = '';
                                 if(isset($row)){
                                      $method = explode(',', $row->transportation_method);
                                    if(in_array('Air', $method)){
                                      $Air = 'checked';
                                    }
                                     
                                    }?>
                                            <input type="checkbox" <?php echo $Air ?> class="" id="transportation_method" name="transportation_method[]" value='Air'>Air
                                  </div>
                                  <div  class="col-md-2">
                                  <?php 
                                  $Rail = '';
                                 if(isset($row)){
                                      $method = explode(',', $row->transportation_method);
                                    if(in_array('Rail', $method)){
                                      $Rail = 'checked';
                                    }
                                     
                                    }?>
                                  <input type="checkbox" <?php echo $Rail?> class="" id="transportation_method" name="transportation_method[]" value='Rail'>Rail
                                  </div>
                                  <div  class="col-md-2">
                                  <?php 
                                  $Mail = '';
                                 if(isset($row)){
                                      $method = explode(',', $row->transportation_method);
                                    if(in_array('Mail', $method)){
                                      $Mail = 'checked';
                                    }
                                     
                                    }?>
                                  <input type="checkbox" <?php echo $Mail?> class="" id="transportation_method" name="transportation_method[]" value='Mail'>Mail
                                  </div>
                                  <div class="col-md-2">
                                  <?php 
                                  $Road = '';
                                 if(isset($row)){
                                      $method = explode(',', $row->transportation_method);
                                    if(in_array('Road', $method)){
                                      $Road = 'checked';
                                    }
                                     
                                    }?>
                                  <input type="checkbox" <?php echo $Road?> class="" id="transportation_method" name="transportation_method[]" value='Road'>Road
                                  </div>
                                  <div class="col-md-2">
                                  <?php 
                                  $border = '';
                                 if(isset($row)){
                                      $method = explode(',', $row->transportation_method);
                                    if(in_array('Border Crossing Point', $method)){
                                      $border = 'checked';
                                    }
                                     
                                    }?>
                                  <input type="checkbox" <?php echo $border?> class="" id="transportation_method" name="transportation_method[]" value='Border Crossing Point'>Border Crossing Point
                                  </div>
                                 </div></div>
                                    <div class='form-group'>
                                        <div class='row'>
                                           <div class='col-md-4'>
                                             <label>Remarks</label>
                                                <input type='text' name='remarks' class='form-control' value='<?php if(isset($row)){echo $row->remarks;} ?>'>
                                    </div>
                                    <div class='col-md-4'>
                                             <label>US Custom Codes</label>
                                                <input type='text' name='us_custom_codes' class='form-control' value='<?php if(isset($row)){echo $row->us_custom_codes;} ?>''>
                                    </div>
                                    <div class='col-md-4'>
                                             <label>Notes</label>
                                                <input type='text' name='notes' class='form-control' value='<?php if(isset($row)){echo $row->notes;} ?>'>
                                    </div>
                                    </div></div>
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