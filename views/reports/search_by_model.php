<?php require_once('../../controllers/login/authorise_admin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Jonker Sailplanes Portal - Search for a Report</title>

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
          <li class="breadcrumb-item active">Search for a Report</li>
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
                  <button class="btn btn-primary" type="button" onclick="showModels()">Search For the Model Number</button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <dl class="dl-horizontal">
                  <dt class="col-sm-6"><label>Serial Number</label></dt>
                  <dd class="col-sm-6" ><label id="model_number_label">No Model Number Selected</label></dd>
                <dl>
              </div>
            </div>
          </div>
          <div>
            <table class="table table-bordered" id="showReportsTable">
              <tr>
                <thead>
                  <th>Report Number</th>
                  <th>Report Title</th>
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
  <footer class="sticky-footer">
    <?php include  "../templates/footer.php";?>
  </footer>
</div>
</div>
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <div class="modal fade" id="selectModelModal" tabindex="-1" role="dialog" aria-labelledby="selectModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="selectModelLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div cass="table-responsive">
            <table class="table table-bordered" id="selectModelTable">
              <tr>
                <thead>
                  <th>Model Number</th>
                  <th></th>
                </thead>
              </tr>
                <tbody>
                </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php" >Logout</a>
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
  function showModels(){
    var modelnumber = $('#model_number').val();

    $('#selectModelTable').DataTable({
      "destroy" : true,
      "processing" : true,
      "serverSide" : true,
      "contentType" : "application/json",
      "ajax" : {
          "url" : "../../controllers/models/get_by_like_model_number.php",
          "type" : "POST",
          dataSrc : '',
          data :  {
            "model_number" : modelnumber
          },
          "order": [[0, "asc"]]
      },
      "columns" : [ {
          "data" : "model_number"
      }, {
       "render": function(data, type, full){
         model = {
           "model_id" : full['model_id'],
           "model_number" : full['model_number']
         }
         return '<button typ="button" class="btn btn-primary" onclick=showReports('+JSON.stringify(model)+')>View Reports</button>';
       }
      }]
    });

    $('#selectModelModal').modal('toggle');
  }

  function showReports(model){
    $('#model_number').text(model.model_number);
    var modelid = model.model_id;

    $('#selectModelModal').modal('toggle');

    $('#showReportsTable').DataTable({
        "destroy" : true,
        "processing" : true,
        "serverSide" : true,
        "contentType" : "application/json",
        "ajax" : {
            "url" : "../../controllers/reports/get_by_model_id.php",
            "type" : "POST",
            dataSrc : '',
            data :  {
              "report_model" : modelid
            },
            "order": [[0, "asc"]]
        },
        "columns" : [ {
            "data" : "report_number"
        }, {
            "data" : "report_title"
        }, {
         "render": function(data, type, full){
           return '<button type="button" class="btn btn-primary" onclick=viewReport('+full['report_id']+')>View Report</button>';
         }
        }]
    });
  }

  function backOne(){
    window.history.back();
  }
</script>
</html>
