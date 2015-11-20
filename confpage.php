


<!DOCTYPE html>

<html>

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

session_start();
include("Functions.php");
$packageId = $_SESSION['packageid'];
$package = getTravelPackages($_SESSION['packageid']);

$basePrice = $package[0]["PkgBasePrice"];
$numTrav = $_REQUEST["numTrav"];
$classMult = $_REQUEST["class"];
$total = $basePrice*$numTrav*$classMult;

print("<h1>Confirm your trip!</h1>");
print($package[0]["PkgName"]."<br />");
print($package[0]["PkgStartDate"]."<br />");
print($package[0]["PkgEndDate"]."<br />");
print("<table> <th>Package Price</th><th>Class</th><th>Number of Travllers</th>
<tr><td>$basePrice.X</td><td>$classMult X</td><td>    $numTrav    =       </td></tr></table>");
print("Total<br />");
print($total);
print("<form action='submitbooking.php'>
      <input type='hidden' name='numTrav' value='$numTrav'/>
      <input type='hidden' name='ClassMult' value='$classMult'/>
      <input type='submit'/>");

?>







	<!--WRITE YOUR CODE ABOVE THIS LINE-->
	</div>



	<?php


	  include("footer.php");
    ?>

</body>
</html>
