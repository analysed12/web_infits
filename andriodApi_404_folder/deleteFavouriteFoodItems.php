<?php

$conn=new mysqli("localhost", "u991535966_shared_infits", "Teaminfits@123","u991535966_shared_infits");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$clientuserID = $_POST['clientuserID'];
$FavouriteFoodName=$_POST['FavouriteFoodName'];
// $clientuserID="test";
// $FavouriteFoodName="poha";

$sql="DELETE FROM `favourite_food_items` WHERE clientID='$clientuserID' and nameofFoodItem='$FavouriteFoodName'";
if (mysqli_query($conn,$sql)) {
    echo "success";
  }
  else{
    echo "failed";
  }
?>