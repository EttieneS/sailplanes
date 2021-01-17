<?php
  require '../connections/connectDB.php';

  $id = $_POST['bulletin_id'];
  $sql = "SELECT
  *
  FROM
  bulletins
  WHERE
  bulletin_id = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit('No rows');
  echo json_encode($result);

  $stmt->close();
  $conn->close();
?>
