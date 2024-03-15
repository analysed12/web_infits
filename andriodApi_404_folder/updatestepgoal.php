<?php

$conn = new mysqli("www.db4free.net", "infits_free_test", "EH6.mqRb9QBdY.U", "infits_db");


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $stmt = $conn->prepare("update steptracker set goal = $goal where  date(dateandtime) like 
// '%$date%' and clientuserID = '$userID';");
$userID = $_POST['clientuserID'];
$goal = $_POST['goal'];
$dateandtime = $_POST['dateandtime'];
$date = date("Y-m-d", strtotime($dateandtime));
echo "$date";
$stmt = $conn->prepare("select row_id from steptracker where date(dateandtime) like '%$date%' and clientuserID = '$userID';");
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows() > 0) {
  $stmt = $conn->prepare("update steptracker set goal = $goal where  date(dateandtime) like 
 '%$date%' and clientuserID = '$userID';");
  $stmt->execute();
  $stmt->store_result();
} else {
  echo " success1" . " $stmt->affected_rows";
  $stmt = $conn->prepare("select client_id ,dietitian_id, dietitianuserID  from client WHERE clientuserID = '$userID';");
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($clientID, $dietitian_id, $dietitianuserID);
  $stmt->fetch();
  $stmt = $conn->prepare("insert into steptracker(client_id, clientuserID, dietitian_id, dietitianuserID, goal, dateandtime) values($clientID , '$userID',$dietitian_id, '$dietitianuserID', $goal, '$dateandtime')");
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->affected_rows) {
    echo " success";
  } else {
    echo "error";
  }
}
$sql = $conn->prepare("SELECT steps FROM steptracker WHERE clientuserID='$userID' and date(dateandtime) like '%$date%' "); 
$sql->execute();
$sql->store_result();    
$sql->bind_result($step);
$sql->fetch();
// echo "$water";
$full = array();
$emparray = array();

  // $emparray['water'] = $row['drinkConsumed'];
  if($step < $goal){
    $required = $goal - $step;
    $sql= "delete from in_app_notifications where clientuserID = '$userID' and date(date) like '%$date%' and type = 'step';";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));
    $sql = "insert into in_app_notifications(clientuserID , date, text, type) values('$userID', '$dateandtime', 'step goal not completed, walk $required step more to complete', 'step')";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));
    
  }else{
    $sql= "delete from in_app_notifications where clientuserID = '$userID' and type='step'";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));
  }

?>