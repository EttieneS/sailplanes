<?php require_once("../../controllers/login/authorise_admin.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - Add a Customer</title>
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
  <div id="content-wrapper" class="mx-auto" style="padding-left:50px;">
    <h3 style="text-align : center">Add New Users</h3>
    <form name="form" action="../../controllers/users/insert.php" method="POST" style="width : 100%">
      <div class="form-group row">
        <label for="model_number" class="col-sm-2 col-form-label">E-mail</label>
        <div class="col-sm-10">
          <input type="hidden" class="form-control" id="user_id" name="user_id">
          <input type="text" class="form-control" id="user_email" name="user_email" placeholder="E-mail">
        </div>
      </div>
      <div class="form-group row">
        <label for="user_name" class="col-sm-2 col-form-label">Customer Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Customer Name">
        </div>
      </div>
      <div class="form-group row">
        <label for="user_lastname" class="col-sm-2 col-form-label">Customer Surname</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="user_lastname" name="user_lastname" placeholder="Customer Surname">
        </div>
      </div>
      <div class="form-group row">
        <label for="user_phone" class="col-sm-2 col-form-label">Contact Number</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="Contact Number">
        </div>
      </div>
      <div class="form-group row">
        <label for="user_pass" class="col-sm-2 col-form-label">Temporary Password</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="user_pass" name="user_pass" placeholder="Temporary Password">
        </div>
      </div>
      <div class="form-group row">
        <label for="user_pass" class="col-sm-2 col-form-label">Temporary Password</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="user_pass" name="user_pass" placeholder="Temporary Password">
        </div>
      </div>
      <div class="form-group row">
        <label for="model_id_fk" class="col-sm-2 col-form-label">Model</label>
        <div class="col-sm-10">
          <select class="form-control" id="model_id_fk" type="text" placeholder="Plane Model">
            <option>Select Plane Model</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="serial_id" class="col-sm-2 col-form-label">Serial Number</label>
        <div class="col-sm-10">
          <select class="form-control" id="model_id_fk" type="text" placeholder="Plane Model">
            <option>Select Serial Number</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">User Role</label>
        <div class="col-sm-10">
          <select class="form-control" id="user_role" type="text" placeholder="User Role">
            <option>Select User Role</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <input type="text" style="display: inline" class="btn btn-primary btn-block" name="view_all" onclick="viewAll()" value="View All" />
          <input type="submit"  style="display: inline" class="btn btn-primary btn-block" name="submit" value="Add User" />
        </div>
      </div>
    </form>
    <div>
      <footer style="background-color:#e9ecef;width:100%;position:relative;margin-top:50px;">
        <?php include  "../../templates/footer.php";?>
      </footer>
    </div>
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

  <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="../../../js/sb-admin.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script type="text/javascript" src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<script>
  $('document').ready(function (){
    $.ajax({
      type: "GET",
      url:"../../controllers/roles/view_all.php",
      dataType: "json",
      success: function (response) {
        $.each(response, function(key, value){
          var rolesdropdown = $('#roles_dropdown');
            var option = document.createElement("option");
            option.text = value['role_name'];
            option.value = value['role_id'];
            rolesdropdown.append(option);
        });
      }
    });

    $.ajax({
      type: "GET",
      url:"../../controllers/models/view_all.php",
      dataType: "json",
      success: function (response) {
        $.each(response, function(key, value){
          var modelsdropdown = $('#model_id_fk');
            var option = document.createElement("option");
            option.text = value['model_number'];
            option.value = value['model_id'];
            modelsdropdown.append(option);
        });
        var model_id = localStorage.getItem("model_id");
        $('#model_id_fk').val(model_id).change();
      }
    });
  });

  $('model_id_fk').change(function(){
    $.ajax({
      type: "POST",
      url:"../../controllers/serials/get_by_id.php",
      dataType: "json",
      data : { "serial_id" : serialid },
      success: function (response) {
        $('#serial_id').val(response[0].serial_id);
        $('#serial_number').val(response[0].serial_number);
      }
    });
  });

  $('#user_role').change(function(){
    var id = $(this).val();
    var name = $("#user_role option:selected").text();
    $('#role_name').text(name);
    $('#user_role').val(id);
  });

  function viewAll(){
    window.location = "view_all.php";
  }
</script>
</html>
