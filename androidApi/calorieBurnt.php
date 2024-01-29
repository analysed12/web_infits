<?php 
    // Database connection details
    require "connect.php";
    date_default_timezone_set("Asia/Calcutta");
    $today = date('Y-m-d H:i:s');
    
    $response = array(); // Initialize the response array

    $clientuserID = isset($_POST['clientuserID']) ? $_POST['clientuserID'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';

    
    switch ($_POST['for']) {
        case 'day':
            $from = date('Y-m-d 00:00:00', strtotime("-0 days", strtotime($today)));
            $stmnt = $conn->prepare("SELECT activity_name, calorie_burnt, duration, dateandtime FROM `calorie_burnt` WHERE `clientuserID` LIKE ? AND `dateandtime` BETWEEN ? AND ?");
            $stmnt->bind_param("sss", $clientuserID, $from, $today);
            break;
        case 'week':
            $from1 = date('Y-m-d 00:00:00', strtotime("-7 days", strtotime($today)));
            $stmnt = $conn->prepare("SELECT activity_name, calorie_burnt, duration, dateandtime FROM `calorie_burnt` WHERE `clientuserID` LIKE ? AND `dateandtime` BETWEEN ? AND ? ORDER BY `calorie_burnt`.`dateandtime` DESC");
            $stmnt->bind_param("sss", $clientuserID, $from1, $today);
            break;
        case 'month':
            $from2 = date('Y-m-d 00:00:00', strtotime("-30 days", strtotime($today)));
            $stmnt = $conn->prepare("SELECT activity_name, calorie_burnt, duration, dateandtime FROM `calorie_burnt` WHERE `clientuserID` LIKE ? AND `dateandtime` BETWEEN ? AND ? ORDER BY `dateandtime` DESC");
            $stmnt->bind_param("sss", $clientuserID, $from2, $today);
            break;
        default:
            $response['error'] = true;
            $response['message'] = "for value not provided";
            break;
    }
    
    if (isset($stmnt)) {
        if (!$stmnt->execute()) {
            // If there's an error, you can print the error message for debugging
            die('Error executing query: ' . $stmnt->error);
        }
        if ($stmnt->execute()) {
            $response['error'] = false;
            $response['message'] = "Values entered successfully";
            $result = $stmnt->get_result();
            $data = array();
           
            // Loop through all rows in the result set and add the data to the array
            while ($temp = $result->fetch_assoc()) {
               
                $data[] = $temp;
               
            }
          
            // Calculate total calories burnt
            $totalcalorieburnt = array_sum(array_column($data, 'calorie_burnt'));

            // Add the data array and total calorie burnt to the response
            $response['data'] = $data;
            $response['totalcalorieburnt'] = $totalcalorieburnt;
        } else {
            $response['error'] = true;
            $response['message'] = "Values not entered";
        }
    }

    // Set headers and encode the response array as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
?>
