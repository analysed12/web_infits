<?php

require "connect.php";

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$verify_code = $_POST['verify_code'];

$sql2 = "select dietitian_id,dietitianuserID,name,verification_code from dietitian where verification_code = '$verify_code'";
$result2 = mysqli_query($conn, $sql2);

$full = array();

while ($row = mysqli_fetch_assoc($result2)) {
    $full['dietitianID'] = $row['dietitian_id'];
    $full['dietitianuserID'] = $row['dietitianuserID'];

}

echo json_encode(['DietitianData' => $full]);

?>