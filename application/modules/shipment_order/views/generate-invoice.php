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
            <strong>Admin</strong><br>
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
          <b>Invoice #</b><br>
          <br>
          <b>Created Date:</b><input type="date" name="created_date"><br>
          <b>Payment Due:</b><input type="date" name="due_date">
          <input type="hidden" name="order_id" value="<?php echo $result['id']?>">
          
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
             <tr id="row_0">
             <td> <input type="text" class="form-control noprint" name="item[]" /></td>
              <td><input type="number" class="form-control quantity noprint" name="quantity[]"/>
               
              </td>
              <td><input type="text" class="form-control rate noprint" name="rate[]"/>
              </td>
              <td><input type="text" class="form-control subtotal noprint" readonly="readonly" name="subtotal[]"/>
            </tr>
           </tbody>
            <tfoot>
            <tr>
              <td colspan="3" style="text-align: right;">Tax %</td>
              <td><input type="number" class="form-control noprint" id="tax" onchange="taxadd()" name="tax" />
                </td>
            </tr>
           <tr>
              <td colspan="3" style="text-align: right;">Discount</td>
              <td><input type="number" class="form-control" id="discount" name="discount" /></td>
            </tr>
           <tr>
              <td colspan="3" style="text-align: right;">Total</td>
              <td>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="text" class="form-control noprint" id="total" name="total" />
                
              </div>
                </td>
            </tr>
         <tr class="noprint">
              <td colspan="2" ><a class="btn btn-success add_button noprint"><i class="fa fa-plus"></i>Add Line</a></td>
              </tr>   
         <tr>
              <td colspan="4" ><b>Payment Terms</b>
                <textarea class="form-control noprint" id="payment_terms"  name="payment_terms" rows="2" /><?=$payment_terms?></textarea>
                <?php 
        if($payment_terms!=''){
        ?>
                <p class="showpdf hidden"><?=$payment_terms?></p>
                <?php } ?>
                </td>
            </tr>
        <tr>
              <td colspan="4" ><b>Notes</b>
                <textarea class="form-control noprint" id="notes" name="notes" rows="2" /><?=$notes?></textarea>
                <?php 
        if($notes!=''){
        ?>
                <p class="showpdf hidden"><?=$notes?></p>
                <?php } ?>
                </td>
            </tr>
        <tr>
              <td colspan="4" class="noprint" >
               <input type="checkbox" name="paid" id="paid"  data-toggle="tooltip" title="Mark True if paid" /><b>Paid </b></td>
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
  
   function update_amounts()
{
    var sum = 0;
    $('#items > tbody  > tr').each(function() {
        var qty = $(this).find(".quantity").val();
        var price = $(this).find('.rate').val();
    if(qty==undefined){
      qty=0;
      }
      if(price==undefined){
      price=0;
      }
      //console.log('qty '+qty);
      //console.log('price '+price);
        var amount = (qty*price);
        //sum+=amount;
        //alert(sum);
    //console.log('sum '+sum);
        $(this).find('.subtotal').val(amount);
        //alert('.subtotal')
          // if(!isNaN(amount))
          
            sum+=amount;
    });
    //just update the total to sum  
if($('#disount, #tax').val()==""){
    $('#total').val(sum);
  }

if(($('#tax').val()!="")){
    var subtotal = parseFloat( $('.subtotal').val());
var taxRate = parseFloat( $('#tax').val());
var discount = parseFloat( $('#discount').val());

var taxAmount = subtotal * (taxRate/parseFloat("100")); //15000 * .1
//console.log(disc);
var tax = subtotal + (taxAmount);
$("#total").val(tax);
}

// if(($('#disount').val()!="")){
//   var subtotal = parseFloat( $('.subtotal').val());
//   var disc = parseFloat( $('#discount').val());
// var disount = subtotal - (disc);
// $("#total").val(disount);
// }
//update div with the val
//$('#grandtotal').text(yourGrandTotal);
  // discount();
  // taxadd();
}
$('#total').on('click',function(){
    var val1 = parseInt($('#discount').val()); 
    var val2 = parseInt($(this).val());
    var tot = val2 - (val1);
 // var percentval = val1 * (val2 / 100);
  //$("#discount_1").val(percentval);
    //console.log(tot);
    $('#total').val(tot);
});
// $(function(){
// $('#discount').on('change', function(){
//   var total = parseInt($('#total').val());
//   var discount = parseInt($(this).val());
//   var discountvalue = total - disount;
//   $('#total').val(discountvalue);
// });
// });
function taxadd(){
  var amount =  parseInt($('#total').val());
  var taxPercent = parseInt($('#tax').val());
  var grand =amount + (taxPercent * amount)/100;
  $('#total').val(grand);
  
  }
function discount(){
  var total =  parseInt($('#total').val());
  var discount = parseInt($('#discount').val());
  var discount = total- discount;
  $('#total').val(discount);
  
  }


$('.quantity').change(function(){
  update_amounts();
  });
$('.rate').change(function(){
  update_amounts();
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
        window.location='<?php echo base_url()?>shipment_order';
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
        window.location='shipment_order/generateinvoice';
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
  
  