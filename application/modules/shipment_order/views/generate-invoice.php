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
                              
                                <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-4">
                                    <label>Item Description</label>
                                    
                                    <input type="text" class="form-control" id="item_description" name="item_description"  value= "<?php if(isset($row)){echo $row->item_description;}?>">
                                    
                                        </div>
                                          <div class="col-md-4">
                                    <label>Discount</label>
                                    <input type="text" name="discount" id="discount"  class="form-control" value= "<?php if(isset($row)){echo $row->discount;}?>">
                                  </div>
                                     <div class="col-md-4">
                                    <label>Amount</label>
                                    <input type="text" name="amount" id="amount"  class="form-control" value= "<?php echo $orders['amount'][0];?>">
                                  </div>
                                 </div></div>
                                 <div class="form-group">
                                <div class="row"> 
                                
                                <div class="col-xs-12 col-md-4">
                                    <label>Created Date</label>
                                    
                                    <input type="date" class="form-control" id="created_date" name="created_date"  value= "<?php if(isset($row)){echo $row->created_date;}?>">
                                    
                                        </div>
                                          <div class="col-md-4">
                                    <label>Due Date</label>
                                    <input type="date" name="due_date" id="due_date"  class="form-control" value= "<?php if(isset($row)){echo $row->discount;}?>">
                                    <input type="hidden" name="order_id" value="<?php echo $orders['id'][0];?>">
                                  </div>
                                   
                                 </div></div>
                                  <div class="clearfix">&nbsp;</div>
             <div class="col-xs-12 col-md-12">
                           <button type="submit" class="btn btn-info">Submit</button>
                      
                   </div>
           </div> 

                    
                       <div class="clearfix">&nbsp;</div>
                    
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
  <?php  getFooter(); ?>
</section>
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
            url: "<?php echo base_url().$controller.'/saveinvoice'; ?>",
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