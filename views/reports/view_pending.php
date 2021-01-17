<?php require_once("../../controllers/login/authorise_admin.php"); ?>
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
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">
</head>
  <body>
    <?php include "../../templates/header.php"; ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include  "../../templates/sidebar.php"; ?>
    <div id="content-wrapper">
      <table class="table table-bordered" id="reports_table">
        <tr>
          <thead>
            <th>Report Number</th>
            <th>Model Number</th>
            <th>Customer</th>
            <th>Contact Number</th>
            <th>Report Title</th>
            <th>Date Reported</th>
            <th>Last Updated</th>
            <th>Report Status</th>
            <th>Actions</th>
          </thead>
        </tr>
          <tbody>
          </tbody>
      </table>
      <button type="button" class="btn btn-primary float-left" style="margin-right: 10px"onclick="addRecord()">Add Report</button>
    </div>
    <footer class="sticky-footer" style="width: 100%">
      <?php include  "../../templates/footer.php";?>
    </footer>
  </div>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
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
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

    <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

<script>
  $('document').ready(function(){
      var table = $('#reports_table').DataTable({
              "destroy" : true,
              "processing" : true,
              "serverSide" : true,
              "ajax" : {
                  "url" : "../../controllers/reports/view_pending.php",
                  dataSrc : '',
                  dataType : 'json',
                  "order": [[0, "asc"]]
              },
              "columns" : [ {
                  "data" : "report_number"
              }, {
                  "data" : "model_number"
              }, {
                "render": function(data, type, full){
                    return full['user_lastname'] + ", " + full['user_name'] + " (" + full["user_email"] + ")";
                }
              }, {
                  "data" : "user_phone"
              }, {
                  "data" : "report_title"
              }, {
                  "data" : "report_created"
              }, {
                  "data" : "report_updated"
              }, {
                  "data" : "report_status_status"
              }, {
                "data" : "report_id",
                "render": function(data, type, full){
                  return '<a style="display: inline"><button type="button" class="btn btn-primary" style="margin-right: 10px" onclick=editRecord(' +data+ ')>Edit</button></a>' +
                    '<a style="display: inline"><button type="button" class="btn btn-secondary" style="margin-right: 10px" onclick=deleteRecord(' +data+ ')>Delete</button></a>' +
                    '<a style="display: inline"><button type="button" class="btn btn-danger" style="margin-right: 10px" onclick=viewRecord(' +data+ ')>View</button></a>';
                }
              }]
      });

  });
  function viewRecord(report_id){
    localStorage.setItem("report_id", report_id);
    window.location = "view.php";
  }

  function addRecord(){
    window.location = "add.php";
  }

  function editRecord(report_id){
    localStorage.setItem("report_id", report_id);
    window.location = "edit.php";
  }

  function deleteRecord(report_id){
    $.ajax({
      type    : 'POST',
      url     : '../../controllers/reports/delete_by_id.php',
      data    : { "report_id" : report_id },
      beforeSend: function(){
        return confirm("Are you sure you want to delete this Report?");
      },
      success : function() {
          window.location.reload();
      }
    });
  }
</script>
<html>
