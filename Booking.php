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
    function validator(myForm)
    {
      var errorMessage = "Oops! Please address the following:<br />";
      var elements = myForm.elements;
        if (myForm.elements[3].value == "select")
        {
          errorMessage += "Select a Payment Method<br />";
        }

       if (myForm.elements[1].value < 1)
        {
          errorMessage += "Pick Number of Travelers<br />";
        }

        if (errorMessage == "Oops! Please address the following:<br />")
        {

          return true;
        }
        else
        {

            document.getElementById("errorDisplay").innerHTML = errorMessage;
            return false;
        }
    }


    </script>
    <style>
      #errorDisplay{
        position:relative;
        top:-100px;
        left:200px;
      }
    </style>
</head>

<body>

  <?php
  	include("header.php");
	  $title = "Register - Travel Experts"
    ?>

    <div id="main_container">

	     <!--WRITE YOUR CODE BELOW THIS LINE-->

	      <!-- Form meant for user input to add entry into customer table in the database. -->


    <div class="container">
      <?php
      print($package[0]["PkgName"]."<br />");
      print(substr($package[0]["PkgStartDate"],0,10)."<br />");
      print(substr($package[0]["PkgEndDate"],0,10)."<br />");
      ?>

      <form action="confpage.php" onsubmit="return validator(this)" method="post" id="BookingForm" >
        <fieldset><div id="errorDisplay"></div>
          <legend>Customer Registration</legend> <br />
          Number of Travelers:<input id="TravCount" type="number" name="numTrav" required="required"/><br />
          Class:<select id="ClassSelect" name="class" required="required">
            <option value="1">Select a Class</option><br />
            <option value="1">Economy</option><br />
            <option value="1.5">Business</option><br />
            <option value="2">First Class</option><br />
          </select><br />
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
