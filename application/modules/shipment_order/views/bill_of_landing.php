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
    <div id='pdf'>
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
                  <td colspan='2'>B/L Number<br><?php echo $result[0]['landing_bill_no'];?></td>
                 </tr>
                 <tr>
                  <td colspan='3'>Export References</td>
                 </tr>
                 <tr>
                  <td rowspan='2'>CONSIGNED TO<br><b><?php echo $result[0]['consignee_name'];?></b><br>
                  <?php echo $result[0]['consignee_address'];?></td>
                  <td colspan='3'> FORWARDING AGENT<br><b><?php echo $result[0]['forwording_agent'];?></b><br>
                  <?php echo $result[0]['forwording_agent_address'];?></td>
                 </tr>
                 <tr>
                  <td colspan='3'> POINT (STATE) OF ORIGIN OR FTZ NUMBER<br><b><?php echo $result[0]['port_of_origin'];?></b></td>
                 </tr>
                 <tr>
                  <td colspan='2'> NOTIFY PARTY /INTERMEDIATE CONSIGNEE<br><b><?php echo $result[0]['notify_party'];?></b><br>
                  <?php echo $result[0]['notify_party_address'];?></td>
                  <td rowspan='2' colspan='2'> DOMESTIC ROUTING / EXPORT INSTRUCTIONS</td>
                 </tr>
                 <tr>
                  <td> PRE-CARRIAGE BY<br><b><?php echo $result[0]['pre_carriage_by'];?></b></td>
                  <td>PLACE OF RECEIPT BY PRE-CARRIER<br><b><?php echo $result[0]['place_of_receipt'];?></b></td>
                  <td></td>
                 </tr>
                 <tr>
                  <td> EXPORTING CARRIER<br><b><?php echo $result[0]['exporting_carrier'];?></b></td>
                  <td>PORT OF LOADING/ EXPORT<br><b><?php echo $result[0]['port_of_loading'];?></b></td>
                  <td>LOADING PIER / TERMINAL<br><b><?php echo $result[0]['loading_pier'];?></b></td>
                  <td></td>
                 </tr>
                 <tr>
                  <td> FOREIGN PORT OF UNLOADING<br><b><?php echo $result[0]['port_of_unloading'];?></b></td>
                  <td>PLACE OF DELIVERY BY ON-CARRIER<br><b><?php echo $result[0]['place_of_delivery'];?></b></td>
                  <td>TYPE OF MOVE<br><b>Vessel</b></td>
                  <td>CONTAINERIZED (Vessel only)<br>Yes&nbsp;&nbsp;<input type='checkbox'>&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;<input type='checkbox'></td>
                 </tr>
                 <tr>
                  <td colspan='4'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          <th>Marks and Numbers (18)</th>
                          <th>No of Packages (19)</th>
                          <th>Description of Comodities (20)</th>
                          <th>Gross Weight (kg)(21)</th>
                          <th>Measurement (22)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>WR EGW14172</td>
                          <td>1 VEH</td>
                          <td>2016 HONDA CIVIC EX<br>
                              VIN:2HGFC2F77GH574944<br>
                              AES ITN:X20220706171267
                        </td>
                          <td>1,267.79 Kg<br>"2,795.00 Lb"</td>
                          <td>418.77 ft³<br>"4,359.24 Vlb"</td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                 </tr>
                 <tr>
                  <td colspan='4'>
                 Carrier has a policy against payment, solicitation, or receipt of any rebate, directly or indirectly, which would be unlawful under the United States Shipping Act, 1984 as amended.</td></tr>
                <tr>
                 <td colspan='4'>DECLARED VALUE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;READ CLAUSE 29 HEREOF CONCERNING EXTRA FREIGHT AND CARRIER'S LIMITATION OF LIABILITY.</td></tr>
                 <tr>
                  <td colspan='2'>
                    <table class='table table-bordered'>
                      <thead>
                        <tr>
                          <th style='font-size:13px'>FREIGHT RATES, CHARGES, WEIGHTS AND / OR MEASUREMENTS<br>SUBJECT TO CORRECTION</th>
                          <th>PREPAID</th>
                          <th>COLLECT</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <td height='200px'></td>
                        <td height='200px'></td>
                        <td height='200px'></td>
                        </tr>
                        <tr>
                        <td>GRAND TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USD</td>
                        <td></td>
                        <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                  <td colspan='2'>
                  <p>Received by the Carrier for shipment by ocean vessel between port of loading and port of
discharge.</p><br><br>
DATED AT: <hr style='margin-top:-10px;border:1px solid black;width:70%;margin-right:20px'>
<br>
BY: <hr style='margin-top:-10px;border:1px solid black;width:86%;margin-right:20px'>
<p style='text-align:center'>AGENT FOR CARRIER</p>
  Month: July &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Day 06 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Year 2023
                  </td>
                 </tr>
                </table>
          </div>
          <button type="button" class='btn btn-lg btn-primary' style='margin:5% 50%;' value="click" onclick="printDiv()">Print</button>
        </div>

        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   

  <?php  getFooter(); ?>
  <script>
        function printDiv() {
            var divContents = document.getElementById("pdf").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
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

  

  
  
  