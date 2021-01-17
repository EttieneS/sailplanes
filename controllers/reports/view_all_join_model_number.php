<?php
  require '../connections/connectDB.php';

  $sql = "SELECT
  r.*,
  m.*
  FROM
  reports r
  JOIN plane_models m ON m.model_id = r.report_model";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }
  if(!($stmt->execute())){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }

  $all = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $conn->close();

  $jsonObj = json_encode($all);
  echo $jsonObj;
?>
