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

$clientuserID = $_POST['clientuserID'];
$dateandtime=$_POST['dateandtime'];
$date = date("Y-m-d", strtotime($dateandtime));
$sql = "select sum(amount) x from watertracker where clientuserID='$clientuserID' and date(dateandtime) like
'%$date%' group by date(dateandtime) ";

$result = mysqli_query($conn, $sql);
$full = array();
while ($row = mysqli_fetch_assoc($result)) {

    $full['drinkConsumed'] = $row['x'];
    
}
$sql = "select goal from watertracker where clientuserID='$clientuserID' and date(dateandtime) like '%$date%' limit 1";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {

    $full['goal'] = $row['goal'];
    
}
// usort($full, 'date_compare');

echo json_encode(['water' => $full]);




// if (mysqli_num_rows($result) == 0) {
//     $sql = "insert into watertrackerdt values('$consumed','$goal','$dateandtime','$userID','$type','$amount')";
//     if (mysqli_query($conn, $sql)) {
//         echo "updated";
//     } else {
//         echo "error";
//     }
// } else {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $liquid = $row['drinkConsumed'];
//     }
//     $liquid += $amount;
//     $sql = "insert into watertrackerdt values('$liquid','$goal','$dateandtime','$userID','$type','$amount')";
//     if (mysqli_query($conn, $sql)) {
//         echo "updated";
//     } else {
//         echo "error";
//     }
// }

?>


