<!DOCTYPE html>

<html>

<head>

	<title>Image Rotator</title>

<script type="text/javascript">
var i = 0;
var path = new Array();
 
// LIST OF IMAGES
path[0] = "1.png";
path[1] = "2.png";
path[2] = "3.png";

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
<div id="container">	
		<img width="800" height="400" name="slide" src="1.png"  />
</div>

</body>

</html>