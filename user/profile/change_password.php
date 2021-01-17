<?php require_once("../../controllers/login/authorise.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - First time sign in</title>
  <!--Favicon-->
  <link rel="shortcut icon" href="css/img/jonkerfav.ico" type="image/x-icon">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">First time sign in</div>
        <div class="card-body">
          <form action="../../controllers/users/change_password.php" method="POST">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="user_email">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="user_pass" id="user_pass" name="user_pass" class="form-control" placeholder="Password" required="required">
                <label for="user_pass">Password</label>
              </div>
            </div>
            <div class="form-label-group">
              <input type="submit" class="btn btn-primary btn-block" name="login" value="Login" />
            </div>
          </form>
        </div>
      </div>
    </div>
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
</body>
<script>
  $('document').ready(function(){
      var email = localStorage.getItem("user_email");
      $('#user_email').val(email);
  });

  function login(){
    var useremail = $('#user_email').val();
    var userpass = $('#user_pass').val();

    $.ajax({
        type    : 'POST',
        url     : '../../controllers/users/change_password.php',
        dataType : 'json',
        data    : {
          "user_email" : useremail,
          "user_pass" : userpass
        },
        success : function(response){
          alert(response);
          // if (response[0].validate == 1){
          //   alert(response);
          //   //window.location.href = "../../user/profile/user_profile.php";
          // } else if (response[0].validate == -1){
          //   alert("Invalid username or password");
          //   location.reload();
          //   //
          // } else {
          //   alert("n fokken ander antw");
          //   //window.location.reload();
          //   location.reload();
          // }
         },
        error : function(response){
          alert("An unexpected error has occured, call the web master with this message");
        }
      });
  }
</script>
</html>
