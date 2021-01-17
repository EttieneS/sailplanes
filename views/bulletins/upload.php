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
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">

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
        <li class="breadcrumb-item active">Upload a Service Bulletin</li>
      </ol>
      <!-- Page Content -->
      <div class="card card-report mx-auto">
        <div class="card-body">
          <form action="../../controllers/bulletins/upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <dt><label for="bulletin_number" class="col-sm col-fom-label">Bulletin Number</label></dt>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="bulletin_number" name="bulletin_number" placeholder="Bulletin Number">
              </div>
            </div>
            <div class="form-group row">
              <dt><label for="bulletin_title" class="col-sm col-fom-label">Title</label></dt>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="bulletin_title" name="bulletin_title" placeholder="Bulletin Title">
              </div>
            </div>
            <div class="form-group row">
              <dt><label for="bulletin_description" class="col-sm col-form-label">Bulletin Description:</label></dt>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="bulletin_description" name="bulletin_description" placeholder="Bulletin Description">
              </div>
            </div>
            <div class="form-group row">
              <dt><label for="selected_file" class="col-sm col-form-label">Bulletin File:</label></dt>
              <div class="col-sm-2">
                <dd><label id="selected_file">No File selected</label></dd>
              </div>
              <div class="col-sm-2">
                <input style="display:none" type="file" id="fileToUpload" name="fileToUpload"/>
                <button type="button" class="btn btn-primary" id="browse" name="browse">Select a File</button>
              </div>
            </div>
            <div class="form-group row">
              <dt><label for="bulletin_revision" class="col-sm col-form-label">Bulletin Revision:</label></dt>
              <div class="col-sm-4">
                <dd><input type="text" id="bulletin_revision" name="bulletin_revision" placeholder="Bulletin Revision No."></label></dd>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3">
                <dt><label>Bulletin Superceded by</label></dt>
              </div>
              <div class="col-sm-3">
                <input type="hidden" id="bulletin_supercede" name="bulletin_supercede">
                <label id="supercede_title" name="supercede_title">No Bulletin Selected<label>
              </div>
              <div class="col-sm-3">
                <button type="button" class="btn btn-primary" onclick="changeSupercede()">
                  Select
                </button>
              </div>
            </div>
            <div class="form-group row">
              <dt><label for="bulletin_type" class="col-sm col-form-label">Bulletin Type:</label></dt>
              <div class="col-sm-4">
                <select class="browser-default custom-select" id="bulletin_type" name="bulletin_type">
                  <option selected>Bulletin Type</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-4">
                <input type="checkbox" id="bulletin_status" name="bulletin_status" value="1"> Active
              </div>
            </div>
            <div class="form-group row">
              <dt><label for="model_id" class="col-sm col-form-label">Model Number:</label></dt>
              <div class="col-sm-4">
                <select class="browser-default custom-select" id="model_id" name="model_id">
                  <option selected>Model Number</option>
                </select>
              </div>
            </div>
            <!-- selected serials table -->
            <div class="form-group row">
              <dt><label class="col-sm col-form-label">Serial Numbers:</label></dt>
              <div class="col-sm-6">
                <table class="table table-bordered" id="selectedserials" style="width : 100%">
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
            <br>
            <div class="row">
              <div class="col-md-6">
                <button display="margin-right : 5px" type="submit" class="btn btn-primary" id="submit" name="submit">Upload File</button>
                <button display="margin-right : 5px"  type="button" class="btn btn-primary" id="no_file" name="no_file" onclick="noFile()">Upload File</button>
                <button display="margin-right : 5px"  type="button" class="btn btn-primary" id="back" name="back" onclick="viewAll()">View All</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
      <footer>
        <?php include  "../../templates/footer.php";?>
      </footer>
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
        <table class="table table-bordered" id="serials_table" style="width : 80%">
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
  <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>

  <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="../../bootstrap/js/bootstrap-datepicker.min.js"></script>
  <script src="../../js/controllers/bulletins/upload.js"></script>
</body>
<script>
  $('document').ready(function(){
    $("#submit").hide();

    $("#browse").on("click", function() {
      $("#fileToUpload").trigger("click");
      $("#no_file").hide();
      $("#submit").show();
    });

    $("#model_id").on("change", function(){
      var modelid = $(this).val();

      $('#serials_table').DataTable({
          "processing" : true,
          "destroy" : true,
          "ajax" : {
              "url" : "../../controllers/serials/get_by_model.php",
              "type" : 'POST',
              dataSrc : '',
              data : { "model_id" : modelid },
              "order": [[0, "asc"]]
          },
          "columns" : [{
              "data" : "serial_number"
          }, {
            "render": function(data, type, full){
              serial_id = {
                "serial_id" : full['serial_id']
              }
              return '<input type="checkbox" name="serial_id[]" value="' +full['serial_id']+ '"/>';
            }
          }]
      });
      $('#selectSerialModal').modal("show");
    });

    // plane model dropdown
    $.ajax({
      type: "GET",
      url:"../../controllers/models/view_all.php",
      dataType: "json",
      success: function (response) {
        $.each(response, function(key, value){
          var rolesdropdown = $('#model_id');
            var option = document.createElement("option");
            option.text = value['model_number'];
            option.value = value['model_id'];
            rolesdropdown.append(option);
        });
      }
    });

    $.ajax({
      type: "POST",
      url:"../../controllers/bulletins/view_all.php",
      dataType: "json",
      success: function (response) {
        $.each(response, function(key, value){
          var bulletinsSupercede = $('#bulletin_supercede');
            var option = document.createElement("option");
            option.text = value['bulletin_title'];
            option.value = value['bulletin_id'];
            bulletinsSupercede.append(option);
        });
      }
    });

    // bulletin dropdown
    $.ajax({
      type: "GET",
      url:"../../controllers/bulletins/get_bulletin_type.php",
      dataType: "json",
      success: function (response) {
        $.each(response, function(key, value){
          var bulletinsdropdown = $('#bulletin_type');
            var option = document.createElement("option");
            option.text = value['bulletin_type_description'];
            option.value = value['bulletin_type_id'];
            bulletinsdropdown.append(option);
        });
      }
    });
  });

  function selectSerials(){
    var selectedSerialsTable = $('#selectedserials');
    $('table tbody tr input[type=checkbox]:checked').each(function() {
        var $tr = $(this).parents('tr');
        var $new_table = $('<table>').append($tr);
        selectedSerialsTable.append($new_table);
    });
    $('#selectSerialModal').modal("hide");
  }

  function changeSupercede(){
    $('#supercedeModal').modal("show");
    $('#bulletins_table').DataTable({
        "processing" : true,
        "destroy" : true,
        "ajax" : {
            "url" : "../../controllers/bulletins/view_all.php",
            dataSrc : '',

            "order": [[0, "asc"]]
        },
        "columns" : [{
            "data" : "bulletin_number"
        }, {
            "data" : "bulletin_title"
        }, {
          "render": function(data, type, full){
            bulletin = {
              "bulletin_id" : full['bulletin_id'],
              "bulletin_number" : full['bulletin_number']
            }
            return '<a style="display: inline"><button type="button" class="btn btn-primary float-left" style="margin-right: 10px" onclick=selectBulletin(' +JSON.stringify(bulletin)+ ')>Select</button></a>';

          }
        }]
    });
  }

  $('#fileToUpload').change(function(evt){
      var selectedfile = evt.target.files[0].name;
      $('#selected_file').text(selectedfile);
  });

  $( function() {
    $( "#bulletin_date" ).datepicker({format: 'yy-mm-dd'});
    $( "#bulletin_effective" ).datepicker({format: 'yy-mm-dd'});
  });

  function noFile(){
    alert("Please select a file first")
  }
  function viewAll(){
    window.location = "view_all.php";
  }

  function selectBulletin(bulletin){
    $('#supercede_title').text(bulletin.bulletin_number);
    $('#bulletin_supercede').val(bulletin.bulletin_id);
    $('#supercedeModal').modal('hide');
  }
</script>
</html>
