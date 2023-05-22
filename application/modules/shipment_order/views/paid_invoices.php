<?php getHead();
$controller=$this->router->class;
$Heading=	'Paid Invoices';
 ?>
   <style>
   .txt-white{ color:#fff !important}
  .close {
    color: #fff; 
    opacity: 1;
}
.selectedRow{
    background-color: gainsboro;
}
   </style>
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      <?=$Heading?>
        
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
             <div class="box-body">
                <table id="post_table" class="table table-bordered responsive">
    <thead>
    <tr>
        <th></th>
        <th>User</th>
        <th>Email</th>
        <th>Created Date</th>
        <th>Due Date</th>
	    <th>Booking no</th>    
        <th>Paid</th>    
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	
	if($invoices!=''){
	foreach ($invoices as $invoice){
		
		?>
		<tr id="row_<?php echo $invoice['id'];?>">
        <td><input class='checkoption' id='invoiceMail' data-email='<?php echo $invoice["email"]?>' type='checkbox' data-id='<?php echo $invoice["id"]?>'></td>
        <td><?php echo $invoice['user_name'];?></td>
        <td><?php echo $invoice['email'];?></td>
	    <td><?php echo $invoice['created_date'];?></td>
        <td><?php echo $invoice['due_date'];?></td>
        <td><?php echo $invoice['booking_no'];?></td>
        <td><?php echo $invoice['paid'];?></td>

    <td class="center">
            
           <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-xs" href="<?=$controller?>/generateinvoice/<?php echo $invoice['id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-xs" href="javascript:void(0)" id="deleteion" onClick="deleteRecord('<?php echo $invoice['id'];?>', 'clients_invoice');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
        </td>
    </tr>
		<?php }
	}
		
	?>
    
    </tbody>
    </table>
</div>  

</div>
         <div class="modal fade" id="invoiceMailModal" tabindex="-1" data-bs-backdrop="static">
     <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
         <div class="modal-header bg-black">
           <h1 class="modal-title">Invoice Modal</h1>
             <button class="close" data-dismiss="modal"><span>&times;</span></button>
       </div>
       <div class="modal-body">
       <form id="sendMailInvoice">
           <!--<?php print_r($invoice);?>-->
         <label>From:</label>
         <input type="text" readonly name="name" class="form-control" value="EMJ Global"><br>
         <label>To:</label>
         <input type="email" id='email' readonly name="email" class="form-control">
         <input type='hidden' name='id' id='id'>
         <br><label>Template:</label>
             <select class='form-control' id="mail_templates">
              <option>Choose Template</option>
             <?php 
             $data = $this->db->get('mailing')->result_array();
            if($data){
              foreach($data as $template){            
                ?>
                  <option value='<?php echo $template['id']?>'><?php echo $template['title']?></option>
                <?php }}?>
                  </select>
          <br>
          <label>Description:</label>
          <textarea name='description' id='description' class='form-control'></textarea><br><br>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       <script type="text/javascript" src="bower_components/ckeditor/ckeditor.js"></script>   
<script type="text/javascript">

    $(document).ready(function(){
           CKEDITOR.replace('description');

    });
</script> 
          <button class="btn btn-success" type="submit">Save</button>
          <button class="btn btn-danger" data-dismiss="modal" >Cancel</button>
       </form>
       </div>
<script>
  $("input[type='checkbox']").on('change', function(e) {
    if (this.checked) {
      var id = checkedCheckbox();
      var email = checkedCheckboxEmail();
     // alert("id:" + id + ", Email:" + email);
      $('#invoiceMailModal').modal('show');
      $('#id').val(id);
      $('#email').val(email);
    }
  });

  function checkedCheckbox() {
    var selected = $('input.checkoption:checked').attr('data-id');
    return selected;
  }
  function checkedCheckboxEmail() {
    var selected = $('input.checkoption:checked').data('email');
    return selected;
  }
</script>
     <script>
     $(function() {
    $("#mail_templates").change(function(){
      var id = $('#mail_templates').val();
        $.ajax({
          type: "POST",
          url:  "<?=base_url()?>shipment_order/autocomplete_mailtemplate_description",
          data:{id:id},
          dataType: 'JSON',
          success:function(response){
            if(response.status==200){
              //alert(response.description);
              CKEDITOR.instances['description'].setData(response.description);
              //$('#description').val(response.description);
            }
          }
        })
    })
  })

</script>
<script>
    $("#sendMailInvoice").submit(function(e){
        e.preventDefault();
        var description = CKEDITOR.instances.description.getData();
        var email = $('#email').val();
        var id = $('#id').val();
        
    $.ajax({
        type: "POST", 
        url: '<?php echo base_url()?>/shipment_order/mailInvoice',
        data: {email:email, description:description, id:id},
        dataType: 'JSON',
        success:function(response){
            if(response.status==200){
                alert(response.message);
                $('#invoiceMailModal').modal('hide');
            }
        }
    })
    })
</script>
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
<script type="text/javascript">
   $(document).ready(function(){

      $('.checkoption').click(function() {
         $('.checkoption').not(this).prop('checked', false);
      });

   });
   </script>
<!--  <script>-->
<!--      $("input:checkbox").each(function(){-->
<!--       var $this = $(this);    -->
<!--    if($this.is(":checked")){-->
<!--        alert($this.attr("data-id"));-->
<!--    }-->
<!--});-->
<!--  </script>-->