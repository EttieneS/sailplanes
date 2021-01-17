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
  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

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
          <li class="breadcrumb-item active">My Account</li>
        </ol>
        <dl class="dl-horizontal">
          <dt class="col-sm-6"><label>First Name</label></dt>
          <dd class="col-sm-6"><label id="username"></label></dd>
          <dt class="col-sm-6"><label>Last Name</label></dt>
          <dd class="col-sm-6"><label id="userlastname"></label></dd>
          <dt class="col-sm-6"><label>User Phone</label></dt>
          <dd class="col-sm-6"><label id="userphone"></label></dd>
          <dt class="col-sm-6"><label>User Email</label></dt>
          <dd class="col-sm-6"><label id="useremail"></label></dd>
          <dt class="col-sm-6"><label>Account Created</label></dt>
          <dd class="col-sm-6"><label id="userdate"></label></dd>
        <dl>
        <button type="submit" class="btn btn-primary" onclick="updateProfile()">Change Details</button>
      </div>
      <div>
        <div>
          <footer style="background-color:#e9ecef;width:100%;position:relative;margin-top:200px;">
            <?php include  "../../templates/footer.php";?>
          </footer>
        </div>
  </div>
    </div>
    <!-- /.content-wrapper -->
  </div>
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
            <a class="btn btn-primary" href="../../controllers/login/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="../../../js/sb-admin.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<script>
$('document').ready(function(){
    $.ajax({
      type    : 'GET',
      url     : '../../controllers/users/get_current_user.php',
      dataType : 'json',
      success : function(response) {
        $('#username').text(response[0].user_name);
        $('#userlastname').text(response[0].user_lastname);
        $('#userphone').text(response[0].user_phone);
        $('#useremail').text(response[0].user_email);
        $('#userdate').text(response[0].user_date);
      }
    });
});

function updateProfile(){
  window.location = "update_profile.php";

}
</script>
</html>
