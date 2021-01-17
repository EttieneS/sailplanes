<?php
  session_start();

  if(empty($_SESSION["user_email"])){
    echo "<script>
      alert('You are not logged in');
      window.location.href='../../user/profile/login.php';
    </script>";
  }

  if($_SESSION['user_role'] != "1"){
    echo "<script>
      alert('You are not authorised to view this file');
      window.location.href='../../user/profile/login.php';
    </script>";
  }
?>
