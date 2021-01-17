<?php require_once("../../controllers/login/authorise.php"); ?>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jonker Sailplanes Portal - Dashboard</title>

    <!--Favicon-->
    <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
    <!-- Custom fonts-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
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
            All Manuals</div>
          <div class="card-body">
    <div class="table-responsive" id=manuals_tablediv>
      <table class="table table-bordered" id="manuals_table">
        <tr>
          <thead>
            <th>Manual Number</th>
            <th>Manual Title</th>
            <th>Download</th>
          </thead>
        </tr>
          <tbody>
          </tbody>
      </table>
      <button type="button" class="btn btn-primary float-left" onclick="search()"> Search Again</button>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
    <!-- users_tablediv -->
    <div class="row">
    </div>
  <div>
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

    <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <footer class="sticky-footer">
      <?php include "../../templates/footer.php"; ?>
    </footer>
</body>

<script>
  $('document').ready(function(){
    var manual_name = localStorage.getItem("manual_name");
    $('#manuals_table').DataTable({
        "processing" : true,
        "ajax" : {
            "url" : "../../controllers/manuals/get_by_name.php",
            "type" : "POST",
            dataSrc : { "manual_name" : manual_name },
            "order": [[0, "asc"]]
        },
        "columns" : [ {
            "data" : "manual_number"
        }, {
            "data" : "manual_name"
        }, {
          "data" : "file_name",
          "render": function(data, type, full){
            return'<a style="display: inline" href="http://portal.jonkersailplanes.co.za/controllers/manuals/files/' +data+ '">Download</a>';
          }
        }]
    });

  });

  function search(){
    window.location = "search.php";
  }
</script>
<html>
