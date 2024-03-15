<?php

$conn=new mysqli("localhost", "u991535966_shared_infits", "Teaminfits@123","u991535966_shared_infits");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clientID = $_POST['clientID'];
$dateandtime=$_POST['dateandtime'];
$today = date('Y-m-d H:i:s');
$from=date('Y-m-d 00:00:00',strtotime("-0 days",strtotime($today)));
//$date = date("Y-m-d", strtotime($dateandtime));
$sql = "select sum(Calories) from meal_tracker where clientuserID = '$clientID' and dateandtime between '$from' and '$dateandtime' order by dateandtime DESC";
$result = mysqli_query($conn, $sql);


$full = array();

while ($row = mysqli_fetch_assoc($result)) {
    $full['Calories'] = $row['sum(Calories)'];

}
$sql = "select calorieConsumeGoal from calorietracker where clientuserID='$clientID' Limit 1";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {

    $full['goal'] = $row['calorieConsumeGoal'];
    
}
echo json_encode(['food' => $full]);

?>
