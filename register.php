<?php
session_start();
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

	<!--WRITE YOUR CODE BELOW THIS LINE-->

	<!-- Form meant for user input to add entry into customer table in the database. -->
  <div id="errorDisplay">
  </div>

  <div class="container">
  <form action="bouncer.php" method="post" id="CustRegForm" onsubmit="return (validator(this) && regExValidator(this));">
    <fieldset>
      <legend>Register</legend>
		<label for="CustFirstName">First Name: </label>
		<input type="text" name="CustFirstName" id="First Name" value="" /><br />

		<label for="CustLastName">Last Name: </label>
		<input type="text" name="CustLastName" id="Last Name"value="" /><br />

		<label for="CustAddress">Address: </label>
		<input type="text" name="CustAddress" id="Address" value="" /><br />

		<label for="CustCity">City: </label>
		<input type="text" name="CustCity" id="City" value="" /><br />

		<label for="CustProv">Province/State: </label>
		<input type="text" name="CustProv" id="Province/state" value="" /><br />

    <label for="CustCountry">Country: </label>
    <select name="CustCountry">
      <option>Select a Country</option>
      <option value="ca">Canada</option>
      <option value="us">United States</option>
      <option value="mx">Mexico</option>
      <option value="uk">United Kingdom</option>
    </select><br />

		<label for="CustPostal">Postal Code: </label>
		<input type="text" name="CustPostal" id="Postal Code" placeholder="ex. t2t-2m7" value="" /><br />

		<label for="CustHomePhone">Home Phone: </label>
		<input type="text" name="CustHomePhone" id="Home Phone" value="" /><br />

		<label for="CustBusPhone">Business Phone: </label>
		<input type="text" name="CustBusPhone" id="Business Phone" value="" /><br />

    <label for="CustEmail">Email: </label>
    <input type="text" name="CustEmail" id="Email" value="" /><br />

		<label for="username">Username: </label>
		<input type="text" name="username" id="Username" value="" /><br />

		<label for="password">Password: </label>
		<input type="password" name="password"id="password" value="" /><br />

		<input type="submit" value="Register" />
  </fieldset>
	</form>
  </div>





	<!--WRITE YOUR CODE ABOVE THIS LINE-->



	<?php


	  include("footer.php");
    ?>




</body>
</html>
