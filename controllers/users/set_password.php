<?php
  require "../connections/connectDB.php";

  $sql = "UPDATE
  users
  SET
  user_pass = ?,
  user_salt = ?
  WHERE
  user_email = ?";

  $email = "generell";
  $pass = "Bonobo";


  $salt = openssl_random_pseudo_bytes(16);
  $hexsalt = bin2hex($salt);
  $iterations = 1000;

  $hash = hash_pbkdf2("sha512", $pass, $hexsalt, $iterations, 20);

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("sss", $hash, $hexsalt, $email))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->close();
  $conn->close();

  echo $email ." ";
  echo $password ." ";
  echo $hexsalt . " ";
?>
