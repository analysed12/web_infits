<?php

require "connect.php";

date_default_timezone_set('Asia/Kolkata');

$userID = $_POST['userID'];
$sleeptime = date('Y-m-d h:i:s',strtotime($_POST['sleeptime']));
$waketime = date('Y-m-d h:i:s',strtotime($_POST['waketime']));
$hrsslept = date('H',strtotime($_POST['timeslept']));
$goal = $_POST['goal'];
$minsslept = date('i',strtotime($_POST['timeslept']));
$date = $_POST['date'];
// echo $date;
// echo "<br>";

// echo $sleeptime."  ";

// echo $waketime;
$stmt = $conn->prepare("select client_id ,dietitian_id, dietitianuserID  from client WHERE clientuserID = '$userID';");
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($clientID, $dietitian_id, $dietitianuserID);
  $stmt->fetch();
$sql = "insert into sleeptracker(client_id,clientuserID,dietitian_id,dietitianuserID,sleeptime,waketime,hrsSlept,goal,minsSlept,dateandtime)  values($clientID,'$userID',$dietitian_id,'$dietitianuserID','$sleeptime','$waketime',$hrsslept,$goal,$minsslept,'$date')";
if (mysqli_query($conn,$sql)) {
    echo "updated";
}
else{
    echo "error";
}
?>
