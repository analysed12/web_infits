<?php
require "connect.php";

$clientID=isset($_POST['client_id']) ? $_POST['client_id'] : null;
$dietitian_id=isset($_POST['dietitian_id']) ? $_POST['dietitian_id'] : null;
$dietitianuserID=isset($_POST['dietitianuserID']) ? $_POST['dietitianuserID'] : null;
$drinkConsumed=isset($_POST['drinkConsumed']) ? $_POST['drinkConsumed'] : null;
$userID = isset($_POST['clientuserID']) ? $_POST['clientuserID'] : null;
$goal = isset($_POST['goal']) ? $_POST['goal'] : null;
$dateandtime = isset($_POST['dateandtime']) ? $_POST['dateandtime'] : null;
$type = isset($_POST['type']) ? $_POST['type'] : null;
$amount = isset($_POST['amount']) ? $_POST['amount'] : null;
$date = date("Y-m-d H:i:s", strtotime($dateandtime));
// Check if the connection is successful
if ($conn === false) {
  die("Error: Connection failed. " . mysqli_connect_error());
}

// Convert the $dateandtime to the correct format (YYYY-MM-DD HH:MM:SS)
$date = date("Y-m-d", strtotime($dateandtime));

// Prepare the SELECT query to check if the row exists in watertracker table
$stmt = $conn->prepare("SELECT goal FROM watertracker WHERE DATE(dateandtime) = ? AND clientuserID = ?");
$stmt->bind_param("ss", $date, $userID);
$stmt->execute();
// Debugging: Check for any errors during the execution of the prepared statement
if (!$stmt->execute()) {
    die("Error executing the SELECT query: " . $stmt->error);
}

$stmt->store_result();

// Debugging: Print the number of rows returned
//var_dump($stmt->num_rows());

if ($stmt->num_rows() > 0) {
    // If the row exists, update the existing row with the new values
    $stmt->bind_result( $current_goal);
    $stmt->fetch();

    // Compare the current goal with the new goal. If they are different, update the goal.
    if ($current_goal != $goal)
     {
        
    // $stmt->close();
        $stmt = $conn->prepare("UPDATE watertracker SET goal=? WHERE clientuserID = ? AND DATE(dateandtime)= ?");
       
        $stmt->bind_param("dss", $goal, $userID, $date);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
          header('Content-Type: application/json');
          echo json_encode(array("message" => "updated_water_goal", "goal" => $goal));
        } else {
            echo "No rows updated.";
        }
    } else {
        echo "Goal is already up to date.";
    }
}
else {
  //If the row does not exist, insert a new row
 $stmt->close();
 $stmt = $conn->prepare("INSERT INTO watertracker (client_id, clientuserID, dietitian_id, dietitianuserID, drinkConsumed, type, goal, amount, dateandtime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param("isssssdss", $clientID, $userID, $dietitian_id, $dietitianuserID, $drinkConsumed, $type, $goal, $amount, $date);
 $stmt->execute();
 if ($stmt->affected_rows > 0) {
   echo json_encode(array("message" => "Inserted new row", "goal" => $goal));
 } else {
    echo "Error inserting data.";
 }
}



// Calculate the total water consumed for the given date
$sql = $conn->prepare("SELECT SUM(amount) FROM watertracker WHERE clientuserID = ? AND date(dateandtime) LIKE ?");
$sql->bind_param("ss", $userID, $date);
$sql->execute();
$sql->store_result();
$sql->bind_result($water);
$sql->fetch();

if ($water < $goal) {
  // If the water consumed is less than the goal, create an in-app notification
  $required = $goal - $water;
  $sql = "DELETE FROM in_app_notifications WHERE clientuserID = ? AND date(date) LIKE ? AND type = 'water'";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $userID, $date);
  $stmt->execute();

  $sql = "INSERT INTO in_app_notifications (clientuserID, date, text, type) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $errorMsg = "Water goal not completed, drink $required ml more to complete";
  $notificationType = "water";
  $stmt->bind_param("ssss", $userID, $dateandtime, $errorMsg, $notificationType);
  $stmt->execute();
} else {
  // If the water consumed is equal to or greater than the goal, delete any existing water-related notifications
  $sql = "DELETE FROM in_app_notifications WHERE clientuserID = ? AND type = 'water'";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $userID);
  $stmt->execute();
}

$conn->close();
?>
