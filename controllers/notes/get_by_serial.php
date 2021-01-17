<?php
  require '../connections/connectDB.php';

  $number = $_POST['serial_id'];

  $sql = "SELECT
  ns.serial_id_fk,
  ns.note_id_fk,
  n.note_id,
  n.note_number,
  n.note_title,
  n.note_file_name
  FROM
  notes_serials as ns
  JOIN
  notes as n ON
  n.note_id = ns.note_id_fk
  WHERE
  ns.serial_id_fk = ?";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }
  $stmt->bind_param("s", $number);
  if(!($stmt->execute())){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }

  $planeArray = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $conn->close();

  $jsonObj = json_encode($planeArray);
  echo $jsonObj;
?>
