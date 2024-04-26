<?php 
$HOSTNAME = "localhost";
$USERNAME = "u991535966_shared_infits";
$PASSWORD = "Teaminfits@123";
$DBNAME = "u991535966_shared_infits";

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
