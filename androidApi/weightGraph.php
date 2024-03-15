<?php
function date_compare($a, $b)
{
    $t1 = $a['date'];
    $t2 = $b['date'];
    return $t1 - $t2;
}

require "connect.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$today = date('Y-m-d');
$from = date('Y-m-d', strtotime('-6 days', strtotime($today)));
$to = date('Y-m-d', strtotime('1 days', strtotime($today)));

$clientuserID = $_POST['clientuserID'];
//$clientuserID = "dev";
$sql = "SELECT *
        FROM weighttracker
        WHERE clientuserID = '$clientuserID'
          AND dateandtime >= DATE_ADD(DATE(NOW()), INTERVAL -WEEKDAY(NOW()) DAY)
          AND dateandtime < DATE_ADD(DATE(NOW()), INTERVAL 1 DAY)";

$full = array();
$dateArray = array();

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

while ($row = mysqli_fetch_assoc($result)) {
    $weight = $row['weight'];
    $date = date("d", strtotime($row['dateandtime']));
    $full[] = array("weight" => $weight, "date" => $date);
    $dateArray[] = $date;
}

$missingDates = array();
$dateStart = date_create($from);
$dateEnd = date_create($to);

$interval = new DateInterval('P1D');
$period = new DatePeriod($dateStart, $interval, $dateEnd);

foreach ($period as $day) {
    $formatted = $day->format("d");
    if (!in_array($formatted, $dateArray)) {
        $missingDates[] = array("weight" => "0", "date" => $formatted);
    }
}

$full = array_merge($full, $missingDates);
usort($full, 'date_compare');

echo json_encode(['weight' => $full]);
?>