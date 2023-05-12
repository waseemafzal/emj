
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
             <i class="fa fa-home"></i>
                 <span>Create Shipment</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
          </a>
      
          <ul class="treeview-menu">

         
          <li><a href="shipment_order/add_personal_effects?shipment_type=1" ><i style='font-size:20px' class="fa fa-user"></i> Personal Effects</a></li>
          
          <li><a href="shipment_order/add_ocean_shipment?shipment_type=2"><i style='font-size:20px' class="fa fa-ship icon-white"></i> Ocean Freight</a></li>
          <li><a href="shipment_order/add_air_shipment?shipment_type=3" ><i style='font-size:20px' class="fa fa-plane icon-white"></i> Air Freight</a></li>
          <li><a href="shipment_order/add_vehicle_shipment?shipment_type=4" ><i style='font-size:20px' class="fa fa-truck icon-white"></i> Vehicle Shipment</a></li>
          
        
        </ul>
      </li>
                  <li class="treeview">
          <a href="#">
             <i class="fa fa-home"></i>
                 <span>Warehouse</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
          </a>
        <ul class="treeview-menu">
          <li><a href="warehouse_receipt/add"><i class="fa fa-circle-o"></i>Add Warehouse Receipt</a></li>
          <li><a href="warehouse_receipt"><i class="fa fa-circle-o"></i>Warehouse Receipt List</a></li>
        </ul>
      </li>
      <li class="treeview">
          <a href="#">
             <i class="fa fa-cog"></i>
                 <span>Maintenance</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                                     </span>
      
          </a>
      
          <ul class="treeview-menu">
          <li class="<?= getActive('cat') ?>"><a href="cat"><span>Directories</span></a></li>
          <li class="<?= getActive('carriers') ?>"><a href="carriers"><span>Carriers</span></a></li>
          <li class="<?= getActive('commodity_types') ?>"><a href="commodity_types"><span>Commodity Types</span></a></li>
          <li class="<?= getActive('commdity') ?>" ><a href="commodity"><span>Commodity</span></a></li>
          <li class="<?= getActive('charges') ?>" ><a href="charges"><span>Charges</span></a></li>
          <li class="<?= getActive('containers') ?>" ><a href="container"><span>Containers</span></a></li>          
         <li class="<?= getActive('mail_templates') ?>" ><a href="mail_templates"><span>Mail Templates</span></a></li>                
          <li class="<?= getActive('drivers') ?>" ><a href="drivers"><span>Drivers</span></a></li>
          <li class="<?= getActive('mode_of_transport') ?>"><a href="mode_of_transport"><span>Mode of Transport</span></a></li>
          <li class="<?= getActive('packages') ?>"><a href="packages"><span>Packages</span></a></li>
          <li class="<?= getActive('ports') ?>"><a href="ports"><span>Ports</span></a></li>
          <li class="<?= getActive('supplier') ?>" ><a href="supplier"><span>Suppliers</span></a></li>
          <li class="<?= getActive('inventory_items_definition') ?>"><a href="inventory_items_definition"><span>inventory Items Definition</span></a></li>
          <li><a href="warehouse"><i class="fa fa-circle-o"></i>Warehouse List</a></li>      
      

        </ul>
        
      </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Outgoing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php 
       $categories = getCategory();
          foreach($categories as $category){
             $categoryhistory = getCategoryhistory($category['id']);
             $subcategory=getSubcategory($category['id']);
                if(count($subcategory)>0){?>
    <li class="treeview">
    <a href="javascript:void(0)" class='selectedId' data-id='<?php echo $category['id'];?>'><i class="fa fa-circle-o"></i><?php echo $category['title'];?> 
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
   <ul class="treeview-menu">
   <?php 
                       if(count($categoryhistory)>0){
                        echo '<ul style="color:white">';
           foreach($categoryhistory as $catehistory){?> 
<li>
<a href="<?php echo base_url()?>/shipment_order/edit/<?php echo $catehistory['shipment_order_id'].'/'.$catehistory['shipment_type']?>" style='color:white' class='selectedId' data-id='<?php echo $subhistory['id'];?>'><i class="fa fa-user"></i> &nbsp; <?php echo $catehistory['shipper_name'];?>
           </a>          
           </li>
           <?php }
          echo '</ul>';
          } ?>
              <?php foreach($subcategory as $subcat){
      $subchilds = getSubchild($subcat['id']);
      $subcatshistory=getSubcathistory($subcat['id']);
if(count($subchilds)>0){
    ?>
                <li class="treeview">
                  <a href="javascript:void(0)" class='selectedId' data-id='<?php echo $subcat['id'];?>'><i class="fa fa-circle-o"></i> <?php echo $subcat['title'];?>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <?php if(count($subcatshistory)>0){
                        echo '<ul style="color:white">';
           foreach($subcatshistory as $subcathistory){?> 
<li>
          <a href="<?php echo base_url()?>/shipment_order/edit/<?php echo $subcathistory['shipment_order_id'].'/'.$subcathistory['shipment_type']?>" style='color:white' class='selectedId' data-id='<?php echo $subcathistory['id'];?>'><i class="fa fa-user"></i> &nbsp; <?php echo $subcathistory['shipper_name'];?>
           </a>          
           </li>
           <?php }
          echo '</ul>';
          } ?>
                     <?php foreach($subchilds as $subchild){
                       $subchildhistory=getSubchildhistory($subchild['id']);?>
                        <li><a href="javascript:void(0)" class='selectedId' data-id='<?php echo $subchild['id'];?>'><i class="fa fa-circle-o"></i> <?php echo $subchild['title']?></a>
                      
                       <?php 
                       if(count($subchildhistory)>0){
                        echo '<ul style="color:white">';
           foreach($subchildhistory as $subhistory){?> 
<li>
<a href="<?php echo base_url()?>/shipment_order/edit/<?php echo $subhistory['shipment_order_id'].'/'.$subhistory['shipment_type']?>" style='color:white' class='selectedId' data-id='<?php echo $subhistory['id'];?>'><i class="fa fa-user"></i> &nbsp; <?php echo $subhistory['shipper_name'];?>
           </a>          
           </li>
           <?php }
          echo '</ul>';
          } ?>
                      </li>                      
      <?php }

      
          ?>
<?php 
        }else{?>
                         <li class="treeview">
                         <a href="javascript:void(0)" class='selectedId ' data-id='<?php echo $subcat['id'];?>'><i class="fa fa-circle-o"></i> <?php echo $subcat['title']?>
                         </a>
                         <?php
                  if(count($subcatshistory)>0){
                        echo '<ul style="color:white">';
           foreach($subcatshistory as $subcathistory){?> 
<li>
          <a href="<?php echo base_url()?>/shipment_order/edit/<?php echo $subcathistory['shipment_order_id'].'/'.$subcathistory['shipment_type']?>" style='color:white' class='selectedId' data-id='<?php echo $subcathistory['id'];?>'><i class="fa fa-user"></i> &nbsp; <?php echo $subcathistory['shipper_name'];?>
           </a>          
           </li>
           <?php }
          echo '</ul>';
          } ?>
                      <?php }?>
                  </ul>
                </li>
                <?php }}else{?>
            <li class="treeview">
              <a href="javascript:void(0)" class='selectedId' data-id='<?php echo $category['id'];?>'><i class="fa fa-circle-o"></i><?php echo $category['title'];?> 
              </a>
              <?php 
                       if(count($categoryhistory)>0){
                        echo '<ul style="color:white">';
           foreach($categoryhistory as $catehistory){?> 
<li>
<a href="<?php echo base_url()?>/shipment_order/edit/<?php echo $catehistory['shipment_order_id'].'/'.$catehistory['shipment_type']?>" style='color:white' class='selectedId' data-id='<?php echo $subhistory['id'];?>'><i class="fa fa-user"></i> &nbsp; <?php echo $catehistory['shipper_name'];?>
           </a>          
           </li>
           <?php }
          echo '</ul>';
          } ?>
            </li>
            <?php }}?>
            </ul>
        </li>
         <li class="<?= getActive('shipment_type') ?>"><a href="shipment_order"><i class='fa fa-shopping-cart'></i> <span>Shipment Orders</span></a></li> 
         <li class="<?= getActive('pickup_orders') ?>"><a href="pickup_orders"><i class='fa fa-shopping-cart'></i> <span>Pickup Orders</span></a></li> 
         <!-- <li class="<?= getActive('purchase_order') ?>"><a href="shipment_order/view_purchase_orders"><i class='fa fa-shopping-cart'></i><span>Purchase Orders</span></a></li> -->
         <!-- <li class="<?= getActive('landing_bill') ?>"><a href="shipment_order/view_landing_bill"><i class='fa  fa-arrow-down'></i><span>Bill of Landing</span></a></li> -->
          
         <li><a href="<?php echo base_url();?>users"><i class="fa fa-user"></i> <span> User</span></a></li>
         <li><a href="<?php echo base_url();?>auth/create_user"><i class="fa fa-user"></i> <span> Create User</span></a></li>
         <li><a href="<?php echo base_url();?>supplier"><i class="fa fa-user"></i> <span> Supplier</span></a></li>

            	
         <li class="<?=getActive('setting')?>"><a href="setting/edit" ><i class="fa fa-gear"></i>Account settings</a></li>
            <!--<li class="class="<?=getActive('contacts')?>><a href="contacts"><i class="fa fa-phone"></i>Contacts</a></li>-->

          <li class="<?= getActive('countries_management') ?>"><a href="countries_management"><i class="fa fa-globe"></i> <span>Countries /State /city </span></a></li>

         
          
         
 


          
        
          <li class="<?= getActive('secret_questions') ?>" ><a href="secret_questions"><i class="fa fa-question-circle" aria-hidden="true"></i><span>Secret Questions</span></a></li>
        
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