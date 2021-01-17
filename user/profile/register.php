<?php require_once("../../controllers/login/authorise.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Jonker Sailplanes Portal - Register</title>
  <!--Favicon-->
  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
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
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="http://portal.jonkersailplanes.co.za/">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Register</li>
        </ol>
        <!-- Page Content -->
        <hr>
          <form>
              <div class="form-group">
                  <label for="user_name">User Name</label>
                      <input type="text" class="form-control"  id="user_name" name="user_name" placeholder="User Name">
                  <label for="user_email">E-mail</label>
                      <input class="form-control"  id="user_email" name="user_email" placeholder="E-mail">
                  <label for="user_pass">Password</label>
                      <input type="text" class="form-control"  id="user_pass" name="user_pass" placeholder="Password">
              </div>
                  <button type="button" class="btn btn-primary" onclick="register()">Submit</button>
          </form>
          <!--Table Connection Test End-->
        </div>
        <!-- /.container-fluid -->
        <footer class="sticky-footer">
          <?php include  "../../templates/footer.php"; ?>
        </footer>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
  </body>
<script>
  var email = localStorage.getItem("user_email");
  $("#user_email").val(email);

  function register(){
    var username = $("#user_name").val();
    var email = $("#user_email").val();
    var password = $("#user_pass").val();

    $.ajax({
        type    : 'POST',
        url     : '../../controllers/users/register.php',
        data    : {
          "user_name" : username,
          "user_email" : email,
          "user_pass" : password },
        success : function(response) {
            if (response == 1){
              window.location = "../../../login.php";
            } else {
              alert(response);
            }
        }
    });
  }
</script>
</html>
