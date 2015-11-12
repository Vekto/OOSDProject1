<?php
	
	include("Functions.php");
	include("Customer.php");
	if (!isset($_REQUEST["CustomerId"]))
	{
		print("Use register.php to access this page");
		exit();
		header("Location: register.php");
	}
	
	#New database information from the form is constructed into the newly created customer object.
	$customer = new Customer($_REQUEST["CustomerId"], $_REQUEST["CustFirstName"], $_REQUEST["CustLastName"], $_REQUEST["CustAddress"], $_REQUEST["CustCity"], $_REQUEST["CustProv"], $_REQUEST["CustPostal"], $_REQUEST["CustHomePhone"], $_REQUEST["CustBusPhone"], $_REQUEST["CustEmail"], $_REQUEST["AgentId"], $_REQUEST["CustUsername"], $_REQUEST["CustPassword"]);
	if (addCustomer($customer))
	{
		#The user will be redirected to the index page if they've been added to the database.
		print("Your account has been registered. You will be redirected to the home page.");
		header("Location: index.php");
	}
	else
	{
		#The user will be redirected to the register page if they haven't been added to the database.
		print("Registration failed. Call Tech Support.");
		header("Location: register.php");
	}

?>