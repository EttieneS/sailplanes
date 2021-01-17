<?php
  require "../connections/connectDB.php";

  $sql = "INSERT
  INTO
  users
  (user_name,
  user_lastname,
  user_phone,
  user_email,
  user_pass,
  user_salt,
  user_role,
  user_date)
  VALUES
  (?,?,?,?,?,?,?,?)";

  $name = $_POST['user_name'];
  $lastname = $_POST['user_lastname'];
  $phone = $_POST['user_phone'];
  $email = $_POST['user_email'];
  $pass = $_POST['user_pass'];
  $userrole = $_POST['user_role'];
  $date = date('Y-m-d');

  $salt = openssl_random_pseudo_bytes(16);
  $hexsalt = bin2hex($salt);
  $iterations = 1000;

  $hash = hash_pbkdf2("sha512", $pass, $hexsalt, $iterations, 20);

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("ssssssis", $name, $lastname, $phone, $email, $hash, $hexsalt, $userrole, $date))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();
  header("Location:../../views/users/view_all.php");

?>
