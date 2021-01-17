<?php
  require '../connections/connectDB.php';

  $modelid = $_POST['report_model'];
  $sql = "SELECT
  *
  FROM
  reports
  WHERE
  report_model = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $modelid);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit('No rows');
  echo json_encode($result);

  $stmt->close();
  $conn->close();
?>
