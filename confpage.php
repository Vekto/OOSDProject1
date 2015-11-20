<?php
session_start()
?>


<!DOCTYPE html>

<html>
<style>
#bookings
{
  align:center;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
<head>

<title>Travel Experts</title>
<link rel="stylesheet" type="text/css" href="style.css">
<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->
</head>

<body>
<?php
  	include("header.php");

 ?>
	<div id="main_container">
	<!--WRITE YOUR CODE BELOW THIS LINE-->


<?php

include("Functions.php");
$packageId = $_SESSION['packageid'];
$package = getTravelPackages($_SESSION['packageid']);

$basePrice = $package[0]["PkgBasePrice"];
$numTrav = $_REQUEST["numTrav"];
$classMult = $_REQUEST["class"];
$total = $basePrice*$numTrav*$classMult;

print("<h1>Confirm your trip!</h1>");
print("<table id='bookings'> <th>Package Name</th><th>Start Date</th><th>End Date</th>
<tr><td>" .$package[0]['PkgName']. "</td><td>" .substr($package[0]['PkgStartDate'],0,7). "</td><td>" . substr($package[0]['PkgEndDate'],0,7) . "</td></tr></table><br />");
/*$package[0]["PkgName"]."<br />")
substr($package[0]["PkgStartDate"],0,7)."<br />")
substr($package[0]["PkgEndDate"],0,7)."<br />");"*/
print("<table id='bookings'> <th>Package Price</th><th>Class</th><th>Number of Travllers</th><th>Total</th>
<tr><td>$basePrice.X</td><td>$classMult X</td><td>    $numTrav  </td><td>  =     $$total  </td></tr></table>");

print("<form action='submitbooking.php'>
      <input type='hidden' name='numTrav' value='$numTrav'/>
      <input type='hidden' name='ClassMult' value='$classMult'/>
      <input id='button' type='submit'/>");

?>







	<!--WRITE YOUR CODE ABOVE THIS LINE-->
	</div>



	<?php


	  include("footer.php");
    ?>

</body>
</html>
