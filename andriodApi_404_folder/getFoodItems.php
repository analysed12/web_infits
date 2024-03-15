<?php

$conn=new mysqli("localhost", "u991535966_shared_infits", "Teaminfits@123","u991535966_shared_infits");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from food_info";

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

    $full[] = $emparray;
}
echo json_encode(['food' => $full]);

?>
