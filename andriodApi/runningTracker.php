<?php

require "connect.php";


$userID = $_POST['client_id'];
$clientuserID = $_POST['clientuserID'];
$distance = $_POST['distance'];
$calories = $_POST['calories'];
$runtime = $_POST['runtime'];
$goal = $_POST['goal'];
$date = date('Y-m-d',strtotime($_POST['date']));


$sql = "update runningtracker set distance='$distance',calories = '$calories',runtime = '$runtime' where date = '$date' and client_id = '$userID'";
  
if (mysqli_query($conn,$sql)) {
  echo "updated";
}
else{
  echo "error";
}
?>