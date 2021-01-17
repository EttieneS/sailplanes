<?php require_once("../../controllers/login/authorise.php"); ?>
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
      <hr>
        <form>
            <div class="form-group">
                <label for="email">Your e-mail address</label>
                    <input type="text" class="form-control"  id="email" name="email" placeholder="E-mail">
            </div>
                <button id=check type="button" class="btn btn-primary" onclick="checkEmail()">Check</button>
                <label>Check to see if you can register</label>
        </form>
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
    <script src="../../vendor/jquery/jquery.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
  </body>
<script>
  function checkEmail(){
    var useremail = $("#email").val();
    $.ajax({
      type    : 'POST',
      url     : '../../controllers/users/can_register.php',
      dataType : 'json',
      data    : { "email" : useremail },
      success : function(response){
        if (response[0].user_email == -1){
          alert("Your e-mail is not registered. Please contact Jonker Sailplanes, to be registered");
        } else {
          localStorage.setItem("user_email", response[0].user_email);
          window.location.href = "../../user/profile/change_password.php";
        }
      },
      error : function(response){
        alert("An unexpected error has occured, call the web master with this message");
      }
    });
  }
</script>
</html>
