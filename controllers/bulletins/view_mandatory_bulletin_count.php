<?php
  require '../connections/connectDB.php';

  $status = 2;

  $sql = "SELECT
  COUNT(*)
  FROM
  bulletins
  WHERE
  bulletin_status = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $status);
  $stmt->execute();
  $row = $stmt->get_result()->fetch_row();
  $count = $row[0];

  if(!$count) exit('No Mandatory Bulletins');
  echo $count;

  $stmt->close();
  $conn->close();
?>
