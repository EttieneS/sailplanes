<?php
  require '../connections/connectDB.php';

  $id = 312;//$_POST["bulletin_id"];

  $sql = "SELECT
  bs.*,
  s.*,
  m.*
  FROM
  bulletin_serials as bs
  RIGHT JOIN plane_serials as s ON s.serial_id = bs.serial_id_fk
  RIGHT JOIN plane_models as m ON m.model_id = s.model_id_fk
  WHERE
  bs.bulletin_id_fk = ?";
  
  if (!($stmt = $conn->prepare($sql))){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }
  $stmt->bind_param("i", $id);
  if(!($stmt->execute())){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }

  $planeArray = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $conn->close();

  $jsonObj = json_encode($planeArray);
  echo $jsonObj;
?>
