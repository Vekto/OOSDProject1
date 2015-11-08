</<?php
include("Functions.php");

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$mysqli= agencyConnect();
print_r($mysqli);

$sql = "SELECT `CustPassword`, 'CustUserName' FROM `customers` WHERE `CustUserName` = $username";
print_r($sql);
$result = $mysqli->query($sql);


 ?>
