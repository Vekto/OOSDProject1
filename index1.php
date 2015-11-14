<?php
session_start();
$_SESSION["lastpage"] = "index.php";
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

 ?>

	<div id="main_container">

		<div class="content">

			<img src="images/banner2.jpg" width="960px" />



			<p>Planning for your next vacation or weekend getaway is easy when you book your next flight with Travel Experts. Whether you're on a budget or ready to splurge on that once-in-a-lifetime luxury experience, we have all the tools you need to create that perfect trip.
			</p>



			<div id="images">

				<div class="article">
					<header>London</header>
					<content>
						<img src="images/london.jpg" width="300px" height="200px" />

					</content>
					<footer><a href="register.html">Book Today!</a></footer>
				</div>

				<div class="article">
					<header>Paris</header>
					<content>
						<img src="images/paris.jpg" width="300px" height="200px" />

					</content>
					<footer><a href="register.html">Book Today!</a></footer>
				</div>

				<div class="article">
					<header>Rome</header>
					<content>
						<img src="images/rome.jpg" width="300px" height="200px"/>

					</content>
					<footer><a href="register.html">Book Today!</a></footer>
				</div>

			</div>



		</div>
		


	</div>
	<?php
  	include("slidepackages.php");

 ?>

	<?php

	  include("footer.php");
    ?>




</body>
</html>
