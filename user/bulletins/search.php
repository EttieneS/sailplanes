<?php require_once("../../controllers/login/authorise.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Jonker Sailplanes Portal - Upload a Service Bulletin</title>

  <link rel="shortcut icon" href="css/img/jonkerfav.ico" type="image/x-icon">
  <link href="/css/sb-admin.css" rel="stylesheet">
  <link href="/css/styles.css" rel="stylesheet">
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body id="page-top">
  <?php include  "../templates/header.php"; ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include  "../../templates/user_sidebar.php"; ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="http://portal.jonkersailplanes.co.za/">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Search Bulletin</li>
        </ol>
        <!-- Page Content -->
        <div class="card card-report mx-auto">
          <div class="card-body">
            <form>
              <div class="form-group row">
                <label for="bulletin_title" class="col-sm-4 col-from-label">Search Bulletin Title</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="bulletin_title" name="bulletin_title" placeholder="Bulletin_Title">
                  <br>
                  <button  type="button" class="btn btn-primary" id="search" name="search" onclick="searchRecord()">Search</button>
                </div>
              </div>
              <div>
                <table class="table table-bordered" id="bulletins_table">
                  <tr>
                    <thead>
                      <th>Bulletin Number</th>
                      <th>Bulletin Title</th>
                      <th>Type</th>
                      <th>Revision</th>
                      <th>Date Issued</th>
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
  $('document').ready(function(){
    $('#bulletins_table').DataTable({
        "processing" : true,
        "ajax" : {
            "url" : "../../controllers/bulletins/view_all.php",
            dataSrc : '',
            "order": [[0, "asc"]]
        },
        "columns" : [ {
            "data" : "bulletin_number"
        }, {
            "data" : "bulletin_title"
        }, {
            "data" : "bulletin_type_description"
        }, {
            "data" : "bulletin_revision"
        }, {
            "data" : "bulletin_effective"
        }, {
          "data" : "bulletin_id",
          "render": function(data, type, full){
            return '<a style="display: inline" type="button" class="btn btn-danger" href="/controllers/manuals/files/' +full['bulletin_file_name']+ '">Download Bulletin</a>';
          }
        }]
    })

    // function searchRecord(){
    //   var bulletintitle = $('#bulletin_title').text();
    //   alert(bulletintitle);
    // }
    //   $('#bulletins_table').DataTable({
    //       "processing" : true,
    //       "ajax" : {
    //         "url" : "../../controllers/bulletins/get_by_like_title.php",
    //         dataSrc : '',
    //         //dataType : 'json',
    //         //data : { "bulletin_title" : bulletintitle },
    //         "order": [[0, "asc"]]
    //       },
    //       "columns" : [ {
    //           "data" : "bulletin_number"
    //       }]
    //   });
    // }
  });

  function searchRecord(){
    var bulletintitle = $('#bulletin_title').text();
    alert(bulletintitle);
    $('#bulletins_table').DataTable({
          "processing" : true,
          "ajax" : {
            "url" : "../../controllers/bulletins/get_by_like_title.php",
            dataSrc : '',
            //dataType : 'json',
            //data : { "bulletin_title" : bulletintitle },
            "order": [[0, "asc"]]
          },
          "columns" : [ {
              "data" : "bulletin_number"
          }]
      });
    }
  }

  function backOne(){
    window.history.back();
  }
</script>
</html>
