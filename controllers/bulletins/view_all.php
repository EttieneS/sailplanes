<?php
  require '../connections/connectDB.php';

  $sql = "SELECT
  b.*,
  bt.*,
  m.*
  FROM
  bulletins b
  LEFT JOIN bulletin_type bt ON bt.bulletin_type_id = b.bulletin_type
  LEFT JOIN plane_serials s ON s.serial_id = b.serial_id_fk
  LEFT JOIN plane_models m ON m.model_id = s.model_id_fk";

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
