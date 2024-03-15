<?php

$conn = new mysqli("www.db4free.net", "infits_free_test", "EH6.mqRb9QBdY.U", "infits_db");


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$today = date('Y-m-d');

$from = date('Y-m-d', strtotime('-8 days', strtotime($today)));

$to = date('Y-m-d', strtotime('1 days', strtotime($today)));


$clientID = $_POST['clientID'];

// $clientID = 'Azarudeen';

// $sql = "select sum(steps),dateandtime from steptracker where clientID = '$clientID' and date(dateandtime) between '$from' and '$to';";
$sql = "select sum(steps), DATE(dateandtime) dates from steptracker where clientuserID = '$clientID' and date(dateandtime) between '$from' and '$to' group by dates order by dates desc;";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));
$full = array();
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
  $emparray['date'] = $row['dates'];
  $emparray['steps'] = $row['sum(steps)'];
  array_push($full,$emparray);
}
echo json_encode(['steps' => $full]);
?>