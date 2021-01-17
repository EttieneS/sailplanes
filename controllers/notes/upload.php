<?php
  require "../connections/connectDB.php";

  $target_dir = "files/";
  $target_file = basename($_FILES["fileToUpload"]["name"]);
  $target_path = $target_dir .$target_file;

  $notetitle = $_POST['note_title'];
  $revision = $_POST['note_revision'];
  $date = $_POST['note_date'];
  $description = $_POST['note_description'];

  function insertNote($notetitle, $filename, $noterevision, $notedate, $description, $connection){
    $conn = $connection;
    $title = $notetitle;
    $file = $filename;
    $revision = $noterevision;
    $date = $notedate;
    $text = $description;

    $sql = "INSERT INTO
    notes
    (note_number,
    note_title,
    note_file_name,
    note_revision,
    note_date,
    note_description)
    VALUES
    (?,?,?,?,?,?)";

    if (!($stmt = $conn->prepare($sql))){
      die ("Error connecting: " .$conn->error);
    }
    if(!($stmt->bind_param("ssssss", $number, $title, $file, $revision, $date, $text))){
      die ("Error binding params" .$conn->error);
    }
    if (!($stmt->execute())){
      die ("Error executing: " .$conn->error);
    }
    $id = $stmt->insert_id;
    // generateNumber($id, $conn);
    $stmt->close();
  }


  if(isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_path)) {
        insertNote($notetitle, $target_file, $revision, $date, $description, $conn);
      echo "<script>
        alert('File successfully uploaded');
        window.location.href='../../views/notes/view_all.php';
        </script>";
    } else {
      echo "<script>
          alert('Error saving file');
          window.location.href='../../views/notes/view_all.php';
          </script>";
    }
  }
  $stmt->close();
  $conn->close();

  // function generateNumber($id, $conn){
  //   $number = "JSB000" .$id;
  //
  //   $sql = "UPDATE notes
  //   SET
  //   note_number = ?
  //   WHERE
  //   note_id = ?";
  //
  //   if (!($stmt = $conn->prepare($sql))){
  //     die ("Error connecting: " .$conn->error);
  //   }
  //   if(!($stmt->bind_param("si", $number, $id))){
  //     die ("Error binding params" .$conn->error);
  //   }
  //   if (!($stmt->execute())){
  //     die ("Error executing: " .$conn->error);
  //   }
  //
  // }
?>
