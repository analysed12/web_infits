<?php

$clientuserID = $_POST['userID'];
require "connect.php"; 

    //$conn=mysqli_connect($server,$username,$password,$database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

function getArr($from,$to, $clientuserID, $conn)
{
    
    $sql = "select weight from weighttracker where clientuserID = '$clientuserID' and dateandtime between '$from' and '$to';";

        $result = mysqli_query($conn, $sql); //or die("Error in Selecting " . mysqli_error($connection));
        
            $emparray = array();
            $mon = array();
            while($row =mysqli_fetch_assoc($result))
            {
                
                $emparray['weight'] = $row['weight'];
                $full[] = $emparray;
                $mon[] = $row['weight'];

            }
            //echo json_encode($mon);
            
            $sig = 0;
            for ($i=0; $i < count($mon) ; $i++) { 
                $sig = $sig + $mon[$i];
            }
            return count($mon)!=0 ? $sig/count($mon) : "0";
}



$currentYear = date('Y');

// Initialize arrays to store the starting and ending dates
$from = array();
$to = array();

// Loop through the months of the current year
for ($month = 1; $month <= 12; $month++) {
    // Get the starting date of the current month
    $startingDate = date('Y-m-01', strtotime("$currentYear-$month-01"));
    $from[] = $startingDate;

    // Get the last day of the current month
    $endingDate = date('Y-m-t', strtotime("$currentYear-$month-01"));
    $to[] = $endingDate;
}




$avgArr = array();
for ($i=0; $i < 12 ; $i++) { 
    $avgArr['av'] = getArr($from[$i],$to[$i], $clientuserID, $conn);
    $avgArr['month'] = date("M",strtotime($from[$i]));
    $avgJson[] = $avgArr;
}
echo json_encode(['weight' => $avgJson]);
?>
