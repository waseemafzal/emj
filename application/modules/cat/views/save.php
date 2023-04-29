<?php getHead(); ?>
<style>
  .box-primary {
    margin: 5px 2px;
  }

  .box-primary img {
    min-width: 200px;
    min-height: 200px;

  }

  div.center {
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
    <h1>
      Category Management

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li> <a href="cat">View Category </a></li>
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
          <?php
          $class = '';
          if (isset($data_type)) {
            $class = "hidden";
          }
          ?>
          <div class="box-body">
            <form id="form_add_update" name="form_add_update" role="form">
              <div class="col-xs-12">
                <div class="alert hidden"></div>
              </div>
              <div class="form-group wrap_form">
                <div class="col-xs-12 col-md-6 <?php echo $class; ?>">
                  <label for="exampleInputEmail1">Select type</label>

                  <select onchange="get_cat_type(this.value)" id="cat_type" name="cat_type" class="form-control">
                    <option value="0">Parent</option>
                    <option value="1">child</option>
                    <option value="2">sub-child</option>
                  </select>
                </div>

                <div id="category_div"></div>
                <div id="subcategory_div"></div>


                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-md-6">
                  <label for="title">Title</label>
                  <input required type="text" class="form-control" id="title" name="title" value="<?php if (isset($data)) {
                                                                                                    echo $data['title'];
                                                                                                  } ?>">

                </div>
  <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-md-6">
                  <label for="title">Icon Class</label>
                  <input required type="text" class="form-control" id="icon_class" name="icon_class" value="<?php if (isset($data)) {
                                                                                                    echo $data['icon_class'];
                                                                                                  } ?>">

                </div>


                <div class="clearfix">&nbsp;</div>

                <div class="col-xs-12 col-md-6">
                  <label> Image</label>
                  <input type="file" name="image" id="image" />
                  <div class="clearfix">&nbsp;</div>
                  <div class="clearfix">&nbsp;</div>
                  <?php if (isset($row)) {
                    echo '<img src="' . base_url() . 'uploads/' . $row->image . '" width="50">';
                  } ?>
                </div>
                <div class="clearfix">&nbsp;</div>


              </div>

              <div class="clearfix">&nbsp;</div>
              <div class="col-xs-12 col-md-6">
                <button type="submit" class="btn btn-info">Submit</button>
                <input type="hidden" id="id" name="id" value="<?php if (isset($data)) {
                                                                echo $data['id'];
                                                              } ?>">
              </div>
          </div>





          </form>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>

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
  function get_cat_type(value) {
    // 0 parent
    // 1 child
    // 2 sub-child
    if (value != 0) {
      if (value == 1) {
        $("#subcategory_div").empty();
      }
      var formData = new FormData();
      formData.append('cat_type', value);


      $.ajax({
        type: "POST",
        url: "<?php echo base_url() . 'cat/get_cat_type'; ?>",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'JSON',
        beforeSend: function() {

        },
        success: function(data) {
          $("#category_div").html(data.html);


        }
      });

    } else {

      $("#category_div").empty();
      $("#subcategory_div").empty();


    }


  }

  function get_subcat(val) {
    var formData = new FormData();
    formData.append('category', val);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url() . 'cat/get_subcat'; ?>",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'JSON',
      beforeSend: function() {

      },
      success: function(data) {
        $("#subcategory_div").html(data.html);

      }
    });

  }
  /**********************************save************************************/
  $('#form_add_update').on("submit", function(e) {
    e.preventDefault();
    let category;
    var formData = new FormData();

    var other_data = $('#form_add_update').serializeArray();
    $.each(other_data, function(key, input) {
      formData.append(input.name, input.value);
    });
    let cat_type = $("#cat_type").val(); //0 parent , 1 child , 2 sub child

    formData.append('cat_type', cat_type);
    if (cat_type == 1) {
      category = $("#category").val();
      formData.append('category', category);

    }
	if ($('#image').val() != '') {
      formData.append("image", document.getElementById('image').files[0]);
    }
    // ajax start
    $.ajax({
      type: "POST",
      url: "<?php echo base_url() . 'cat/save'; ?>",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'JSON',
      beforeSend: function() {
        $('#loader').removeClass('hidden');
        //	$('#form_add_update .btn_au').addClass('hidden');
      },
      success: function(data) {
        $('#loader').addClass('hidden');
        $('#form_add_update .btn_au').removeClass('hidden');
        //alert(data.status);
        //var obj = jQuery.parseJSON(data);
        if (data.status == 1) {
          $(".alert").addClass('alert-success');
          $(".alert").html(data.message);
          $(".alert").removeClass('hidden');
          setTimeout(function() {
            $(".alert").addClass('hidden');
            // $('#form_add_update')[0].reset();
          }, 3000);
        } else if (data.status == 0) {
          $(".alert").addClass('alert-danger');
          $(".alert").html(data.message);
          $(".alert").removeClass('hidden');
          setTimeout(function() {
            $(".alert").addClass('hidden');
          }, 3000);
        } else if (data.status == 2) {
          $(".alert").addClass('alert-success');
          $(".alert").html(data.message);
          $(".alert").removeClass('hidden');
          setTimeout(function() {
            window.location = 'cat';
          }, 1000);
        } else if (data.status == "validation_error") {
          alert(data.status);
          $(".alert").addClass('alert-warning');
          $(".alert").html(data.message);
          $(".alert").removeClass('hidden');

        }

      }
    });

    //ajax end    
  });
</script>