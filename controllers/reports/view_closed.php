<?php
  require '../connections/connectDB.php';

  $status = 3;

  $sql = "SELECT
  r.*,
  rs.*,
  u.*,
  m.*
  FROM reports r
  RIGHT JOIN report_status rs ON rs.report_status_id = r.report_status
  RIGHT JOIN users u ON u.user_id = r.report_by
  RIGHT JOIN plane_models m ON m.model_id = r.report_model
  WHERE r.report_status = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $status);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  $stmt->close();
  $conn->close();

  $jsonObj = json_encode($result);
  echo $jsonObj;
?>
