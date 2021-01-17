<?php
  // require '../connection/connectDB.php';
          $conn = mysqli_connect("dedi186.jnb2.host-h.net", "gsdteuyrem_23", "pxkTY4hQqD4MZzanr2f8", "jonkerportal_db15");
              // Check connection
              if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
              }
              $result = mysqli_query($conn, "SELECT COUNT(*) as count
              FROM report_status IN ('new') );

              while ($row = mysqli_fetch_array($result)) {

              $var = $row['count'];

              echo "" .$var. "";

          }
?>
