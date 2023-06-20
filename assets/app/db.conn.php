<?php 

$HOSTNAME = "localhost";
$USERNAME = "u991535966_root";
$PASSWORD = "q!A7BqWlB9v";
$DBNAME = "u991535966_infits";

$conn1 = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);

#creating database connection
try {
    $conn = new PDO("mysql:host=$HOSTNAME;dbname=$DBNAME", $USERNAME, $PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}