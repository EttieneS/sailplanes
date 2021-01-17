<?php
  require "../connections/connectDB.php";

  $filename = $_POST['bulletin_file_name'];
  $filepath = "./files/" .$filename;

  $sql = "DELETE FROM
  bulletins
  WHERE
  bulletin_file_name = ?";

  unlink($filepath) or die ("Couldn't delete file");

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("s", $filename))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
?>
