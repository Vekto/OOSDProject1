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
	$title = "Register - Travel Experts"
?>

	<!--WRITE YOUR CODE BELOW THIS LINE-->

	<!-- Form meant to authenticate users into the customer's section of the database. Used to finalize purchases on travel packages. -->
	<form action="" method="post">
		<label for="username">Username: </label>
		<input type="text" name="username" value="" />

		<label for="password">Password: </label>
		<input type="password" name="password" value="" />

		<input type="submit" value="Log in" />
	</form>

	<!--WRITE YOUR CODE ABOVE THIS LINE-->



	<?php


	  include("footer.php");
    ?>




</body>
</html>
