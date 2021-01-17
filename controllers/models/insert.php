<?php
  require "../connections/connectDB.php";

  $sql = "INSERT
  INTO
  plane_models
  (model_number, model_status)
  VALUES
  (?,?)";

  $number = $_POST['model_number'];
  $status = $_POST['model_status'];

  if ($status == "active"){
    $status = 1;
  } else {
    $status = 0;
  }

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("si", $number, $status))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
  header("Location:../../views/models/add.php");
?>
