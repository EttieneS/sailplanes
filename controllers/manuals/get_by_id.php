<?php
  require '../connections/connectDB.php';

  $manualid = $_POST['manual_id'];

  $sql = "SELECT
   *
   FROM
   manuals
   WHERE
   manual_id = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $manualid);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit('No rows');
  echo json_encode($result);
  $stmt->close();
  $conn->close();
?>
