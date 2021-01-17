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
    <link href="../../css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

  </head>

<body>
  <?php include "../../templates/user_header.php"; ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include  "../../templates/user_sidebar.php"; ?>
    <div id="content-wrapper" >
      <h3 style="text-align : center">Bulletins</h3>
      <div class="row" style="margin-bottom:150px;overflow-x:auto;">
        <div class="col">
          <table class="table table-bordered" id="notes_table">
            <tr>
              <thead>
                <th>Number</th>
                <th>Title</th>
                <th>Description</th>
                <th>Revision</th>
                <th>Date</th>
                <th>View</view>
                <th>Action</th>
              </thead>
            </tr>
              <tbody>
              </tbody>
          </table>
        </div>
      </div>
      <div>
        <footer style="background-color:#e9ecef;width:100%;position:relative;">
          <?php include  "../../templates/footer.php";?>
        </footer>
      </div>
    </div>
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
</body>

<script>
  $('document').ready(function(){
      $('#notes_table').DataTable({
          "destroy" : true,
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
              "data" : "note_description"
          }, {
              "data" : "note_revision"
          }, {
              "data" : "note_date"
          }, {
              // "render": function(data, type, full){
              //   if (note_status )
              // }
              "data" : "note_date"
          }, {
            "data" : "note_id",
            "render": function(data, type, full){
              return '<a style="display: inline" type="button" class="btn btn-danger" href="/controllers/notes/files/' +data+ '" download="'+data+'">Download</a>';
            }
          }]
      });
  });

  function search(){
    window.location = "search.php";
  }

  function view(note_id){
    localStorage.setItem("note_id", note_id);
    window.location = "note.php";
  }
</script>
<html>
