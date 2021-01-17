<?php
  require "../connections/connectDB.php";

  $sql = "SELECT
  b.*,
  ba.*
  FROM
  bulletins b
  JOIN bulletins_applicable ba ON ba.bulletin_fk = b.bulletin_id
  WHERE
  bulletin_id = ?";

  $id = $_POST['bulletin_id'];

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
