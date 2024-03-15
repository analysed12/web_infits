<?php

require "connect.php";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$clientuserID = $_POST['clientID'];
$from=$_POST['from'];
$to=$_POST['to'];

$from = date('Y-m-d', strtotime($from));
$to = date('Y-m-d', strtotime($to));

//$clientuserID = "dev";
//$from='2023-07-07';
//$to='2023-07-26';


$sql = "select steps,dateandtime FROM steptracker WHERE clientuserID = '$clientuserID' AND dateandtime between '$from' AND '$to';";

$result = mysqli_query($conn, $sql); //or die("Error in Selecting " . mysqli_error($connection));

    $emparray = array();
    $full = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray['steps'] = $row['steps'];
        $emparray['date'] = date("d",strtotime($row['dateandtime']));
        $full[] = $emparray;
    }
    echo json_encode(['steps' => $full]);
?>