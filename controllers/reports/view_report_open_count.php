<?php
  require '../connections/connectDB.php';

  $status = 1;

  $sql = "SELECT
  COUNT(*)
  FROM
  reports
  WHERE
  report_status = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $status);
  $stmt->execute();
  $row = $stmt->get_result()->fetch_row();
  $reporttotal = $row[0];

  if(!$reporttotal) exit('No open reports');
  echo $reporttotal;

  $stmt->close();
  $conn->close();
?>
