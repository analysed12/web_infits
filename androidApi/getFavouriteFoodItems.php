<?php
$conn=new mysqli("localhost", "u991535966_shared_infits", "Teaminfits@123","u991535966_shared_infits");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$clientuserID = $_POST['clientuserID'];
// $clientuserID=$_POST[""];

$sql = "select * from favourite_food_items where clientID='$clientuserID'";
$emparray = array();
$full = array();
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

while ($row = mysqli_fetch_assoc($result)) {
          // $emparray['clientID'] = $row['clientID'];
            $emparray['nameofFoodItem'] = $row['nameofFoodItem'];
            $emparray['calorie']=$row['calorie'];
            $emparray['protein']=$row['protein'];
            $emparray['carb']=$row['carb'];
            $emparray['fat']=$row['fat'];
            $full[] = $emparray;
      }
      echo json_encode(['favouriteFoodItems' => $full]);
?>