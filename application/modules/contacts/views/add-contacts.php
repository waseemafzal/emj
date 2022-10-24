<?php getHead();
$controller=$this->router->class;
$Heading=$controller;
if(isset($module_heading) and $module_heading!=''){
$Heading=	$module_heading;
	}

 ?>
   <style>
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

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo form_open_multipart('contacts/insert'); ?>
             <div class="alert hidden"></div>
              <div class="row">  
            <div class="col-md-3">
                      <label>Name:</label>
                      <input type="text" class="form-control" name="name">
                      
            </div>
            <div class="col-md-3">
                      <label>Email:</label>
                      <input type="email" class="form-control"name="email">
                       
                  
            </div>

             <div class="col-md-3">
                      <label>Phone:</label>
                      <input type="text" class="form-control"name="contact">
                  
            </div>
            <div class="col-md-3">
                             <label>City</label>
                 
                        <select class="form-control "name="city_id">
                        <?php 
						$cities = getcities();
						if(count($cities)>0){
							foreach($cities as $city){
						?>
                        <option value="<?=$city['id']?>"><?=$city['city']?></option>
                        <?php }} ?>
                        </select>
</div>
            <div class="clearfix">&nbsp;</div>
            
             <div class="col-md-12">
                      <label>Address:</label>
                      <textarea type="text" class="form-control"name="address" id="editor1"></textarea>
                  
          </div>
          <div class="clearfix">&nbsp;</div>
            
           <div class="col-md-6">
                      <label>Contact Type:</label><br>
                   <input type="radio" name="type" value="legal"> Legal Suppor t&nbsp; &nbsp;
                     <input type="radio" name="type" value="medical"> Medical Support &nbsp; &nbsp;
                     <input type="radio" name="type" value="road"> Road Assistance
            </div>
             
            
            <div class="clearfix">&nbsp;</div>
                    <div class="col-md-12">
                      <label>Image:</label>
                      <input type="file" name="image">
                  
            </div>
            <div class="clearfix">&nbsp;</div>
           
             <div class="col-xs-12 col-md-12">
                           <button type="submit" class="btn btn-info">Submit</button>
                       
                   </div>
            </div>
           

           
                       
                   </form>
           </div> 
                
                 
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
   

 
