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
<li><a href="#tab_2" data-toggle="tab">Identification</a></li>
<li><a href="#tab_3" data-toggle="tab">Notes</a></li>
<li><a href="#tab_4" data-toggle="tab">Attachment</a></li>


<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
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
                                <div  class="col-md-12">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description"  class="form-control"><?php if(isset($row)){echo $row->description;}?></textarea>
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                 <div class="col-xs-12 col-md-6">
                                    <label>Package Type</label>
                                    <select name='package_type' class='form-control'>
                                      <option disable>Choose Package Type</option>
                                      <?php 
                                       $extra_large = '';
                                       $large = '';
                                       $medium = '';
                                       $letter = '';
                                      if(isset($row)){
                                          switch($row->package_type){
                                              case "extra large box":$extra_large='selected';
                                              break;
                                              case "large box":$large='selected';
                                              break;
                                              case "medium box":$medium = 'selected';
                                              break;
                                              case "letter":$letter = 'selected';
                                              break;
                                          }
                                      }
                                       ?>
                                    <option <?php echo $extra_large;?> value='extra large box'>Extra Large Box</option>
                                    <option <?php echo $large;?> value='large box'>Large Box</option>
                                    <option <?php echo $medium;?> value='medium box'>Medium Box</option>
                                    <option <?php echo $letter;?>value='letter'>Letter</option>
                                    </select>
                               </div>
                               <div class="col-md-6">
                                    <label>Location</label>
                                    
                                    <input type="text" class="form-control" id="location" name="location"  value= "<?php if(isset($row)){echo $row->location;}?>">
                                    
                                        </div>
                                    </div></div>
                                 <div class='form-group'>
                                  <div class='row'>     
                                  <div class="col-xs-12 col-md-6">
                                    
                                    <label>Pieces</label>
                                    <input type="number" name="pieces" id="pieces" id='pieces' class="form-control" value= "<?php if(isset($row)){echo $row->pieces;}?>">
                                    <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
                                    </div>
                                 </div></div>
                              <div class="form-group">
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
                                      <option disable>Choose Unit</option>
                                      <?php 
                                      $inches='';
                                      $cm='';
                                      if(isset($row)){
                                        if($row->dimension_unit='inches'){
                                          $inches='selected';
                                        }
                                        if($row->dimension_unit='cm'){
                                          $cm='selected';
                                        }
                                      }
                                      ?>
                                      <option <?php echo $inches;?> value='inches'>Inches</option>
                                      <option <?php echo $cm;?> value='cm'>cm</option>
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
                                          <td><input class='form-control' placeholder='0.00' type='number'id='unit_weight' name='unit_weight'></td>
                                          <td><input class='form-control' placeholder='0.00' type='number' id='total_weight' name='total_weight'></td>
                                          <td><select class='form-control' name='weight_measure_unit'>
                                          <option value='lb'>lb</option>
                                          <option value='kg'>Kg</option>
                                          </select></td>
                                        </tr>
                                        <tr>
                                          <td style='text-align:center'>Volume</td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name='unit_volume'></td>
                                          <td><input class='form-control' placeholder='0.00' type='number' name='total_volume'></td>
                                          <td><select class='form-control' name='volume_measure_unit'>
                                            <option value='ft3'>ft<sup>3</sup></option>
                                            <option value='vlb'>vlb</option>
                                            <option value='vkg'>vkg</option>
                                            <option value='m3'>m<sup>3</sup></option>
                                        </select></td>
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
</div>
    <div class='tab-pane' id='tab_2'>
                       <div class='form-group'>
                           <div class='row'>
                             <div class='col-md-6'>
                               <h3>Definition</h3>
                             <label>Commodity</label>    
                             <input type='text' name='commodity' class='form-control'>       
                            </div>
                                    </div></div>
                          <div class='form-group'>
                            <h3>Identification</h3>
                              <div class='row'>
                                 <div class='col-md-3'>
                                    <label>Serail #</label>
                                       <input type='number' class='form-control' name='serial_no'>
  </div>
                                     <div class='col-md-3'>
                                      <label>Identification #</label>
                                      <input type='number' class='form-control' name='invoice_no'> 
                                     </div>
                                     <div class='col-md-3'>
                                      <label>P.O #</label>
                                      <input type='number' name='po_no' class='form-control'>
                                     </div>
                                     <div class='col-md-3'>
                                      <label>Lot #</label>
                                      <input type='number' name='lot_no' class='form-control'>
                                     </div>
                                    </div>
                                    </div>
                                  <div class='form-group'>
                                    <div class='row'>
                                      <div class='col-md-4'>
                                         <label>Job</label>
                                            <input type='text' name='job' class='form-control'>
                                    </div>
                                        <div class='col-md-4'>
                                          <label>Expires</label>
                                           <input type='date' name='expires_on' class='form-control'> 
                                        </div>
                                        <div class='col-md-4'>
                                          <label>NCM Code</label>
                                            <input type='number' name='ncm_code' class='form-control'>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
            <div class='tab-pane' id='tab_3'>
                                  <div class='form-group'>
                                     <div class='row'>
                                        <div class='col-md-12'>
                                           <label>Notes</label>
                                              <input type='text' class='form-control' name='notes'>
                                    </div></div></div>
            </div>
            <div class='tab-pane' id='tab_4'>
              <div class='form-group'>
                <div class='row'>
                  <div class='col-md-12'>
                    <label>Image</label>
                      <input type='file' style='margin-bottom:10px;' name='image' class='form-control' id='file'>
                  </div>
             <div class="col-xs-12 col-md-12">
                           <button type="submit" class="btn btn-info">Submit</button>
                      
                   </div>
                </div>
              </div>
            </div>
           </div> 
                </form>
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
    $('#pieces, #unit_weight').on('change', function(){
      var pieces = pasreFloat($('#pieces').val());
      var unit_weight = parseFloat($('#unit_weight').val());
      var multiple = pieces*unit_weight;
      $('#total_weight').val(multiple);
    });
  </script>