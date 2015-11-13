<?php
$output = NULL;

if (isset($_POST['submit'])) 

{
	$mysqli = new mysqli("localhost", "root", "", "travelexperts"); 

	$user = $mysqli->real_escape_string($_POST['user']); 
	$pass = $mysqli->real_escape_string($_POST['pass']); 


	$result = $mysqli->query("SELECT * FROM customers WHERE CustUserName ='$user' AND CustPassword = '$pass'");


	if ($result->num_rows > 0)
	{
		while ($rows = $result->fetch_assoc()) 
		{
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
			</h3>";

		}

	}

	else {
		$output =  "Enter Username & Password";
	}



}

?>
<form method="post">
	<fieldset>
		<legend>User Login</legend>

<input type="text" name="user" /> <br/><br/>
<input type="password" name="pass" /><br/><br/>

<input type="submit" name="submit" value="LogIn">

	</fieldset>


</form>

<?php
echo $output;
99?>