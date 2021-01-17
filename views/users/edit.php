<?php require_once("../../controllers/login/authorise_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - Create new User</title>
  <!--Favicon-->
  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body id="page-top">
<?php include  "../../templates/header.php"; ?>
<div id="wrapper">
  <!-- Sidebar -->
  <?php include  "../../templates/sidebar.php"; ?>
  <div id="content-wrapper">
    <div class="container-fluid" style="width : 100%">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="http://portal.jonkersailplanes.co.za/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit User Details</li>
      </ol>
      <!-- Page Content -->
      <div class="card card-report mx-auto">
        <div class="card-body">
          <form name="form" action="../../controllers/users/update.php" me