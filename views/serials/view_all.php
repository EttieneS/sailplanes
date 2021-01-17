<?php require_once("../../controllers/login/authorise_admin.php"); ?>
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
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../css/sb-admin.css"/>
  <link rel="stylesheet" type="text/scss" href="../../scss/sb-admin.scss"/>
</head>
<?php include "../../templates/header.php"; ?>
<body id="page-top">

  <div id="wrapper">
    <!-- Sidebar -->
    <?php include  "../../templates/sidebar.php"; ?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Serials</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            All Serials</div>
            <div class="card-body">
              <div class="table-responsive" id="models_table">
                <table class="table table-bordered" id="serials_table" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>Serial Number</th>
                    <th>Model Number</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="button" class="btn btn-primary" onclick="addSerial()"> Add Serial</button>
          </div>
        </div>
        <footer>
          <?php include  "../../templates/footer.php";?>
        </footer>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
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

    <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

<script>
  $('document').ready(function(){
      var table = $('#serials_table').DataTable({
        "processing" : true,
        "ajax" : {
            "url" : "../../controllers/serials/view_all_with_model_number.php",
            dataSrc : '',
            dataType : 'json',
            "order": [[0, "asc"]]
        },
        "columns" : [ {
            "data" : "serial_number"
        }, {
            "data" : "model_number"
        }, {
            "render" : function(data, type, full){
              if (full['serial_status'] == 1){
                return '<label>Active</label>';
              } else {
                return '<label>Inactive</label>';
              }
            }
        }, {
          "data" : "serial_id",
          "render": function(data, type, full){
            plane = {
              "serial_id" : full['serial_id'],
              "serial_number" : full['serial_number'],
              "model_id" : full['model_id']
            }
            return '<a style="display: inline"><button type="button" class="btn btn-primary float-left" style="margin-right: 10px" onclick=editSerial(' +JSON.stringify(plane)+')>Edit</button></a>' +
              '<a style="display: inline"><button type="button" class="btn btn-danger float-left" onclick=deleteSerial(' +data+ ')>Delete</button></a>';
          }
        }]
      });
  });
  function addSerial(){
    window.location = "add.php";
  }

  function editSerial(data){
    localStorage.setItem("serial_id", data.serial_id);
    localStorage.setItem("serial_number", data.serial_number);
    localStorage.setItem("model_id", data.model_id);
    window.location = "edit.php";
  }

  function deleteSerial(serial_id){
    $.ajax({
      type    : 'POST',
      url     : '../../controllers/serials/delete_by_id.php',
      data    : { "serial_id" : serial_id },
      beforeSend: function(){
        return confirm("Are you sure you want to delete this Serial Number?");
      },
      success : function() {
          window.location.reload();
      }
    });
  }
</script>
<html>
