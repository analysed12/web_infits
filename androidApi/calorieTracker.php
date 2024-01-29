<?php

require "connect.php";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set("Asia/Calcutta");
//$today = date('y-m-d h:i:s a', time());
//$today = date('Y-m-d H:i:s a',time());
$today = $_POST['today'];
//$from1=$_POST['from1'];
$from1 = date('Y-m-d 00:00:00', strtotime('-0 days', strtotime($today)));

$date = date('y-m-d h:i:s a', time());
$from = date('Y-m-d 00:00:00', strtotime('-0 days', strtotime($date)));

$clientuserID = $_POST['clientID'];
// $clientuserID = 'dev';


$sql = "select sum(Calories),sum(carbs),sum(fiber),sum(protein),sum(fat) from meal_tracker where clientuserID = '$clientuserID' and dateandtime between '$from' and '$today'";

$sql1 = "select calorieConsumeGoal,calorieBurnGoal,carbsGoal,fiberGoal,proteinGoal,fatGoal from calorietracker where clientuserID = '$clientuserID'";

$sql2 = "select sum(calorie_burnt) from calorie_burnt where clientuserid = '$clientuserID' and dateandtime between '$from1' and '$today' ";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

//$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($connection));

$result2 = mysqli_query($conn, $sql2) or die("Error in Selecting " . mysqli_error($connection));
$result3 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($connection));
$empArray1 = array();
$responseArray = array();
while($row =mysqli_fetch_assoc($result3))
{
    $empArray1['CalorieConsumeGoal']=$row['calorieConsumeGoal'];
    $empArray1['CalorieBurnGoal']=$row['calorieBurnGoal'];
    $empArray1['CarbsGoal'] = $row['carbsGoal'];
    $empArray1['FatsGoal'] = $row['fatGoal'];
    $empArray1['ProteinGoal'] = $row['proteinGoal'];
    $empArray1['FiberGoal'] = $row['fiberGoal']; 
}
$responseArray["Goals"]=$empArray1;

$calorieBurnt=mysqli_fetch_assoc($result2);
if($calorieBurnt['sum(calorie_burnt)']==null){
  $calorieBurnt['sum(calorie_burnt)']="0";
}
$responseArray["CalorieBurnt"]=$calorieBurnt['sum(calorie_burnt)'];



// echo implode("",$calorieBurnt);

$emparray = array();

$full=array();
while($row =mysqli_fetch_assoc($result))
{
  // echo implode('',$row);
          if($row['sum(Calories)']==null){
            $row['sum(Calories)'] = "0";
          }
          $emparray['Calories'] = $row['sum(Calories)'];
       


          if($row['sum(carbs)']==null){
            $row['sum(carbs)'] = "0";
          }
          $emparray['carbs'] = $row['sum(carbs)'];
          


          if($row['sum(fiber)']==null){
            $row['sum(fiber)'] = "0";
          }
          $emparray['fiber'] = $row['sum(fiber)'];

          
          if($row['sum(protein)']==null){
            $row['sum(protein)'] = "0";
          }
          $emparray['protein'] = $row['sum(protein)'];


          if($row['sum(fat)']==null){
            $row['sum(fat)'] = "0";
          }
          $emparray['fat'] = $row['sum(fat)'];

}
header('Content-Type: application/json');
$responseArray["Values"]=$emparray;
echo json_encode(['Data' => $responseArray]);
