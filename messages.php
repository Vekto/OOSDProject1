<?php
session_start();
include("header.php");

$lastpage = $_SESSION['lastpage'];


if ($_SESSION["lastpage"] == "Booking.php" && !isset($_SESSION["bookingLogin"]))
{
  header("refresh:3; url=login.php");
}
  else if ($_SESSION["lastpage"] == "Booking.php" && isset($_SESSION["bookingLogin"]))
{
  header("refresh:3; url=Booking.php");
}
  else
{

  header("refresh:3; url=$lastpage");
}






 ?>

<body>
<br />
<br />
<br />
<br />

<h1><?=($_SESSION["message"])?></h1>


<br />

<?php
unset($_SESSION["message"]);
$_SESSION["message"] = "";
include("footer.php");
?>
