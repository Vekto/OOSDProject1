<?php
  session_start();
  include("Functions.php");
  $_SESSION['lastpage'] = "Booking.php";
  if(isset($_REQUEST["packageId"]))
  {
    $_SESSION['packageid'] = $_REQUEST["packageId"];
  }
  $package = getTravelPackages($_SESSION['packageid']);
  if(!isset($_SESSION["userid"]))
  {
    $_SESSION["message"] = "Please login to continue!";
    header("Location: messages.php");
  }
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

        if (getElementById("CardSelect") == "NullCard"){
          errorMessage += "Select a Payment Method<br />";
        }
        if (getElementById("TravCount") == "" || getElementById("TravCount") == 0){
          errorMessage += "Pick Number of Travelers<br />";
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
      print(substr($package[0]["PkgStartDate"],0,10)."<br />");
      print(substr($package[0]["PkgEndDate"],0,10)."<br />");
      ?>
      <form action="confpage.php" onsubmit="return validator(this)" method="post" id="BookingForm" >
        <fieldset>
          <legend>Customer Registration</legend> </br>
          Number of Travelers:<input id="TravCount" type="number" name="numTrav"/><br />
          Class:<select id="ClassSelect" name="class">
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
     $package = getTravelPackages($_SESSION['packageid']);
   </div>-->




	<!--WRITE YOUR CODE ABOVE THIS LINE-->



	<?php
	  include("footer.php");
  ?>


</body>
</html>
