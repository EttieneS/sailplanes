<?php
  require '../connections/connectDB.php';

  $id = 312; //$_POST["bulletin_id"];

  $sql = "SELECT
  b.*,
  ba.*,
  bt.*
  FROM
  JOIN bulletin_applicability as ba ON ba.bulletin_fk = b.bulletin_id
  JOIN bulletin_type as bt ON bt.bulletin_type_id = b.bulletin_type
  WHERE
  b.bulletin_id = ?";

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
