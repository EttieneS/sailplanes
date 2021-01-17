<?php
  require '../connections/connectDB.php';

  $arr = [];
  $title ="%{$_POST['bulletin_title']}%";

  $test ="SELECT
  *
  FROM
  bulletins";

  $sql = "SELECT
  b.*,
  bt.*
  FROM
  bulletins b
  JOIN bulletin_type bt ON bt.bulletin_type_id = b.bulletin_type
  WHERE
  bulletin_title LIKE ?";

  $stmt = $conn->prepare($test);
  //$stmt->bind_param("s", $title);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  if(!$result) exit('No rows');

  $stmt->close();
  $conn->close();
  echo json_encode($result);
?>
