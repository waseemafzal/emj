
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <ul class="sidebar-menu" data-widget="tree">
      
        <li >
          <a href="dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
        </li>
        
        

     
    
      <li><a href="<?php echo base_url();?>users"><i class="fa fa-user"></i> <span> Users</span></a></li>

            	
        <li class="<?=getActive('setting')?>"><a href="setting/edit" ><i class="fa fa-gear"></i>Account settings</a></li>
            <!--<li class="class="<?=getActive('contacts')?>><a href="contacts"><i class="fa fa-phone"></i>Contacts</a></li>-->

        <li class="<?= getActive('countries_management') ?>"><a href="countries_management"><i class="fa fa-th"></i> <span>Countries /State /city </span></a></li>

          <li class="<?= getActive('shipment_type') ?>"><a href="shipment_order"><i class='fa-shopping-cart'></i> <span>Shipment Orders</span></a></li>      
          
          <li class="<?= getActive('purchase_order') ?>"><a href="shipment_order/view_purchase_orders"><span>Purchase Orders</span></a></li>
          
          <li class="<?= getActive('landing_bill') ?>"><a href="shipment_order/view_landing_bill"><span>Bill of Landing</span></a></li>
      
      <li class="<?= getActive('warehouse_receipts') ?>" style='background-color:purple'><a style='color:#fff' href="warehouse_receipt/add"><span>Add Warehouse Receipt</span></a></li>

      <li class="<?= getActive('warehouse_receipts') ?>" style='background-color:purple'><a style='color:#fff' href="warehouse_receipt"><span>Warehouse Receipts List</span></a></li>

          <li class="<?= getActive('warehouse') ?>" style='background-color:yellow'><a href="warehouse"><span>Warehouses</span></a></li>

          <li class="<?= getActive('supplier') ?>" style='background-color:yellow'><a href="supplier"><span>Suppliers</span></a></li>

          <li class="<?= getActive('drivers') ?>" style='background-color:yellow'><a href="drivers"><span>Drivers</span></a></li>

          <li class="<?= getActive('commdity') ?>" style='background-color:yellow'><a href="commodity"><span>Commodity</span></a></li>
          
          <li class="<?= getActive('charges') ?>" style='background-color:yellow'><a href="charges"><span>Charges</span></a></li>

          <li class="<?= getActive('containers') ?>" style='background-color:yellow'><a href="container"><span>Containers</span></a></li>
        
          <li class="<?= getActive('secret_questions') ?>" style='background-color:yellow'><a href="secret_questions"><span>Secret Questions</span></a></li>
          
          <li class="treeview hidden">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="cms"><i class="fa fa-circle-o"></i>  CMS Pages</a></li>
              </ul>
        </li>
        
  <li><a href="auth/logout" ><i class="fa fa-sign-out"></i>Logout</a></li>
      </ul>


    </section>
    <!-- /.sidebar -->
   
  </aside>