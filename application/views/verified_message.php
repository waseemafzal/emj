<?php //include_once"header.php"; ?>

<!--inner heading start-->
<section class="container" >
    <div id="subheader">
	<div id="sub_content" >
    <div class="col-md-12" style="min-height:400px ;margin: 80px 0 0 0;">
          <div style="font-size: 3em;font-weight:800;text-align: center;" class="alert <?php echo $alertClass ?>"><?php echo $message; ?></div>
              <?php
			  if($status==1){
				 $base= base_url();
				echo '<p align="center"><a href="'.$base.'">CLICK TO CONTINUE </a></p>';
				}
			  ?>
        </div>
   </div>
</div>
</section>
<!--inner heading end--> 

<!--Inner Content start-->

<!--Inner Content end--> 

<?php // include_once"footer.php" ?>
<!-- general script file --> 
