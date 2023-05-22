<div class='col-md-4'>
<select id="status_change" class='form-control' style='width:100%' onchange="updateStatus('<?php echo $status['id'];?>', this.value)">
           <?php 
             $query = $this->db->get('shipment_status')->result_array();

           foreach($query as $status){
           echo '<option value = "'.$status['status_id'].'" '.$selected.'>'.$status['status_title'].'</option>';
           } ?>
         </select>
        </div>
        <div class='col-md-4'>
          <a style='margin-left:80px' class='btn btn-success' href='javascript:void(0)'><i class='fa fa-plus'></i>Generate Invoice</a>
        </div>
        <script>

 var formData = new FormData();
 formData.append("id", id);
 formData.append("status", status);
  // ajax start
        $.ajax({
      type: "POST",
      url: "<?php echo base_url()?>shipment_order/updateStatus",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'JSON',
      beforeSend: function() {
      $('#loader').removeClass('hidden');
    //  $('#form_add_update .btn_au').addClass('hidden');
      },
      success: function(data){
        $('#loader').addClass('hidden');
        if(data.status==200){
          alert('Status has been changed successfully');
        }
           }
   });
</script>  