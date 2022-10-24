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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo form_open_multipart('contacts/update'); ?>
             <div class="alert hidden"></div>
             <div class="row">     
            <div class="col-md-3">
                         <input type="hidden" name="id" class="form-control" value="<?php echo $row->id?>">
                      <label>Name:</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $row->name;?>">
                      
            </div>

            <div class="col-md-3">
                      <label>Email:</label>
                      <input type="email" class="form-control"name="email" value="<?php echo $row->email;?>">
                       
                  
            </div>

            <div class="col-md-3">
                      <label>Phone:</label>
                      <input type="text" class="form-control"name="contact" value="<?php echo $row->contact;?>">
                  
            </div>
            <div class="col-md-3">
                             <label>City</label>
                 
                        <select class="form-control "name="city_id">
                        <?php 
						$cities = getcities();
						if(count($cities)>0){
							foreach($cities as $city){
						?>
                        <option <?=setSelect($city['id'],$row->city_id)?> value="<?=$city['id']?>"><?=$city['city']?></option>
                        <?php }} ?>
                        </select>
</div>
          </div>
            <div class="form-group">
                      <label>Address:</label>
                      <textarea type="text" class="form-control"name="address" id="editor1"><?php echo $row->address;?></textarea>
                  
           
             <div class="form-group">
                      <label>Contact Type:</label><br>

                  <input type="radio" <?=setChecked($row->type,'legal')?> id ="radio" name="type" value="legal">   Legal Support &nbsp; &nbsp;
                  <input type="radio" <?=setChecked($row->type,'medical')?> id ="radio"name="type" value="medical"> Medical Support &nbsp; &nbsp;
                 <input type="radio" <?=setChecked($row->type,'road')?> id ="radio" name="type" value="road">   Road Assistance
            </div>
                  <div class="form-group">
                                   <label>Image</label>
                                   <input type="file" name="new_file" class="form-control">
                                     <input type="hidden" value="<?php echo $row->image;?>" class="form-control" id="image" name="image">
                                   <img src="<?php echo $row->image?>" width="200" height="100">
                                </div>
                               
        
             <div class="col-xs-12 col-md-12">
                           <button type="submit" class="btn btn-info">Submit</button>
                       
                   </div>
           </div> 
                    
                </form>
                 
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
   

