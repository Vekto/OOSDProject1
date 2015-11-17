<!DOCTYPE html>

<html>

<head>

	<title>Image Rotator</title>

<script type="text/javascript">
var i = 0;
var path = new Array();

// LIST OF IMAGES
path[0] = "Images/1.jpg";
path[1] = "Images/2.jpg";
path[2] = "Images/3.jpg";

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

</head>

<body onLoad="swapImage()">
<div id="pkgContainer">	
   
		<img width="800" height="400" name="slide" src="1.jpg"  />

      

      
</div>

</body>

</html>
