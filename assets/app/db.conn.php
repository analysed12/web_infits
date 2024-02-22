<?php 

$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "shared_db_infits";

$conn1 = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);

#creating database connection
try {
    $conn = new PDO("mysql:host=$HOSTNAME;dbname=$DBNAME", $USERNAME, $PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}