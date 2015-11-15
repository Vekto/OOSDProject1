<!DOCTYPE html>

<html>

<head>

<title>Travel Experts</title>
<link rel="stylesheet" type="text/css" href="style.css">
<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->

  <script type="text/javascript">

  var imagecount = 1;
  var total = 4;

  

  function slideNext()
  {
  	var Image = document.getElementById('imag');
  	imagecount = imagecount + 1;
  	if (imagecount > total) 
  		{
  			imagecount = 1;
  		}									//LOOP THE IMAGE

	if (imagecount < 1) 
		{
			imagecount = total;
		}

		Image.src = "Images/imag" + imagecount + ".jpg";  //this is how images are stored in the Images folder in jpg format 

			
  }

 	function slidePrev()
  {
  	var Image = document.getElementById('imag');
  	imagecount = imagecount - 1;

  	if (imagecount > total) 
  		{
  			imagecount = 1;
  		}

  	if (imagecount < 1) 
		{
			imagecount = total;
		}  										//LOOP THE IMAGE

	
		Image.src = "Images/imag" + imagecount + ".jpg";  //this is how images are stored in the Images folder in jpg format 
			
  }

  setInterval(function slideNext()
  {
  	var Image = document.getElementById('imag');
  	imagecount = imagecount + 1;
  	if (imagecount > total) 
  		{
  			imagecount = 1;
  		}									//LOOP THE IMAGE

	if (imagecount < 1) 
		{
			imagecount = total;
		}

		Image.src = "Images/imag" + imagecount + ".jpg";  //this is how images are stored in the Images folder in jpg format 

			
  }, 5000);

  
  </script>
</head>

<body>
<?php
  	include("header.php");

 ?> 	
	<div id="main_container">
	<!--WRITE YOUR CODE BELOW THIS LINE-->


	<div id="pkgContainer">

		<img src="Images/imag1.jpg" id="imag" />

		<div id= "leftcontainer"> <!--div for left arrow-->
			<img src="Images/leftarrow.png" class="left" onClick="slidePrev()">
		</div>

		<div id= "rightcontainer"><!--div for right arrow-->
			<img src="Images/rightarrow.png" class="right" onClick="slideNext()">		
		</div>


	</div>












	<!--WRITE YOUR CODE ABOVE THIS LINE-->
	</div>

	

	<?php


	  include("footer.php");
    ?>
	




</body>
</html>