<select onchange="dockreceipt('<?php echo $row->id?>', this.value)">
            <option>Select</option>
            <option value='dock_receipt'>Dock Receipt</option>
            <option value='bill_of_landing'>Landing Bill</option>
          </select>
function redirectMe(id){
    window.location.href="shipment_order/generate?id="+id;
  }