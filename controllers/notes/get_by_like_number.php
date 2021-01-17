<?php
  require '../connections/connectDB.php';

  $arr = [];
  $number ="%{$_POST['note_number']}%";

  $sql = "SELECT
  note_id,
  note_number
  FROM
  notes
  WHERE
  note_number 
  LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $number);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit('No rows');

  $stmt->close();
  $conn->close();
  echo json_encode($result);
?>
