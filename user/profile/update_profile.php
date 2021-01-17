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
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
          <li class="breadcrumb-item active">My Account</li>
        </ol>
        <form name="form" action="../../controllers/users/update_profile.php" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="hidden" id="user_email" name="user_email" value="" >
                  <input type="text" id="user_name" name="user_name" class="form-control" placeholder="User Name" required="required" autofocus="autofocus" value="" >
                  <label for="user_name">User Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="user_lastname" name="user_lastname" class="form-control" placeholder="Surname" required="required" value="">
                  <label for="user_lastname">Surname</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="user_phone" name="user_phone" class="form-control" placeholder="Phone" required="required" value="">
                  <label for="user_phone">Phone</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md4">
              <input type="submit" class="btn btn-primary btn-block" name="submit" value="Save Changes" />
              <input type="text" class="btn btn-primary btn-block" name="submit" onclick="changePassword()" value="Change Password" />
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col">
            <footer>
              <?php include  "../../templates/footer.php";?>
            </footer>
          </div>
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
          <a class="btn btn-primary" href="../../controllers/login/logout.php" >Logout</a>
        </div>
      </div>
    </div>
  </div>
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../js/sb-admin.min.js"></script>
</body>
<script>
$('document').ready(function(){
    $.ajax({
      type    : 'POST',
      url     : '../../controllers/users/get_current_user.php',
      dataType : 'json',
      success : function(response) {
        $('#user_name').val(response[0].user_name);
        $('#user_lastname').val(response[0].user_lastname);
        $('#user_phone').val(response[0].user_phone);
        $('#user_email').val(response[0].user_email);
      }
    });
});

function changePassword(){
  window.location = "update_password.php";
}
</script>
</html>
