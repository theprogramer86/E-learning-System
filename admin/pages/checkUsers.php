<?php
$xmlDoc=new DOMDocument();

include('config/database.php');

$x=array();

$last_sql = "SELECT * FROM users";
$last_result = $conn->query($last_sql);
while($row = $last_result->fetch_assoc()) {
    array_push($x , $row);
}


//get the q parameter from URL
$q=$_GET["q"];

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($x as $name) {
    //   print_r($name['company']);die();
    if (stristr($name['user'], $q)) {
      $hint = 'Already Exits';
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>