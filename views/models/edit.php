<?php require_once("../../controllers/login/authorise_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - Edit Plane Model Details</title>
  <!--Favicon-->
  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top">

  <?php include  "../../templates/header.php"; ?>

<div id="wrapper">
    <?php include  "../../templates/sidebar.php"; ?>
    <div id="content-wrapper" style="width : 100%">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="http://portal.jonkersailplanes.co.za/">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Edit Plane Model</li>
        </ol>
        <!-- Page Content -->
        <div class="card card-report mx-auto">
          <div class="card-body">
            <form action="../../controllers/models/update.php" method="POST">
              <div class="form-group row">
                <label for="model_number" class="col-sm-4 col-form-label">Model Number</label>
                <div class="col-sm-8">
                  <input type="hidden" class="form-control" id="model_id" name="model_id">
                  <input type="text" class="form-control" id="model_number" name="model_number" placeholder="Model Number">
                </div>
              </div>
              <div class="form-group row">
                <label for="model_status" class="col-sm-2 col-form-label">Active</label>
                <div class="col-sm-10">
                  <input type="checkbox" id="model_status" name="model_status" value="active">
                </div>
              </div>
              <button type="submit" class="btn btn-primary mb-2">Save Changes</button>
              <button type="button" class="btn btn-danger mb-2" onclick="viewAll()">View All</button>
            </form>
          </div>
        </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <footer class="sticky-footer">
    <?php include  "../../templates/footer.php";?>
  </footer>
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

  <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

  <script src="../../js/jquery-3.4.1.min.js"></script>
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
<script>
  $('document').ready(function(){
      var model_id = localStorage.getItem("model_id");
      $.ajax({
        type    : 'POST',
        url     : '../../controllers/models/get_by_id.php',
        data    : { "model_id" : model_id },
        success : function(arr) {
                    var response = jQuery.parseJSON(arr);
                    $('#model_id').val(response[0].model_id);
                    $('#model_number').val(response[0].model_number);
                    if (response[0].model_status == 1){
                      $('#model_status').prop('checked', true);
                    }
                  }
      }, 'json');
  });

  function viewAll(){
    window.location = "view_all.php";
  }
</script>
</html>
