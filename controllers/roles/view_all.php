<?php
  require '../connections/connectDB.php';

  $sql = "SELECT * from
  roles";

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
