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
          <li class="breadcrumb-item active">New Serial Number</li>
        </ol>
        <!-- Page Content -->
        <div class="card card-report mx-auto">
      <div class="card-body">
        <form name="form" action="../../controllers/serials/insert.php" method="POST">
          <div class="form-group-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Serial Number" required="required" autofocus="autofocus" value="" >
                <label for="serial_number">Serial Number</label>
              </div>
            </div>
          </div>
          </br>
          <div class="form-group-row">
            <div class="col-md-6">
                <dt class="col-sm-6">Plane Model</dt>
                <div class="col-sm-6">
                  <select class="browser-default custom-select" id="model_id_fk" name="model_id_fk">
                    <option>Serial Number</option>
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group-row">
            <div class="col">
              <input type="submit" style="display: inline" class="btn btn-primary btn-block" name="submit" value="Save Changes" />
              <input type="text" style="display: inline" class="btn btn-primary btn-block" name="view_all" onclick="viewAll()" value="View All" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
<footer>
 <?php include  "../../templates/footer.php";?>
</footer>
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
  <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

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
      }
    });
  });

  function viewAll(){
    window.location = "view_all.php";
  }
</script>
</html>
