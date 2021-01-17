<?php
  require '../connections/connectDB.php';

  $checksql =
  "SELECT
  user_pass,
  user_salt
  FROM
  users
  WHERE
  user_email = ?";

  $email = "generell";
  $formpass = "bonobo";

  $stmt = $conn->prepare($checksql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  $dbhash = $result[0]['user_pass'];
  $dbsalt = $result[0]['user_salt'];

  $iterations = 1000;
  $formhash = hash_pbkdf2("sha512", $formpass, $dbsalt, $iterations, 20);

  $stmt->close();
  $conn->close();

  echo "dbhash " .$dbhash ."<br>";
  echo "formhash " .$formhash ."<br>";
?>
