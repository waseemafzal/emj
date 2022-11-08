<?php getHead(); ?>
   <style>
   #list img{
  width: auto;
  height: 100px;
  margin: 10px ;
}
    .box-primary {
	margin:5px 2px;	
		}
    .box-primary img{
		min-width:100px;
		min-height: 100px;
	
	}
	div.center{
background-color: #fff;
    border-radius: 5px;
    box-shadow: -2px 2px 7px 1px;
    left: 25%;
    position: fixed;
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
        clients  Management
        
      </h1>
      <ol class="breadcrumb">
        <li > <a href="clients">View clients </a></li>
      </ol>
    </section>

    <!-- Main content -->
    
    <section class="content">
                 
<div class="alert hidden"></div>
      <div class="row">
        <div class=" " style="width: 100%;">
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="invoice">
             <section class="invoice"  style="position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 10px 25px;">
    <form id="form_add_update" name="form_add_update" role="form">
            
      <!-- title row -->
      <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
    
        <div style="width: 100%;">
        
          <h2 class="page-header" id="page-header" style="margin: 10px 0 20px 0;
    font-size: 22px;" >
         <div class="" id="headerButtons"  style="display:none">
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
			$imageLogo='<img src="'.$image.'" width="100">';
			$title= $invo->row()->title;
		}
		echo $imageLogo;
		echo $title;
		  ?>
             
           
          </h2>
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
        <div class=" invoice-col" style="width: 33%;float:left;display:inline-block;">
          To
          <address>
            <strong><?php echo ucfirst($row->name) ?></strong><br>
           
            Phone: <?php echo ucfirst($row->phone) ?><br>
            Email: <?php  echo ucfirst($row->email) ?><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class=" invoice-col" style="width: 33%;float:left;display:inline-block;">
          
          <b>Booking ID:</b> <?php
		 	 $indications='';
			 $consultation='';
			 $notes='';
		  if(isset($editwork)){
			  $booking_id= $editwork->booking_id;
			  $client_id= $editwork->client_id;
			  $created_date= $editwork->created_date;
			  
			  			$created_date = date('d/m/Y',strtotime($created_date));
			  
			   $consultation= $editwork->consultation;
			  $indications= $editwork->indications;
			  $notes= $editwork->notes;
			  echo '<input type="hidden" value="'.$editwork->id.'" name="id" />';
			  }else{
				 $booking_id=  latestOrderId($row->id);
				 			  $client_id= $row->id;
			  $created_date= date('d/m/Y');
			  
			  
				  }
				 // echo $booking_id;
		     ?>
          <input  class="customControl" value="<?=$booking_id?>" name="booking_id" />
          <input type="hidden" value="<?=$client_id?>" name="client_id" />
          <br>
          <b>Date:</b> <input class="customControl" id="created_date" value="<?=$created_date?>" name="created_date" />
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  <div  style="margin-right: -15px;
    margin-left: -15px;">
        <div class="  " style="width:100%">
        <b style="font-weight:bold;margin:0 0 5px 0">Consultation/ Type of work</b>
       <textarea class="form-control noprint" id="consultation" name="consultation" rows="2" /><?=$consultation?></textarea>
    </div>
    </div>
      <!-- Table row -->
  <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
        <div class="  " style="width: 100%;">
        <b style="font-weight:bold;margin:0 0 5px 0">Diagnosis/ Notes </b>
       <textarea class="form-control noprint" id="notes" name="notes" rows="2" /><?=$notes?></textarea>
    </div>
    </div>
      <!-- Table row -->
  <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
        <div class="  " style="width: 100%;">
        <b style="font-weight:bold;margin:0 0 5px 0">Receipt / Indications <a class="noprint" href="clients/add_receipt/<?=$client_id?>" ><i class="fa fa-plus"></i> Add receipt</a></b>
       <textarea class="form-control noprint" id="indications" name="indications" rows="2" /><?=$indications?></textarea>
    </div>
    </div>
      <!-- Table row -->
    
      <!-- Table row -->
      <div class="row">
        <div class="  table-responsive" style="width: 100%;">
        <b>Other detail</b>
          <table class="table table-striped" id="items" style="margin:0; padding:0" cellpadding="0" cellspacing="0">
            
            <tbody class="field_wrapper">
            <?php
		  if(isset($editwork)){
			  $detailArr = json_decode($editwork->detail);
			  
			   $count = count($detailArr->items);
			 // echo '<pre>'; print_r($detailArr);
			  for($i=0;$i<$count;$i++){
				 $item = $detailArr->items[$i];
				
				  ?>
				  <tr id="row_0">
              <td style="margin:0"><textarea class="form-control" name="item[]"  /><?=$item?></textarea></td>
              
            </tr>
				 <?php  }
		  }else{
			  ?>
            <tr id="row_0">
              <td style="margin:0"><textarea class="form-control" name="item[]"  /></textarea></td>
            </tr>
        <?php } ?>
            </tbody>
            <tfoot>
            <tr>
            	<th ><a class="btn btn-info btn-xs add_button noprint "><i class="fa fa-plus"></i>Add Line</a></th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.col -->
        
        <div class=" " style="style="width: 100%;"">
          <div id="add_images_wrap" class="   other_wrap" style="width: 100%;" >                      
                    <label class="noprint">Add attachments <small>Pdf,png,jpg</small></small></label>
                     <input multiple="multiple" type="file" name="file[]" class="file noprint"  id="files" accept=".png,.PNG,.JPG,.jpg,.jpeg,.JPEG,.gif"  >
                     
                     <?php
			 if(isset($editwork)){	
					$post_id = $editwork->id;
			$where=array('workorder_id'=>$post_id);
			$tbl_files='clients_workorder_files';
			$ImgData = get_by_where_array($where,$tbl_files);
			
			foreach($ImgData->result() as $Imgrow){
				$src=base_url().'uploads/'.$Imgrow->file;
				$file='';
				if(strpos('.pdf',$src)!=false){
					$file='<a download id="img_'.$Imgrow->id.'" href="'.$src.'">Download Pdf</a>';
					}else{
						$file='<img id="img_'.$Imgrow->id.'" src="'.$src.'" class="img-responsive"  >';
						}
				{?>
				<div class="col-xs-4 col-md-2  box-primary  img_wrap_<?php echo $Imgrow->id ?>">
                <?=$file?>
                <center>
                <a onclick="getFile('<?php echo $Imgrow->id ?>','<?=$tbl_files?>')" class="btn btn-xs btn-success" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="Edit">
<i class="glyphicon glyphicon-edit"></i></a>
<a class="btn btn-xs btn-danger"  onclick="deleteImage('<?php echo $Imgrow->id ?>','<?=$tbl_files?>')" href="javascript:void(0)" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="Delete"><i class="fa fa-times"></i>
</a>
                </center>
                
                </div>
			<?php }	}
				
			}
					 ?>
                     </div>
                   
                    <span id="list"></span>
        
            <div class="clearfix">&nbsp;</div>
        </div>
                     
      </div>
      <!-- /.row -->

      
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class=" " style="width: 100%;">
          <a href="javascript:void(0)" onclick="PrintElem('invoice')"  class="btn btn-default noprint"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right noprint" onclick="submitform(1)"><i class="fa fa-envelope"></i> Save and mail
          </button>
         
           <button type="button" class="btn btn-success pull-right noprint" onclick="submitform(0)"><i class="fa fa-save"></i> Save
          </button>
          
          <!--<button type="button" class="btn btn-primary pull-right" id="downloadPdf" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>-->
        </div>
        
      </div>
      </form>
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
      
       <div class="   center " id="edit_image_wrap" style="width: 100%;display:none;margin: 40px 0px 0px;  padding: 0 0 15px;">
 <div  id="btn_close_edit_image_wrap" class="btn btn-box-tool pull-right" onclick="hide_this('edit_image_wrap')">
<i class="fa fa-times">
              </i>
</div>
<form id="form_edit_image" name="form_edit_image" style="margin: 0px;" enctype="multipart/form-data" method="post" class="form-bordered">
<div class="  " style="width: 100%;">
<div id="edit_small_image_div" ></div>


<div style="margin-top:20px">
<div   style="width: 33%;float:left;">
<input class="" name="edit_image" id="edit_image" size="20" type="file">
</div>
<div   style="width: 33%;float:left;">
<input class="btn btn-success " value="upload" type="submit">
</div>
</div>
<input name="edit_img_id" id="edit_img_id"  type="hidden">
<input  name="edit_image_hidden" id="edit_image_hidden"  type="hidden">
</div>

</form>
                </div> 
                <div class="clearfix">&nbsp;</div>
    </section>
    <!-- /.content -->
  </div>



  <?php  getFooter(); ?>
   <script type="text/javascript">
   
	function setp(rowid){
	var myval=	$('#row_'+rowid+' textarea' ).val();
	//alert();
		$('#row_'+rowid+' td').append('<div  class="showpdf hidden"><p>'+myval+'</p></div>');
		}
$(document).ready(function(){

$('textarea').change(function(){
	
	$(this).parent().append('<div  class="showpdf hidden"><p>'+$(this).val()+'</p></div>');
	});


	
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
      var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
			 var fieldHTML = '<tr  id="row_'+x+'"><td style="margin:0"><textarea onblur="setp('+x+');"  class="form-control textarea" name="item[]" /></textarea><a data-id="'+x+'" href="javascript:void(0);" class="remove_button"><i class="fa  fa-minus-circle"></i></a></td></tr>'; //New input field html 
 
			
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
		var id = $(this).attr('data-id');
		 
        $('#row_'+id).remove(); //Remove field html
        x--; //Decrement field counter
	
    });
});
</script>
  <script >
   

	
	
		
		function submitform(type){
			
			hideElements();
	var inputFile = $('input#files');
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
	var other_data = $('#form_add_update').serializeArray();
	
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
	
	
	//$('#form_add_update')
	
	 /*if($('#image').val()!=''){
		formData.append("image", document.getElementById('image').files[0]);
		}*/
		
		/*description = CKEDITOR.instances.editor1.getData();
		formData.append("description", description);*/
		if(type==1){
				$('.noprint').remove();
				$('.showpdf').removeClass('hidden');
				}
		        formData.append('pdfcontent',$('#invoice').html());
		        formData.append('ifmail',type);
				
				

	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'clients/saveOrderWork'; ?>",
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
			showElements();
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
  /**********************************save************************************/
	// $('#form_add_update').on("submit",function(e) {});
 $('#created_date').datepicker();
 $('#due_date').datepicker();
 
 
 function PrintElem(elem)
{

hideElements();
    window.print();
   // mywindow.close();

    return true;
}
function hideElements(){
	$('.main-footer').hide();
$('input').css('border','none');
$('.input-group-addon').css('border','none');
$('.add_button').hide();
$('.other_wrap>label').hide();
$('.other_wrap>input').hide();

	}
function showElements(){
	$('.main-footer').show();
$('.add_button').show();
$('.other_wrap>label').show();
$('.other_wrap>input').show();
	}	
/*******************/
window.onafterprint = function(){
   console.log("Printing completed...");
   $('.main-footer').show();
$('.add_button').show();
$('.other_wrap>label').show();
$('.other_wrap>input').show();

}
/*******************/

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
	
	
	 function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
  
  /****************/
  
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
		
		formData.append('tbl', 'clients_workorder_files');

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
	
	/************/
	/**************************************************************************/
function getFile(id,tbl){ 	// will get single entitty	and show its image in modal
	$('#edit_image_wrap').show('slow');
	$('#edit_image_wrap').addClass('shown');
		    $.ajax({
			url: "<?php echo base_url().'crud/edit'; ?>",
			type: 'POST',
			data: {id:id,table:tbl},
			dataType: "json",
			success: function(response) {
			if (response.status == 1)
            {   
			//populating data in form field
				var dataArr = response.data;
				$.each(dataArr, function (field, val) {
					$('#form_edit_image #'+field).val(val);
				});
				$('#edit_img_id').val(id);
				var src ='<?php echo base_url()?>uploads/'+response.data.file;
				$('#edit_small_image_div').html('<div class="col-xs-2"><img src="'+src+'" class="pull-left" width="100"></div>');
				$('#edit_image_hidden').val(response.data.image);
			}
			else  
			{   
			alert('response error');
			}
			}
		});
//}
	}


  </script>
  