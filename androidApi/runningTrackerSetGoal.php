<?php

require "connect.php";


$userID = $_POST['client_id'];
$clientuserID = $_POST['clientuserID'];
$distance = $_POST['distance'];
$calories = $_POST['calories'];
$runtime = $_POST['runtime'];
$goal = $_POST['goal'];
$date = date('Y-m-d',strtotime($_POST['date']));


$sql = "select goal from runningtracker where client_id='$userID' and date = '$date'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    $sql = "insert into runningtracker(row_id, client_id, clientuserID, distance, calories, runtime, goal, date)  values(NULL,'$userID','$clientuserID','$distance','$calories','$runtime','$goal','$date')";
    if (mysqli_query($conn,$sql)) {
    echo "updated";
  }
  else{
    echo "error1";
  }
}else{
  echo "exists";
}



?>