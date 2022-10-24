<?php getHead(); ?>

<style>
.imgses{
  width: 100%;
    max-height: 133px;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
       
        <!-- ./col -->
       
       
        <?php 
  
    
     if(get_session('user_type')==SUPER_ADMIN){
  
    ?>
        
       
       
        
   
        
        
        
        
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-green">

                        <div class="inner">

                            <h3><?php echo  count_tbl_where('users','plan_id',1); ?></h3>

                            <p>Free subscriptions </p>

                        </div>

                        <div class="icon">

                            <i class="fa fa-credit-card"></i>

                        </div>

                        <a href="javascript:void(0)" class="small-box-footer">&nbsp; <i class="fa fa-arrow-circle-right"></i></a>

                    </div>
          </div>
          <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-red">

                        <div class="inner">

                            <h3><?php echo  count_tbl_where('users','plan_id',2); ?></h3>

                            <p>Basic subscriptions </p>

                        </div>

                        <div class="icon">

                            <i class="fa fa-credit-card"></i>

                        </div>

                        <a href="javascript:void(0)" class="small-box-footer">&nbsp; <i class="fa fa-arrow-circle-right"></i></a>

                    </div>
          </div>
          <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-blue">

                        <div class="inner">

                            <h3><?php echo  count_tbl_where('users','plan_id',3); ?></h3>

                            <p>Premium subscriptions </p>

                        </div>

                        <div class="icon">

                            <i class="fa fa-credit-card"></i>

                        </div>

                        <a href="javascript:void(0)" class="small-box-footer">&nbsp; <i class="fa fa-arrow-circle-right"></i></a>

                    </div>
          </div>
          <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-purple">

                        <div class="inner">

                            <h3><?php echo  count_tbl_where('users','plan_id',4); ?></h3>

                            <p>Family plan subscriptions </p>

                        </div>

                        <div class="icon">

                            <i class="fa fa-credit-card"></i>

                        </div>

                        <a href="javascript:void(0)" class="small-box-footer">&nbsp; <i class="fa fa-arrow-circle-right"></i></a>

                    </div>
          </div>
        <div class="col-lg-3 col-xs-6">

                    <!-- small box buyer_count -->

                    <div class="small-box bg-yellow">

                        <div class="inner">

                            <h3><?php echo  count_tbl_where('users','user_type',USER); ?></h3>

                            <p>Users </p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-person-add"></i>

                        </div>

                        <a href="<?php echo base_url();?>users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>
                    

                </div>
       <?PHP }
     
      ?>
      </div>
      <!-- /.row -->
       <!-- sales -->
      <div class="row ">
       

        <section class="col-sm-12 connectedSortable">

        </div>
        <!-- sales end-->
      <!-- Main row -->
      <div class="row hidden">
        <!-- Left col -->
        
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                        title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Visitors
              </h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-1"></div>
                  <div class="knob-label">Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-2"></div>
                  <div class="knob-label">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <div id="sparkline-3"></div>
                  <div class="knob-label">Exists</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Sales Graph</h3>

              <div class="box-tools pull-right">

                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">Mail-Orders</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">In-Store</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Task #1</span>
                    <small class="pull-right">90%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #2</span>
                    <small class="pull-right">70%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">Task #3</span>
                    <small class="pull-right">60%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #4</span>
                    <small class="pull-right">40%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php  getFooter(); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script>
$(".fancybox").fancybox();
</script>
<!-- AdminLTE for demo purposes -->
<script>
$("#mytable").DataTable();
  

</script>



