<?php require_once("../../controllers/login/authorise_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Jonker Sailplanes Portal - Upload a Technical Note</title>
  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>
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
          <li class="breadcrumb-item active">Upload a Technical Note</li>
        </ol>
        <div class="card-body">
          <form action="../../controllers/notes/upload.php" method="POST" enctype="multipart/form-data">
            <div class="col">
              <div class="form-group row">
                <div class="col-sm-3">
                  <dt><label>Number</label><dt>
                </div>
                <div class="col-sm-8">
                  <input type="text" id="note_number" name="note_number" class="form-control"><label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3">
                  <dt><label>Title</label><dt>
                </div>
                <div class="col-sm-8">
                  <input type="text" id="note_title" name="note_title" class="form-control"><label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <dt><label>Bulletin File:</label></dt>
                  <input style="display:none" type="file" id="fileToUpload" name="fileToUpload"/>
                </div>
                <div class="col-sm-4">
                  <dt><label id="selected_file">No File selected</label></dt>
                </div>
                <div class="col-sm-4">
                  <button type="button" class="btn btn-primary" id="browse" name="browse">Select a File</button>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3">
                  <dt><label>Revision</label><dt>
                </div>
                <div class="col-sm-4">
                  <input type="text" id="note_revision" name="note_revision" class="form-control"><label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3">
                  <dt><label>Date:</label><dt>
                </div>
                <div class="col-sm-8">
                  <input type="date" id="note_date" name="note_date" class="form-control" value="" min="2000-01-01" max="2022-12-31">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3">
                  <dt><label>Description</label><dt>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <textarea name="note_description" rows="5" cols="60" id="note_description" class="m-wrap span12"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <input type="checkbox" id="note_status" name="note_status" value="active"> Active
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button type="submit" class="btn btn-primary" id="submit" name="submit" >Upload</button>
                  <button type="button" class="btn btn-primary" id="nofile" name="nofile" onclick="noFile()">Upload</button>
                  <button type="button" class="btn btn-primary" id="viewall" name="viewall" onclick="viewAll()">View All</button>
                </div>
              </div>
            </div>
            <!-- col-md6 -->
          </form>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#wrapper -->
  </div>
  <!-- content wrapper -->
  <footer style="background-color:#e9ecef;width:100%;position:relative;">
    <?php include  "../../templates/footer.php";?>
  </footer>
</div>
  <!-- Scroll to Top Button-->

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
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
  <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="../../../js/sb-admin.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<script>
  $('document').ready(function(){
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
    $('#submit').hide();

    $("#browse").on("click", function() {
      $("#fileToUpload").trigger("click");
      $("#nofile").hide();
      $("#submit").show();
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

  $( function(){
   $( "#note_date" ).datepicker({format: 'yyyy-mm-dd'});
  });

  function noFile(){
    alert("Please select a file");
  }

  function viewAll(){
    window.location = "view_all.php";
  }
</script>
</html>
