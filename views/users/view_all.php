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
  <?php include  "../../templates/header.php"; ?>
  <div id="wrapper">
    <?php include  "../../templates/sidebar.php"; ?>
    <div id="content-wrapper">
      <h3 style="text-align : center">Users</h3>
      <div>
        <table class="table table-bordered" id="users_table" style="width : 100%">
          <tr>
            <thead>
              <th>Name</th>
              <th>Last Name</th>
              <th>E-mail</th>
              <th>Contact Number</th>
              <th>Role</th>
              <th>Last Login</th>
              <th>Created</th>
              <th>Status</th>
              <th></th>
            </thead>
          </tr>
            <tbody>
            </tbody>
        </table>
        <div class="row">
          <div class="col-md-6">
            <button type="button" class="btn btn-primary float-left" onclick="addUser()"> Add User</button>
          </div>
        </div>
        <div>
          <footer style="background-color:#e9ecef;width:100%;position:relative;margin-top:50px;">
            <?php include  "../../templates/footer.php";?>
          </footer>
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
  <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="../../../js/sb-admin.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

<script>
  $('document').ready(function(){
    $('#users_table').DataTable({
        "processing" : true,
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
            "data" : "user_phone"
        }, {
            "data" : "role_name"
        },  {
            "data" : "user_login"
        }, {
            "data" : "user_date"
        }, {
            "render": function(data, type, full){
              if (full['user_status'] == 1){
                return  '<label>Active</label>';
              } else {
                return '<label>Inactive</label';
              }
            }
        }, {
          "render": function(data, type, full){
            user = {
              "user_id" : full['user_id'],
            }
            return '<a style="display: inline"><button type="button" class="btn btn-primary float-left" onclick=editUser(' +JSON.stringify(user)+ ')>Edit</button></a>' +
              '<a style="display: inline"><button type="button" class="btn btn-danger float-right" onclick=deleteUser(' +JSON.stringify(user)+ ')>Delete</button></a>';
          }
        }]
    });
  });
  function addUser(){
    window.location = "add.php";
  }

  function editUser(user){
    localStorage.setItem("user_id", user.user_id);
    window.location = "edit.php";
  }

  function deleteUser(user){
    var userid = user.user_id;
    $.ajax({
      type    : 'POST',
      url     : '../../controllers/users/delete_by_id.php',
      data    : { "user_id" : userid },
      beforeSend: function(){
        return confirm("Are you sure you want to delete this user?");
      },
      success : function() {
          window.location.reload();
      }
    });
  }
</script>
</html>
