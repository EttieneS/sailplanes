<?php
  require "../connections/connectDB.php";

  $sql = "INSERT INTO
  plane_serials
  (serial_number,model_id_fk,serial_status)
  VALUES
  (?,?,?)";

  $serialnumber = $_POST['serial_number'];
  $modelid = $_POST['model_id_fk'];
  $status = $_POST['serial_status'];

  if ($status  == "active"){
    $status = 0;
  } else {
    $status = 1;
  }

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("ssi",$serialnumber, $modelid, $status))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
  header("Location:../../views/serials/view_all.php");
?>
