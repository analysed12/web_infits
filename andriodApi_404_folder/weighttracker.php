<?php
$conn = new mysqli("www.db4free.net", "infits_free_test", "EH6.mqRb9QBdY.U", "infits_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clientuserID = $_POST['clientuserID'];
$dateandtime = $_POST['dateandtime'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$bmi = $_POST['bmi'];
$goal = $_POST['goal'];
$client_id = $_POST['client_id'];
$dietitian_id = $_POST['dietitian_id'];
$dietitianuserID = $_POST['dietitianuserID'];

$sql = "SELECT weight FROM weighttracker WHERE clientuserID = '$clientuserID' AND DATE(dateandtime) = CURDATE()";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO weighttracker (client_id, clientuserID, dietitian_id, dietitianuserID, height, weight, bmi, goal, dateandtime) 
            VALUES ('$client_id', '$clientuserID', '$dietitian_id', '$dietitianuserID', '$height', '$weight', '$bmi', '$goal', '$dateandtime')";

    if (mysqli_query($conn, $sql)) {
        $sql = "UPDATE weighttracker SET height = '$height', weight = '$weight' WHERE clientuserID = '$clientuserID' AND DATE(dateandtime) = CURDATE()";
        mysqli_query($conn, $sql);
        echo "updated";
    } else {
        echo "error1: " . mysqli_error($conn);
    }
} else {
    $sql = "UPDATE weighttracker SET height = '$height', weight = '$weight', goal = '$goal', bmi = '$bmi' WHERE DATE(dateandtime) = CURDATE() AND clientuserID = '$clientuserID'";

    if (mysqli_query($conn, $sql)) {
        $sql = "UPDATE weighttracker SET height = '$height', weight = '$weight' WHERE clientuserID = '$clientuserID' AND DATE(dateandtime) = CURDATE()";
        mysqli_query($conn, $sql);
        echo "updated";
    } else {
        echo "error2: " . mysqli_error($conn);
    }
}
?>
