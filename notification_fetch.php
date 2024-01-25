<?php
session_start();
require_once('constant/config.php');
// Query to fetch notifications
// $sql = "SELECT * FROM notification WHERE dietitianuserID = '".$_SESSION['dietitianuserID']."' ORDER BY dttmstmp DESC LIMIT 10";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['dietitianuserID'])) {
        
        // $sql = "SELECT * FROM notification WHERE dietitianuserID = 'infitsWebTeam' ORDER BY dttmstmp DESC LIMIT 1";
        $sql = "SELECT * FROM notification WHERE dietitianuserID = '".$_POST['dietitianuserID']."' ORDER BY dttmstmp DESC LIMIT 5";
        $result = $conn->query($sql);

        // Fetch data and store in an array
        $notifications = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $notifications[] = $row;
            }
            // echo($notifications);
            print_r(json_encode($notifications));
        }
    }
}
?>
