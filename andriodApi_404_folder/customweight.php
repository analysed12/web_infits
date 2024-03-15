<?php

require "connect.php";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$clientuserID = $_POST['clientuserID'];
$from=$_POST['from'];
$to=$_POST['to'];

//$clientuserID = "dev";
//$from='2023-07-07';
//$to='2023-07-26 ';


$sql = "SELECT * FROM `weighttracker` WHERE clientuserID = '$clientuserID'
AND dateandtime BETWEEN '$from' AND '$to'";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray['weight'] = $row['weight'];
        $emparray['date'] = date("d",strtotime($row['dateandtime']));
        $full[] = $emparray;
    }
    echo json_encode(['weight' => $full]);
?>