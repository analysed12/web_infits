<?php

$conn=new mysqli("localhost", "u991535966_shared_infits", "Teaminfits@123","u991535966_shared_infits");


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata');


$clientuserID = $_POST['clientuserID'];
$steps = $_POST['steps'];
$dateandtime = date('Y-m-d h:i:s',strtotime($_POST['dateandtime']));
$avgspeed = $_POST['avgspeed'];
$distance = $_POST['distance'];
$goal = $_POST['goal'];
$calories = $_POST['calories'];
$clientID=$_POST['clientID'];
$dietitian_id=$_POST['dietitian_id'];



 $sql = "select steps from steptracker where clientID='$userID' and dateandtime = '$dateandtime'";
	$result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result) == 0){
     $sql = "insert into steptracker (steps,dateandtime,avgspeed,distance,calories,goal,clientuserID,clientID,dietitian_id) values('$steps','$dateandtime','$avgspeed','$distance','$calories','$goal','$clientuserID','$clientID','$dietitian_id')";
 if (mysqli_query($conn,$sql)) {
     echo "New Insert 1st";
 }
 else{
     echo "error1";
 }
 }
 else{
     $sql = "update steptracker set steps = '$steps',goal = '$goal' where dateandtime = '$dateandtime' and clientID = '$clientuserID'";
     if (mysqli_query($conn,$sql)) {
       echo " prevoious updated 2nd";
     }
     else{
         echo "error2";
     }   
}




?>