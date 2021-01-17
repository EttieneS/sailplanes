<!DOCTYPE html>
<html lang="en" style="width : 100%">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - Login</title>
  <!--Favicon-->
  <link rel="shortcut icon" href="css/img/jonkerfav.ico" type="image/x-icon">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">
  <link href="../../../css/style.css" rel="stylesheet">
</head>
<body>
  <img src="https://jonkersailplanes.co.za/wp-content/uploads/2020/10/Heading-Pic.jpg" alt"header" style="max-height:400px;width:100%">
<div class="text-center">
  <h2 style="border-bottom:3px solid red;text-align:center;margin-left:28%;margin-right:30%;margin-top:30px;">Jonker Sailplanes Customer Portal</h2>
  </br>
  </br>
  <h2 style="text-align:center">Welcome</h2>
  <p style="text-align:center">View the latest updates on service bulletins, technical notes and more. Please contact Jonker Sailplanes to gain access to the JS Portal</p>
  <a href="https://jonkersailplanes.co.za/contact-us-2/" style="align:center" class="btn btn-info" role="button" target="_blank">Contact Us</a>
  <h2 style="border-top:3px solid red;text-align:center;margin-left:40%;margin-right:40%;margin-top:30px;padding-top:10px;margin-bottom:-40px;">Login</h2>
</div>
  <div class="card card-login mx-auto mt-5">
    <div class="card-body">
      <form action="../../controllers/login/login.php" method="POST">
        <div class="form-group">
          <label for="username">Email address</label>
          <div class="form-label-group">
            <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
          </div>
        </div>
        <div class="form-group">
          <label for="user_pass">Password</label>
          <div class="form-label-group">
            <input type="password" id="user_pass" name="user_pass" class="form-control" placeholder="Password" required="required">
          </div>
        </div>
        <div class="form-label-group">
          <input type="submit" style="font-size:20px;padding-top:10px!important;padding-bottom:10px!important" class="btn btn-info btn-block" name="login" value="Login" />
        </div>
      </form>
    </div>
  </div>
</br>
<div>
<img src="https://jonkersailplanes.co.za/wp-content/uploads/2020/04/Copy-of-JS-logo-new-3-768x339-1.png" alt="logo" style="display: block;margin-left: auto;margin-right: auto;max-height:100px;">
</d