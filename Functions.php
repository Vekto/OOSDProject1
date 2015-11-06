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
      print("Connect Successful!<br />");
      return $link;
    }
  }

// Adds a single row into a specified table
  function addAgent($newRow, $newTable="agents"){
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
  function updateAgent($agent){
    $result;
    $link = agencyConnect();
    $keyvals = array();
    $sql = "UPDATE agents SET ";
    foreach ($agent as $k => $v){
      $keyvals[] = "$k='$v'";
      }
    $setString = implode(", ", $keyvals);
    $sql .= $setString;
    $sql .= "WHERE AgentId=".$agent['AgentId'].";";
    print($sql);
    $result = mysqli_query($link,$sql);
    print($result);
    mysqli_close($link);
    return $result;
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
?>
