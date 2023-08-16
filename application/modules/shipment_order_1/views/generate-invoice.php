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
#addLine{
       background-color:green;
       color:white;
       cursor:pointer;
       padding: 5px 8px;
       margin-left: 5px;
       border-radius: 5px 5px;
}
#btnSave{
       background-color:green;
       color:white;
       cursor:pointer;
       border-radius: 5px 5px;
       border:none;
       padding: 5px 8px;
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
      <div style="margin-right: -15px;
    margin-left: -15px;">
        <div style="width: 100%;" >
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="invoice">
  
  <section class="invoice">
      <!-- title row -->
        <div style='width:100%'>
          <h2 class="page-header">
              <?php $setting = $this->db->get('setting')->row();
			  if(is_file(FCPATH.'uploads/'.$setting->image)){
				 $logo= base_url().'uploads/'.$setting->image;
				  }else{
				 $logo= base_url().'assets/company_logo.jpg';
					  }
			  //
			  ?>
            <img height="60" src="<?=$logo?>">Client Invoices
              </h2>
        </div>
        <!-- /.col -->
      <!-- info row -->
      <div class="invoice-info" style="position:relative">
        <div class="invoice-col" style='width:40%;float: left;'>
          From:
          
            <strong>EmjayGlobal</strong><br>
            Address: <?php echo $setting->address;?><br>
            Phone: <?php echo $setting->phone;?><br>
            Email: <?php echo $setting->email;?>
          
        </div>
        <!-- /.col -->
        <!--<div class="invoice-col select_client" id='client_id' style='width:25%;float: left;; '>-->
        <!--<label>To Client</label>     -->
             
        <!--<select name='client_id' id="toclientSelect" onchange="Setmyvlaue(this.value)" data-value="" class='form-control' style='width:100%'>-->
        <!--            <option value='Not Selected' selected>Select</option>-->
        <!--            
        <!--            $clients = $this->db->where('user_type', '3')->get('users')->result_array();-->
                  
        <!--              $selected='';-->
        <!--            foreach($clients as $client){-->
        <!--             if(isset($row)){-->
        <!--              if($row->client_id==$client['id']){-->
        <!--                $selected='selected';-->
        <!--                }}?>-->
        <!--            <option data-value="<?php echo $client['name'];?>" <?php echo $selected?> value='<?php echo $client['id'];?>'><?php echo $client['name'];?></option>-->
        <!--        
        <!--            </select>  -->
        <!--</div>-->
        <!-- /.col -->
        <div class="invoice-col" style='width: 25%;float: right;display: inline-block;margin: 0 0 0 85px;text-align: right;'>
        <?php if(isset($row)){ ?>
          <b>Invoice # 
         <?php   echo $row[0]['id'];
          echo '<input type="hidden" name="id" value="'.$row[0]['id'].'">';
          } ?></b>
  <?php if(isset($row)){$row=$row[0];} ?>
          <p><label>Created Date:</label><input type="date" name="created_date" value="<?php if(isset($row)){echo $row['created_date'];}?>" required></p>
          <p><label>Payment Due:</label><input type="date" name="due_date" value="<?php if(isset($row)){echo $row['due_date'];} ?>" required></p>
          <input type="hidden" name="order_id" value="<?php echo $result->id;?>">
          
        </div>
        
   
     <!-- /.col -->
        
      </div>
      
      <div style="display:block;width:100%;float: left;margin: 0 0 10px 0;">
      
      </div>
          
<table border="1"  id="items" style="width:100%;font-size:14px margin-top:10px;"  >
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
              <td><input type="text"  style='width:100%;background: white;border: none;' name="item[]" value="<?=$item?>" />
              </td>
              <td><input type="number" class="quantity " style='width:100%;background: white;border: none;' name="quantity[]" value="<?=$quantity?>" />
              </td>
              <td><input type="number" class="rate " style='width:100%;background: white;border: none;'  name="rate[]" value="<?=$rate?>" />
              </td>
              <td><input type="text" class="subtotal " style='width:100%;background: white;border: none;'  readonly="readonly" name="subtotal[]" value="<?=$subtotal?>" />
           
              </td>
            </tr>
         <?php  }
      }else{
        ?>
            <tr id="row_0">
              <td><input type="text" style='width:100%;border:none;' name="item[]" /></td>
              <td><input type="number" style='width:100%;border:none;' class=" quantity" name="quantity[]" /></td>
              <td><input type="number" style='width:100%;border:none;' class=" rate" name="rate[]" /></td>
              <td><input type="text" style='width:100%;border:none;' class=" subtotal" readonly="readonly" name="subtotal[]" /></td>
            </tr>
        <?php } ?>
           </tbody>
            <tfoot>
            <tr>
              <td colspan="3" style="text-align: right;">Tax %</td>
              <td><input type="number" style='width:100%;border:none'  id="tax"  name="tax" value="<?php if(isset($row)){echo $row['tax'];}?>">
                </td>
            </tr>
           <tr>
              <td colspan="3" style="text-align: right;">Discount</td>
              <td><input  type="number" style='width:100%;border:none' id="discount" name="discount" value="<?php if(isset($row)){echo $row['discount'];}?>"></td>
            </tr>
           <tr>
                
              <td colspan="3" style="text-align: right;">Total(<span class=""><i class="fa fa-dollar"></i></span>)</td>
              <td>
                <div class="">
                <input type="text"  style='width:100%;border:none' id="total" name="total" value="<?php if(isset($row)){echo $row['amount'];}?>" readonly>
                
              </div>
                </td>
            </tr>
         <tr class="noprint">
              <td colspan="2" ><a  id='addLine' class="add_button noprint"><i class="fa fa-plus"></i>Add Line</a></td>
              </tr>   
         <tr>
              <td colspan="4" ><b>Payment Terms</b>
                <textarea class="" id="payment_terms" style='width:100%' name="payment_terms" rows="2" /><?php if(isset($row)){echo $row['payment_terms'];}?></textarea>
              
                </td>
            </tr>
        <tr>
              <td colspan="4" ><b>Notes</b>
                <textarea class="" style='width:100%' id="notes" name="notes" rows="2" /><?php if(isset($row)){echo $row['notes'];}?></textarea>
                
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
               <input style='margin-left:10px' type="checkbox" name="paid" id="paid"  data-toggle="tooltip" title="Mark True if paid" <?php echo $Checked;?>>&nbsp;&nbsp;<b>Paid </b></td>
            </tr>
                   
            </tfoot>
            
          </table>
      
      </div>


      <!-- this row will not appear when printing -->
      <div class="no-print" style="float:right;margin-top:10px">
        <div style="width: 100%;margin-top: -25px;margin-right: 52px;">
         <button type="button" id='btnSave' class="noprint" onclick="submitform(1)"><i class="fa fa-envelope"></i> Save and mail
          </button>&nbsp;
         
           <button style='margin-top:-5px;margin-left:20px' type="button" id='btnSave' class="noprint" onclick="submitform(0)"><i class="fa fa-save"></i> Save
          </button>
          <?php /*?> <button type="button" class="btn btn-primary pull-right" id="downloadPdf" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button><?php */?>
        </div>
    </div>
                <div class="clearfix">&nbsp;</div>
                  <div class="clearfix">&nbsp;</div>          
          <!-- /.box -->
        <!-- /.col -->
      <!-- /.row -->
      </form>
    </section>
    <!-- /.content -->
  </div>
<?php  getFooter(); ?>
   <script type="text/javascript">
   
//     function setp(rowid){
//   var myval=  $('#row_'+rowid+' textarea' ).val();
//     $('#row_'+rowid+' td').append('<div  class="showpdf"><p>'+myval+'</p></div>');
//     }
    
// $('textarea').change(function(){
  
//   $(this).parent().append('<div  class="showpdf"><p>'+$(this).val()+'</p></div>');
//   });
//   $('td>input').change(function(){
  
//   $(this).parent().append('<div  class="showpdf"><p>'+$(this).val()+'</p></div>');
//   });
  

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
         $('#total').val(sum);
   if($('#tax, #discount').val()!=''){
        var tax = parseInt($('#tax').val());
        var total = parseInt($('#total').val());
        var discount = $('#discount').val();
        var taxamount = total - discount + (total*tax)/100;

        $('#total').val(taxamount);
        }
  // if($('#discount').val()!=''){
  //       var total = $('#total').val();
  //       var discount = $(this).val();
  //       var discounted = total - discount;
  //       $('#total').val(discounted);
  // }
        
//         if($('#tax').val()!=''){
//        // var total = parseInt( $('#total').val());
// var taxRate = parseInt( $(this).val());
// var disc = parseInt( $('#discount').val());

// var taxAmount = total * (taxRate/parseInt("100")); //15000 * .1

// var sum = total + (taxAmount) - (disc);

// //update div with the val
// $('#total').val(sum);
// }
    });
  });
  //$(document).ready(function(){
           //         $("#tax").on('kepress', function(){
           //          var amt = parseInt($("#total").val());
           //          var tax = parseInt($(this).val()); 
           //    var total = (amt * tax)/100;
           //    //alert(total);
           //    //$("#tax_amount").val(total);
           //    var grand_total = amt + total;
           //    $("#total").val(grand_total);
           // });


    /***********loop through trs end****************/
   
    //just subtract discount  
    // $('#discount').on('click', function(){
    //     var total = parseInt($("#total").val());
    //     var discount = parseInt($(this).val());
    //     var discounted=total-discount;
    //     $('#total').val(discounted);
    //   });
 /***********Add tax start****************/
   
     // $('#tax').on('keyup', function(){
     //    var taxRate = parseInt( $('#tax').val());
     //    var total = parseInt($("#total").val());
     //    var taxAmount = total * (taxRate/parseInt("100")); //15000 * .1
     //    //console.log(disc);
     //    var totaltax = sum + taxAmount;
     //    $("#total").val(totaltax);
     //  }
 /***********Add tax end ****************/
   

  
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
       var fieldHTML = '<tr id="row_'+x+'"><td><input type="text" class="" style="width:100%" name="item[]" /></td><td><input type="number" class="quantity" style="width:100%" onChange="update_amounts()" name="quantity[]" /></td><td><input type="text" class="rate" style="width:100%" onChange="update_amounts()" name="rate[]" /></td><td><input type="text" class="subtotal" style="width:100%" readonly="readonly" name="subtotal[]" /><a data-id="'+x+'" href="javascript:void(0);" class="remove_button"><i class="fa  fa-minus-circle"></i></a></td></tr>'; //New input field html 
 
      
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
  if(1){
          $('.noprint').remove();
          $('#client_id').hide();
          $("#client_id").hide().css("visibility", "hidden");
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
    if(data.paid_unpaid=='paid'){
        window.location='<?php echo base_url()?>shipment_order/paid_invoices';
        }
        },3000);
        if(data.paid_unpaid=='unpaid'){
        $(".alert").addClass('alert-success');
        $(".alert").html(data.message);
        $(".alert").removeClass('hidden');
        setTimeout(function(){
        $(".alert").addClass('hidden');
        $('#form_add_update')[0].reset();
             window.location='<?php echo base_url()?>shipment_order/unpaid_invoices';
        },3000);
        }
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
            if(data.paid_unpaid=='paid'){
        window.location='<?php echo base_url()?>shipment_order/paid_invoices';
        }
        },3000);
        if(data.paid_unpaid=='unpaid'){
            $(".alert").addClass('alert-success');
        $(".alert").html(data.message);
        $(".alert").removeClass('hidden');
        setTimeout(function(){
        $(".alert").addClass('hidden');
        $('#form_add_update')[0].reset();
             window.location='<?php echo base_url()?>shipment_order/unpaid_invoices';
        },3000);
        }
        
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


function Setmyvlaue(user){
        $('#toclientSelect').attr('data-value',user);
        }  
  </script>
  
  