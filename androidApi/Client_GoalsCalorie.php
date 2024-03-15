<?php
$server = "localhost";
$username = "u991535966_shared_infits";
$password = "Teaminfits@123";
$database = "u991535966_shared_infits";
$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$client_id = $_POST['client_id'];
$clientuserID = $_POST['clientuserID'];
$dietitian_id = $_POST['dietitian_id'];
$dietitianuserID=$_POST['dietitianuserID'];
$calorieConsumeGoal=$_POST['calorieConsumeGoal'];
$calorieBurnGoal=$_POST['calorieBurnGoal'];
$carbsGoal=$_POST['carbsGoal'];
$fatGoal=$_POST['fatGoal'];
$proteinGoal=$_POST['proteinGoal'];
$fiberGoal=$_POST['fiberGoal'];
$calorieConsumed=$_POST['calorieConsumed'];
$dateandtime=$_POST['dateandtime'];
$operationToDo=$_POST['operationToDo'];

// echo $dietitianuserID;

// $clientuserID = 'test';
// $dietitianuserID='test123';
// $carbs=15;
// $calorieConsumed=55;
// $calorieBurnt=55;
// $fats=55;
// $protein=25;
// $fiber=35;
// $operationToDo="get";
if($operationToDo=="add"){
          Add_Goals($client_id,$clientuserID,$dietitian_id,$dietitianuserID,$calorieConsumed,$calorieConsumeGoal,$calorieBurnGoal,$carbsGoal,$fiberGoal,$proteinGoal,$fatGoal,$dateandtime,$conn);
}
else if($operationToDo=="get"){
    Get_Goals($clientuserID,$conn);

}
else if($operationToDo=="update"){
    UpdateData($client_id,$clientuserID,$dietitian_id,$dietitianuserID,$calorieConsumed,$calorieConsumeGoal,$calorieBurnGoal,$carbsGoal,$fiberGoal,$proteinGoal,$fatGoal,$dateandtime,$conn);

}
function Add_Goals($client_id,$clientuserID,$dietitian_id,$dietitianuserID,$calorieConsumed,$calorieConsumeGoal,$calorieBurnGoal,$carbs,$fiberGoal,$proteinGoal,$fatGoal,$dateandtime,$conn){
          $sql="INSERT INTO 
          `calorietracker`(`client_id`, `clientuserID`, `dietitian_id`, `dietitianuserID`,`caloriesConsumed`, `calorieConsumeGoal`, `calorieBurnGoal`, `carbsGoal`, `fiberGoal`, `proteinGoal`, `fatGoal`,`dateandtime`) 
          VALUES ('$client_id','$clientuserID','$dietitian_id','$dietitianuserID','$calorieConsumed','$calorieConsumeGoal','$calorieBurnGoal','$carbs','$fiberGoal','$proteinGoal','$fatGoal','$dateandtime')";
          if (mysqli_query($conn,$sql)) {
                    echo "Add success";
          }
          else{
                    echo "Add failed";
          }
}
function Get_Goals($clientuserID,$conn){
          $sql = "select * from calorietracker where clientuserID = '$clientuserID'";
          $result=mysqli_query($conn,$sql);
          $empArray = array();
        //   $msgArray=array();
          $responseArray = array();
          while($row =mysqli_fetch_assoc($result))
          {
              $empArray['clientuserID'] = $row['clientuserID'];
              $empArray['dietitianuserID'] = $row['dietitianuserID'];
              $empArray['calorieConsumeGoal']=$row['calorieConsumeGoal'];
              $empArray['calorieBurnGoal']=$row['calorieBurnGoal'];
              $empArray['CarbsGoal'] = $row['carbsGoal'];
              $empArray['fatGoal'] = $row['fatGoal'];
              $empArray['Protein'] = $row['proteinGoal'];
              $empArray['Fiber'] = $row['fiberGoal'];
              
          }
          if(empty($empArray)){
                    $responseArray['message']="values does exist";     
                    // $responseArray['values']=$empArray;
                    echo json_encode(['Goals' => $responseArray]); 
          }
          else{
                    $responseArray['message']="values  exist";   
                    // $responseArray['message']=$msgArray;  
                    $responseArray['values']=$empArray;
                    echo json_encode(['Goals' => $responseArray]);
          }          
}
function UpdateData($client_id,$clientuserID,$dietitian_id,$dietitianuserID,$calorieConsumed,$calorieConsumeGoal,$calorieBurnGoal,$carbsGoal,$fiberGoal,$proteinGoal,$fatGoal,$dateandtime,$conn){
          $sql1="UPDATE `calorietracker` SET 
          `caloriesConsumed`='$calorieConsumed',`calorieBurnGoal`='$calorieBurnGoal',
          `carbsGoal`='$carbsGoal',`fatGoal`='$fatGoal',`proteinGoal`='$proteinGoal',`fiberGoal`='$fiberGoal' 
          WHERE clientuserID = '$clientuserID' AND dateandtime = '$dateandtime'";
          if (mysqli_query($conn,$sql1)) {
                    echo "Update success";
          }
          else{
                    echo "Update failed";
          }
}
?>