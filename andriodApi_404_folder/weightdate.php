<?php

$conn = new mysqli("www.db4free.net", "infits_free_test", "EH6.mqRb9QBdY.U", "infits_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clientuserID=$_POST['clientuserID'];

$sql = "SELECT DATE(dateandtime) AS date,weight FROM weighttracker WHERE clientuserID = '$clientuserID' 
AND dateandtime >= DATE_FORMAT(NOW(), '%Y-%m-01')
AND dateandtime < DATE_ADD(DATE(NOW()), INTERVAL 1 DAY)";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$weightData = array();

while ($row = mysqli_fetch_assoc($result)) {
    $weightData[] = array(
        'date' => $row['date'],
        'weight' => $row['weight']
    );
}

echo json_encode(['weight' => $weightData]);
?>
