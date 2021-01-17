<?php
  require "../connections/connectDB.php";

  $id = $_POST["note_id"];
  $filename = $_POST['note_file_name'];
  $filepath = "./files/" .$filename;

  $sql = "DELETE FROM
  notes
  WHERE
  note_id = ?";

  unlink($filepath);

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

  function deleteNoteSerials($noteid, $conn){
    $id = $noteid;

    $sql = "DELETE FROM
    notes_serials
    WHERE
    note_id_fk = ?";

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
  }

  deleteNoteSerials($id, $conn);
  $conn->close();
?>
