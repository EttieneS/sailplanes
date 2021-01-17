<?php
  require "../connections/connectDB.php";

  $sql = "DELETE
  FROM
  plane_serials
  WHERE
  serial_id = ?";

  $serialid = $_POST['serial_id'];

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("i", $serialid))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
?>
