<?php require_once("../../controllers/login/authorise_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Jonker Sailplanes Portal - Upload a Service Bulletin</title>

  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
  <link href="/css/styles.css" rel="stylesheet">
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/css/sb-admin.css"/>
  <link rel="stylesheet" type="text/css" href="/bootstrap/css/mdb.css"/>

</head>
<body id="page-top">
  <?php include  "../../templates/header.php"; ?>
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
          <li class="breadcrumb-item active">Update Bulletin Details</li>
        </ol>
        <!-- Page Content -->
        <div class="card card-report mx-auto">
      <div class="card-body">
        <form action="../../controllers/bulletins/update.php" method="POST" enctype="multipart/form-data">
          <div>
            <div class="row">
              <div class="col-md-6">
                <input type="hidden" id="bulletin_id" name="bulletin_id">
                <div class="form-group row">
                  <div class="col-md-4">
                    <dt><label>Bulletin Number</label></dt>
                  </div>
                  <div class="col-md-6">
                    <label id="bulletin_number" name="bulletin_name">Bulletin Number</label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <dt><label>Title</label></dt>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="bulletin_title" name="bulletin_title" placeholder="Bulletin Title">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <dt><label>Description</label></dt>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="bulletin_description" name="bulletin_description" placeholder="Bulletin Description">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <dt><label>Revision Number</label></dt>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="bulletin_revision" name="bulletin_revision" placeholder="Revision No.">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <dt><label>Date</label></dt>
                  </div>
                  <div class="col">
                    <input type="text" id="bulletin_date" name="bulletin_date">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <dt><label>Date Effective</label></dt>
                  </div>
                  <div class="col">
                    <input type="text" id="bulletin_effective" name="bulletin_effective">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <dt><label>Bulletin Superceded</label></dt>
                  </div>
                  <div class="col-md-6">
                    <input type="hidden" id="bulletin_supercede" name="bulletin_supercede">
                    <label id="bulletin_num" name="bulletin_num">Bulletin not Superceded</label>
                    <label id="supercede_title" name="supercede_title"></label>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-primary" onclick="changeSupercede()">
                      Change
                    </button>
                  </div>
                </div>
                <div class="form-group row">
                  <dt><label for="bulletin_type" class="col-sm col-form-label">Bulletin Type:</label></dt>
                  <div class="col-sm-6">
                    <select class="browser-default custom-select" id="bulletin_type" name="bulletin_type">
                      <option selected>Bulletin Type</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <dt><label for="bulletin_type" class="col-sm col-form-label">Bulletin Type:</label></dt>
                  <div class="col-sm-6">
                    <select class="browser-default custom-select" id="bulletin_type" name="bulletin_type">
                      <option selected>Bulletin Type</option>
                    </select>
                  </div>
                </div>
                <!-- <div class="form-group row">
                  <input type="hidden" id="bulletin_applicability_id" name="bulletin_applicability_id">
                  <dt><label for="bulletin_applicability_text" class="col-sm col-form-label">Applicability:</label></dt>
                  <div class="col-sm-4">
                    <textarea name="bulletin_applicability_text" rows="5" cols="60" id="bulletin_applicability_text" class="m-wrap span12"></textarea>
                  </div>
                </div> -->
                <div class="form-group row">
                  <div class="col-md-4">
                    <dt><label>Active</label></dt>
                  </div>
                  <div class="col-md-6">
                    <input type="checkbox" id="bulletin_status" name="bulletin_status" value="1">
                  </div>
                </div>
                <div class="form-group row">
                  <dt><label class="col-sm col-form-label">Serial Numbers:</label></dt>
                  <div class="col-sm-6">
                    <table class="table table-bordered" id="serials_table" style="width : 100%">
                      <tr>
                        <thead>
                          <th>Model Number</th>
                          <th>Serial Number</th>
                          <th></th>
                        </thead>
                      </tr>
                        <tbody>
                        </tbody>
                    </table>
                  </div>
                </div>
                <br></br>
                <div class="form-group row">
                  <dt><label for="model_id" class="col-sm col-form-label">Select Model number to add:</label></dt>
                  <div class="col-sm-6">
                    <select class="browser-default custom-select" id="model_id" name="model_id">
                      <option selected>Model Number</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <dt><label class="col-sm col-form-label">Serial numbers to be added:</label></dt>
                  <div class="col-sm-6">
                    <table class="table table-bordered" id="add_serials_table" style="width : 100%">
                      <tr>
                        <thead>
                          <th>Serial Number</th>
                          <th></th>
                        </thead>
                      </tr>
                        <tbody>
                        </tbody>
                    </table>
                  </div>
                </div>
                <div class="form-group-row">
                  <div class="row">
                    <button type="submit" class="btn btn-primary" id="submit" display="margin-right : 20px" name="submit">Save Changes</button>
                    <button type="button" class="btn btn-primary" id="back" display="padding : 5px"name="back" onclick="viewAll()">View All</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <footer>
    <?php include  "../../templates/footer.php";?>
  </footer>
  <!-- /.container-fluid -->
</div>
</div>

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
  <!-- Supercede Modal -->
  <div class="modal fade" id="supercedeModal" tabindex="-1" role="dialog" aria-labelledby="supercedeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="supercedeModalLabel">Select Bulletin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <table class="table table-bordered" id="bulletins_table">
            <tr>
              <thead>
                <th>Bulletin Number</th>
                <th>Bulletin Title</th>
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  </div>
  <!-- Select Serial Modal-->
    <div class="modal fade" id="selectSerialModal" tabindex="-1" role="dialog" aria-labelledby="selectSerialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="selectSerialModalLabel">Select a Model</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <table class="table table-bordered" id="select_serials_table" style="width : 80%">
          <tr>
            <thead>
              <th>Serial Number</th>
              <th></th>
            </thead>
          </tr>
            <tbody>
            </tbody>
        </table>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="selectSerials()">Select</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../bootstrap/js/bootstrap-datepicker.min.js"></script>
  <script src="../../js/controllers/bulletins/edit.js"></script>
</body>
<script>
  var bulletinid = localStorage.getItem("bulletin_id");
  $('#bulletin_id').val(bulletinid);

  $('document').ready(function(){
    bulletintypeDrop();
    bulletinDetails(bulletinid);
    bulletinSerials(bulletinid);
    addSerials();
    planeModelsDrop();
  });

  function selectSerials(){
    var selectedSerialsTable = $('#add_serials_table');
    $('table tbody tr input[type=checkbox]:checked').each(function() {
        var $tr = $(this).parents('tr');
        var $new_table = $('<table>').append($tr);
        selectedSerialsTable.append($new_table);
    });
    $('#selectSerialModal').modal("hide");
  }

  $( function() {
    $( "#bulletin_date" ).datepicker({format: 'yyyy-mm-dd'});
  });

  $( function() {
    $( "#bulletin_effective" ).datepicker({format: 'yyyy-mm-dd'});
  });

  function viewAll(){
    window.location = "view_all.php";
  }

</script>
</html>
