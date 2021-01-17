<?php
  require "../connections/connectDB.php";

  $id = $_POST['model_id'];
  $number = $_POST['model_number'];
  $status = $_POST['model_status'];

  $sql = "UPDATE plane_models
  SET
  model_number = ?,
  model_status = ?
  WHERE
  model_id = ?";

  if ($status  == "active"){
    $status = 1;
  } else {
    $status = 0;
  }

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("sii", $number, $status, $id))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
  header("Location:../../views/models/view_all.php");
?>
