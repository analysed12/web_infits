<?php
function date_compare($a, $b)
{
    $t1 = $a['date'];
    $t2 = $b['date'];
    return $t2 - $t1;
}

require "connect.php";

$clientID=isset($_POST['client_id']) ? $_POST['client_id'] : null;
$dietitian_id=isset($_POST['dietitian_id']) ? $_POST['dietitian_id'] : null;
$dietitianuserID=isset($_POST['dietitianuserID']) ? $_POST['dietitianuserID'] : null;
$drinkConsumed=isset($_POST['drinkConsumed']) ? $_POST['drinkConsumed'] : null;
$clientuserID = isset($_POST['clientuserID']) ? $_POST['clientuserID'] : null;
$goal = isset($_POST['goal']) ? $_POST['goal'] : null;
$dateandtime = isset($_POST['dateandtime']) ? $_POST['dateandtime'] : null;
$type = isset($_POST['type']) ? $_POST['type'] : null;
$amount = isset($_POST['amount']) ? $_POST['amount'] : null;
$date = date("Y-m-d", strtotime($dateandtime));
$totalamount;
$stmt = $conn->prepare("SELECT SUM(amount) as amount FROM watertracker WHERE clientuserID = ? AND DATE(dateandtime) = ?");
$stmt->bind_param("ss", $clientuserID, $date);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the sum of 'amount' from the result set
    $row = $result->fetch_assoc();
    $totalAmount = $row['amount'];
    ;
}
$stmt->close();
$stmt = $conn->prepare("SELECT * FROM watertracker WHERE clientuserID = ? AND DATE(dateandtime) = ? AND type = ?");
$stmt->bind_param("sss", $clientuserID, $date, $type);
$stmt->execute();
$result = $stmt->get_result();
$numRows = $result->num_rows;
   


if (!$stmt->execute()) {
    // Handle query error
    echo "error";
} else
 {
    if ($numRows > 0)
    {
        
      
        $row = $result->fetch_assoc();
        $previousAmount = $row['amount'];
     
        // Calculate the new amount by adding the current drinkConsumed to the previous amount
        $newAmount = $previousAmount + $drinkConsumed;
        $stmt->close();
        $stmt_update = $conn->prepare("UPDATE watertracker SET amount=? WHERE clientuserID=? AND DATE(dateandtime)=? AND type=?");
        $stmt_update->bind_param("dsss", $newAmount, $clientuserID, $date, $type);
        $stmt_update->execute();
        //var_dump($newAmount,$clientuserID,$dateandtime,$type);
       // var_dump($totalAmount,$amount);
    if ($stmt_update->affected_rows>0) {
        header('Content-Type: application/json');
          echo json_encode(array("message" => "updated_amount", "amount" => $newAmount,"total"=>$totalAmount+$amount));
    } else {
        echo "error";
    }
        // Insert a new row if it doesn't exist
       
    } 
    
 else 
 {
 
     $stmt->close();
     $stmt_insert = $conn->prepare("INSERT INTO watertracker (client_id, clientuserID, dietitian_id, dietitianuserID, drinkConsumed, type, goal, amount, dateandtime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
     $stmt_insert->bind_param("isssssdss", $clientID, $clientuserID, $dietitian_id, $dietitianuserID, $drinkConsumed, $type, $goal, $amount, $date);
    
     if ($stmt_insert->execute()) {
         header('Content-Type: application/json');
         echo json_encode(array("message" => "inserted_liquid", "amount" => $amount,"total"=>$totalAmount+$amount));
     } else {
         echo "error";
     }
 }
   

    $sql = "SELECT SUM(amount) AS total_amount FROM watertracker WHERE clientuserID='$clientuserID' AND DATE(dateandtime) LIKE '%$date%'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $water = $row['total_amount'];

        if ($water < $goal) {
            $required = $goal - $water;
            $sql = "DELETE FROM in_app_notifications WHERE clientuserID = '$clientuserID' AND DATE(date) LIKE '%$date%' AND type = 'water'";
            mysqli_query($conn, $sql);
            $sql = "INSERT INTO in_app_notifications (clientuserID, date, text, type) VALUES ('$clientuserID', '$dateandtime', 'Water goal not completed, drink $required ml more to complete', 'water')";
            mysqli_query($conn, $sql);
        } else {
            $sql = "DELETE FROM in_app_notifications WHERE clientuserID = '$clientuserID' AND type='water'";
            mysqli_query($conn, $sql);
        }
    }
}

?>
