<?php
  require "../connections/connectDB.php";

  $serialnumber = $_POST['serial_number'];
  $serialid = $_POST['serial_id'];
  $modelid = $_POST['model_id_fk'];
  $status = $_POST['serial_status'];

  $sql = "UPDATE plane_serials
  SET
  serial_number = ?,
  model_id_fk = ?,
  serial_status = ?
  WHERE
  serial_id = ?";

  if ($status  == "active"){
    $status = 1;
  } else {
    $status = 0;
  }

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("siii", $serialnumber, $modelid, $status, $serialid))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
  header("Location:../../views/serials/view_all.php");
?>
