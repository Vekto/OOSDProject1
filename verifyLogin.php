</<?php

//Chad//
include("Functions.php");
SESSION_START();
$username = trim($_REQUEST["username"]);
$password = md5(trim($_REQUEST["password"]));
$link= agencyConnect();

$sql = "SELECT `CustPassword` FROM `customers` WHERE `CustUserName` = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->bind_result($dbpwd);
$stmt->fetch();
print($dbpwd);
if ($dbpwd == $password)
{
    //Login is okay, set session variables
    $_SESSION["loggedin"] = "TRUE";
    print("Worked");
    if($_SESSION['lastpage'] == 'register.php')
    {
      header("Location: index.php");
    }
    else
    {
    header("Location: " . $_SESSION['lastpage']);
    }
}
else
{
  print_r("broke");
    $_SESSION["message"] = "Invalid username/password";
    header("Location: login.php" );
}



 ?>
