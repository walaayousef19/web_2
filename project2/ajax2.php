<?php
if(isset($_POST['OBJECT'])){
	//Convert it to an Associative Array
	$obj = json_decode($_POST['OBJECT'],true);
     
  // //Save In MySQL
  $conn = new mysqli("localhost", "root", "", "testEvent");
  if($conn->connect_error){
 	die($conn->connect_error);
  }
	  //echo $obj;
  for($i=0;$i<count($obj);$i++){
	      $type=$obj[$i]["typeofeventis"];  
		  $target=$obj[$i]["targetofeventis"]; 
		  $date=$obj[$i]["dateofeventis"]; 
   $sql = "Insert Into Events values('$type','$target','$date')";
  $conn->query($sql);
  if($conn->affected_rows > 0){
     echo " Inserted Successfully";
   }
   else{
     echo "Sorry: Problem With Insertion";	
   } 
}	
	
}

if(isset($_GET['OBJECT'])){
	
  $sql = "Select * from events"; 
  $conn = new mysqli("localhost", "root", "", "testEvent");
  if($conn->connect_error){
 	die($conn->connect_error);
  }
  if ($result = $conn->query($sql)){
    $rows = array();
    if($result->num_rows > 0){
     while($row = $result->fetch_assoc()){
      array_push($rows, $row);
     }
    //Convert to JSON Before Sending to Client
    echo json_encode($rows);
   }
 }
 else{
  echo "No Data to Retrieve";
}}








?>