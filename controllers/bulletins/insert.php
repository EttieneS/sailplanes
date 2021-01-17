<?php
  require "../connections/connectDB.php";

  function generateNumber($id, $conn){
    $sql = "UPDATE bulletins
    SET
    bulletin_number = ?
    WHERE
    bulletin_id = ?";


    if (!($stmt = $conn->prepare($sql))){
      die ("Error connecting: " .$conn->error);
    }
    if(!($stmt->bind_param("si", $number, $id,))){
      die ("Error binding params" .$conn->error);
    }
    if (!($stmt->execute())){
      die ("Error executing: " .$conn->error);
    }
  }

  $sql = "INSERT
  INTO
  bulletins
  (bulletin_number, bulletin_heading)
  VALUES
  (?,?)";

  $bulletinheading = $_POST['bulletin_heading'];

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("ss", $bulletinnumber, $bulletinheading))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $id = $stmt->insert_id;
  $bulletinnumber = generateNumber($id, $conn);

  $stmt->close();
  $conn->close();
  header("Location:../../views/bulletins/view_all.php");
?>
