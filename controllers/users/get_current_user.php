<?php
  require '../connections/connectDB.php';
  session_start();

  $email = $_SESSION['user_email'];
  $sql = "SELECT
  *
  FROM
  users
  WHERE
  user_email = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit('No rows');

  echo json_encode($result);

  $stmt->close();
  $conn->close();
?>
