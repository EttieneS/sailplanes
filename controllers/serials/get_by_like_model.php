<?php
  require '../connections/connectDB.php';

  $number = "%{$_POST['model_number']}%";

  $sql = "SELECT
  s.serial_id,
  s.serial_number,
  s.model_id_fk,
  m.model_id,
  m.model_number
  FROM
  plane_serials as s
  JOIN
  plane_models as m ON
  s.model_id_fk = m.model_id
  WHERE
  m.model_number LIKE ?";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }
  $stmt->bind_param("s", $number);
  if(!($stmt->execute())){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }

  $planeArray = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $conn->close();

  $jsonObj = json_encode($planeArray);
  echo $jsonObj;
?>
