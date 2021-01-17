<?php require_once('../../controllers/login/authorise_admin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Jonker Sailplanes Portal - Search for a Manual</title>

  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
  <link href="/css/sb-admin.css" rel="stylesheet">
  <link href="/css/styles.css" rel="stylesheet">
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body id="page-top">
  <?php include  "../templates/header.php"; ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include  "../../templates/sidebar.php"; ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="http://portal.jonkersailplanes.co.za/">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Search for a Manual</li>
        </ol>
        <!-- Page Content -->
        <div class="card card-report mx-auto">
      <div class="card-body">
        <form>
          <div>
            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                    <input type="text" id="model_number" name="model_number" class="form-control">
                    <label for="model_number" class="">Model Number</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <button class="btn btn-primary" type="button" onclick="showManuals()">Search For Manual</button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <dl class="dl-horizontal">
                  <dt class="col-sm-6"><label>Serial Number</label></dt>
                  <dd class="col-sm-6" ><label id="serial_number_label"></label></dd>
                <dl>
              </div>
            </div>
          </div>
          <div>
            <table class="table table-bordered" id="showManualsTable">
              <tr>
                <thead>
                  <th>Manual Number</th>
                  <th>Manual Title</th>
                  <th></th>
                </thead>
              </tr>
                <tbody>
                </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
</div>
<footer class="sticky-footer">
  <?php include  "../../templates/footer.php";?>
</footer>
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
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
  <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/css/sb-admin.css"/>
  <link rel="stylesheet" type="text/css" href="/bootstrap/css/mdb.css"/>

  <script src="/js/jquery-3.4.1.min.js"></script>
  <script src="/js/jquery.dataTables.min.js"></script>
  <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
<script>
  function showManuals(){
    var model_number = $('#model_number').val();

    $('#showManualsTable').DataTable({
        "destroy" : true,
        "processing" : true,
        "serverSide" : true,
        "contentType" : "application/json",
        "ajax" : {
            "url" : "../../controllers/manuals/get_by_like_title.php",
            "type" : "POST",
            dataSrc : '',
            data :  {
              "manual_title" : model_number
            },
            "order": [[0, "asc"]]
        },
        "columns" : [ {
            "data" : "manual_number"
        }, {
            "data" : "manual_title"
        }, {
         "render": function(data, type, full){
           return '<a style="display: inline" type="button" class="btn btn-danger" href="/controllers/bulletins/files/' +full['manual_file_name']+ '" download="' +full['manual_file_name']+ '">Download</a>';
         }
        }]
    });
  }

  function backOne(){
    window.history.back();
  }
</script>
</html>
