<?php

	include("Functions.php");
	if (!isset($_REQUEST["AgentId"])) 
	{
		print("Use contacts.php to access this page");
		exit();
	}
	
	if (getAgentSelect($_REQUEST["AgentId"]))
	{
		#Print contact information based on the selected agent.
		$contact = "Name: " . AgtFirstName . " " . AgtLastName . "<br />Business Phone: " . AgtBusPhone . "<br />Email: " . AgtEmail . "<br />Position: " . AgtPosition . "<br />";
		return $contact;
	}
	else
	{
		#Print an statically generated error based from the string variable.
		$contact = "Agent contact display has failed. Please call Tech Support.";
		return $contact;
	}
	
?>