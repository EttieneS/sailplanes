<?php
<?php
  require "../connections/connectDB.php";

  $number = $_POST["note_number"];
  $filename = $_POST["note_file_name"];
  $filepath = "./files/" .$filename;

  function deleteNote($connection, $notenumber, $filepath){
    $number = $notenumber;
    $path = $filepath;
    $conn = $connection;

    $sql = "DELETE FROM
    notes
    WHERE
    note_number = ?";

    unlink($path);

    if (!($stmt = $conn->prepare($sql))){
      die ("Error connecting: " .$conn->error);
    }
    if(!($stmt->bind_param("s", $number))){
      die ("Error binding params" .$conn->error);
    }
    if (!($stmt->execute())){
      die ("Error executing: " .$conn->error);
    }
    $stmt->close();
  }

  function deleteBulletinsSerials($connection, $note_number){
    $conn = $connection;
    $number = $note_number;

    $sql = "DELETE FROM
    notes_serials
    WHERE
    note_number = ?";

    if (!($stmt = $conn->prepare($sql))){
      die ("Error connecting: " .$conn->error);
    }
    if(!($stmt->bind_param("s", $number))){
      die ("Error binding params" .$conn->error);
    }
    if (!($stmt->execute())){
      die ("Error executing: " .$conn->error);
    }
    $stmt->close();
  }

  deleteNote($conn, $number, $filepath);
  deleteBulletinsSerials($conn, $number);
  $conn->close();

  echo "Technical note successfully deleted";
?>

?>
