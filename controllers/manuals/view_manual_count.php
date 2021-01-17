<?php
  require '../connections/connectDB.php';

  $sql = "SELECT
  *
  FROM
  manuals";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->store_result();

  $count =  $stmt->num_rows;
  if(!$count) exit('No Manuals');
  echo json_encode($count);

  $stmt->close();
  $conn->close();
?>
