<?php require_once("../../controllers/login/authorise_admin.php"); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
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
        <h3 style="text-align:center">Technical Notes</h3>
      <table class="table table-bordered" id="notes_table">
        <tr>
          <thead>
            <th>Number</th>
            <th>Title</th>
            <th>Revision</th>
            <th>Date</th>
            <th>Status</th>
            <th>File Name</th>
            <th>Action</th>
          </thead>
        </tr>
          <tbody>
          </tbody>
      </table>
      <div class="row">
        <div class="col-md-4">
          <button style="float: right; margin-right: 5px" type="button" id="upload" name="upload" class="btn btn-success" onclick="uploadPage()">Upload</button>
        </div>
      </div>
      <div>
        <footer style="background-color:#e9ecef;width:100%;position:relative;margin-top:75px;">
          <?php include  "../../templates/footer.php";?>
        </footer>
      </div>
    </div>
    <!-- content wrapper -->
  </div>

  <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="../../../js/sb-admin.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
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
</body>
<script>
  $('document').ready(function(){
    $('#notes_table').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "../../controllers/notes/view_all.php",
                dataSrc : '',
                "order": [[0, "asc"]]
            },
            "columns" : [ {
                "data" : "note_number"
            }, {
                "data" : "note_title"
            }, {
                "data" : "note_revision"
            }, {
                "data" : "note_date"
            }, {
                "render" : function(data, type, full){
                    if (full['note_status'] == 1){
                      return '<label>Active</label>';
                    } else {
                      return '<label>Inactive</label>';
                    }
                }
            }, {
                "data" : "note_file_name"
            }, {
              "data" : "note_file_name",
              "render": function(data, type, full){
                file = {
                  "note_id" : full['note_id'],
                  "note_number" : full['note_number'],
                  "note_file_name" : full['note_file_name']
                }
                return '<a href="#" type="button" class="btn btn-primary float-left" onclick=deleteFile(' +JSON.stringify(file)+ ')>Delete</a>' +
                  '<a style="display: inline;margin-left:2px;" type="button" class="btn btn-secondary float-right" onclick=editNote(' +JSON.stringify(file)+ ')>Edit</a>' +
                  '</br><a style="display: inline;margin-top:2px;text-align:center;" type="button" class="btn btn-danger" href="/controllers/notes/files/' +data+ '" download="'+data+'">Download</a>';
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
      url     : '../../controllers/notes/delete.php',
      data    : { "note_file_name" : file.note_file_name,
            "note_id" :  file.note_id },
      beforeSend: function(){
        return confirm("Are you sure you want to delete this Technical Note?");
      },
      success : function(response) {
          window.location.reload();
      }
    });
  }

  function editNote(note){
    localStorage.setItem("note_id", note['note_id']);
    window.location = "edit.php";
  }
</script>
<html>
