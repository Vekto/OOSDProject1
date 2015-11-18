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
  session_destroy();
  session_start();
  $_SESSION["message"] = "Logout Successful!";
  $_SESSION["loggedin"] = "FALSE";
  header("Location: messages.php");
 ?>









	<!--WRITE YOUR CODE ABOVE THIS LINE-->
	</div>

	

	<?php


	  include("footer.php");
    ?>
	




</body>
</html>