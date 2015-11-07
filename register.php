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
	
	<!-- Form meant for user input to add entry into customer table in the database. -->
	<form action="" method="post">
		
		<label for="CustFirstName">First Name: </label>
		<input type="text" name="CustFirstName" value="" /><br />
		
		<label for="CustLastName">Last Name: </label>
		<input type="text" name="CustLastName" value="" /><br />
		
		<label for="CustAddress">Address: </label>
		<input type="text" name="CustAddress" value="" /><br />
		
		<label for="CustCity">City: </label>
		<input type="text" name="CustCity" value="" /><br />
		
		<label for="CustProv">Province/State: </label>
		<input type="text" name="CustProv" value="" /><br />
		
		<label for="CustPostal">Postal Code: </label>
		<input type="text" name="CustPostal" value="" /><br />
		
		<label for="CustCountry">Country: </label>
		<select name="CustCountry">
			<option>Select a Country</option>
			<option value="ca">Canada</option>
			<option value="us">United States</option>
			<option value="mx">Mexico</option>
			<option value="uk">United Kingdom</option>
		</select><br />
		
		<label for="CustHomePhone">Home Phone: </label>
		<input type="text" name="CustHomePhone" value="" /><br />
		
		<label for="CustBusPhone">Business Phone: </label>
		<input type="text" name="CustBusPhone" value="" /><br />
		
		<label for="username">Username: </label>
		<input type="text" name="username" value="" /><br />
		
		<label for="password">Password: </label>
		<input type="password" name="password" value="" /><br />
		
		<input type="submit" value="Register" />
	</form>

	<!--WRITE YOUR CODE ABOVE THIS LINE-->

	

	<?php


	  include("footer.php");
    ?>




</body>
</html>