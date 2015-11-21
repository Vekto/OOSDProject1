<?php
/*============================================================================*/
//this is run on logout to destroy the session and update session variables   //
/*============================================================================*/
  session_start();
  session_destroy();
  session_start();
  $_SESSION["message"] = "Logout Successful!";
  $_SESSION["loggedin"] = "FALSE";
  $_SESSION["lastpage"] = "index.php";
  header("Location: messages.php");
 ?>
