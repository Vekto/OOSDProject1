<?php
	session_start();
	include("header.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Contacts</title>
	</head>
	<body>

		<div id="main_container">

			<h1 style="text-align:center;"></h1><br />
			<fieldset style="padding-left:40%;">
				<legend>Agent Contact Details</legend><br/>
			<?php

				include("Functions.php");
				print(displayContacts());

			?>

			</fieldset>

		</br></br>

			<?php

				include("footer.php");

			?>

		</div>

	</body>
</html>
