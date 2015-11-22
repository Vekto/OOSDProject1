<!DOCTYPE html>
<?php
if(!isset($_SESSION["loggedin"])) //checks if the user is logged in or not
{
  $_SESSION["loggedin"] = "FALSE";
}
?>
<html>
<head>



<link rel="stylesheet" type="text/css" href="style.css">

<!--To Enable styling of HTML5 elements in all the versions of Internet Explorer prior to version 9-->

<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->
<title>Fixed Header</title>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo" alt="Travel Experts">
				<!--Travel Experts Logo-->
				<a href="index.php"><img border="0" alt="Travel Experts" src="images/logo2.PNG" width="150" height="75"></a>
			</div>

			<!--Navigation menu-->
			<div class="nav">
				<a id="welcomeLink" href="useraccountinfo.php">My Account</a>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="travelPackages.php">Packages</a></li>
					<li id="logIn"><a  href="login.php" >Login</a></li>
					<li id="logOut" style="display:none;"><a  href="logout.php" >Log Out</a></li>
					<li><a href="contacts.php">Contact</a></li>


				</ul>
			</div>
		</div>
	</div>


	<?php
	if ($_SESSION["loggedin"] == "TRUE") //if user is logged- in then print welcome message with user's first name and last name
	{
		print("<script>document.getElementById('welcomeLink').innerHTML = 'Welcome " . $_SESSION['userfirstname'] . " " . $_SESSION['userlastname'] . "'</script>");
		print("<script>document.getElementById('logOut').style.display = 'initial' </script>");
		print("<script>document.getElementById('logIn').style.display = 'none' </script>");

	}
	?>
</body>

</html>
