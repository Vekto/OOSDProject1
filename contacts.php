<?php

	include("header.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Contacts</title>
	</head>
	<body>

		<div id="main_container">
		
			<h1>Contacts</h1>
			<h6>The contact details for each of our agents below.</h6><br />
			
			<?php
			
				include("Functions.php");
				print(displayContacts());
				include("footer.php");
			
			?>
		
		</div>

	</body>
</html>