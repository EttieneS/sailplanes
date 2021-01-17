<?php
  session_start();
  require "../connections/connectDB.php";

  $checksql =
  "SELECT
  user_pass,
  user_email,
  user_salt,
  user_role
  FROM
  users
  WHERE
  user_email = ?";

  $formemail = $_POST['user_email'];
  $formpassword = $_POST['user_pass'];


  $stmt = $conn->prepare($checksql);
  $stmt->bind_param("s", $formemail);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  $stmt->close();
  $conn->close();

  $dbemail = $result[0]['user_email'];
  $dbpassword = $result[0]['user_pass'];
  $dbsalt = $result[0]['user_salt'];
  $dbrole = $result[0]['user_role'];

  $iterations = 1000;
  $formhash = hash_pbkdf2("sha512", $formpassword, $dbsalt, $iterations, 20);

  if($dbemail == "" or $dbpassword == ""){
    $result = -1;
  } else {
      if($dbpassword == $formhash){
        $_SESSION['user_email'] = $formemail;
        $_SESSION['user_role'] = $dbrole;
        $_SESSION['user_pass'] =  $dbpassword;

        $result = 1;
      } else {
        $result = -1;
      }
  }

  if ($result == 1){
      header("Location: ../../user/profile/update_password.php");
  } else {
    echo "<script>
      alert('User name or password invalid');
      window.location.href='../../user/profile/change_password.php';
      </script>";
  }
?>
