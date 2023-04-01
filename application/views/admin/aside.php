
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <ul class="sidebar-menu" data-widget="tree">
      
        <li >
          <a href="dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
        </li>
        
                  <li class="treeview">
          <a href="#">
             <i class="fa fa-cog"></i>
                 <span>Warehouse</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
          </a>
      
          <ul class="treeview-menu">

          <li><a href="warehouse"><i class="fa fa-circle-o"></i>Warehouse List</a></li>      
      
          <li><a href="warehouse_receipt/add"><i class="fa fa-circle-o"></i>Add Warehouse Receipt</a></li>
          
          <li><a href="warehouse_receipt"><i class="fa fa-circle-o"></i>Warehouse Receipt List</a></li>
          
        
        </ul>
      </li>
      <li class="treeview">
          <a href="#">
             <i class="fa fa-cog"></i>
                 <span>Warehouse Resources</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
      
          </a>
      
          <ul class="treeview-menu">
<li class="<?= getActive('supplier') ?>" ><a href="supplier"><span>Suppliers</span></a></li>

          <li class="<?= getActive('drivers') ?>" ><a href="drivers"><span>Drivers</span></a></li>

          <li class="<?= getActive('commdity') ?>" ><a href="commodity"><span>Commodity</span></a></li>
          
          <li class="<?= getActive('charges') ?>" ><a href="charges"><span>Charges</span></a></li>

          <li class="<?= getActive('containers') ?>" ><a href="container"><span>Containers</span></a></li>          
                       
          
          <li class="<?= getActive('mode_of_transport') ?>"><a href="mode_of_transport"><span>Mode of Transport</span></a></li>

          <li class="<?= getActive('packages') ?>"><a href="packages"><span>Packages</span></a></li>

          <li class="<?= getActive('commodity_types') ?>"><a href="commodity_types"><span>Commodity Types</span></a></li>

          <li class="<?= getActive('inventory_items_definition') ?>"><a href="inventory_items_definition"><span>inventory Items</span></a></li>

          <li class="<?= getActive('carriers') ?>"><a href="carriers"><span>Carriers</span></a></li>

          <li class="<?= getActive('ports') ?>"><a href="ports"><span>Ports</span></a></li>


        </ul>
        
      </li>

<li class="<?= getActive('shipment_type') ?>"><a href="shipment_order"><i class='fa-shopping-cart'></i> <span>Shipment Orders</span></a></li> 
     
    
         <li><a href="<?php echo base_url();?>users"><i class="fa fa-user"></i> <span> Users</span></a></li>

            	
         <li class="<?=getActive('setting')?>"><a href="setting/edit" ><i class="fa fa-gear"></i>Account settings</a></li>
            <!--<li class="class="<?=getActive('contacts')?>><a href="contacts"><i class="fa fa-phone"></i>Contacts</a></li>-->

          <li class="<?= getActive('countries_management') ?>"><a href="countries_management"><i class="fa fa-th"></i> <span>Countries /State /city </span></a></li>

          <li class="<?= getActive('purchase_order') ?>"><a href="shipment_order/view_purchase_orders"><span>Purchase Orders</span></a></li>
          
          <li class="<?= getActive('landing_bill') ?>"><a href="shipment_order/view_landing_bill"><span>Bill of Landing</span></a></li>
          
 


          
        
          <li class="<?= getActive('secret_questions') ?>" ><a href="secret_questions"><span>Secret Questions</span></a></li>
        
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