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
	<!--WRITE YOUR CODE BELOW THIS LINE-->

Some text before

<div id=tbl name=tbl style="overflow:hidden;display:none">
<table border=1>
<tr><td>test</td></tr>
<tr><td>test</td></tr>
<tr><td>test</td></tr>
</table>
</div>

some text after

<script language="JavaScript" type="text/javascript">
<!--
function sizeTbl(h) {
  var tbl = document.getElementById('tbl');
  tbl.style.display = h;
}
// -->
</script> 
<br>
<a href="javascript:sizeTbl('none')">Hide</a>
 
<a href="javascript:sizeTbl('block')">Expand</a>




	<!--WRITE YOUR CODE ABOVE THIS LINE-->

	</div>

	

	<?php


	  include("footer.php");
    ?>
	




</body>
</html>