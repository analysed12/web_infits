<?php 
$HOSTNAME = "www.db4free.net";
$USERNAME = "infits_free_test";
$PASSWORD = "EH6.mqRb9QBdY.U";
$DBNAME = "infits_db";

$conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);


if($conn->connect_error){
    die("Connection failed :" . $conn->connect_error);
}
if (!function_exists('runQuery')) {
    function runQuery($query){
        global $conn;
        $result = $conn->query($query);
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] =  $row;
        }
        $conn->close();
        return ($data);
    }
}
?>