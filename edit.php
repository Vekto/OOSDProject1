<?php
/*============================================================================*/
//provides a method for users to edit their account information.              //
/*============================================================================*/

  session_start();
  $_SESSION["lastpage"] = "edit.php";
  include("header.php");
  //connect to DB and query for the logged in customer
  $mysqli = new mysqli("localhost", "root", "", "travelexperts");
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


      //Print a form populated with the logged in user's account information for them to edit. Submitted to regHandler.php.
			$output = "
      <div id='main_container'>
      <fieldset>
      <legend>Edit Your Account Information</legend>
			<form justify='left' align='center' action='reghandler.php' method='post'>
			<h3>
			First Name: $CustFirstName <br/>
      <input name='CustFirstName' value='$CustFirstName' /><br/>
			Last Name: $CustLastName <br/>
      <input name='CustLastName' value='$CustLastName' /><br/>
			Address: $CustAddress <br/>
      <input name='CustAddress' value='$CustAddress' /><br/>
			City: $CustCity <br/>
      <input name='CustCity' value='$CustCity' /><br/>
			Province: $CustProv <br/>
      <input name='CustProv'value='$CustProv' /><br/>
			Postal Code: $CustPostal <br/>
      <input name='CustPostal' value='$CustPostal' /><br/>
			Country: $CustCountry <br/>
      <input name='CustCountry' value='$CustCountry' /><br/>
			</br>
			PHONE </br>
			Home: $CustHomePhone <br/>
      <input name='CustHomePhone' value='$CustHomePhone' /><br/>
			Business: $CustBusPhone <br/>
      <input name='CustBusPhone' value='$CustBusPhone' /><br/>
			Email: $CustEmail <br/>
      <input name='CustEmail' value='$CustEmail' /><br/>
			<input type='hidden' name='CustId' value='$CustId' />
			<button type='submit' name='userAction' value='editted' onsubmit='return (validator(this) && regExValidator(this));'>Submit Changes</button>
			</h3>
      </fieldset>
			</form>
      </div>";

		}

	}

	else {
		$output =  "Enter Username & Password";
	}
print($output);
//close connection
$mysqli->close();
include("footer.php");
 ?>
