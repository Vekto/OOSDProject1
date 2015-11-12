<?php


//
//  Contructs appropriate SQL statements to query the database.
//
//===========================================================================

  function agencyConnect(){
    $link = new mysqli("localhost","root","","travelexperts");
    if ($link->connect_errno){
      echo "Failed to connect: " . $link->connect_error;
    }else{
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

// updates an agents information
 // function updateAgent($agent){
 //    $result;
 //    $link = agencyConnect();
 //    $keyvals = array();
 //    $sql = "UPDATE agents SET ";
 //    foreach ($agent as $k => $v){
 //      $keyvals[] = "$k='$v'";
 //      }
 //    $setString = implode(", ", $keyvals);
 //    $sql .= $setString;
 //    $sql .= "WHERE AgentId=".$agent['AgentId'].";";
 //    print($sql);
 //    $result = mysqli_query($link,$sql);
 //    print($result);
 //    mysqli_close($link);
 //    return $result;
 //  }
/*--Updates a table--------------------------------*/
/*--Pass the function which table you are updating,*/
/*--Followed by which Array you are wanting to use-*/
/*--Followed by the Key for the table--------------*/
 function updateTable($argTable, $argArray, $pKey)
 {
   array_pop($argArray);
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
     $sql .= " WHERE $pKey  = $argArray[$pKey]";
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
  function getTravelPackages(){
    $link = agencyConnect();
    $sql = "SELECT `PkgName`, `PkgStartDate`, `PkgEndDate`, `PkgDesc`, `PkgBasePrice`, `PkgImageUrl` FROM `packages`";
    $i = 0;
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
<<<<<<< HEAD
 <?php
//
//  Contructs appropriate SQL statements to query the database.
//
//===========================================================================
  function agencyConnect(){
    $link = new mysqli("localhost","root","","travelexperts");
    if ($link->connect_errno){
      echo "Failed to connect: " . $link->connect_error;
    }else{
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
// updates an agents information
 // function updateAgent($agent){
 //    $result;
 //    $link = agencyConnect();
 //    $keyvals = array();
 //    $sql = "UPDATE agents SET ";
 //    foreach ($agent as $k => $v){
 //      $keyvals[] = "$k='$v'";
 //      }
 //    $setString = implode(", ", $keyvals);
 //    $sql .= $setString;
 //    $sql .= "WHERE AgentId=".$agent['AgentId'].";";
 //    print($sql);
 //    $result = mysqli_query($link,$sql);
 //    print($result);
 //    mysqli_close($link);
 //    return $result;
 //  }
/*--Updates a table--------------------------------*/
/*--Pass the function which table you are updating,*/
/*--Followed by which Array you are wanting to use-*/
/*--Followed by the Key for the table--------------*/
 function updateTable($argTable, $argArray, $pKey)
 {
   array_pop($argArray);
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
     $sql .= " WHERE $pKey  = $argArray[$pKey]";
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
  function getTravelPackages(){
    $link = agencyConnect();
    $sql = "SELECT `PkgName`, `PkgStartDate`, `PkgEndDate`, `PkgDesc`, `PkgBasePrice`, `PkgImageUrl` FROM `packages`";
    $i = 0;
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
=======

>>>>>>> origin/master
  function getSelect($field1, $field2, $table, $name)
    {
      $mysqli = agencyConnect();
      $sql = "SELECT $field1, $field2 FROM $table";
      $result = $mysqli->query($sql);
<<<<<<< HEAD
=======

>>>>>>> origin/master
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
<<<<<<< HEAD
=======


>>>>>>> origin/master
    //A function to delete agents.
    function deleteAgent($agentId){
      include_once('testingVars.php');
      $link = agencyConnect();
      $sql = "DELETE FROM agents WHERE AgentId=$agentId";
      $result = mysqli_query($link,$sql);
      mysqli_close($link);
      if ($result){
        print($deleteSuccess);
      }else{
        print($deleteFail);
      }
      return $result;
    }
<<<<<<< HEAD

  // Adds a single row into a specified table (customer).
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
=======
>>>>>>> origin/master
?>
