<?php
  require "../connections/connectDB.php";

  $sql = "DELETE
  FROM
  users
  WHERE
  user_id = ?";

  $id = $_POST['user_id'];

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
