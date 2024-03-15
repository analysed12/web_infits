<?php

require "connect.php";

$today = date('Y-m-d');

$from = date('Y-m-d', strtotime('-8 days', strtotime($today)));

$to = date('Y-m-d', strtotime('1 days', strtotime($today)));

$clientuserID = $_POST['clientuserID'];

//$sql = "select weight,date from weighttracker where clientuserID = '$clientID' and date between '$from' and '$to' order by date desc;";
$sql = "SELECT weight,DATE(dateandtime) dates FROM weighttracker WHERE clientuserID='$clientuserID' and date(dateandtime) between '$from' and '$to' order by dates desc;";
// $sql = "select weight,date from weighttracker where clientID = '$clientID'";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
      $emparray['date'] = date("d-m-Y",strtotime($row['dates']));
      $emparray['weight'] = $row['weight'];
      $full[] = $emparray;
    }
    echo json_encode(['weight' => $full]);
?>