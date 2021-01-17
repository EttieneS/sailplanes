<?php

session_start();

session_unset("user_email");
session_destroy();

header("Location: /controllers/login/login.php");
?>
