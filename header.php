<!DOCTYPE html>

<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">
<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->
<title>Fixed Header</title>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo">
				<!--<h1><a href="#">Travel Experts</a></h1>-->
				<a href="index.php"><img border="0" alt="Travel Experts" src="images/logo2.PNG" width="150" height="75"></a>
			</div>


			<div class="nav">
				<a id="loginLink" visibility="hidden" href="login.php">Login/Register</a>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li id="logIn"><a  href="login.php" >Login/Register</a></li>
					<li id="logOut" style="display:none;"><a  href="logout.php" >Log Out</a></li>
					<li><a href="contact.php">Contact</a></li>


				</ul>
			</div>
		</div>
	</div>
	

	<?php
	if (isset($_SESSION["loggedin"]))
	{
		print("<script>document.getElementById('loginLink').innerHTML = 'Welcome " . $_SESSION['userfirstname'] . " " . $_SESSION['userlastname'] . "'</script>");
		print("<script>document.getElementById('loginLink').style.visibility = 'visible' </script>");
		print("<script>document.getElementById('logOut').style.display = 'initial' </script>");
		print("<script>document.getElementById('logIn').style.display = 'none' </script>");

	}
	?>
</body>

</html>
