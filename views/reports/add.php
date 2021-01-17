<?php require_once("../../controllers/login/authorise_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - Create new Report</title>
  <!--Favicon-->
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
      <form name="form" action="../../controllers/reports/insert.php" method="POST">
        <div class="col">
          <input type="hidden" id="header" name="header" class="form-control" value="../../views/reports/view_all.php">
          <div class="form-group row">
            <div class="col-sm-2">
              <dt><label>Title:</label><dt>
            </div>
            <div class="col-sm-8">
              <input id="report_title" name="report_title" placeholder="Report Title" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">
              <dt><label>Report File:</label></dt>
            </div>
            <div class="col-sm-6">
              <dt><label id="user_email">Please select the customer</label></dt>
            </div>
            <div class="col-sm-4">
              <button type="button" class="btn btn-primary" onclick="showUsers()">Select Customer</button>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
              <dt><label>Model:</label><dt>
            </div>
            <div class="col-sm-6">
              <select class="browser-default custom-select" id="report_model" name="report_model">
                <option selected>No Model Selected</option>
              </select>
            </div>
          </div>
          <br>
          <div class="form-group-row">
            <div class="col">
              <dt><label for="report_body">Please give details about the defect</label><dt>
              <textarea class="form-control rounded-0" id="report_body" name="report_body" rows="10"></textarea>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-4">
              <input type="submit" class="btn btn-primary btn-block" name="submit" value="Send Report" />
              <button type="button" class="btn btn-primary btn-block" name="viewall" onclick="viewAll()">View All</button>
            </div>
          </div>
        </div>
      </form>
      <footer>
        <?php include  "../../templates/footer.php";?>
      </footer>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
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
  <!-- Modal -->
  <div class="modal fade" id="selectUserModal" tabindex="-1" role="dialog" aria-labelledby="selectUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:80%" >
      <div class="modal-content" style="width:130%">
        <div class="modal-header">
          <h5 class="modal-title" id="selectUserLabel">Select User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive" id=users_tablediv>
            <table class="table table-bordered" id="users_table">
              <tr>
                <thead>
                  <th>Name</th>
                  <th>Last Name</th>
                  <th>E-mail</th>
                  <th>Role</th>
                  <th>Actions</th>
                </thead>
              </tr>
                <tbody>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary float-left" onclick="addUser()"> Add User</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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
           var statusDiv = $('#report_status');

           var option = document.createElement("option");
           option.text = value['report_status_status'];
           option.value = value['report_status_id'];
           statusDiv.append(option);
       });
     }
   });
  });

  function showUsers(){
    $('#selectUserModal').modal("show");
    $('#users_table').DataTable({
        "destroy" : true,
        "processing" : true,
        "serverSide" : true,
        "ajax" : {
            "url" : "../../controllers/users/view_all_with_roles.php",
            dataSrc : '',
            "order": [[0, "asc"]]
        },
        "columns" : [{
            "data" : "user_name"
        }, {
            "data" : "user_lastname"
        }, {
            "data" : "user_email"
        }, {
            "data" : "role_name"
        }, {
          "render": function(data, type, full){
            user = {
              "user_id" : full['user_id'],
              "user_email" : full['user_email']
            }
            return '<a style="display: inline"><button type="button" class="btn btn-primary float-left" style="margin-right: 10px" onclick=selectUser(' +JSON.stringify(user)+ ')>Select</button></a>';
          }
        }]
    });
  }

  function selectUser(user){
    $('#user_id').val(user.user_id);
    $('#user_email').text(user.user_email);
    $('#selectUserModal').modal("hide");
  }

  function viewAll(){
    window.location = "view_all.php";
  }
</script>
</html>
