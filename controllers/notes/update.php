<?php
  require "../connections/connectDB.php";

  $id = $_POST['note_id'];
  $title = $_POST['note_title'];
  $revision = $_POST['note_revision'];
  $description = $_POST['note_description'];
  $status = $_POST['note_status'];

  if ($status == "active"){
    $status = 1;
  } else {
    $status = 0;
  }

  $sql = "UPDATE notes
  SET
  note_title = ?,
  note_revision = ?,
  note_description = ?,
  note_status = ?
  WHERE
  note_id = ?";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("sssii", $title, $revision, $description, $status, $id))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
  header("Location:../../views/notes/view_all.php");
?>
