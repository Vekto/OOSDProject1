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
  $link->close();
  $link = agencyConnect();
    //Login is okay, set session variables
    $sql = "SELECT CustFirstName, CustLastName, CustomerId FROM customers WHERE CustUserName = '$username'";
    $result = $link->query($sql);
    $row = $result->fetch_array(MYSQLI_NUM);
    {
      $_SESSION["userfirstname"] = $row[0];
      $_SESSION["userlastname"] = $row[1];
      $_SESSION["userid"] = $row[2];
    }
    $_SESSION["loggedin"] = "TRUE";
    $_SESSION["message"] = "Login Successful, welcome to Travel Experts";
    header("Location: messages.php");
  }
else
{
    $_SESSION["message"] = "Invalid username/password";
    header("Location: login.php" );
}
$link->close();



 ?>
