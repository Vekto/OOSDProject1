<?php
  include('testingVars.php');
/*==========================================================================*/
//  all functions that deal with the Travel Experts Database will           //
//  be placed in this file.                                                 //
/*==========================================================================*/

  //Connect to the Database
  function agencyConnect(){
    $link = new mysqli("localhost","root","","travelexperts");
    if ($link->connect_errno){
      echo "Failed to connect: " . $link->connect_error;
    }
    else{
    //  print("Connect Successful!<br />");
      return $link;
    }
  }


// Adds a single row into a specified table
  function addAgent($newRow, $newTable="customer"){
    include_once('testingVars.php');
    $link = agencyConnect();
    $sql;
    $result;
    $keys = array();
    $values = array();
    while(list($k,$v) = each($newRow)){
        array_push($keys,$k);
        array_push($values,$v);
      }
      $keys = implode("`, `",$keys);
      $values = implode("', '",$values);
      $sql = "INSERT INTO `travelexperts`.`$newTable` (`$keys`) VALUES ('$values');";
      $result = mysqli_query($link,$sql);
    ($result) ? $i=1 : $i=0;
    ($result) ? print($addSuccess)  : print($addFail);
    mysqli_close($link);
    return($i);
  }


/*--Updates a table--------------------------------*/
/*--Pass the function which table you are updating,*/
/*--Followed by which Array you are wanting to use-*/
/*--Followed by the Key for the table--------------*/
 function updateTable($argTable, $argArray, $pKey)
 {
    //$id=array_pop($argArray);
     $link = agencyConnect();
     $sql = "UPDATE $argTable SET ";
     $keyvals = array();
     foreach($argArray as $k =>$v)
     {
       $keyvals[] = "$k = '$v'";
     }
     //array_pop($keyvals);
     $setString = implode($keyvals ,", ");
     $sql .=$setString;
     $sql .= " WHERE $pKey  = $id";
     print($sql);
     print("<BR />");
     $success = $link->query($sql);
     print($link->error);
     $link->close();
     return $success;
  }


  //Produces a select element of agents
  function getAgentSelect(){
    $link = agencyConnect();
    $htmlString;
    $sql = "SELECT `AgentId`, `AgtFirstName`, `AgtLastName` FROM `agents`";
    $result = $link->query($sql);
    $htmlString = "<select name='agentSelector'><option>Select an Agent!</option>";
    while ($row = $result->fetch_row()) {
      $htmlString .= "<option value='$row[0]'>$row[0]. $row[1] $row[2]</option>";
    }
    $htmlString .= "</select>";
    return ($htmlString);
  }


  //generates some javascript that will recieve the array of travel package data.
  function getJsPkgArray(){
    $pkgArray = getTravelPackages();
    $i=0;
    $script = "";
    $script .= "<script>";
    $script .= "var pkgArray = new Array();";
    for($i;$i<count($pkgArray);$i++){
      $script.="pkgArray[$i] = {};";
      foreach($pkgArray[$i] as $k=>$v){
        $script .= "pkgArray[$i].$k = '$v';";
      }
    }
    $script .= "</script>";
    return $script;
  }


  //pulls relevant fields from the packages table and stores it in an array of associative arrays.
  function getTravelPackages($pkgid=NULL){
    $link = agencyConnect();
    $sql = "SELECT `PackageId`, `PkgName`, `PkgStartDate`, `PkgEndDate`, `PkgDesc`, `PkgBasePrice`, `PkgImageUrl` FROM `packages`";
    $i = 0;
	  if ($pkgid != NULL){
		  $sql .= "WHERE `PackageId` = $pkgid";
	  }
    $result = $link->query($sql);
    $pkgArray = array();
    for($i=0;$i<$result->num_rows;$i++){
      while($row = mysqli_fetch_assoc($result)) {
      $pkgArray[] = $row;
     }
    }
    $link->close();
    return $pkgArray;
  }


  //retrieves any 2 field table that's used for select functions
  function getSelect($field1, $field2, $table, $name)
  {
    $mysqli = agencyConnect();
    $sql = "SELECT $field1, $field2 FROM $table";
    $result = $mysqli->query($sql);
    $selectString = "<select name='$name'>";
    $selectString .= "<option value=''>Select</option>";
    while ($row = $result->fetch_array(MYSQLI_NUM))
    {
      $selectString .= "<option value='$row[0]'>$row[1] </option>";
    }
    $selectString .="</Select>";
    $mysqli->close();
    return $selectString;
  }


    //Used to retrieve the customer id after a user has registered
  function getCustomerId($username)
    {
      $mysqli = agencyConnect();
      $sql = "SELECT CustomerId from customers where CustUserName = '$username'";
      $result = $mysqli->query($sql);
      $value = $result->fetch_array(MYSQLI_NUM);
      $customerid = $value[0];
      $mysqli->close();
      return($customerid);
    }


    //retrieves credit cards of customer and displays only last 4 values.
  function cardSelect($key)
  {
    $mysqli = agencyConnect();
    $sql = "SELECT CreditCardId, CCName, CCNumber, CCExpiry FROM creditcards WHERE CustomerId = '$key'";
    $result = $mysqli->query($sql);
    $selectString = "<select name='Cards'>";
    $selectString .= "<option value=''>Select</option>";
    while ($row = $result->fetch_array(MYSQLI_NUM))
    {
      $oldstring = $row[2];
      $newstring = substr($oldstring, -4);
      $oldExp = $row[3];
      $newExp = substr($oldExp, 0, 10);
      $selectString .= "<option value='$row[0]'>$row[1] ****$newstring EXP:$newExp </option>";
    }
    $selectString .="</Select>";
    $mysqli->close();
    return $selectString;
  }


    //A function to delete agents.
  function deleteCustomer($customerId){
    global $deleteSuccess, $deleteFail;
    $link = agencyConnect();
    $sql = "DELETE FROM customers WHERE CustomerId=$customerId";
    print($sql);
    $result = $link->query($sql);
    $link->close();
    if ($result){
      print($deleteSuccess);
    }
    else{
      print($deleteFail);
    }
    return $result;
  }


  // Adds a customer by default.
  function addCustomer($newRow, $newTable="customer"){
    include_once('testingVars.php');
    $link = agencyConnect();
    $sql;
    $result;
    $keys = array();
    $values = array();
    while(list($k,$v) = each($newRow)){
      array_push($keys,$k);
      array_push($values,$v);
    }
    $keys = implode("`, `",$keys);
    $values = implode("', '",$values);
    $sql = "INSERT INTO `travelexperts`.`$newTable` (`$keys`) VALUES ('$values');";
    $result = mysqli_query($link,$sql);
    ($result) ? $i=1 : $i=0;
    ($result) ? print($addSuccess)  : print($addFail);
    mysqli_close($link);
    return($i);
  }
  // Uses a customer object to submit a customer to the Database, values stored in variables to avoid restriction in binding values
  function customerAdd($customer)
  {
     $a = $customer->getFirstName();
     $b = $customer->getLastName();
     $c = $customer->getAddress();
     $d = $customer->getCity();
     $e = $customer->getProv();
     $f = $customer->getPostal();
     $g = $customer->getCountry();
     $h = $customer->getHomePhone();
     $i = $customer->getBusPhone();
     $j = $customer->getBusPhone();
     $k = $customer->getUsername();
     $l = md5($customer->getPassword());
    $link = agencyConnect();
    $sql = "INSERT INTO `customers`(`CustFirstName`, `CustLastName`, `CustAddress`, `CustCity`, `CustProv`, `CustPostal`, `CustCountry`, `CustHomePhone`, `CustBusPhone`, `CustEmail`, `AgentId`, `CustUserName`, `CustPassword`) VALUES (?,?,?,?,?,?,?,?,?,?,'1',?,?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ssssssssssss", $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l);
    $success = 1;
    if (!$stmt->execute())
    {
      $success=0;
    }
    $link->close();
    $_SESSION['message'] = "Successfully Registered!";
    return $success;
  }


  // Retrieves our agents Contact
  function displayContacts()
  {
	  $link = agencyConnect();
    $contact;
    $sql = "SELECT `AgentId`, `AgtFirstName`, `AgtLastName`, `AgtBusPhone`, `AgtEmail`, `AgtPosition` FROM `agents`";
    $result = $link->query($sql);
    $contact = "<div id='agent'>";
    while ($row = $result->fetch_row()) {
      $contact .= "$row[1] $row[2] <br />";
		$contact .= "Business Number: $row[3] <br />";
		$contact .= "Email: $row[4] <br />";
		$contact .= "Position: $row[5] <br />";
		$contact .= "<br /><br />";
    }
    $contact .= "</div>";
	  $link->close();
    return $contact;
  }
?>
