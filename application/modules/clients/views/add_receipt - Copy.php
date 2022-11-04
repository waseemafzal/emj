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
	position: absolute;top: -16px;
	display:none;

	}
#headerButtons>a{
	font-size:12px
	}
   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="padding-left:5px">
        Clients  Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="clients">View clients </a></li>
      </ol>
    </section>

    <!-- Main content -->
    
    <section class="content"  >
                 <form id="form_add_update" name="form_add_update" role="form">
<div class="alert hidden"></div>
      <div class="row">
        <div class="col-xs-12">
          <div  class="invoice" id="invoice">
            <!-- /.box-header -->
            <div class="box-body" >
             <section  >
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header" id="page-header" contenteditable="true" >
         
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
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
        
        
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
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo ucfirst($row->name) ?></strong><br>
           
            Phone: <?php echo ucfirst($row->phone) ?><br>
            Email: <?php  echo ucfirst($row->email) ?><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
           <?php
		 	 $indications='';
			 $consultation='';
			 $notes='';
		  if(isset($editwork)){}else{
				 
				 			  $client_id= $row->id;
			  $created_date= date('d/m/Y');
			  
			  
				  }
				  
		     ?>
         <input type="hidden" value="<?=$client_id?>" name="client_id" />
          <br>
          <b>Date:</b> <input class="customControl" id="created_date" value="<?=$created_date?>" name="created_date" />
        </div>
       
     
        <!-- /.col -->
      </div>
      <div class="row">
       <div class="col-sm-12 invoice-col">
        <p>Receipt / Indications </p>
       <p id="receipt" contenteditable="true"> Type here ... </p>
        </div>
        <br>
      </div>
      <!-- /.row -->

    <!-- this row will not appear when printing -->
      
    </section>
    <div class="row no-print">
        <div class="col-xs-12">
          <a href="javascript:void(0)" onclick="PrintElem('invoice')"  class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Send Mail
          </button>
          <button type="button" class="btn btn-primary pull-right" id="downloadPdf" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
                 </div>
                
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    document.getElementById("downloadPdf")
      .addEventListener("click", function download() {
		  $('.no-print').remove();
		  const element = document.getElementById("invoice");
html2pdf()
        .from(element)
        .toPdf()
        .save();
		setTimeout(function(){
		location.reload();
			},2000)


      });
	  
	  function generatePDF() {
		   
    const element = document.getElementById("invoice");

    const opt = {
        filename: "methodo.pdf",
        image: { type: "png", quality: 0.85 },
        html2canvas: {
            scale: 3,
            logging: true,
            letterRendering: true,
            useCORS: true,
        },
        jsPDF: {
            unit: "in",
            format: "letter",
            orientation: "portrait",
        },
    };

    // Promise-based usage: .set(opt)
    html2pdf()
        .from(element)
        .toPdf()
        .save();
		
		
}
	  
  </script>
  <?php  getFooter(); ?>
   
  <script>
   

	
  /**********************************save************************************/
	 $('#form_add_update').on("submit",function(e) {
		e.preventDefault();
		 $('.no-print').hide();
		var formData = new FormData();
/*	var inputFile = $('input#files');
		var filesToUpload = inputFile[0].files;
		if (filesToUpload.length > 0) {
			for (var i = 0; i < filesToUpload.length; i++) {
				var file = filesToUpload[i];
				formData.append("file[]", file, file.name);
			}
		}
*/	var other_data = $('#form_add_update').serializeArray();
	
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
        formData.append('receipt',$('#receipt').html());
        formData.append('pdfcontent',$('#invoice').html());
	
	//$('#form_add_update')
	
	 /*if($('#image').val()!=''){
		formData.append("image", document.getElementById('image').files[0]);
		}*/
		
		/*description = CKEDITOR.instances.editor1.getData();
		formData.append("description", description);*/
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'clients/saveReciept'; ?>",
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
			$('.no-print').show();
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
    });
 $('#created_date').datepicker();
 $('#due_date').datepicker();
 
 
 function PrintElem(elem)
{
$('.main-footer').hide();
$('input').css('border','none');
$('.input-group-addon').css('border','none');


    window.print();
   // mywindow.close();

    return true;
}

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

 // document.getElementById('files').addEventListener('change', handleFileSelect, false);
  
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
  
  