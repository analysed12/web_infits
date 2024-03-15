<?php 
// Create connection
$conn=new mysqli("localhost", "u991535966_shared_infits", "Teaminfits@123","u991535966_shared_infits");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['clientuserID'];
//$dateandtime = $_POST['dateandtime'];
//$from1 = date('Y-m-d 00:00:00', strtotime('-0 days', strtotime($dateandtime)));
// AND  `dateandtime` between '$from1' and '$dateandtime'
$sql = "SELECT * FROM `meal_tracker` WHERE `clientuserID` = '$username'";
$result = $conn->query($sql);

// Check if any rows were found
if ($result->num_rows > 0) {
    // Create an array to hold the results
    $resultsArray = array();
    
    // Loop through each row and add it to the array
    while($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }
    
    // Encode the array as JSON and output it
    echo json_encode($resultsArray);
} else {
    echo "0 results";
}
