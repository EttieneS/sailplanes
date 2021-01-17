<?php
  require '../connections/connectDB.php';

  $arr = [];
  $id = $_POST['model_id'];

  $stmt = $conn->prepare("SELECT * FROM plane_models WHERE model_id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit('No rows');

  $stmt->close();
  $conn->close();
  echo json_encode($result);
?>
