<?php

require "connect.php";

$today = date('Y-m-d');

$from = date('Y-m-d', strtotime('-8 days', strtotime($today)));

$to = date('Y-m-d', strtotime('1 days', strtotime($today)));

$clientuserID = $_POST['clientuserID'];

// $sql = "select SUM(hrsSlept),SUM(minsSlept),date from sleeptracker where clientuserID = '$clientuserID' and date BETWEEN '2022-09-01' and '2022-09-02' GROUP BY (date) ORDER BY date";

$sql = "select SUM(hrsSlept),SUM(minsSlept),waketime from sleeptracker where clientuserID = '$clientuserID' and waketime BETWEEN '$from' and '$to' GROUP BY waketime  ORDER by waketime";

// $sql = "select hrsSlept,waketime from sleeptracker where clientuserID = '$clientuserID' and waketime between '$from' and '$to';";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
      $emparray['date'] = date("d-m-Y",strtotime($row['waketime']));
      if ($row['SUM(minsSlept)'] >= 60) {
        $emparray['hrsSlept'] = ($row['SUM(hrsSlept)']+1)." Hrs ".($row['SUM(minsSlept)']-60)." Mins ";
      }
      else {
        $emparray['hrsSlept'] = $row['SUM(hrsSlept)']." Hrs ".$row['SUM(minsSlept)']." Mins ";
      }
      $full[] = $emparray;
    }
    echo json_encode(['sleep' => $full]);
?>
