<?php

$server="127.0.0.1:3307";
$username="root";
$password="";
$database = "infits";
// Create connection
$conn=mysqli_connect($server,$username,$password,$database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $userID = $_POST['userID'];
$userID = 'Azarudeen';

$from = date('2011-06-01');

$to = date('Y-m-d');

// echo $from." ".$to;

$sql = "select weight from weighttracker where clientID='$userID' and date between '$from' and '$to'";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
      // $emparray['date'] = date("d",strtotime($row['date']));
      $emparray['steps'] = $row['weight'];
      $full[] = $emparray;
    }
    echo json_encode(['steps' => $full]);

// $period = new DatePeriod(
//     new DateTime('2011-10-01'),
//     new DateInterval('P1D'),
//     new DateTime('2013-10-05')
// );

// foreach ($period as $key => $value) {
//     echo " ".$value->format('Y-m-d')." ";
// }

?>