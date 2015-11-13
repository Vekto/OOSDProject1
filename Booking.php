<?php
session_start();
include("Functions.php");
$_SESSION['lastpage'] = "Booking.php";
?>

<!DOCTYPE html>

<html>

<head>

<title>Travel Experts</title>
<link rel="stylesheet" type="text/css" href="style.css">
<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->
  <script>
    // customer registration form validation
    function validator(myForm){
      var errorMessage = "<p>Oops! The following fields must be filled out:<br />";
      var elements = myForm.elements;

      for (i=0; i<elements.length; i++){
        if (elements[i].value == "Select a Country"){
          errorMessage += "Country<br />";
        }

        if (elements[i].value == ""){
          errorMessage += elements[i].id+"<br />";

        }
      }

      if (errorMessage == "<p>Oops! The following fields must be filled out:<br />"){
        return true;
      }else{
            errorMessage += "</p>";
            document.getElementById("errorDisplay").innerHTML = errorMessage;
            return false;
        }
      }

      function regExValidator(myForm){
        var emailRE = /^[a-z0-9_\.]+@([\-0-9a-z]+\.)+[a-z]{2,6}$/i;
      	var postalRE = /^[A-Z]\d[A-Z]?\d[A-Z]\d$/;
        var count = 0

        if(!emailRE.test(myForm.CustEmail.value)){
					alert("Invalid Email Format!");
					myForm.CustEmail.focus();
          count+=1;

				}
				if(!postalRE.test(myForm.CustPostal.value)){
					alert("invalid postal Code");
					myForm.CustPostal.focus();
          count+=1;

				}
        if (count==0){
          return true;
        }else{
          return false;
        }

      }

    </script>
</head>
<body>
<?php
  	include("header.php");
	  $title = "Register - Travel Experts"
?>
<div id="main_container">

	<!--WRITE YOUR CODE BELOW THIS LINE-->

	<!-- Form meant for user input to add entry into customer table in the database. -->
  <div id="errorDisplay">
  </div>

  <div class="container">
  <form action="" method="post" id="BookingForm" >
    <fieldset>
      <legend>Customer Registration</legend> </br>
      Departure:<input type ="date" name="departure">Date</input><br />
      Return:<input type ="date" name ="return">date</input><br />
      Class:<?= getSelect('ClassId', 'ClassName', 'classes', "Class") ?><br />
      Destination: <?= getSelect('RegionId', 'RegionName', 'regions', "Regions") ?><br />
      Card: <?= cardSelect($_SESSION['userid']) ?><br />
      Number of Travelers:<input type="number" /><br />
      <input type="Submit" value="Book It!"/>
  </fieldset>
	</form>
  </div>
</div>





	<!--WRITE YOUR CODE ABOVE THIS LINE-->



	<?php


	  include("footer.php");
    ?>




</body>
</html>
