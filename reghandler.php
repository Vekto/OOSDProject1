<?php
	include("Functions.php");
	include("Customer.php");
	/*if (!isset($_REQUEST["CustomerId"]))
	{
		print("Use register.php to access this page");
		exit();
		header("Location: register.php");
	}*/

	#New database information from the form is constructed into the newly created customer object.
	$customer = new Customer("null", $_REQUEST["CustFirstName"], $_REQUEST["CustLastName"], $_REQUEST["CustAddress"], $_REQUEST["CustCity"], $_REQUEST["CustProv"], $_REQUEST["CustPostal"], $_REQUEST["CustCountry"],$_REQUEST["CustHomePhone"], $_REQUEST["CustBusPhone"], $_REQUEST["CustEmail"], 0, $_REQUEST["CustUsername"], $_REQUEST["CustPassword"]);
	print_r($customer);
	if ($customer->customerAdd())
	{
		#The user will be redirected to the index page if they've been added to the database.
		//print("Your account has been registered. You will be redirected to the home page.");
		$_SESSION["loggedin"] = "true";
		header("Location: index.php");
	}
	else
	{
		#The user will be redirected to the register page if they haven't been added to the database.
		print("Registration failed. Call Tech Support.");
		header("Location: register.php");
	}
?>
