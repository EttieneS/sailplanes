<?php
  require "../connections/connectDB.php";

  $sql = "UPDATE manuals
  SET
  manual_number = ?,
  manual_title = ?,
  manual_revision = ?,
  manual_date = ?,
  manual_status = ?
  WHERE
  manual_id = ?";

  $number = $_POST['manual_number'];
  $manualtitle = $_POST['manual_title'];
  $manualid = $_POST['manual_id'];
  $revision = $_POST['manual_revision'];
  $date = $_POST['manual_date'];
  $status = $_POST['manual_status'];

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("ssssii", $number, $manualtitle, $revision, $date, $status, $manualid))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
  header("Location:../../views/manuals/view_all.php");
?>
