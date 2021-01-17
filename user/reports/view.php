<?php require_once("../../controllers/login/authorise.php"); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - Dashboard</title>
  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">
</head>
<body>
    <?php include "../../templates/user_header.php"; ?>

<div id="wrapper">
  <!-- Sidebar -->
  <?php include  "../../templates/user_sidebar.php"; ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          View Reports
        </div>
        <div class="form-group row">
          <label for="note_number" class="col-sm-2 col-fom-label">Number</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" id="note_id" name="note_id">
            <input type="text" class="form-control" id="note_number" name="note_number" placeholder="Note Number">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

    <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
<script>
  $('document').ready(function(){
    var report_number = localStorage.getItem("report_number");
  });

  function view(report_id){
    localStorage.setItem("report_id", report_id);
    window.location = "report.php";
  }
</script>
<html>
