<?php
  require '../connections/connectDB.php';

  $sql = "SELECT
  bulletin_id,
  bulletin_number
  FROM
  bulletins";

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
