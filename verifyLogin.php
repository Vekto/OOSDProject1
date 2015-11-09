</<?php

//Chad//
include("Functions.php");

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$mysqli= agencyConnect();

$sql = "SELECT `CustPassword`, 'CustUserName' FROM `customers` WHERE `CustUserName` = '$username'";
$result = $mysqli->query($sql);
print_r($result);
  if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($password == $row["CustPassword"])
        {
          print("Password is match");
        }
        else {
            print("Invalid username/password");
        }
    }
  }



 ?>
