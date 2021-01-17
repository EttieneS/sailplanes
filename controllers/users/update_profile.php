<?php
  session_start();
  require "../connections/connectDB.php";

  $sql = "UPDATE
  users
  SET
  user_name = ?,
  user_lastname = ?,
  user_phone = ?
  WHERE
  user_email = ?";

  $email = $_SESSION['user_email'];
  $name = $_POST['user_name'];
  $last = $_POST['user_lastname'];
  $phone = $_POST['user_phone'];

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("ssss", $name, $last, $phone, $email))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }


  $stmt->close();
  $conn->close();
  header("Location: ../../user/profile/profile.php");
?>
