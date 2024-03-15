<?php

require "connect.php";
$clientID = $_POST['clientID'];
$dateandtime = $_POST['dateandtime'];
$date = date("Y-m-d", strtotime($dateandtime));
$sql = "select * from in_app_notifications where clientuserID = '$clientID' and date(date) like '%$date%'";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

$emparray = array();
$full = array();

while ($row = mysqli_fetch_assoc($result)) {
    $emparray['date'] = date("d-m-Y", strtotime($row['date']));
    $emparray['time'] = date("g:i A", strtotime($row['date']));
    $emparray['type'] = $row['type'];
    $emparray['text'] = $row['text'];

    array_push($full,$emparray);
}
echo json_encode(['inApp' => $full]);

?>
