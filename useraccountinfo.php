<?php
SESSION_START();
$output = NULL;

if (!isset($_SESSION["loggedin"]))
{
	$_SESSION["lastpage"] = "useraccountinfo.php";
	header("Location: login.php");
}
{
	$mysqli = new mysqli("localhost", "root", "", "travelexperts");

	/*$user = $mysqli->real_escape_string($_POST['user']);
	$pass = $mysqli->real_escape_string($_POST['pass']); */


	//$result = $mysqli->query("SELECT * FROM customers WHERE CustUserName ='$user' AND CustPassword = '$pass'");
	$result = $mysqli->query("SELECT * FROM customers WHERE CustomerId = $_SESSION[userid]");


	if ($result->num_rows > 0)
	{
		while ($rows = $result->fetch_assoc())
		{
			$CustId = $rows['CustomerId'];
			$CustFirstName = $rows['CustFirstName'];
			$CustLastName = $rows['CustLastName'];
			$CustAddress = $rows['CustAddress'];
			$CustCity = $rows['CustCity'];
			$CustProv = $rows['CustProv'];
			$CustPostal = $rows['CustPostal'];
			$CustCountry = $rows['CustCountry'];
			$CustHomePhone = $rows['CustHomePhone'];
			$CustBusPhone = $rows['CustBusPhone'];
			$CustEmail = $rows['CustEmail'];



			$output = "<h1>Your Account Information</h1>
			<form action='reghandler.php' method='post'>
			<h3>
			First Name: $CustFirstName <br/>
			Last Name: $CustLastName <br/>
			Address: $CustAddress <br/>
			City: $CustCity <br/>
			Province: $CustProv <br/>
			Postal Code: $CustPostal <br/>
			Country: $CustCountry <br/>
			</br>
			PHONE </br>
			Home: $CustHomePhone <br/>
			Business: $CustBusPhone <br/>
			Email: $CustEmail <br/>
			<input type='hidden' name='CustId' value='$CustId' />
			<button type='submit' name='userAction' value='edit'>Edit account info</button>
			<button type='submit' name='userAction' value='delete'>Delete account</button>
			</h3>
			</form>";

		}

	}

	else {
		$output =  "Enter Username & Password";
	}



}


echo $output;
99?>
