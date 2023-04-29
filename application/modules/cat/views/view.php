<?php getHead(); ?>
    <link rel="stylesheet" href="<?=base_url()?>frontend_assets/fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="<?=base_url()?>plugins/font-awesome/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />

<style>
.imgofcat{
    width: 29px;
    border-radius: 2px;
    border: 1px solid #c3bbbb;
    margin: 0 0 0 5px;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Directories Management

    </h1>
    <ol class="breadcrumb">
      <a href="cat/add" class="btn btn-sm btn-info">Create New Folder</a>
    </ol>
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
          
      <div class="col-md-8" >
            <div class="table-responsive">

              <table id="post_table" class="table table-striped table-bordered   responsive">
                <thead>
                  <tr>

                    <th width="10">#</th>
                    <th>Title</th>
<th>Image</th>


                    <th>Status</th>

                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $data_type = 0; // parent
                  if (isset($_GET['subcategory'])) {
                    $data_type = 1; //subcategory
                    $subcategories = get_data('categories', array('parent' => $_GET['subcategory']));
                    foreach ($subcategories as $key => $sub) {
                      $subcategories[$key]['child'] = get_data('categories', array('parent' => $sub['id']));
                    }
                    $category = $subcategories;
                  } elseif (isset($_GET['child'])) {
                    $data_type = 2; //child
                    $child = get_data('categories', array('parent' => $_GET['child']));
                    $category = $child;;
                  }
                  if (!empty($category)) {
$i=1;
                    foreach ($category as $key => $cat) {



                  ?>
                      <tr id="row_<?php echo $cat['id']; ?>">
<td><?php echo $i; ?></td>
                        <td>
                          <?php 
						  if($cat['icon_class']!='' or $cat['icon_class']!=NULL){
							  echo '<i class="'.$cat['icon_class'].'"></i> ';
							  }
						  echo $cat['title'];
						  
						   ?>
                          <?php
                          if (isset($cat['subcategory']) && !empty($cat['subcategory'])) {
                            $subcat = $cat['id'];
                          ?>
                            <span>

                              <a id="anchor_<?PHP echo $cat['id']; ?>" href="<?php echo base_url() . 'cat' ?>?subcategory=<?php echo $subcat; ?>">

                                <span class="label label-success">Subcategories
                                (<?php
                                echo count_where('categories',array('parent'=>$cat['id']));
								?>)
                                </span>
                              </a>
                            </span>
                          <?php
                          } elseif (isset($cat['child']) && !empty($cat['child'])) {
                            $child = $cat['id'];
                          ?>
                            <span>

                              <a id="anchor_<?PHP echo $cat['id']; ?>" href="<?php echo base_url() . 'cat' ?>?child=<?php echo $child; ?>">

                                <span class="label label-success">Child
                                 (<?php
                                echo count_where('categories',array('parent'=>$cat['id']));
								?>)
                                </span>
                              </a>
                            </span>
                          <?php } ?>

                        </td>
<td><?php
$src=base_url().'uploads/'.$cat['image'];
		if(empty($cat['image'])){
		$src=base_url().'uploads/noimg.png';
		
		}
				echo ' <a class="fancybox" href="'.$src.'"> <img  src="'.$src.'" class="imgofcat" ></a>';
			
		
 ?>
    </td>
                        <td class="center">


                          <?PHP if ($cat['status'] == 0) {
                            $class = "label-danger";
                            $text = 'Inactive';
                          } else {
                            $class = "label-success";
                            $text = 'Active';
                          }

                          ?>

                          <span id="div_status_<?PHP echo $cat['id']; ?>">
                            <a id="anchor_<?PHP echo $cat['id']; ?>" href="javascript:void(0);" onclick="changeStatus('<?PHP echo $cat['id']; ?>','<?PHP echo $cat['status']; ?>','categories');">

                              <span class="label <?PHP echo $class; ?>"><?PHP echo $text; ?></span>
                            </a>
                          </span>
                        </td>

                        <td class="center">
                          <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit')); ?>" class="btn btn-info btn-xs" href="cat/edit/<?php echo $cat['id']; ?>/<?php echo $data_type; ?>">
                            <i class="glyphicon glyphicon-edit icon-white"></i>
                           
                          </a>

                          <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete')); ?>" class="btn btn-danger btn-xs" href="javascript:void(0)" onClick="deleteCat('<?php echo $cat['id']; ?>','<?php echo $data_type; ?>');">
                            <i class="glyphicon glyphicon-trash icon-white"></i>
                            
                          </a>
                        </td>
                      </tr>

                  <?php 
				  $i++;
				  }
                  }

                  ?>

                </tbody>
              </table>
            </div>
            </div>
      <div class="col-md-4">
      <h5>Tree view</h5>
      <div  id="treeview_json">
      </div>
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


<?php getFooter(); ?>
<script>
  $('#post_table').dataTable({
    "ordering": false
  });
</script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  
   var treeData;
   
   $.ajax({
        type: "GET",  
        url: "<?=base_url()?>directories/getItem",
        dataType: "json",       
        success: function(response)  
        {
           initTree(response)
        }   
  });
    
  function initTree(treeData) {
    $('#treeview_json').treeview({data: treeData});
  }
   
});
</script>