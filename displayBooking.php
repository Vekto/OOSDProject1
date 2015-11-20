<?php
	session_start();
	include("header.php");

?>
<style>
#bookings
{
  align:center;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}

</style>

<!DOCTYPE html>
<html>
	<head>
		<title>Contacts</title>
	</head>
	<body>

		<div id="main_container">

			<h1 style="text-align:center;"></h1><br />
			<fieldset>
				<legend align="center">Your Bookings!</legend><br/>
			<?php

				include("Functions.php");
				print(displayBookings($_SESSION['userid']));

			?>

			</fieldset>

		</br></br>

			<?php

				include("footer.php");

			?>

		</div>

	</body>
</html>
