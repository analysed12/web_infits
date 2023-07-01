<?php
$hostname = "localhost";
$username = "root"; 
$password = ""; 
$database = "demo_notification";
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the query from the POST data
$query = $_POST['query'];

// Execute the query
$result = mysqli_query($conn, $query);
if ($result) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}


// // Close the connection
// mysqli_close($conn);
?>