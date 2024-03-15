<?php
$conn = new mysqli("www.db4free.net", "infits_free_test", "EH6.mqRb9QBdY.U", "infits_db");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clientuserID = $_POST['clientuserID'];
$dateandtime = date('Y-m-d h:i:s', strtotime($_POST['dateandtime']));
$goal = $_POST['goal'];
$type = $_POST['type'];
$amount = $_POST['amount'];
$drinkConsumed = $_POST['drinkConsumed'];
$client_id = $_POST['client_id'];
$dietitian_id = $_POST['dietitian_id'];
$dietitianuserID = $_POST['dietitianuserID'];


$sql = "select drinkConsumed, goal from watertracker where client_id='$client_id' and dateandtime = '$dateandtime'";

// $liquid = 0;

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    $sql = "insert into watertracker(drinkConsumed,goal,clientuserID,dateandtime,type,amount,client_id,dietitian_id,dietitianuserID) values('$drinkConsumed','$goal','$clientuserID','$dateandtime','$type','$amount','$client_id','$dietitian_id','$dietitianuserID')";

    if (mysqli_query($conn, $sql)) {
        echo "inserted_water_goal ";
    } else {
        echo "error_in_insertion";
    }
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $liquid = $row['drinkConsumed'];
        $old = $row['goal'];
    }
    $new_goal = $goal + $old;
    $liquid += $amount;

    $sql = "update watertracker set dateandtime ='$dateandtime', goal='$new_goal'  where client_id='$client_id'";

    //$sql = "insert into watertracker(drinkConsumed,goal,date,clientuserID,time,type,amount,clientID,dietitian_id) values('$liquid','$goal','$date','$clientuserID','$time','$type','$amount','$clientID','$dietitian_id')";

    if (mysqli_query($conn, $sql)) {
        echo "updated_water_goal";
    } else {
        echo "error_in_updation";
    }
}
