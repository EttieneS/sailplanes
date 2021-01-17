<?php
  require "../connections/connectDB.php";

  $sql = "UPDATE reports
  SET
  report_number = ?,
  report_title = ?,
  report_by = ?,
  report_model = ?,
  report_status = ?,
  report_created = ?
  WHERE
  report_id = ?";

  $id = $_POST['report_id'];
  $title = $_POST['report_title'];
  $model = $_POST["report_model"];
  $body = $_POST['report_body'];


  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("ssii", $title, $name, $model, $id))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }
  $stmt->close();
  updateReportText($body, $id, $conn);
  insertSystemTime($id, $conn);

  function insertSystemTime($id, $connection){
    $conn = $connection;

    $sql = "UPDATE reports
    SET
    report_updated = ?
    WHERE
    report_id = ?";

    $date = date('Y-m-d H:i:s');

    if (!($stmt = $conn->prepare($sql))){
      die ("Error connecting: " .$conn->error);
    }
    if(!($stmt->bind_param("si", $date, $id))){
      die ("Error binding params" .$conn->error);
    }
    if (!($stmt->execute())){
      die ("Error executing: " .$conn->error);
    }
    $stmt->close();
  }

  function updateReportText($text, $id, $connection){
    $body = $text;
    $rid = $id;
    $conn = $connection;

    $sql = "UPDATE reports_text
    SET
    report_text_content = ?
    WHERE
    report_id_fk = ?";

    if (!($stmt = $conn->prepare($sql))){
      die ("Error connecting: " .$conn->error);
    }
    if(!($stmt->bind_param("si", $body, $rid))){
      die ("Error binding params" .$conn->error);
    }
    if (!($stmt->execute())){
      die ("Error executing: " .$conn->error);
    }
    $stmt->close();
  }
  $conn->close();
  header("Location:../../views/reports/edit.php");
?>
