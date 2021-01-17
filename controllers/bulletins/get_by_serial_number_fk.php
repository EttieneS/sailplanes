<?php
  require '../connections/connectDB.php';

  $id = 103;//$_POST["serial_id"];

  $sql = "SELECT
  bs.*,
  b.*
  FROM
  bulletin_serials as bs
  RIGHT JOIN bulletins as b ON b.bulletin_id = bs.bulletin_id_fk
  WHERE
  bs.serial_id_fk = ?";

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
