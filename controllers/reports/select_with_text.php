<?php
  require '../connections/connectDB.php';

  $id = $_POST['report_id'];

  $sql = "SELECT
  r.*,
  rt.*
  FROM
  reports as r
  INNER JOIN reports_text rt ON r.report_id = rt.report_id_fk
  WHERE
  r.report_id = ?";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }
  $stmt->bind_param("i", $id);
  if(!($stmt->execute())){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }

  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $conn->close();

  $jsonObj = json_encode($result);
  echo $jsonObj;
?>
