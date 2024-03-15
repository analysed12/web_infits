<?php

require "connect.php";

// Retrieve the breakfast item data from the request parameters or form input
$row_id = isset($_POST['row_id']) ? $_POST['row_id'] : "";
$mealchart_id = isset($_POST['mealchart_id']) ? $_POST['mealchart_id'] : "";
$client_id = isset($_POST['client_id']) ? $_POST['client_id'] : "";
$dietitian_id = isset($_POST['dietitian_id']) ? $_POST['dietitian_id'] : "";
$clientuserID = isset($_POST['clientuserID']) ? $_POST['clientuserID'] : "";
$dietitianuserID = isset($_POST['dietitianuserID']) ? $_POST['dietitianuserID'] : "";
$currentDay = isset($_POST['currentDay']) ? $_POST['currentDay'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$meal = isset($_POST['meal']) ? $_POST['meal'] : "";
$Calories = isset($_POST['Calories']) ? $_POST['Calories'] : "";
$carbs = isset($_POST['carbs']) ? $_POST['carbs'] : "";
$fiber = isset($_POST['fiber']) ? $_POST['fiber'] : "";
$protein = isset($_POST['protein']) ? $_POST['protein'] : "";
$fat = isset($_POST['fat']) ? $_POST['fat'] : "";
$position = isset($_POST['position']) ? $_POST['position'] : "";
$dateandtime = isset($_POST['dateandtime']) ? $_POST['dateandtime'] : null;
$image = isset($_POST['image']) ? $_POST['image'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";

if (empty($dateandtime)) {
  $dateandtime = date('Y-m-d H:i:s');
}
// $image = $_POST['image'];
// $image = 'img';


//$conn = new mysqli($server, $username, $password, $database);
function addMeal($conn, $row_id,$mealchart_id,$client_id,$dietitian_id,$clientuserID,$dietitianuserID,$currentDay,$name,$meal,$Calories,$carbs ,$fiber,$protein ,$fat,$position ,$dateandtime,$image,$description){
  
 
$stmt = $conn->prepare("INSERT INTO meal_tracker(row_id,mealchart_id,client_id, dietitian_id, clientuserID,dietitianuserID,currentDay,name,meal,Calories,carbs,fiber,protein,fat,position,dateandtime,image,description)
VALUES (?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?);");

if ($stmt) {
  $stmt->bind_param("iiiissssssiiiiisss", $row_id,$mealchart_id,$client_id,$dietitian_id,$clientuserID,$dietitianuserID,$currentDay,$name,$meal,$Calories,$carbs ,$fiber,$protein ,$fat,$position ,$dateandtime,$image,$description);
  $result = $stmt->execute();

  if ($result) {
      // Success
      echo "\nBreakfast item added successfully";
  } else {
      // Error
      echo "Failed to add breakfast item: " . $stmt->error;
  }

  $stmt->close();
} else {
  // Error preparing the statement
  echo "Failed to prepare the statement: " . $conn->error;
}

}
addMeal($conn, $row_id, $mealchart_id, $client_id, $dietitian_id, $clientuserID, $dietitianuserID, $currentDay, $name, $meal, $Calories, $carbs, $fiber, $protein, $fat, $position, $dateandtime, $image, $description);

$conn->close();

?>
