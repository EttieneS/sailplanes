<?php require_once('../../controllers/login/authorise_admin.php'); ?>

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
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">

  </head>
<body>
    <?php include "../../templates/header.php"; ?>
  <div id="wrapper">
    <?php include  "../../templates/sidebar.php"; ?>
    <div id="content-wrapper" >
      <div class="container-fluid">
        <table class="table table-bordered" id="bulletins_table" style="width : 100%">
          <tr>
            <thead>
              <th>Number</th>
              <th>Title</th>
              <th>Revision</th>
              <th>Type</th>
              <th></th>
            </thead>
          </tr>
            <tbody>
            </tbody>
        </table>
        <div class="row">
          <div class="col-md-4">
            <button type="button" id="upload" name="upload" class="btn btn-secondary" onclick="uploadPage()">Upload</button>
          </div>
        </div>
      </div>
      <footer>
        <?php include  "../../templates/footer.php";?>
      </footer>
    </div>
    <!-- content wrapper -->
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
  <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

  <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
</body>

<script>
  $('document').ready(function(){
    $('#bulletins_table').DataTable({
      "destroy" : true,
      "processing" : true,
      "ajax" : {
          "url" : "../../controllers/bulletins/view_all.php",
          dataSrc : '',
          "order": [[0, "asc"]]
      },
      "columns" : [ {
          "data" : "bulletin_number"
      }, {
          "data" : "bulletin_title"
      }, {
          "data" : "bulletin_revision"
      }, {
          "data" : "bulletin_type_description"
      }, {
        "data" : "bulletin_file_name",
        "render": function(data, type, full){
          file = {
            "bulletin_id" : full['bulletin_id'],
            "bulletin_file_name" : full['bulletin_file_name']
          }
          id = full['bulletin_id'];
          filename = full['bulletin_file_name'];
          return '<a href="#" type="button" class="btn btn-primary" onclick=deleteFile(' +JSON.stringify(file)+ ')>Delete</a>' +
            '<a style="display: inline" type="button" class="btn btn-secondary" onclick=editBulletin(' +id+ ')>Edit</a>' +
            '<a style="display: inline" type="button" class="btn btn-danger" href="/controllers/bulletins/files/' +filename+ '" download="' +filename+ '">Download</a>';
        }
      }]
    });
  });
  function backOne(){
    window.history.back();
  }

  function uploadPage(){
    window.location = "upload.php";
  }

  function deleteFile(file){
    $.ajax({
      type    : 'POST',
      url     : '../../controllers/bulletins/delete.php',
      data    : { "bulletin_file_name" : file.bulletin_file_name,
            "bulletin_id" :  file.bulletin_id },
      beforeSend: function(){
        return confirm("Are you sure you want to delete this Service Bulletin?");
      },
      success : function() {
          window.location.reload();
      }
    });
  }

  function editBulletin(id){
    localStorage.setItem("bulletin_id", id);
    window.location = "edit.php";
    // alert(id);
  }
</script>
<html>
