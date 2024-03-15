<?php

require "connect.php";

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clientID = $_POST['clientID'];

$sql = "select * from referral_table where clientuserID = '$clientID'";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

echo mysqli_fetch_assoc($result)['activeUsers'];

?>
