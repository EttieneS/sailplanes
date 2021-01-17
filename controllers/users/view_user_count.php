<?php
  require '../connections/connectDB.php';

  $sql = "SELECT
  *
  FROM
  users";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->store_result();

  $count =  $stmt->num_rows;
  if(!$count) exit('No Registered Users');
  echo json_encode($count);

  $stmt->close();
  $conn->close();
?>
