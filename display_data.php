<?php 
$hostname = "localhost";
$username = "root"; 
$password = ""; 
$database = "demo_notification";
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
// Fetch data from the notification table using title and body columns
$query = "SELECT `ttl`, `body` FROM `notification` where seen='0'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Fetch all rows and store in an array
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    // Convert the data array to JSON format
    $json = json_encode($data);
    // Output the JSON data
    echo $json;
    $updateQuery = "UPDATE `notification` SET seen='1' WHERE seen='0'";
    mysqli_query($conn, $updateQuery);
} else {
    echo "No data found in the notification table.";
}


?>