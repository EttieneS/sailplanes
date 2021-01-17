<?php
  require '../connections/connectDB.php';
  session_start();

  $id = $_SESSION['user_id'];
  $sql = "SELECT
  r.*,
  rs.*
  FROM
  reports r
  JOIN report_status rs ON rs.report_status_id = r.report_status
  WHERE
  report_by = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result){
    $reports->report_title = "You have no reports";
    echo json_encode($reports);
  } else {
    echo json_encode($result);
  }

  $stmt->close();
  $conn->close();
?>
