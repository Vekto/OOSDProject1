<?php
	include("Functions.php");
	include("Customer.php");
	session_start();

	//Last input of post (button press) determines action
	$userAction = array_pop($_REQUEST);

	switch ($userAction){
		case 'delete':
			$id = array_pop($_REQUEST);
			deleteCustomer($id);
			session_destroy();
			session_start();
			$_SESSION['loggedin'] = 'FALSE';
			$_SESSION['message'] = "Account Successfully Deleted!";
			header("Location: messages.php");
			break;

		case 'edit':
			$id = array_pop($_REQUEST);
			header("Location: edit.php");
			break;
		case 'editted':
			print_r($_REQUEST);
			$success = updateTable('customers',$_REQUEST,'CustomerId');
			($success) ? $_SESSION["message"] = "Update Successful!" : $_SESSION["message"] = "Update Failed!";
			header("Location: messages.php");
				break;
		case 'register':
			$customer = new Customer("null", $_REQUEST["CustFirstName"], $_REQUEST["CustLastName"], $_REQUEST["CustAddress"], $_REQUEST["CustCity"], $_REQUEST["CustProv"], $_REQUEST["CustPostal"], $_REQUEST["CustCountry"],$_REQUEST["CustHomePhone"], $_REQUEST["CustBusPhone"], $_REQUEST["CustEmail"], 0, $_REQUEST["CustUsername"], $_REQUEST["CustPassword"]);
			if ($customer->customerAdd())
			{
				#The user will be redirected to the index page if they've been added to the database.
				//print("Your account has been registered. You will be redirected to the home page.");

				$_SESSION["loggedin"] = "TRUE";
				$_SESSION["userfirstname"] = $customer->getFirstName();
				$_SESSION["userlastname"] = $customer->getLastName();
				$_SESSION["userid"] = getCustomerId($customer->getUsername());
				$_SESSION["message"] = "Account Successfully Created!";
				header("Location: messages.php");
			}
			else
			{
				#The user will be redirected to the register page if they haven't been added to the database.
				print("Registration failed. Call Tech Support.");
				header("Location: register.php");
			}
			break;

		default:
			header("Location: index.php");
			break;
		}
?>
