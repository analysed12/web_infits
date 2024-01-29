<?php

require "connect.php";

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clientID = $_POST['clientID'];

// $sql = "select * from client where clientuserID = '$clientID'";

// $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

$imageName = "$clientID.jpg";
$image = 'upload/' . $imageName;
$type = pathinfo($image, PATHINFO_EXTENSION);
$data = file_get_contents($image);

echo base64_encode($data);

?>
