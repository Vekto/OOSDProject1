<?php
  session_start();
  include("Functions.php");
  $_SESSION['lastpage'] = "Booking.php";
  $_SESSION['packageid'] = $_REQUEST["packageId"];
?>



<!DOCTYPE html>

<html>

<head>

<title>Booking</title>
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
      }
      else{
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
        }
        else{
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
      <?php
      print($package[0]["PkgName"]."<br />");
      print($package[0]["PkgStartDate"]."<br />");
      print($package[0]["PkgEndDate"]."<br />");
      ?>
      <form action="confpage.php" target="_blank" method="post" id="BookingForm" >
        <fieldset>
          <legend>Customer Registration</legend> </br>
          Number of Travelers:<input type="number" name="numTrav"/><br />
          Class:<select name="class">
            <option value = "0">Select a Class</option>
            <option value="1">Economy</option>
            <option value="1.5">Business</option>
            <option value="2">First Class</option>
          </select>
          Card: <?= cardSelect($_SESSION['userid']) ?><br />
          <input type="Submit" value="Book It!"/>
        </fieldset>
	     </form>
     </div>
   </div>
   <!--<div id="pkgInfo">
   </div>-->





	<!--WRITE YOUR CODE ABOVE THIS LINE-->



	<?php
	  include("footer.php");
  ?>


</body>
</html>
