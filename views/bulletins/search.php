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
          <li class="breadcrumb-item active">Upload a Service Bulletin</li>
        </ol>
        <!-- Page Content -->
        <div class="card card-report mx-auto">
      <div class="card-body">
        <form action="../../controllers/bulletins/upload.php" method="POST" enctype="multipart/form-data">
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
                  <button class="btn btn-primary" type="button" onclick="searchSerials()">Search For Serial</button>
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
            <table class="table table-bordered" id="showBulletinsTable">
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
        </form>
      </div>
    </div>
  </div>
  <footer class="sticky-footer">
    <?php include  "../../templates/footer.php"; ?>
  </footer>
  <!-- /.container-fluid -->
  <div class="modal fade" id="selectSerialsModal" tabindex="-1" role="dialog" aria-labelledby="selectSerialLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="selectSerialLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div cass="table-responsive">
            <table class="table table-bordered" id="selectSerialTable">
              <tr>
                <thead>
                  <th>Serial Number</th>
                  <th>Serial Numbers Affected</th>
                </thead>
              </tr>
                <tbody>
                </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="addSerials()">Add these Serials</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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
  $('document').ready(function(){
    $("#submit").hide();

    $("#browse").on("click", function() {
        $("#fileToUpload").trigger("click");
        $("#submit").show();
    });

    $.ajax({
      type: "GET",
      url:"../../controllers/models/get_model_numbers.php",
      dataType: "json",
      success: function (response) {
        $.each(response, function(key, value){
            var dropdownDiv = $('#model_number_dropdown');
            var moreSerialsDiv = $('#moreSerialsDropdown');

          $.each(value, function(key, value){
            var option = document.createElement("option");
            option.text = value;
            option.value = value;
            dropdownDiv.append(option);
          });

          $.each(value, function(key, value){
            var option = document.createElement("option");
            option.text = value;
            option.value = value;
            moreSerialsDiv.append(option);
          });
        });
      }
   });

   $('#model_number_dropdown').change(function(){
     $('#model_number_label').text($(this).val());
     $('#model_number').val($(this).val());

     var modelnumber = $(this).val();

     $('#serialsModelTable').DataTable({
       "destroy" : true,
       "processing" : true,
       "serverSide" : true,
       "contentType" : "application/json",
       "ajax" : {
           "url" : "../../controllers/serials/get_by_model.php",
           "type" : "POST",
           dataSrc : '',
           data :  {
             "model_number" : modelnumber
           },
           "order": [[0, "asc"]]
       },
       "columns" : [ {
           "data" : "serial_number"
       }, {
        "render": function(data, type, full){
          return '<input type="checkbox" name="serials[]" value="'+full['serial_id']+'" checked="true">';
        }
       }]
     });
   });

   $('#fileToUpload').change(function(evt){
        var selectedfile = evt.target.files[0].name;
        $('#selected_file').text(selectedfile);
   });

   $('#moreSerialsDropdown').change(function(){
     $('#model_number').val($(this).val());
     var modelnumber = $(this).val();

     $('#selectSerialsTable').DataTable({
         "destroy" : true,
         "processing" : true,
         "serverSide" : true,
         "contentType" : "application/json",
         "ajax" : {
             "url" : "../../controllers/serials/get_by_model.php",
             "type" : "POST",
             dataSrc : '',
             data :  {
               "model_number" : modelnumber
             },
             "order": [[0, "asc"]]
         },
         "columns" : [ {
             "data" : "serial_number"
         }, {
          "render": function(data, type, full){
            id = {
             "id" : full['serial_id'],
             "number" : full['serial_number']
            }
            return '<input type="checkbox" name="serials[]" value="'+full['serial_id']+'" checked="true">';
          }
         }]
     });

     $('#selectSerialsModal').modal('toggle');
   });
  });

  function addSerials(){
    var table = document.getElementById("selectSerialsTable");
    var checkBoxes = table.getElementsByTagName("INPUT");
    var serialsModelTable = document.getElementById("serialsModelTable");
    for (var i = 0; i < checkBoxes.length; i++){
      if (checkBoxes[i].checked){
        var row = checkBoxes[i].parentNode.parentNode;
        var number = row.cells[0].innerHTML;
        var id = checkBoxes[i].value;
        $('#serialsModelTable tr:last').after('<tr><td>'+number+'</td><td><input type="checkbox" value="'+id+'" checked="true"></td></tr>');
      }
    }
    $('#selectSerialsModal').modal('hide');
  }

  function searchSerials(){
    var modelnumber = $('#model_number').val();

    $('#selectSerialTable').DataTable({
        "destroy" : true,
        "processing" : true,
        "serverSide" : true,
        "contentType" : "application/json",
        "ajax" : {
            "url" : "../../controllers/serials/get_by_like_model.php",
            "type" : "POST",
            dataSrc : '',
            data :  {
              "model_number" : modelnumber
            },
            "order": [[0, "asc"]]
        },
        "columns" : [ {
            "data" : "serial_number"
        }, {
         "render": function(data, type, full){
           id = {
            "id" : full['serial_id'],
            "number" : full['serial_number']
           }
           return '<button type="button" class="btn btn-primary" onclick="showBulletins('+full['serial_id']+')">Select</button>';
         }
        }]
    });

    $('#selectSerialsModal').modal('toggle');
  }

  function showBulletins(id){
    var serialid = id;

    $('#showBulletinsTable').DataTable({
        "destroy" : true,
        "processing" : true,
        "serverSide" : true,
        "contentType" : "application/json",
        "ajax" : {
            "url" : "../../controllers/bulletins/get_by_serial.php",
            "type" : "POST",
            dataSrc : '',
            data :  {
              "serial_id" : serialid
            },
            "order": [[0, "asc"]]
        },
        "columns" : [ {
            "data" : "bulletin_number"
        }, {
            "data" : "bulletin_title"
        }, {
         "render": function(data, type, full){
           return '<a style="display: inline" type="button" class="btn btn-danger" href="/controllers/bulletins/files/' +full['bulletin_file_name']+ '" download="' +full['bulletin_file_name']+ '">Download</a>';
         }
        }]
    });

    $('#selectSerialsModal').modal('toggle');
  }

  function backOne(){
    window.history.back();
  }
</script>
</html>
