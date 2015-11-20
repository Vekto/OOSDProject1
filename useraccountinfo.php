<?php
session_start();
include("Functions.php");
$_SESSION['lastpage'] = "Booking.php";
$userId = $_SESSION["userid"];
?>

<!DOCTYPE html>

<html>

<head>
  <style>
  #button
  {
  padding: 10px;
background-color: #fff;
border: 1px solid #666;
color: #000;
text-decoration: none;
border-radius: 10px;
box-shadow: 1px 1px 4px black;
font-family: georgia;
}
  </style>

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



			$output = "<h1>Your Account Information</h1>
			<form action='reghandler.php' method='post'>
			<h3>
			<table><tr>First Name:</tr> $CustFirstName <br/>
			<tr>Last Name: $CustLastName </tr><br/>
			<tr>Address: $CustAddress</tr> <br/>
			<tr>City: $CustCity</tr> <br/>
			<tr>Province: $CustProv</tr> <br/>
			<tr>Postal Code: $CustPostal</tr> <br/>
			<tr>Country: $CustCountry </tr><br/>
			</br>
			<tr>PHONE</tr> </br>
			<tr>Home:</tr> $CustHomePhone <br/>
			<tr>Business:</tr> $CustBusPhone <br/>
			<tr>Email:</tr> $CustEmail <br/></table>
			<input type='hidden' name='CustId' value='$CustId' /> </br>
			<button type='submit' name='userAction' value='edit'>Edit account info</button>
			<button type='submit' name='userAction' value='delete'>Delete account</button>
			</h3>
			</form></table>";
			

		}
	}
	else {
		$output =  "Enter Username & Password";
	}
}
echo $output;
?>
<input type="button" id="button" onclick="location.href='displayBooking.php';" value="View Bookings" />
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
