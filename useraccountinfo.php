<?php
session_start();
include("Functions.php");
$_SESSION['lastpage'] = "Booking.php";
$userId = $_SESSION["userid"];
?>

<!DOCTYPE html>

<html>

<head>

<title>Travel Experts</title>
<link rel="stylesheet" type="text/css" href="style.css">
<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->
</head>

<body>
<?php
  	include("header.php");

 ?>
	<div id="main_container">
	<!--WRITE YOUR CODE BELOW THIS LINE-->


<?php
$output = NULL;

if ($_SESSION["loggedin"] == "FALSE")
{
	$_SESSION["lastpage"] = "useraccountinfo.php";
	header("Location: login.php");
}

{
	//connect to mysql
	$mysqli = new mysqli("localhost", "root", "", "travelexperts");

	/*$user = $mysqli->real_escape_string($_POST['user']);
	$pass = $mysqli->real_escape_string($_POST['pass']); */


	//$result = $mysqli->query("SELECT * FROM customers WHERE CustUserName ='$user' AND CustPassword = '$pass'");

	//select quesry to fetch data
	$result = $mysqli->query("SELECT * FROM customers WHERE CustomerId = $_SESSION[userid]");
		$mysqli->close();

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



			$output = "<table><th><h1>Your Account Information</h1></th>
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
			Email: $CustEmail <br/></table>
			<input type='hidden' name='CustId' value='$CustId' /> </br>
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
?>
<?php
//insert into db

	/*$card = $mysqli->real_escape_string($_POST['CCName']);
	$num = $mysqli->real_escape_string($_POST['CCNumber']);
	$exp = $mysqli->real_escape_string($_POST['CCExpiry']);*/

	function execute($userId)
	{
		if (isset($_POST['year']))
		{	
			$mysqli = agencyConnect();
			$datec = "20".($_POST['year'])."-".($_POST['month'])."-"."00 00:00:00";
			$credit = "INSERT INTO creditcards (CCName, CCNumber, CCExpiry, CustomerId) VALUES ('$_POST[cardType]', '$_POST[cardNumber]', '$datec', '$userId')";

			$insert = $mysqli->query($credit);
			$mysqli->close();
			return($insert);
		}
	}
//$datec = "20".($_POST['year']).($_POST['month'])."-"."00 00:00:00";
if (isset($_POST['year']))
{
	if (execute($userId))
	{
		echo "<h1>Card successfully added</h1></br>"; 
	}
	else
	{
		print("Error: {$mysqli->errno} : {$mysqli->error}");
	} 

}



?>
	<!--PAYMENT FORM-->
	<form id="creditform" action="useraccountinfo.php" method="post">
		<fieldset>

		<legend>Secure Payment</legend> </br>
		<img src="Images/checkout.png" width="150px" height="40px"/></br></br>

		<label>Payment Type:</label> 
		<select name="cardType">

			<option>Select Payment Type</option>
			<option value="AMEX">AMEX</option>
			<option value="MASTERCARD">MASTERCARD</option>
			<option value="VISA">VISA</option>
			<option value="DINERS">DINERS</option>
		</select><br/><br/>


		<label>Card Number:</label>
		<input type="text" name="cardNumber" id="CCNumber" /> </br> </br>

		<label>Expiry Date:</label>

		<label>Year</label>
		<input type="text" name="year" id="year" /> </br> </br>
		<label>Month</label>
		<input type="text" name="month" id="month" /> </br> </br>

		<!--<select name="year">

			<<option>Select Year</option>
			<option value="15">15</option>
			<option value="2">16</option>
			<option value="3">17</option>
			<option value="4">18</option>
		</select>

		<select name="month">

			<!--<option>Select Month</option>
			<option value="j">JAN</option>
			<option value="f">FEB</option>
			<option value="m">MAR</option>
			<option value="a">APR</option>
			<option value="ma">MAY</option>
			<option value="ju">JUNE</option>
			<option value="jl">JULY</option>
			<option value="au">AUG</option>
			<option value="s">SEPT</option>
			<option value="o">OCT</option>
			<option value="n">NOV</option>
			<option value="d">DEC</option>
		</select>-->




		</br></br>
		
		<input type="submit" value="Submit" /></br>


		</fieldset>
	</form>

	<!--WRITE YOUR CODE ABOVE THIS LINE-->
	</div>



	<?php


	  include("footer.php");
    ?>





</body>
</html>
