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
  <link href="../../css/styles.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>
</head>


<body id="page-top">
  <?php include "../../templates/header.php"; ?>
  <div  id="wrapper">
    <?php include  "../../templates/sidebar.php"; ?>
    <div id="content-wrapper" style="width : 100%">
            <h3 style="text-align : center">Models</h3>
      <div>
        <table class="table table-bordered" id="models_table" name="models_table">
          <tr>
            <thead>
              <th>Model Number</th>
              <th>Active</th>
              <th>Actions</th>
            </thead>
          </tr>
          <tbody>
          </tbody>
        </table>
        <button type="button" class="btn btn-primary float-left" onclick="addModel()"> Add Plane Model</button>
        <button type="button" class="btn btn-danger float-left" onclick="backOne()"> Back</button>
      </div>
      <div>
        <footer style="background-color:#e9ecef;width:100%;position:relative;margin-top:50px;">
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

<script>
  $('document').ready(function(){
    var table = $('#models_table').DataTable({
      "processing" : true,
      "ajax" : {
          "url" : "../../controllers/models/view_all.php",
          dataSrc : '',
          "order": [[0, "asc"]]
      },
      "columns" : [ {
          "data" : "model_number"
      }, {
          "render" : function(data, type, full){
            if (full['model_status'] == 1){
              return '<label>Active</label>';
            } else {
              return '<label>Inactive</label>';
            }
          }
      }, {
        "data" : "model_id",
        "render": function(data, type, full){
          return '<a style="display: inline"><button type="button" class="btn btn-primary float-left" style="margin-right: 10px" onclick=editModel(' +data+ ')>Edit</button></a>' +
            '<a style="display: inline"><button type="button" class="btn btn-danger float-left" onclick=deleteModel(' +data+ ')>Delete</button></a>';
        }
      }]
    });
  });

  function addModel(){
    window.location = "add.php";
  }

  function backOne(){
    window.history.back();
  }

  function editModel(model_id){
    localStorage.setItem("model_id", model_id);
    window.location = "edit.php";
  }

  function deleteModel(model_id){
    $.ajax({
      type    : 'POST',
      url     : '../../controllers/models/delete_by_id.php',
      data    : { "model_id" : model_id },
      beforeSend: function(){
        return confirm("Are you sure you want to delete this Plane Model?");
      },
      success : function() {
          window.location.reload();
      }
    });
  }
</script>
<html>
