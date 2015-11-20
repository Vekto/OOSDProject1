<?php
  session_start();
  include("Functions.php");
  print_r($_SESSION);
  //initialize variables
  $package = getTravelPackages($_SESSION["packageid"]);
  $bookingNo =  makeBookingId();
  $today = date('Y-m-d h:i:s');
  $TravelerCount = $_REQUEST["numTrav"];
  //Array for the bookings table
  $bookingArray = Array(
    "BookingDate" => $today,
    "BookingNo" => $bookingNo,
    "TravelerCount" => $TravelerCount,
    "CustomerId" => $_SESSION["userid"],
    "PackageId" => $_SESSION["packageid"],
    );
  $class = "";
  //get the correct class ID
  switch ($_REQUEST["ClassMult"])
  {
    case 1:
      $class = "ECN";
      break;
    case 1.5:
      $class = "BSN";
      break;
    case 2:
      $class = "FST";
      break;
    default:
      break;
  }

  addRecord($bookingArray,"bookings");
  //get id of just the booking we just added
  $newBookingId = getBookingId($bookingNo);
  //array for booking details table
  $bookingDetailsArray = Array("TripStart" => $package[0]['PkgStartDate'],
                               "TripEnd" => $package[0]['PkgEndDate'],
                               "BasePrice" => $package[0]['PkgBasePrice'],
                               "BookingId" => $newBookingId,
                               "ClassId" => $class,);
  addRecord($bookingDetailsArray,"bookingdetails");
  //update session variables
  $_SESSION["message"] = "Booking Successful!";
  $_SESSION["lastpage"] = "index.php";
  header("Location: messages.php");

?>
