<?php
require "connect.php";
// Create connection
$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$type = $_POST['type'];
if($type == '1'){
    $referralCode = $_POST['referralCode'];
    $clientuserID = $_POST['clientuserID'];
    $dietitianID = $_POST['dietitianID'];
    $dietitianuserID = $_POST['dietitianuserID'];
    $verification = $_POST['verification'];
    $sql = "UPDATE client SET verification_code = '$referralCode', verification = '$verification',dietitian_id= '$dietitianID',
    dietitianuserID = '$dietitianuserID' WHERE clientuserID ='$clientuserID'";
    if (mysqli_query($conn, $sql)) {
        echo "Updated";
    } else {
        echo "Failure: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}elseif ($type == '2'){
    $clientuserID = $_POST['clientuserID'];
    $verification = $_POST['verification'];
    $sql = "UPDATE client SET verification = '$verification' WHERE clientuserID = '$clientuserID'";
    if (mysqli_query($conn, $sql)) {
        echo "Updated";
    } else {
        echo "Failure: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}else {
    echo 'Invalid arguments';
}

?>
