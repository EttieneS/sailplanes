<?php
  session_start();
  require "../connections/connectDB.php";

  $sql = "INSERT
  INTO
  reports
  (report_title,
  report_by,
  report_model,
  report_created)
  VALUES
  (?,?,?,?)";

  $title = $_POST['report_title'];
  $userid = $_SESSION['user_id'];
  $model = $_POST['report_model'];
  $body = $_POST['report_body'];
  $header = $_POST['header'];
  $date = date('Y-m-d');

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("siis", $title, $userid, $model, $date))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }
  $stmt->close();
  $rid = $conn->insert_id;
  insertReportBody($rid, $body, $conn);
  insertReportNumber($rid, $conn);

  function insertReportNumber($id, $connection){
    $conn = $connection;

    $sql = "UPDATE reports
    SET
    report_number = ?
    WHERE
    report_id = ?";

    $number = "JSR00" .$id;

    if (!($stmt = $conn->prepare($sql))){
      die ("Error connecting: " .$conn->error);
    }
    if(!($stmt->bind_param("si", $number, $id))){
      die ("Error binding params" .$conn->error);
    }
    if (!($stmt->execute())){
      die ("Error executing: " .$conn->error);
    }
    $stmt->close();
  }

  function insertReportBody($reportid, $reportbody, $connection){
    $id = $reportid;
