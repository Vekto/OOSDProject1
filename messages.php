<?php
session_start();
include("header.php");



if ($_SESSION["lastpage"] == "Booking.php")
{
  if(isset($_SESSION["bookingLogin"]))
  {
    header("refresh:3; url=Booking.php");
  }
  header("refresh:3; url=login.php");
}
  else
{
  header("refresh:3; url=index.php");
}






 ?>

<body>
<br />
<br />
<br />
<br />

<h1><?=($_SESSION["message"])?></h1>





<?php
unset($_SESSION["message"]);
include("footer.php");
?>
