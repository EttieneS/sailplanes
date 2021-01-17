<?php
  require '../connections/connectDB.php';

  $sql = "SELECT
  s.*,
  m.*
  FROM plane_serials s
  LEFT OUTER JOIN plane_models m
  ON s.model_id_fk = m.model_id";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }
  if(!($stmt->execute())){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }

  $planeArray = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $conn->close();

  $jsonObj = json_encode($planeArray);
  echo $jsonObj;
?>
