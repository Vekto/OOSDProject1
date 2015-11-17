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
  <!--<style type="text/css">
  #expand{
  	display: none;
  }
  #expand2{
  	display: none;
  }
  #expand3{
  	display: none;
  }
  #expand4{
  	display: none;
  }-->


  </style>
  <script type="text/javascript">
var i = 0;
var path = new Array();
 
// LIST OF IMAGES
path[0] = "Images/2.jpg";
path[1] = "Images/3.jpg";
path[2] = "Images/4.jpg";
path[3] = "Images/1.jpg";


function swapImage()
{
   document.slide.src = path[i];

   if(i < path.length - 1) 
   {
    i++; 
   }
   else 
   {
    i = 0;
   }
   setTimeout("swapImage()",3000);
}
</script>

  <!--<script type="text/javascript">

  //slide the packages 

  function show()
  {
  	if (document.getElementById("expand").style.display == "block")
  	 {
  	 	document.getElementById("expand").style.display = "none";
  	 }
  	 else
  	 {
  	 	document.getElementById("expand").style.display = "block";

  	 }

  }

  function show2()
  {
  	if (document.getElementById("expand2").style.display == "block")
  	 {
  	 	document.getElementById("expand2").style.display = "none";
  	 }
  	 else
  	 {
  	 	document.getElementById("expand2").style.display = "block";

  	 }

  }

  function show3()
  {
  	if (document.getElementById("expand3").style.display == "block")
  	 {
  	 	document.getElementById("expand3").style.display = "none";
  	 }
  	 else
  	 {
  	 	document.getElementById("expand3").style.display = "block";

  	 }

  }

  function show4()
  {
  	if (document.getElementById("expand4").style.display == "block")
  	 {
  	 	document.getElementById("expand4").style.display = "none";
  	 }
  	 else
  	 {
  	 	document.getElementById("expand4").style.display = "block";

  	 }

  }


  </script> -->
</head>

<body>
<?php
  	include("header.php");

 ?>

	<div id="main_container">

		<div class="content">

			<!--<img src="images/banner2.jpg" width="960px" />-->



			<h1>Welcome to Travel Experts</h1>

      <div id="container2">  
    <img width="960" height="500" name="slide" src="Images/1.jpg"  />
</div>

			




			


			<!--<div id="images">

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

			</div>-->



		</div>


	</div>

	<?php

	  include("footer.php");
    ?>




</body>
</html>
