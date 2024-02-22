<?php

require "connect.php";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$clientuserID = $_POST['clientuserID'];

// $clientID = "dilip";

$sql = "SELECT * FROM `watertracker` WHERE clientuserID = '$clientuserID'
AND dateandtime >= DATE_FORMAT(NOW(), '%Y-%m-01')
AND dateandtime < DATE_ADD(DATE(NOW()), INTERVAL 1 DAY);";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray['drink'] = $row['drinkConsumed'];
        $emparray['date'] = date("M",strtotime($row['dateandtime']));
        $full[] = $emparray;
    }
    echo json_encode(['water' => $full]);
?>
