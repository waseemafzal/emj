<?php getHead();
$controller=$this->router->class;
$Heading=$controller;

 ?>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />

<div class="content-wrapper">
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
             <div class="box-body">
<div class="">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>Directories</h5>
    </div>
    <div class="panel-body">
      <div class="col-md-6" id="treeview_json">
      </div>
      <div class="col-md-6">
      
      </div>
    </div>
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
  </div>
   

  <?php  getFooter(); ?>
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