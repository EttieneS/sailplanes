<?php
  require "../connections/connectDB.php";

  $sql = "DELETE
  FROM
  bulletin_serials
  WHERE
  bulletin_serials_id = ?";

  $id = $_POST['bulletin_serials_id'];

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("i", $id))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
?>
