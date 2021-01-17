<?php require_once("../../controllers/login/authorise_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Jonker Sailplanes Portal - Create new Serial</title>
  <!--Favicon-->
  <link rel="shortcut icon" href="css/img/jonkerfav.ico" type="image/x-icon">
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

</head>
<body id="page-top">
  <?php include  "../../templates/header.php"; ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include  "../../templates/sidebar.php"; ?>
    <div id="content-wrapper" style="width : 100%">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="http://portal.jonkersailplanes.co.za/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Serial</li>
      </ol>
      <!-- Page Content -->
      <div class="card card-report mx-auto">
        <div class="card-body">
          <form name="form" action="../../controllers/serials/update.php" method="POST">
            <div class="form-group-row">
              <label for="serial_number" class="col-sm-4 col-form-label">Serial Number</label>
              <div class="col-sm-4">
                <input style="display: none" id="serial_id" name="serial_id" value="" >
                <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Plane Model" required="required" autofocus="autofocus" value="" >
              </div>
            </div>
            </br>
            <div class="form-group-row">
              <label for="model_id_fk" class="col-sm-4 col-form-label">Model</label>
              <div class="col-sm-4">
                <select class="browser-default custom-select" id="model_id_fk" name="model_id_fk">
              </div>
            </div>
            <div class="form-group-row">
              <div class="col-sm-6">
                <input type="checkbox" value="active" id="serial_status" name="serial_status">
              </div>
              <label for="serial_status" class="col-sm-2 col-form-label">Active</label>
            </div>
            </br>
            <div class="form-group-row">
              <div class="col-sm-3">
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Save Changes" />
                <input type="text" class="btn btn-primary btn-block" name="back" onclick="viewAll()" value="View All" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- /.container-fluid -->
  <footer>
   <?php include  "../../templates/footer.php";?>
  </footer>
  </div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../controllers/login/logout.php" >Logout</a>
        </div>
      </div>
    </div>
  </div>
  <script src="../../js/jquery-3.4.1.min.js"></script>
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
<script>
  $('document').ready(function(){
      $.ajax({
        type: "GET",
        url:"../../controllers/models/view_all.php",
        dataType: "json",
        success: function (response) {
          $.each(response, function(key, value){
            var modelsdropdown = $('#model_id_fk');
              var option = document.createElement("option");
              option.text = value['model_number'];
              option.value = value['model_id'];
              modelsdropdown.append(option);
          });
          var model_id = localStorage.getItem("model_id");
          $('#model_id_fk').val(model_id).change();
        }
      });

      var serialid = localStorage.getItem("serial_id");
      $.ajax({
        type: "POST",
        url:"../../controllers/serials/get_by_id.php",
        dataType: "json",
        data : { "serial_id" : serialid },
        success: function (response) {
          $('#serial_id').val(response[0].serial_id);
          $('#serial_number').val(response[0].serial_number);
          if (response[0].serial_status == 1){

            $('#serial_status').prop('checked', true);
          }
        }
      });
  });

  function viewAll(){
    window.location = "view_all.php";
  }
</script>
</html>
