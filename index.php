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
  
  <!--IMAGE ROTATOR-->

  <script type="text/javascript">
var i = 0;
var path = new Array();

// LIST OF IMAGES
path[0] = "Images/1.jpg";
path[1] = "Images/2.jpg";
path[2] = "Images/3.jpg";
path[3] = "Images/4.jpg";


function swapImage() 
{
   document.slide.src = path[i]; //The rotator will display first slide with name=slide and further check the condition if the next slide is  

   if(i < path.length - 1)
   {
    i++;
   }
   else
   {
    i = 0;
   }
   setTimeout("swapImage()",3000); //swap image after every 3 seconds
}
</script>
 
  	
</head>

<body onLoad="swapImage()"> <!--The rotator will load when the page loads in the browser-->
<?php
  	include("header.php");

 ?>

	<div id="main_container">

		<div class="content">

			<h1>Welcome to Travel Experts</h1>

      <div id="pkgContainer"> 
   
    <img width="900" height="450" name="slide" src="Images/1.jpg"  />
           
</div>

		</div>


	</div>

	<?php

	  include("footer.php");
    ?>




</body>
</html>
