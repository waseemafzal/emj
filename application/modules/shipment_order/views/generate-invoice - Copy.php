<?php getHead();
$controller=$this->router->class;
$Heading=$controller;
if(isset($module_heading) and $module_heading!=''){
$Heading=   $module_heading;
    }

 ?>
   <style>
    .remove_button{position: absolute;top: 25px;left: 0;}
    .add_button{position: relative;top: 25px;left: 0; top: -30px;}
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
                 <form id="form_add_update" name="form_add_update" role="form">
<div class="alert hidden"></div>
      <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
        <div style="width: 100%;" >
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="invoice">
  
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Client Invoices
              </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>EmjayGlobal</strong><br>
            Chowk Shah Abbass Multan<br>
            Phone: 0341-1663111<br>
            Email: admin@admin.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
                    
           
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice # <?php if(isset($row)){
            echo $row[0]['id'];
          echo '<input type="hidden" name="id" value="'.$row[0]['id'].'">';
          } ?></b><br>
          <br>
  <?php if(isset($row)){$row=$row[0];} ?>
          <b>Created Date:</b><input type="date" name="created_date" value="<?php if(isset($row)){echo $row['created_date'];}?>"><br>
          <b>Payment Due:</b><input type="date" name="due_date" value="<?php if(isset($row)){echo $row['due_date'];} ?>">
          <input type="hidden" name="order_id" value="<?php echo $result->id?>">
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-bordered" id="items" border="1">
            <thead>
            <tr>
              <th>Item Details</th>
              <th>Qty</th>
              <th>Rate</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody class="field_wrapper">
              <?php 
                   if(isset($row)){
                $detail = json_decode($row['detail']);
         $count = count($detail->rates);
     for($i=0;$i<$count;$i++){
         $item = $detail->items[$i];
         $quantity = $detail->quantities[$i];
         $rate = $detail->rates[$i];
         $subtotal = $detail->subtotal[$i];
        
          ?>
          <tr id="row_0">
              <td><input type="text" class="form-control noprint" name="item[]" value="<?=$item?>" />
              <p  class="showpdf hidden"><?=$item?></p>
              </td>
              <td><input type="number" class="form-control quantity noprint" name="quantity[]" value="<?=$quantity?>" />
               <p  class="showpdf hidden"><?=$quantity?></p>
              </td>
              <td><input type="number" class="form-control rate noprint" name="rate[]" value="<?=$rate?>" />
               <p  class="showpdf hidden"><?=$rate?></p>
              </td>
              <td><input type="text" class="form-control subtotal noprint" readonly="readonly" name="subtotal[]" value="<?=$subtotal?>" />
              <?php 
        if($subtotal!=''){
        ?>
                <b class="showpdf hidden"><?=$subtotal?></b>
                <?php } ?>
              </td>
            </tr>
         <?php  }
      }else{
        ?>
            <tr id="row_0">
              <td><input type="text" class="form-control" name="item[]" /></td>
              <td><input type="number" class="form-control quantity" name="quantity[]" /></td>
              <td><input type="number" class="form-control rate" name="rate[]" /></td>
              <td><input type="text" class="form-control subtotal" readonly="readonly" name="subtotal[]" /></td>
            </tr>
        <?php } ?>
           </tbody>
            <tfoot>
            <tr>
              <td colspan="3" style="text-align: right;">Tax %</td>
              <td><input type="number" class="form-control noprint" id="tax"  name="tax" value="<?php if(isset($row)){echo $row['tax'];}?>">
                </td>
            </tr>
           <tr>
              <td colspan="3" style="text-align: right;">Discount</td>
              <td><input type="number" class="form-control" id="discount" name="discount" value="<?php if(isset($row)){echo $row['discount'];}?>"></td>
            </tr>
           <tr>
              <td colspan="3" style="text-align: right;">Total</td>
              <td>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="text" class="form-control noprint" id="total" name="total" value="<?php if(isset($row)){echo $row['amount'];}?>">
                
              </div>
                </td>
            </tr>
         <tr class="noprint">
              <td colspan="2" ><a class="btn btn-success add_button noprint"><i class="fa fa-plus"></i>Add Line</a></td>
              </tr>   
         <tr>
              <td colspan="4" ><b>Payment Terms</b>
                <textarea class="form-control noprint" id="payment_terms"  name="payment_terms" rows="2" /><?php if(isset($row)){echo $row['payment_terms'];}?></textarea>
              
                </td>
            </tr>
        <tr>
              <td colspan="4" ><b>Notes</b>
                <textarea class="form-control noprint" id="notes" name="notes" rows="2" /><?php if(isset($row)){echo $row['notes'];}?></textarea>
                
                </td>
            </tr>
        <tr>
          <?php 
             $Checked = '';
          if(isset($row)){
            
           switch($row['paid']){
            case 'Yes':
            $Checked = 'Checked';
            break;
            case 'No':
            $Checked = '';
           }
         }
            ?>
              <td colspan="4" class="noprint" >
               <input type="checkbox" name="paid" id="paid"  data-toggle="tooltip" title="Mark True if paid" <?php echo $Checked;?>><b>Paid </b></td>
            </tr>
                   
            </tfoot>
            
          </table>
      
      
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- this row will not appear when printing -->
      <div class="row no-print" style="margin-right: -15px;
    margin-left: -15px;">
        <div style="width: 100%;">
          <a href="javascript:void(0)" onclick="PrintElem('invoice')"  class="btn btn-default noprint"><i class="fa fa-print"></i> Print</a>
         <button type="button" class="btn btn-success pull-right noprint" onclick="submitform(1)"><i class="fa fa-envelope"></i> Save and mail
          </button>&nbsp;
         
           <button type="button" class="btn btn-success pull-right noprint" onclick="submitform(0)"><i class="fa fa-save"></i> Save
          </button>
          <?php /*?> <button type="button" class="btn btn-primary pull-right" id="downloadPdf" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button><?php */?>
        </div>
      </div>
    </section>
     </div>
                <div class="clearfix">&nbsp;</div>
                  <div class="clearfix">&nbsp;</div>
                
            </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </form>
    </section>
    <!-- /.content -->
  </div>
<?php  getFooter(); ?>
   <script type="text/javascript">
   
    function setp(rowid){
  var myval=  $('#row_'+rowid+' textarea' ).val();
    $('#row_'+rowid+' td').append('<div  class="showpdf hidden"><p>'+myval+'</p></div>');
    }
    
$('textarea').change(function(){
  
  $(this).parent().append('<div  class="showpdf hidden"><p>'+$(this).val()+'</p></div>');
  });
  $('td>input').change(function(){
  
  $(this).parent().append('<div  class="showpdf hidden"><p>'+$(this).val()+'</p></div>');
  });
  

  $('#items').change(function(){
   var sum = 0;
   /***********loop through trs****************/
    $('#items > tbody  > tr').each(function() {
        var qty = $(this).find(".quantity").val();
        var price = $(this).find('.rate').val();
        if(qty==undefined){
        qty=0;
        }
        if(price==undefined){
        price=0;
        }
        var amount = (qty*price);
        $(this).find('.subtotal').val(amount);
        sum+=amount;
    });
    /***********loop through trs end****************/
   
    //just subtract discount  
    if($('#disount').val()!=""){
        var discount = parseInt($('#discount').val());
        sum=sum-discount;
        $('#total').val(sum);
      }
 /***********Add tax start****************/
   
      if(($('#tax').val()!="")){
        var taxRate = parseInt( $('#tax').val());
        var taxAmount = sum * (taxRate/parseInt("100")); //15000 * .1
        //console.log(disc);
        var sum = sum + taxAmount;
        $("#total").val(sum);
      }
 /***********Add tax end ****************/
   
  });

  
$(document).ready(function(){

  
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
      var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
       var fieldHTML = '<tr id="row_'+x+'"><td><input type="text" class="form-control" name="item[]" /></td><td><input type="number" class="form-control quantity" onChange="update_amounts()" name="quantity[]" /></td><td><input type="text" class="form-control rate" onChange="update_amounts()" name="rate[]" /></td><td><input type="text" class="form-control subtotal" readonly="readonly" name="subtotal[]" /><a data-id="'+x+'" href="javascript:void(0);" class="remove_button"><i class="fa  fa-minus-circle"></i></a></td></tr>'; //New input field html 
 
      
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
    var id = $(this).attr('data-id');
    //alert($(this).attr('data-id'));      
        $('#row_'+id).remove(); //Remove field html
        x--; //Decrement field counter
    update_amounts();
    });
});
</script>
  <script>
   

  
  /**********************************save************************************/
  function submitform(type) {
    
  var formData = new FormData();
  var other_data = $('#form_add_update').serializeArray();
  
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   

if(type==1){
        $('.noprint').remove();
        $('.showpdf').removeClass('hidden');
        }
            formData.append('pdfcontent',$('#invoice').html());
            formData.append('ifmail',type);
  // ajax start
        $.ajax({
      type: "POST",
      url: "<?php echo base_url().'shipment_order/saveInvoice'; ?>",
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
        $('#form_add_update')[0].reset();
        window.location='shipment_order';
        },2000);
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
        window.location='shipment_order';
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
}
 $('#created_date').datepicker();
 $('#due_date').datepicker();
 
 
 function PrintElem(elem)
{
$('.main-footer').hide();
$('input').css('border','none');
$('.input-group-addon').css('border','none');
$('.add_button').hide();


    window.print();
   // mywindow.close();

    return true;
}

/*******************/
window.onafterprint = function(){
   console.log("Printing completed...");
   $('.main-footer').show();
$('.add_button').show();
$('.other_wrap>b').show();
$('.other_wrap>input').show();

}
/*******************/

//
$('#page-header').hover(
  function () {
     $("#headerButtons").show();
  }, 
  function () {
     $("#headerButtons").hide();
  }
);

$('#removeheader').click(function(){
  $('#page-header').remove();
  });
  
  
  
  
      /******************************/

  $('#form_edit_image').on("submit", function(e) {

    e.preventDefault();
    var inputFile = $('input#edit_image');
    var filesToUpload = inputFile[0].files;
    var formData = new FormData();

    // make sure there is file(s) to upload
    if (filesToUpload.length > 0) {
      // provide the form data
      // that would be sent to sever through ajax
      for (var i = 0; i < filesToUpload.length; i++) {
        var file = filesToUpload[i];
        formData.append("file[]", file, file.name);
      }
    }
    var other_data = $('#form_edit_image').serializeArray();
    $.each(other_data, function(key, input) {
      formData.append(input.name, input.value);
    });
    
    formData.append('tbl', 'clients_invoice_files');

    // ajax start
    $.ajax({
      type: "POST",
      url: "<?php echo base_url() . 'clients/update_file'; ?>",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function() {
        $('#loader').removeClass('hidden');
        //$('#form_sample .btn_au').addClass('hidden');
      },
      success: function(data) {
        $('#loader').addClass('hidden');
        $('#form_sample .btn_au').removeClass('hidden');
        var obj = jQuery.parseJSON(data);
        if (obj.status == 1) {
          var src = obj.image;
          if (src != 0) {
            var src = '<?php echo base_url() ?>uploads/' + obj.image;
            $("#img_" + obj.id).attr("src", src);
          }
          setTimeout(function() {
            $('#edit_image_wrap').hide('slow');
            $("#edit_small_image_div img").attr("src", src);
          }, 2000);
        }


      }
    });

    //ajax end    
  });

  </script>
  
  