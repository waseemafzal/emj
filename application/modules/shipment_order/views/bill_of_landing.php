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
              <h1 style='color:blue;float:right'>Bill of Landing</h1>
                 <table class='table table-bordered'>
                 <tr>
                  <td rowspan='2'>
                  Exporter<br>
                  <b>Emjay Global LLC, FMC#024627N</b><br>
                  6254 FRANKFORD AVENUE<br>
                  443-304-2803, Tel: 443-304-2803,<br>
                  BALTIMORE, MD 21206. UNITED STATES
                  </td>
                  <td>Document Number<br>SAL-575448</td>
                  <td colspan='2'>B/L Number<br>EMJ13678</td>
                 </tr>
                 <tr>
                  <td colspan='3'>Export References</td>
                 </tr>
                 <tr>
                  <td rowspan='2'>CONSIGNED TO<br><b>IBRAHIM B ABARSHI</b><br>
                                  2 KAGARA CLOSE<br>
                                  U/RIME<br>
                                  KADUNA. NIGERIA</td>
                  <td colspan='3'> FORWARDING AGENT<br><b>Emjay Global LLC, FMC#024627N</b><br>
                                   6254 FRANKFORD AVENUE<br>
                                   443-304-2803, BALTIMORE, MD 21206. UNITED STATES</td>
                 </tr>
                 <tr>
                  <td colspan='3'> POINT (STATE) OF ORIGIN OR FTZ NUMBER<br><b>BALTIMORE</b></td>
                 </tr>
                 <tr>
                  <td colspan='2'> NOTIFY PARTY /INTERMEDIATE CONSIGNEE<br><b>BALA ABARSHI</b><br>4703 WITCHHAZEL WAY<br>
                       ABERDEEN, MD 21001. UNITED STATES</td>
                  <td rowspan='2' colspan='2'> DOMESTIC ROUTING / EXPORT INSTRUCTIONS</td>
                 </tr>
                 <tr>
                  <td> PRE-CARRIAGE BY<br><b>SALLAUM LINES</b></td>
                  <td>PLACE OF RECEIPT BY PRE-CARRIER<br><b>BALTIMORE</b></td>
                  <td></td>
                 </tr>
                 <tr>
                  <td> EXPORTING CARRIER<br><b>SILVER QUEEN / 22SQ06</b></td>
                  <td>PORT OF LOADING/ EXPORT<br><b>BALTIMORE</b></td>
                  <td>LOADING PIER / TERMINAL<br><b>SOUTH LOCUST POINT</b></td>
                  <td></td>
                 </tr>
                 <tr>
                  <td> FOREIGN PORT OF UNLOADING<br><b>TINCAN SEAPORT</b></td>
                  <td>PLACE OF DELIVERY BY ON-CARRIER<br><b>TINCAN SEAPORT</b></td>
                  <td>TYPE OF MOVE<br><b>Vessel</b></td>
                  <td>CONTAINERIZED (Vessel only)<br>Yes&nbsp;&nbsp;<input type='checkbox'>&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;<input type='checkbox'></td>
                 </tr>
                 </table>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   

  <?php  getFooter(); ?>
<script>
 function updateStatus(id,status){

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

  }
</script>  
<script>
$('#post_table').dataTable( {
  "ordering": false
} );
</script>

  

  
  
  