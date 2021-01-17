<?php
  require '../connections/connectDB.php';

  $modelid = $_POST["model_id"];

  $sql = "SELECT
  s.*,
  m.*
  FROM
  plane_serials as s
  JOIN plane_models as m ON m.model_id = s.model_id_fk
  WHERE
  m.model_id = ?";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }
  $stmt->bind_param("i", $modelid);
  if(!($stmt->execute())){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }

  $planeArray = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $conn->close();

  $jsonObj = json_encode($planeArray);
  echo $jsonObj;
?>
