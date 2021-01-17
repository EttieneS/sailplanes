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
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">
</head>
<body>
  <?php include "../../templates/user_header.php"; ?>
  <div id="wrapper">
    <?php include  "../../templates/user_sidebar.php"; ?>
    <div id="content-wrapper" style="overflow-x:auto;">

      <h3 style="text-align : center">Reports</h3>
      <div>
        <table class="table table-bordered" id="reports_table">
          <tr>
            <thead>
              <th>Report Number</th>
              <th>Report Title</th>
              <th>Reported on</th>
              <th>Updated</th>
              <th>Status</th>
              <th>View</view>
            </thead>
          </tr>
            <tbody>
            </tbody>
        </table>
        <button class="btn btn-primary float-left" style="margin: 5px" type="button" onclick="add()">New Report</button>
          </div>

      <footer style="background-color:#e9ecef;width:100%;position:relative;margin-top:10%">
        <?php include  "../../templates/footer.php";?>
      </footer>
    </div>
  </div>
  <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

  <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="../../../js/sb-admin.min.js"></script>

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
            <a class="btn btn-primary" href="../../controllers/login/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
</body>
<script>
  $('document').ready(function(){
    $('#pdf_modal_button').attr("href", '../files/report.pdf')
    $('#pdf_modal_button').attr("download", "")
    $('#pdf_modal_button').attr("target", "_blank")

    $('#reports_table').DataTable({
        "processing" : true,
        "ajax" : {
            "url" : "../../controllers/reports/select_by_user.php",
            dataSrc : '',
            "order": [[0, "asc"]]
        },
        "columns" : [ {
            "data" : "report_number"
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
            return '<a style="display: inline"><button type="button" class="btn btn-primary float-left" style="margin-right: 10px" onclick=view(' +data+ ')>View</button></a>';

          }
        }]
    });
  });

  function add(){
    window.location = "add.php";
  }

  function edit(report_id){
    localStorage.setItem("report_id", report_id);
    window.location = "edit.php";
  }

  function view(report_id){
    localStorage.setItem("report_id", report_id);
    window.location = "report.php";
  }
</script>
<html>
