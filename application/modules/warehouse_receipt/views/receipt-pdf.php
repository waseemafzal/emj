<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css">
<title>Warehouse Receipt</title>
</head>
<body style='padding:0 5%'>
    <div id='pdf'>
        <div>
          <div style='float:left;'>
          <h2>EMJ Global</h2>
          <h4>Address:&nbsp;<?php echo $settings[0]['address'];?></h4>
          <h4>Email:&nbsp;<?php echo $settings[0]['email'];?></h4>
          <h4>Phone:&nbsp;<?php echo $settings[0]['phone'];?></h4>
</div>
<div style='float:right;'>
    <h2>Warehouse Receipt</h2>
    <img src='<?php echo base_url()?>/uploads/barcode.png' height='50' width='200'>
</div>
    </div>
<br><br>
        <div>
            <table border='1' style='width:100%'>
                <thead>
                    <tr style='background-color:silver'>
                    <th colspan='3' style='text-align:center'>Shipper Details</th>
                    <th colspan='3' style='text-align:center'>Consignee Details</th>
</tr>
                </thead>
                <tbody>
                    <tr>
                    <td colspan='3'><b>Name:</b>&nbsp;<?php echo $data[0]['shipper_name'].'<br><b>Address:</b>&nbsp;'.$data[0]['shipper_address']?></td>
                    <td colspan='3'><b>Name:</b>&nbsp;<?php echo $data[0]['consignee_name'].'<br><b>Address:</b>&nbsp;'.$data[0]['consignee_address']?></td>
                </tr>
                     <tr>
                        <th style='background-color:silver;text-align:center' colspan='6'>Inland Carrier and Supplier Information</th>
                        
</tr>
                  <tr>
                    <th>Carrier Name:</th>
                    <td><?php echo $data[0]['carrier']?></td>
                    <th colspan='1'>Driver Name:</th>
                    <td colspan='1'><?php echo $data[0]['driver_name']?></td>
                  </tr>
                  <tr>
                  <th>Driver License:</th>
                    <td colspan='1'><?php echo $data[0]['driver_license_number']?></td>
                    <th colspan='1'>PRO Number:</th>
                    <td colspan='1'><?php echo $data[0]['pro_number']?></td>
                  </tr>
                  <tr>
                  <th colspan='1'>Supplier Name:</th>
                    <td colspan='1'><?php echo $data[0]['supplier_name']?></td>
                  
                  </tr>
                  <tr>
                        <th style='background-color:silver;text-align:center' colspan='4'>Applicable Charges</th>
                        
</tr>
                  <tr>
                    <th width='10%'>Tax Rate:</th>
                    <td width='25%'><?php echo $data[0]['tax_rate']?></td>
                    <th width='10%'>Tax Amount:</th>
                    <td width='25%'><?php echo $data[0]['tax_amount']?></td>
                  </tr>
                  <tr>
                    <th width='10%'>Expense:</th>
                    <td width='25%'><?php echo $data[0]['expense']?></td>
                    <th width='10%'>Income:</th>
                    <td width='25%'><?php echo $data[0]['income']?></td>
                  </tr>
                  <tr>
                    <th width='10%'>Currency:</th>
                    <td width='25%'><?php echo $data[0]['currency']?></td>
                    <th width='10%'>Price:</th>
                    <td width='25%'><?php echo $data[0]['price']?></td>
                  </tr>
                  <tr>
                    <th width='10%'>Amount(Inc. tax):</th>
                    <td width='25%'><?php echo $data[0]['amount_with_tax']?></td>
                    <th width='10%'>Final Amount:</th>
                    <td width='25%'><?php echo $data[0]['final_amount']?></td>
                  </tr>
                  <tr>
                    <th width='25%'>Package:&nbsp;<?php echo $data[0]['package_type']?></th>
                    <th width='25%'>Dimensions(LxWxH):&nbsp;<?php echo $data[0]['length'].','.$data[0]['width'].','.$data[0]['height']?></th>
                    <th width='25%'>Description:&nbsp;<?php echo $data[0]['description']?></th>
                    <th width='25%'>Container Weight:&nbsp;<?php echo $data[0]['container_weight']?></th>
                    
</tr>
                  <tr style='background-color:silver'>
                    <th colspan='2' width='50%'>Container Volume:&nbsp;<?php echo $data[0]['container_volume']?></th>
                    <th colspan='2' width='50%'>Volume Unit:&nbsp;<?php echo $data[0]['volume_unit']?></th>
                    
</tr>
                  <tr>
                    <th width='25%'>Location:&nbsp;<?php echo $data[0]['location']?></th>
                    <th width='25%'>Quantity:&nbsp;<?php echo $data[0]['quantity']?></th>
                    <th width='25%'>Part Number:&nbsp;<?php echo $data[0]['part_number']?></th>
                    <th width='25%'>Model:&nbsp;<?php echo $data[0]['model']?></th>
</tr>
                  <tr>
                    <th width='25%'>Serial no. 1:&nbsp;<?php echo $data[0]['serial_number_1']?></th>
                    <th width='25%'>Serial no. 2:&nbsp;<?php echo $data[0]['serial_number_2']?></th>
                    
</tr>
  <?php if(isset($charges) && $charges!=''){?>                       
<tr>

                          <th style='background-color:silver;text-align:center' colspan='4'>Charges</th>
</tr> 
<tr>
  <td colspan='4'>
    <table class='table table-striped'>
      <thead>
        <tr>
          <th>Status</th>
          <th>Description</th>
          <th>Income</th>
          <th>Tax Amount</th>
          <th>Tax Code</th>
          <th>Tax Rate</th>
          <th>Expense</th>
          <th>Amt With Tax</th>
          <th>Currency</th>
          <th>Price</th>
          <th>Prepaid</th>
          <th>Quantity</th>
          <th>Amount</th>
          <th>Final Amount</th>
          </thead>
        </tr>
      <tbody>
      <?php foreach($charges as $charged){?>
        <tr>
        <td><?php echo $charged['charges_status'];?></td>
        <td><?php echo $charged['charges_description'];?></td>
        <td><?php echo $charged['income'];?></td>
        <td><?php echo $charged['tax_amount'];?></td>
        <td><?php echo $charged['tax_code'];?></td>
        <td><?php echo $charged['tax_rate'];?></td>
        <td><?php echo $charged['expense'];?></td>
        <td><?php echo $charged['amount_with_tax'];?></td>
        <td><?php echo $charged['currency'];?></td>
        <td><?php echo $charged['price'];?></td>
        <td><?php echo $charged['prepaid'];?></td>
        <td><?php echo $charged['quantity'];?></td>
        <td><?php echo $charged['amount'];?></td>
        <td><?php echo $charged['final_amount'];?></td>
        </tr>
        <?php }}?>
  </tbody>
    </table>
  </td>
</tr>
     </tbody>
       </table>
</div>
</div>
<button type="button" class='btn btn-lg btn-primary' style='margin:5% 50%;' value="click" onclick="printDiv()">Print</button>
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</html>
 <!-- Script to print the content of a div -->
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