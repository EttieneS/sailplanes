<?php require_once("../../controllers/login/authorise.php");  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - My Account</title>

  <!--Favicon-->
  <link rel="shortcut icon" href="css/img/jonkerfav.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php include  "../../templates/user_header.php"; ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include  "../../templates/user_sidebar.php"; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="http://portal.jonkersailplanes.co.za/">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>

        <!-- Page Content -->
        <h1><?php echo $_SESSION['user']['user_name']; ?></h1>
        <hr>

<dl class="dl-horizontal">
  <dt class="col-sm-6"><label>Bulletin ID</label></dt>
  <dd class="col-sm-6"><label id="bulletin_id"></label></dd>
  <dt class="col-sm-6"><label>Bulletin Number</label></dt>
  <dd class="col-sm-6"><label id="bulletin_number"></label></dd>
<dl>
        <button type="submit" class="btn btn-primary" onclick="back()">Back</button>
        <button type="submit" class="btn btn-primary" onclick="viewAll()">View All</button>
        <footer class="sticky-footer">
          <?php include  "../../templates/footer.php"; ?>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <div class="row">
      <div class="col">
        <footer class="sticky-footer" style="width: 100%">
          <?php include  "../../templates/footer.php";?>
        </footer>
      </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>

</body>
<script>
$('document').ready(function(){
    var bulletin_id = localStorage.getItem("bulletin_id");
    $.ajax({
      type    : 'POST',
      url     : '../../controllers/bulletins/get_by_id.php',
      data    : { "bulletin_id" : bulletin_id },
      success : function(arr) {
                  var response = jQuery.parseJSON(arr);
                  $('#bulletin_id').text(response[0].bulletin_id);
                  $('#bulletin_number').text(response[0].bulletin_number);
                }
    }, 'json');
});

function viewAll(){
  window.location = "view_all.php";
}

function back(){
  window.history.back();
}
</script>
</html>
