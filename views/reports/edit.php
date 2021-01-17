<?php require_once("../../controllers/login/authorise_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - Edit Manual Details</title>
  <!--Favicon-->
  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="../../../css/sb-admin.css"/>
  <link href="../../css/styles.css" rel="stylesheet">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="/bootstrap/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>
<body id="page-top">
  <?php include  "../templates/header.php"; ?>
<div id="wrapper">
    <?php include  "../../templates/sidebar.php"; ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="http://portal.jonkersailplanes.co.za/">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Edit Report Details</li>
        </ol>
        <!-- Page Content -->
        <div class="card card-report mx-auto">
          <div class="card-body">
            <form action="../../controllers/reports/update.php" method="POST">
              <div class="form-group row">
                <label for="report_number" class="col-sm-2 col-from-label">Report Number</label>
                <div class="col-sm-4">
                  <input type="hidden" class="form-control" id="report_id" name="report_id">
                  <label id="report_number" name="report_number"></label>
                </div>
              </div>
              <div class="form-group row">
                <label for="report_title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="report_title" name="report_title" placeholder="Report Title">
                </div>
              </div>
              <div class="form-group row">
                <label for="search_email" class="col-sm-2 col-form-label">Reported By</label>
                <div class="col-sm-4">
                  <label id="user_email_label" name="user_email_label"></label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="report_by" name="report_by" style="display : none">
                  <button type="button" class="btn btn-primary" onclick="viewUsers()">Change Customer</button>
                </div>
              </div>
              <div class="form-group row">
                <label for="report_model" class="col-sm-3 col-form-label">Model</label>
                <div class="col-sm-4">
                  <select class="browser-default custom-select" id="report_model" name="report_model">
                    <option selected>No Model Selected</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="report_date" class="col-sm-3 col-form-label">Date Reported:</label>
                <div class="col-sm-4">
                  <input type="text" id="report_date" name="report_date">
                </div>
              </div>
              <br>
              <div class="form-group row">
                <div class="col">
                  <label for="report_body">Please give details about the defect</label>
                  <textarea class="form-control rounded-0" id="report_body" name="report_body" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group-row">
                <label for="report_status" class="col-sm-4 col-form-label">Report Status</label>
                <div class="col-sm-6">
                  <select class="browser-default custom-select" id="report_status" name="report_status">
                  </select>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-primary mb-2" id="submit">Save Changes</button>
              <button type="button" class="btn btn-danger mb-2" onclick="viewAll()">View All</button>
            </form>
          </div>
        </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<div class="row">
  <div class="col">
    <footer class="sticky-footer" style="width: 100%">
      <?php include  "../../templates/footer.php";?>
    </footer>
  </div>
</div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- select user modal -->
  <div class="modal fade" id="selectUserModal" name="selectUserModal" tabindex="-1" role="dialog" aria-labelledby="selecUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="selectUserModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="users_table">
            <tr>
              <thead>
                <th>Name</th>
                <th>Surname</th>
                <th>E-Mail</th>
                <th></th>
              </thead>
            </tr>
              <tbody>
              </tbody>
          </table>
        </div>
        <div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../js/sb-admin.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../bootstrap/js/bootstrap-datepicker.min.js"></script>

</body>
<script>
  $('document').ready(function(){
    var report_id = localStorage.getItem("report_id");
    $("#report_date").datepicker({format: 'yyyy-mm-dd'});

    $.ajax({
      type: "POST",
      url:"/controllers/models/view_all.php",
      dataType: "json",
      data : {},
      success: function (response) {
        $.each(response, function(key, value){
          var modelsDiv = $('#report_model');

          var option = document.createElement("option");
          option.text = value['model_number'];
          option.value = value['model_id'];
          modelsDiv.append(option);
        });
      }
    });

    $.ajax({
      type: "POST",
      url:"/controllers/report_status/select_all.php",
      dataType: "json",
      data : {},
      success: function (response) {
        $.each(response, function(key, value){
          var modelsDiv = $('#report_status');

          var option = document.createElement("option");
          option.text = value['report_status_status'];
          option.value = value['report_status_id'];
          modelsDiv.append(option);
        });
      }
    });

    $.ajax({
      type : 'POST',
      url : '../../controllers/reports/select_with_text_model_numbers.php',
      data : { "report_id" : report_id },
      dataSrc : '',
      dataType : 'json',
      success : function(response) {
        $('#report_id').val(response[0].report_id);
        $('#report_number').text(response[0].report_number);
        $('#report_title').val(response[0].report_title);
        $('#user_email_label').text(response[0].user_email);
        $('#report_by').val(response[0].report_by);
        $('#report_model').val(response[0].report_model).trigger('change');
        $('#report_status').val(response[0].report_status).trigger('change');
        $('#report_date').val(response[0].report_created);
        $('#report_updated').val(response[0].report_updated);
        $('#report_body').text(response[0].report_text_content);
      }
    });
  });

  function viewUsers(){
    $('#selectUserModal').modal("show");

    var email = $('#search_mail').text();
    $('#users_table').DataTable({
      "processing" : true,
      "ajax" : {
          "url" : "../../controllers/users/view_all.php",
          dataSrc : '',
          dataType : 'json',
          data : {
            "user_email" : email },
          "order": [[0, "asc"]]
      },
      "columns" : [ {
          "data" : "user_email"
      }, {
          "data" : "user_name"
      }, {
          "data" : "user_lastname"
      },{
        "render": function(data, type, full){
          user = {
            "user_id" : full['user_id'],
            "user_email" : full['user_email']
          }
          return  '<a style="display: inline"><button type="button" class="btn btn-primary float-left" onclick=selectUser(' +JSON.stringify(user)+ ')>Select</button></a>';
        }
      }]
    });
  }

  function selectUser(user){
    $('#report_by').val(user.user_id);
    $('#user_email_label').text(user.user_email);
    $('#selectUserModal').modal("hide");
  }

  $( function(){
   $("#report_date").datepicker({format: 'yyyy-mm-dd'});
  });

  function viewAll(){
    window.location = "view_all.php";
  }
</script>
</html>
