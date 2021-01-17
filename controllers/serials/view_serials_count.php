<?php
  require '../connections/connectDB.php';

  $sql = "SELECT
  *
  FROM
  plane_serials";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->store_result();

  $count =  $stmt->num_rows;
  if(!$count) exit('No Serial Numbers');
  echo json_encode($count);

  $stmt->close();
  $conn->close();
?>
