<?php
session_start();
if (isset($_SESSION["loggedin"]))
{
  header("Location: index.php");
}
?>

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
	$title = "Register - Travel Experts";
?>
<div id="main_container">

	<!--WRITE YOUR CODE BELOW THIS LINE-->

	<!-- Form meant to authenticate users into the customer's section of the database. Used to finalize purchases on travel packages. -->

	<form action="verifyLogin.php" id="custLogin" method="post">
		<fieldset>
			<legend>User Login</legend>
		<label for="username">Username: </label> 
		<input type="text" name="username" value="" /></br></br>

		<label for="password">Password: </label>
		<input type="password" name="password" value="" /></br></br>

		<input type="submit" value="Log in" />

 </fieldset>
      New User? <a href="register.php">Register Here</a>
	</form>
    <?php //chad//
      if (isset($_SESSION["message"]))
      {
        print("<div style='color:red'>" . $_SESSION["message"] . "</div>");
        unset($_SESSION["message"]);
      } ?>
     

</div>

	<!--WRITE YOUR CODE ABOVE THIS LINE-->
	<?php
	  include("footer.php");
    ?>




</body>
</html>
