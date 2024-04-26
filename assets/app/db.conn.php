<?php 

$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "u991535966_shared_infits";

$conn1 = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);

#creating database connection
try {
    $conn = new PDO("mysql:zhost=$HOSTNAME;dbname=$DBNAME", $USERNAME, $PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}