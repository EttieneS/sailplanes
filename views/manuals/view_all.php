<?php require_once('../../controllers/login/authorise_admin.php'); ?>
<!DOCTYPE html>
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
    <link href="../../css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

  </head>
<body>
    <?php include "../../templates/header.php"; ?>
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
          <li class="breadcrumb-item active">Manuals</li>
        </ol>
        <div>
          <table class="table table-bordered" id="manuals_table">
            <tr>
              <thead>
                <th>Number</th>
                <th>Title</th>
                <th>Revision</th>
                <th>File Name</th>
                <th></th>
              </thead>
            </tr>
              <tbody>
              </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button style="float: left; margin-right: 5px"  type="button" id="upload" name="upload" class="btn btn-secondary" onclick="uploadPage()">Upload</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
    <footer style="background-color:#e9ecef;width:100%;position:relative;">
      <?php include  "../../templates/footer.php";?>
    </footer>
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

  <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="../../../js/sb-admin.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<script>
  $('document').ready(function(){
    $('#manuals_table').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "../../controllers/manuals/view_all.php",
                dataSrc : '',
                "order": [[0, "asc"]]
            },
            "columns" : [ {
                "data" : "manual_number"
            }, {
                "data" : "manual_title"
            }, {
                "data" : "manual_revision"
            }, {
                "data" : "manual_file_name"
            }, {
              "data" : "manual_file_name",
              "render": function(data, type, full){
                file = {
                  "manual_id" : full['manual_id'],
                  "manual_file_name" : full['manual_file_name']
                }
                filename = full['manual_file_name'];
                manualid = full['manual_id'];
                return '<a href="#" type="button" class="btn btn-primary float-left" onclick=deleteFile(' +JSON.stringify(file)+ ')>Delete</a>' +
                  '<a style="display: inline;margin-left:10%" type="button" class="btn btn-secondary" onclick=editManual(' +JSON.stringify(manualid)+ ')>Edit</a>' +
                  '<a style="display: inline" type="button" class="btn btn-danger float-right" href="/controllers/manuals/files/' +filename+ '">Download</a>';
              }
            }]
    });
  });

  function uploadPage(){
    window.location = "upload.php";
  }

  function deleteFile(file){
    $.ajax({
      type    : 'POST',
      url     : '../../controllers/manuals/delete_by_file_name.php',
      data    : { "manual_file_name" : file.manual_file_name,
            "manual_id" :  file.manual_id },
      beforeSend: function(){
        return confirm("Are you sure you want to delete this Sailplane Manual?");
      },
      success : function() {
          window.location.reload();
      }
    });
  }

  function editManual(manualid){
    localStorage.setItem("manual_id", manualid);
    window.location = "edit.php";
  }
</script>
</html>
