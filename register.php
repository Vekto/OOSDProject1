<!-- Page built to allow customers to enter their own data into the databases. -->
<?php
session_start();
include('header.php');
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
      var errorMessage = "<p id='title'>Oops! The following fields must be filled out:<br /><p id='errorMessage'>";
      var elements = myForm.elements;

      for (i=0; i<elements.length; i++){
        if (elements[i].value == "Select a Country" || elements[i].value == "-----Territories-----"){
          errorMessage += "Country<br />";
        }
        if (elements[i].value == ""){
          errorMessage += elements[i].id+"<br />";
        }
      }
      if (errorMessage == "<p id='title'>Oops! The following fields must be filled out:<br /><p id='errorMessage'>"){
        return true;
      }else{
            errorMessage += "</p>";
            document.getElementById("errorDisplay").innerHTML = errorMessage;
            return false;
        }
      }

      function regExValidator(myForm){
        var emailRE = /^[a-z0-9_\.]+@([\-0-9a-z]+\.)+[a-z]{2,6}$/i;
      	var postalRE = /^((\d{5}-\d{4})|(\d{5})|([AaBbCcEeGgHhJjKkLlMmNnPpRrSsTtVvXxYy]\d[A-Za-z]\s?\d[A-Za-z]\d))$/;
        var phoneRE = /(?:\d{1}\s)?\(?(\d{3})\)?-?\s?(\d{3})-?\s?(\d{4})/;
        var count = 0;
          var custPass = myForm.CustPassword.value;
          var confPass = myForm.ConfPassword.value;
        if(!emailRE.test(myForm.CustEmail.value)){
					alert("Invalid Email Format!");
					myForm.CustEmail.focus();
          count +=1;

				}
				if(!postalRE.test(myForm.CustPostal.value)){
					alert("invalid postal Code");
					myForm.CustPostal.focus();
          count+=1;

				}
        if(!phoneRE.test(myForm.CustHomePhone.value)){
          alert("invalid Home Phone");
          myForm.CustHomePhone.focus();
          count +=1;

        }
        if(!phoneRE.test(myForm.CustBusPhone.value)){
          alert("invalid Buisness Phone");
          myForm.CustBusPhone.focus();
          count+=1;

        }

        if(myForm.CustProv.value == "0"){
          alert("Select a Province");
          myForm.CustProv.focus();
          count+=1;
        }

        if(custPass != confPass){
          alert("Passwords do not match!");
          myForm.CustPassword.value = "";
          myForm.ConfPassword.value = "";
          myForm.CustPassword.focus();
          count+=1;
        }


        if (count==0)
        {
          return true;
        }
        else
        {
          return false;
        }

      }

      function clearError(){
        document.getElementById("errorDisplay").innerHTML = "";
      }

    </script>
    <style>
    #errorMessage
    {
      position:absolute;
      left: 475px;
      top:30px;
      color: red;
    }

    #title{
      position:absolute;
      left: 400px;
    }
    </style>
</head>
<body>
<?php
  	//include("header.php");
	  $title = "Register - Travel Experts"
?>
<div id="main_container">

	<!--WRITE YOUR CODE BELOW THIS LINE-->

	<!-- Form meant for user input to add entry into customer table in the database. -->


  <div class="container">


  <form action="reghandler.php" method="post" id="CustRegForm" onsubmit="return (validator(this) && regExValidator(this));">
    <fieldset><div id="errorDisplay"></div>

      <legend>Customer Registration</legend> </br>

		<label for="CustFirstName">First Name: </label>
		<input type="text" required="required" name="CustFirstName" id="First Name" value="" /><br /><br />

		<label for="CustLastName">Last Name: </label>
		<input type="text" required="required" name="CustLastName" id="Last Name"value="" /><br /><br />

		<label for="CustAddress">Address: </label>
		<input type="text" required="required" name="CustAddress" id="Address" value="" /><br /><br />

		<label for="CustCity">City: </label>
		<input type="text" required="required" name="CustCity" id="City" value="" /><br /><br />

		<!--<label for="CustProv">Province/State: </label>
		<input type="text" name="CustProv" id="Province/state" value="" /><br /><br />-->

    <label for="CustProv">Province/State: </label>
    <select name="CustProv">
      <option value="0">Select a Province</option>
      <option value="AB">Alberta</option>
      <option value="BC">British Columbia</option>
      <option value="MB">Manitoba</option>
      <option value="NB">New Brunswick</option>
      <option value="NF">Newfoundland</option>
      <option value="NS">Nova Scotia</option>
      <option value="ON">Ontario</option>
      <option value="PE">Prince Edward Island</option>
      <option value="QC">Quebec</option>
      <option value="SK">Sakatchawan</option>
      <<option value="0">-----Territories-----</option>
      <option value="NT">Northwest Territories</option>
      <option value="NU">Nunavut</option>
      <option value="YT">Yukon</option>

    </select><br /><br />

		<label for="CustPostal">Postal Code: </label>
		<input type="text" required="required" name="CustPostal" id="Postal Code" placeholder="ex. t2t-2m7" value="" /><br /><br />

		<label for="CustCountry">Country: </label>
		<select name="CustCountry">
		  <option value="0">Select a Country</option>
		  <option value="Canada">Canada</option>
		</select><br /><br />

		<label for="CustHomePhone">Home Phone: </label>
		<input type="text" required="required" name="CustHomePhone" id="Home Phone" value="" /><br /><br />

		<label for="CustBusPhone">Business Phone: </label>
		<input type="text" required="required" name="CustBusPhone" id="Business Phone" value="" /><br /><br />

		<label for="CustEmail">Email: </label>
		<input type="text" required="required" name="CustEmail" id="Email" value="" /><br /><br />

		<label for="CustUsername">Username: </label>
		<input type="text" required="required" name="CustUsername" id="Username" value="" /><br /><br />

		<label for="CustPassword">Password: </label>
		<input type="password" required="required" name="CustPassword" id="Password" value="" /><br /><br />

    <label for="ConfPassword">Confirm Password: </label>
		<input type="password" required="required" name="ConfPassword" id="Password2" value="" /><br /><br />

		<input type="submit" name='userAction' value='Register' />
        <input type="reset" value="Reset" onclick="clearError()" />


  </fieldset>
	</form>

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
