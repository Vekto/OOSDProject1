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
		
			<h1 style="text-align:center;"></h1><br />
			
			<?php
			
				include("Functions.php");
<<<<<<< HEAD
				print(displayContacts());
=======
			
			?>
			
			<form action="agentdisplay.php">
				<fieldset style="padding-left:40%;">
						<legend>Agent Contact Details</legend><br/>

				<?= getAgentSelect(); ?> &nbsp;
				<input type="submit" value="View Details"></input><br /><br/>
				</fieldset>
			
			</form>

		</br></br>
			
			<?php
			
>>>>>>> origin/master
				include("footer.php");
			
			?>
		
		</div>

	</body>
</html>