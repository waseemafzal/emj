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
                                    <label>Container Type</label>
                                    
                                    <input type="text" class="form-control" id="container_type" name="container_type"  value= "<?php if(isset($row)){echo $row->container_type;}?>">
                                    
                                        </div>
                                          <div  class="col-md-6">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description"  class="form-control"><?php if(isset($row)){echo $row->description;}?></textarea>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Number</label>
                                    
                                    <input type="number" class="form-control" id="number" name="number"  value= "<?php if(isset($row)){echo $row->number;}?>">
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Serial Number 1</label>
                                    <input type="number" name="serial_number_1" id="serial_number_1"  class="form-control" value= "<?php if(isset($row)){echo $row->serial_number_1;}?>">
                                
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Serial Number 2</label>
                                    
                                    <input type="number" class="form-control" id="serial_number_2" name="serial_number_2"  value= "<?php if(isset($row)){echo $row->serial_number_2;}?>">
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Location</label>
                                    <input type="text" name="location" id="location"  class="form-control" value= "<?php if(isset($row)){echo $row->location;}?>">                                
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                 <h4>Dimensions</h4>

                                <div class="row"> 
                                 <div class="col-xs-12 col-md-4">
                                    <label>Length</label>
                                    
                                    <input type="number" class="form-control" id="length" name="length"  value= "<?php if(isset($row)){echo $row->length;}?>">
                                    
                                        </div>
                                          <div class="col-md-4">
                                    <label>Weight</label>
                                    <input type="number" name="weight" id="weight"  class="form-control" value= "<?php if(isset($row)){echo $row->weight;}?>">
                                
                                  </div>
                                  <div class="col-md-4">
                                    <label>Width</label>
                                    <input type="number" name="width" id="width"  class="form-control" value= "<?php if(isset($row)){echo $row->width;}?>">
                                
                                  </div>
</div></div>
                          <div class='form-group'>
                            <div class='row'>
                                  <div class="col-md-4">
                                    <label>Height</label>
                                    <input type="number" name="height" id="height"  class="form-control" value= "<?php if(isset($row)){echo $row->height;}?>">
                                
                                  </div>
                                  <div class="col-md-4">
                                    <label>Volume</label>
                                    <input type="number" name="volume" id="volume"  class="form-control" value= "<?php if(isset($row)){echo $row->volume;}?>">
                                   <input type='hidden' name='id' value="<?php if(isset($row)){echo $row->id;}?>">
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