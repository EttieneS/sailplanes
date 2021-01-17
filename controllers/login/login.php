<?php
  require '../connections/connectDB.php';
  session_start();

  $formemail = $_POST['user_email'];
  $formpass = $_POST['user_pass'];

  $sql = "SELECT
  user_id,
  user_name,
  user_email,
  user_pass,
  user_salt,
  user_role,
  user_status
  FROM
  users
  WHERE
  user_email = ?";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting: " .$conn->error);
  }
  if(!($stmt->bind_param("s", $formemail))){
    die ("Error binding params" .$conn->error);
  }
  if (!($stmt->execute())){
    die ("Error executing: " .$conn->error);
  }

  $stmt->store_result();
  $stmt->bind_result($userid, $username, $email, $pass, $salt, $role, $status);

  while ($stmt->fetch()){
    $dbuserid = $userid;
    $dbusername = $username;
    $dbemail = $email;
    $dbpass = $pass;
    $dbsalt =  $salt;
    $dbrole = $role;
    $dbstatus = $status;
  }

  lastLogin($dbuserid, $conn);

  $stmt->free_result();

  $iterations = 1000;
  $formhash = hash_pbkdf2("sha512", $formpass, $dbsalt, $iterations, 20);

  if ($formhash == $dbpass){
    if ($status == 1){
      $_SESSION['user_name'] = $dbusername;
      $_SESSION['user_email'] = $dbemail;
      $_SESSION['user_role'] = $dbrole;
      $_SESSION['user_id'] = $dbuserid;
      if ($dbrole == 1){
        header("Location: ../../index.php");
      } else {
        header("Location: ../../user/reports/view_all.php");
  