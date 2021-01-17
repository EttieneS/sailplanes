<?php
  require '../connections/connectDB.php';

  $arr = [];
  $serialid = $_POST['model_id'];

  $stmt = $conn->prepare("SELECT * FROM plane_serials WHERE model_id_fk = ?");
  $stmt->bind_param("i", $serialid);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit('No rows');

  $stmt->close();
  $conn->close();
  echo json_encode($result);
?>
