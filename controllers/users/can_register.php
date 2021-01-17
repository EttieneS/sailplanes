<?php
  require '../connections/connectDB.php';

  $email = $_POST['email'];
  //$email = "generell";

  $sql = "SELECT
  user_email
  FROM
  users
  WHERE
  user_email = ?";

  if (!($stmt = $conn->prepare($sql))){
    die ("Error connecting to db(" .$conn->errorno .")" .$conn->error);
  }
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if (empty($result)){
    $result[] = array(
      "user_email" => -1
    );
  }


  echo json_encode($result);


  $stmt->close();
  $conn->close();
?>
