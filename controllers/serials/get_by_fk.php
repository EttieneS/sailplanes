<?php
  require '../connections/connectDB.php';

  $fk = $_POST['model_id'];

  $sql = "SELECT
  *
  FROM
  plane_serials
  WHERE
  model_id_fk = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $fk);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit($fk);

  $stmt->close();
  $conn->close();
  echo json_encode($result);

?>
