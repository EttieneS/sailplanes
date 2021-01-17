<?php
  require '../connections/connectDB.php';

  $id = $_POST['user_id'];

  $sql = "SELECT
  *
  FROM
  users
  WHERE
  user_id = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit('No rows');
  echo json_encode($result);

  $stmt->close();
  $conn->close();
?>
