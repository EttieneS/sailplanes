<?php
  require '../connections/connectDB.php';

  $arr = [];
  $bonobo = $_POST['username'];
  $stmt = $conn->prepare("SELECT user_id, username FROM users WHERE username = ?");
  $stmt->bind_param("s", $bonobo);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  // while($row = $result->fetch_assoc()) {
  //   $arr[] = $row;
  // }
  if(!$result) exit('No rows');
  echo json_encode($result);
  $stmt->close();
  $conn->close();
?>
