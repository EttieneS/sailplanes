<?php
  session_start();

  if(isset($_SESSION["user_email"])){
  } else {
    header("Location: ../user/profile/login.php");
  }
?>
