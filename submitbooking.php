<?php
  session_start();
  include("Functions.php");
  print_r($_SESSION);
  print_r($package);
  $package = getTravelPackages($_SESSION["packageId"]);
  $bookingNo =  makeBookingId();
  $today = date('Y-m-d h:i:s');
  $TravelerCount = $_REQUEST["numTrav"];
  $bookingArray = new Array(
    "BookingDate" => $today,
    "BookingNo" => $bookingNo,
    "TravelerCount" => $TravelerCount,
    "CustomerId" => $_SESSION["userid"],
    );
  addCustomer($bookingArray,"bookings");

?>
