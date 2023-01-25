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
                                    <label>Status</label>
                                    
                                    <input type="text" class="form-control" id="status" name="status"  value= "<?php if(isset($row)){echo $row->status;}?>">
                                    
                                        </div>
                                          <div  class="col-md-6">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description"  class="form-control"><?php if(isset($row)){echo $row->description;}?></textarea>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Package Type</label>
                                    <select name='package_type' class='form-control'>
                                      <option selected>Choose Package Type</option>
                                    <option name='extra large box'>Extra Large Box</option>
                                    <option name='large box'>Large Box</option>
                                    <option name='medium box'>Medium Box</option>
                                    <option name='letter'>Letter</option>
                                    </select>
                                    
                                        </div>
                                          <div class="col-md-6">
                                    <label>Pieces</label>
                                    <input type="number" name="pieces" id="pieces"  class="form-control" value= "<?php if(isset($row)){echo $row->pieces;}?>">
                                    <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
                                
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Part Number</label>
                                    
                                    <input type="text" class="form-control" id="part_number" name="part_number"  value= "<?php if(isset($row)){echo $row->part_number;}?>">
                                    
                                        </div>
                                          <div  class="col-md-6">
                                    <label>Model</label>
                                    <input type="text" name="model" id="model"  class="form-control" value='<?php if(isset($row)){echo $row->model;}?>'>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-6">
                                    <label>Location</label>
                                    
                                    <input type="text" class="form-control" id="location" name="location"  value= "<?php if(isset($row)){echo $row->location;}?>">
                                    
                                        </div>
                                     
                                 </div></div> <div class="form-group">
                                <h3>Dimensions(LxWxH)</h3>
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-3">
                                    <label>Length</label>
                                    
                                    <input type="text" class="form-control" id="length" name="length"  value= "<?php if(isset($row)){echo $row->length;}?>">
                                    
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                    <label>Width</label>
                                    
                                    <input type="text" class="form-control" id="width" name="width"  value= "<?php if(isset($row)){echo $row->width;}?>">
                                    
                                        </div><div class="col-xs-12 col-md-3">
                                    <label>Height</label>
                                    
                                    <input type="text" class="form-control" id="height" name="height"  value= "<?php if(isset($row)){echo $row->height;}?>">
                                    
                                        </div><div class="col-xs-12 col-md-3">
                                          <label>Unit</label>
                                    <select name='dimension_unit' class='form-control'>
                                      <option>Choose Unit</option>
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
                                          <td><input class='form-control' placeholder='0.00' type='number' name='weight'></td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name='weight'></td>
                                          <td><select class='form-control' name='weight_unit'><option value='lb'>lb</option></select></td>
                                        </tr>
                                        <tr>
                                          <td style='text-align:center'>Volume</td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name='volume'></td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name='volume'></td>
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