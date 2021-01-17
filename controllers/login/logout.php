<?php
  session_start();
  $_SESSION = array();

  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
  }
  session_destroy();
  echo "<script>
        alert('Successfully Logged out, Goodbye!');
        window.location.href='../../user/profile/login.php';
        </script>";
?>
