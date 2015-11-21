<?php
/*==========================================================================*/
//This file deals with displaying success and failure messages for          //
//registration, login, booking and updating account info.                   //
/*==========================================================================*/

session_start();
include("header.php");
//if a user tries to book a package without logging in, they will be redirected to login.php.
//After a successful login they will be sent to the booking page with the previously selected package.
$lastpage = $_SESSION['lastpage'];
$delay = 1;
if ($_SESSION["lastpage"] == "Booking.php" && !isset($_SESSION["bookingLogin"]))
{
  header("refresh:$delay; url=login.php");
}
  else if ($_SESSION["lastpage"] == "Booking.php" && isset($_SESSION["bookingLogin"]))
{
  header("refresh:$delay; url=Booking.php");
}
  else
{
  header("refresh:$delay; url=$lastpage");
}
?>

<body>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

<h1><?=($_SESSION["message"])?></h1>

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

<?php
unset($_SESSION["message"]);
$_SESSION["message"] = "";
include("footer.php");
?>
