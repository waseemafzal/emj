<?php getHead(); ?>
   <style>
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
.customControl{
border: 1px solid #ccc;
    border-radius: 8px;
    width: 90px;
    margin: 0 0 3px 0;	
	}
	.table{
	border: 1px solid #ddd;	
		}
	.remove_button {
    position: absolute;
    right: 0;
    top: 0;
    z-index: 5;
}
tbody>tr{ position:relative;}
#headerButtons{
	position: absolute;top: 6px;
	display:none;

	}
#headerButtons>a{
	font-size:12px
	}
   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        clients  invoice Management
        
      </h1>
      <ol class="breadcrumb">
        <li > <a href="clients">View clients </a></li>
      </ol>
    </section>

    <!-- Main content -->
    
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
             <section class="invoice" style="position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 10px 25px;" >
      <!-- title row -->
      <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
        <div style="width: 100%;">
          <h5 class="page-header" id="page-header" style="margin: 10px 0 20px 0;
    font-size: 22px;">
         <div class="noprint" id="headerButtons" >
          <a  href="invoice_logo/set"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
          <a  href="javascript:void(0)" id="removeheader"> <i class="fa fa-trash"></i> Remove </a>
          </div>
          <?php 
		  $imageLogo='<i class="fa fa-globe"></i>';
		  $title='Prapser, Inc.';
		  $CI =& get_instance();
		$invo =$CI->db->select('*')->from('invoice_logo')->where('vendor_id',get_session('id'))->limit(1)->get();
		
		if ($invo->num_rows()>0){

			$image= base_url().'uploads/'.$invo->row()->image;
			$imageLogo='<img src="'.$image.'" width="50">';
			$title= $invo->row()->title;
		}
		echo $imageLogo;
		echo $title;
		  ?>
             
           
          </h5>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info" style="margin-right: -15px;
    margin-left: -15px;">
        <div class=" invoice-col" style="width: 33%;float:left;display:inline-block;">
        
          From
          <address>
            <strong><?php echo get_session('name').' '.get_session('lastName')?></strong><br>
            Phone:<?php echo get_session('phone')?><br>
            Email: <?php echo get_session('email')?><br>
            <?php
			$address= getVendorAddress();
			if(is_array($address)){
				echo 'Address: '.$address['title'].' '.$address['city'].','.$address['country'];
				}
			 ?>
          </address>
        </div>
        <!-- /.col -->
       <div class=" invoice-col" style="width: 33%;float:left;display:inline-block;">   To
          <address>
            <strong><?php echo ucfirst($row->name) ?></strong><br>
           
            Phone: <?php echo ucfirst($row->phone) ?><br>
            Email: <?php  echo ucfirst($row->email) ?><br>
            
          </address>
        </div>
        <!-- /.col -->
       <div class=" invoice-col" style="width: 33%;float:left;display:inline-block;">   <b>Invoice #<?php 
		  
		  
		  if(isset($editwork)){
			  echo $editwork->id;
			  
			  
			  }else{
				  echo getMaxID('id','clients_invoice');
				  }
		  ?></b>
          <br>
          <b>Booking id:</b> <?php
		  $tax= 0;
			  $discount= 0;
			  $total= 0;
			 $payment_terms='';
			 $notes='';
		  if(isset($editwork)){
			  $booking_id= $editwork->booking_id;
			  $client_id= $editwork->client_id;
			  $created_date= $editwork->created_date;
			  $due_date= $editwork->due_date;
			  
			  			$created_date = date('d/m/Y',strtotime($created_date));
			  			$due_date = date('d/m/Y',strtotime($due_date));

			  
			  $tax= $editwork->tax;
			  $discount= $editwork->discount;
			  $total= $editwork->amount;
			  $payment_terms= $editwork->payment_terms;
			  $notes= $editwork->notes;
			  echo '<input type="hidden" value="'.$editwork->id.'" name="id" />';
			  }else{
				 $booking_id=  $booking_id;
				 			  $client_id= $row->id;
			  $created_date= date('d/m/Y');
			  $due_date= date('d/m/Y');
			  
				  }
				 
		     ?>
          <input  value="<?=$booking_id?>" class="customControl" name="booking_id" />
          <input type="hidden" value="<?=$client_id?>" name="client_id" />
          <input type="hidden" value="<?=$workorder_id?>" name="workorder_id" />
          
          
          <br>
          <b>Created Date:</b> <input class="customControl" id="created_date" value="<?=$created_date?>" name="created_date" /><br>
          <b>Payment Due:</b> <input class="customControl" id="due_date" value="<?=$due_date?>" name="due_date"/>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped" id="items" border="1">
            <thead>
            <tr>
              <td style="width:75%">Item detail</td>
              <td>Quantity</td>
              <td>Rate</td>
              <td>Subtotal</td>
            </tr>
            </thead>
            <tbody class="field_wrapper">
            <?php
		  if(isset($editwork)){
			  $detailArr = json_decode($editwork->detail);
			  
			   $count = count($detailArr->items);
			 // echo '<pre>'; print_r($detailArr);
			  for($i=0;$i<$count;$i++){
				 $item = $detailArr->items[$i];
				 $quantity = $detailArr->quantities[$i];
				 $rate = $detailArr->rates[$i];
				 $subtotal = $detailArr->subtotal[$i];
				
				  ?>
				  <tr id="row_0">
              <td><input type="text" class="form-control noprint" name="item[]" value="<?=$item?>" />
              <p  class="showpdf hidden"><?=$item?></p>
              </td>
              <td><input type="number" class="form-control quantity noprint" name="quantity[]" value="<?=$quantity?>" />
               <p  class="showpdf hidden"><?=$quantity?></p>
              </td>
              <td><input type="text" class="form-control rate noprint" name="rate[]" value="<?=$rate?>" />
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
              <td><input type="text" class="form-control rate" name="rate[]" /></td>
              <td><input type="text" class="form-control subtotal" readonly="readonly" name="subtotal[]" /></td>
            </tr>
        <?php } ?>
            </tbody>
            <tfoot>
            <tr>
            	<td colspan="3" style="text-align: right;">Tax %</td>
            	<td><input type="number" class="form-control noprint" value="<?=$tax?>" id="tax" onchange="taxadd()" name="tax" />
                <?php 
				if($tax!=''){
				?>
                <b class="showpdf hidden"><?=$tax?></b>
                <?php } ?>
                </td>
            </tr>
          <tr>
            	<td colspan="3" style="text-align: right;">Discount</td>
            	<td><input type="number" class="form-control" value="<?=$discount?>" id="discount" name="discount" /></td>
            </tr>
           <tr>
            	<td colspan="3" style="text-align: right;">Total</td>
            	<td>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="text" class="form-control noprint" value="<?=$total?>" id="total" name="total" />
                <?php 
				if($total!=''){
				?>
                <b class="showpdf hidden"><?=$total?></b>
                <?php } ?>
              </div>
                </td>
            </tr>
          <tr class="noprint">
            	<td colspan="4" ><a class="btn btn-info btn-xs add_button noprint"><i class="fa fa-plus"></i>Add Line</a></td>
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

      
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print" style="margin-right: -15px;
    margin-left: -15px;">
        <div style="width: 100%;">
          <a href="javascript:void(0)" onclick="PrintElem('invoice')"  class="btn btn-default noprint"><i class="fa fa-print"></i> Print</a>
         <button type="button" class="btn btn-success pull-right noprint" onclick="submitform(1)"><i class="fa fa-envelope"></i> Save and mail
          </button>
         
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
	var myval=	$('#row_'+rowid+' textarea' ).val();
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
    var sum = 0.0;
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
        var amount = (qty*price)
        sum+=amount;
		//console.log('sum '+sum);
        $(this).find('.subtotal').val(amount);
    });
    //just update the total to sum  
    $('#total').val(sum);
	discount();
	taxadd();
}

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
$('#discount').change(function(){
	var total =  parseInt($('#total').val());
	var discount = parseInt($('#discount').val());
	var discount = total - discount;
	$('#total').val(discount);
	});

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
		alert($(this).attr('data-id'));      
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
			url: "<?php echo base_url().'clients/saveInvoice'; ?>",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
			beforeSend: function() {
			$('#loader').removeClass('hidden');
		//	$('#form_add_update .btn_au').addClass('hidden');
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
				window.location='clients/profile/<?php echo $this->uri->segment(3)?>';
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
				window.location='clients/profile/<?php echo $this->uri->segment(3)?>';
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
  