<?php
/*=============================================================================*/
//Most forms on the site will be sent here. The last element of the request    //
//will contain the information about the users action and be popped off the    //
//array to determine what will happen.                                         //
/*=============================================================================*/
	include("Functions.php");
	include("Customer.php");
	session_start();

	$userAction = array_pop($_REQUEST);

	switch ($userAction){
		case 'delete':
			$id = array_pop($_REQUEST);
			session_destroy();
			session_start();
			//Set session variables for delete success or failure
			if(deleteCustomer($id))
			{
				$_SESSION["message"] = "Delete Successful!";
				$_SESSION["lastpage"] = "index.php";
			} else
			{
				 $_SESSION["message"] = "Delete failed";
				 $_SESSION["message"] = "edit.php";
			}
			$_SESSION['loggedin'] = 'FALSE';
			$_SESSION['message'] = "Account Successfully Deleted!";
			header("Location: messages.php");
			break;

		case 'edit':
			header("Location: edit.php");
			break;
		//submits the users edit to the database and sets new session variables.
		case 'editted':
			$success = updateTable('customers',$_REQUEST,'CustomerId');
			($success) ? $_SESSION["message"] = "Update Successful!" : $_SESSION["message"] = "Update Failed!";
			($success) ? $_SESSION["lastpage"] = "index.php" : $_SESSION["lastpage"] = "edit.php";
			($success) ? $_SESSION["userfirstname"] = $_POST['CustFirstName'] :  $_POST['CustFirstName'];
			($success) ? $_SESSION["userlastname"] = $_POST['CustLastName'] : $_POST['CustLastName'];
			print("<br /><br /><br /><br />");
			print($success);
			header("Location: messages.php");

				break;
		//submits the users account to the database and sets session variables.
		case 'Register':

			$customer = new Customer("null", $_REQUEST["CustFirstName"], $_REQUEST["CustLastName"], $_REQUEST["CustAddress"], $_REQUEST["CustCity"], $_REQUEST["CustProv"], $_REQUEST["CustPostal"], $_REQUEST["CustCountry"],$_REQUEST["CustHomePhone"], $_REQUEST["CustBusPhone"], $_REQUEST["CustEmail"], 0, $_REQUEST["CustUsername"], $_REQUEST["CustPassword"]);
			if ($customer->customerAdd())
			{
				#The user will be redirected to the index page if they've been added to the database.
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
				$_SESSION["message"] = "Registration failed!";
				header("Location: register.php");
			}
			break;

		default:
			header("Location: index.php");
			break;
		}
?>
