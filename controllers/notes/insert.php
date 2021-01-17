<?php
  require "../connections/connectDB.php";

  $sql = "INSERT
  INTO
  notes
  (note_number,
  note_heading)
  VALUES
  (?, ?)";

  $heading = $_POST['note_heading'];
  $number = $_POST['note_number'];

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("ss", $number, $heading))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }
  $id = $stmt->insert_id;
  generateNumber($id, $conn);

  $stmt->close();
  $conn->close();


  function generateNumber($id, $conn){
    $number = "JSB000" .$id;

    $sql = "UPDATE notes
    SET
    note_number = ?,
    WHERE
    note_id = ?";

    if (!($stmt = $conn->prepare($sql))){
      die ("Error connecting: " .$conn->error);
    }
    if(!($stmt->bind_param("si", $number, $id))){
      die ("Error binding params" .$conn->error);
    }
    if (!($stmt->execute())){
      die ("Error executing: " .$conn->error);
    }
    $stmt->close();
  }
  header("Location:../../views/notes/view_all.php");
?>
