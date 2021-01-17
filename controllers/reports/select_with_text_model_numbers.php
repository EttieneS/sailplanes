<?php
  require '../connections/connectDB.php';

  $id = $_POST['report_id'];

  $sql = "SELECT
  r.*,
  rt.*,
  pm.*,
  rs.*,
  u.*
  FROM
  reports as r
  LEFT JOIN reports_text rt ON r.report_id = rt.report_id_fk
  LEFT JOIN plane_models pm ON pm.model_id = r.report_model
  LEFT JOIN users u ON u.user_id = r.report_by
  LEFT JOIN report_status rs ON rs.report_status_id = r.report_status
  WHERE
  r.report_id = ?";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }
  $stmt->bind_param("i", $id);
  if(!($stmt->execute())){
    die ("Error executing query: (" .$conn->connect_errno .")" .$conn->error);
  }

  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $conn->close();

  $jsonObj = json_encode($result);
  echo $jsonObj;
?>
