<?php
function date_compare($a, $b)
{
    $t1 = $a['date'];
    $t2 = $b['date'];
    return $t2 - $t1;
}
$conn=new mysqli("localhost", "u991535966_shared_infits", "Teaminfits@123","u991535966_shared_infits");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clientID = $_POST['userID'];
$dateandtime = date('Y-m-d h:i:s', strtotime($_POST['dateandtime']));
$goal = $_POST['goal'];
$type = $_POST['type'];
$amount = $_POST['amount'];
$consumed = $_POST['consumed'];

$sql = "select * from watertrackerdt where clientID='$clientID' and dateandtime=(
    select max(dateandtime) from watertrackerdt where clientID='$clientID'
)";

$result = mysqli_query($conn, $sql);

// $full = array();
// while ($row = mysqli_fetch_assoc($result)) {

//     $emparray['dateandtime'] = $row['dateandtime'];
//     $emparray['drinkConsumed'] = $row['drinkConsumed'];
//     $emparray['goal'] = $row['goal'];

//     $full[] = $emparray;
// }

// echo json_encode(['water' => $full]);

if (mysqli_num_rows($result) == 0) {
    $sql = "insert into watertrackerdt values('$consumed','$goal','$dateandtime','$userID','$type','$amount')";
    if (mysqli_query($conn, $sql)) {
        echo "inserted";
    } else {
        echo "error";
    }
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $liquid = $row['drinkConsumed'];
        $date = $row['dateandtime'];
    }

    $liquid += $amount;

    $sql = "update watertrackerdt set drinkConsumed='$liquid' where clientID='$clientID' and dateandtime='$date'";
    if (mysqli_query($conn, $sql)) {
        echo "updated1";
    } else {
        echo "error";
    }
}
