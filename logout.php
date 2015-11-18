<?php
  session_start();
  session_destroy();
  session_start();
  $_SESSION["message"] = "Logout Successful!";
  $_SESSION["loggedin"] = "FALSE";
  header("Location: messages.php");
 ?>
