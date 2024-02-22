<?php

require "connect.php";

$clientID = $_POST['clientID'];

$sql = "select * from daily_meals where clientuserID = '$clientID'";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

$emparray = array();
$full = array();

while ($row = mysqli_fetch_assoc($result)) {
    $emparray['name'] = $row['name'];
    $emparray['calorie'] = $row['calorie'];
    $emparray['protein'] = $row['protein'];
    $emparray['fibre'] = $row['fibre'];
    $emparray['carb'] = $row['carb'];
    $emparray['fat'] = $row['fat'];
    $emparray['time'] = $row['time'];
    $emparray['goal'] = $row['goal'];

    $full[] = $emparray;
}
echo json_encode(['food' => $full]);

?>
