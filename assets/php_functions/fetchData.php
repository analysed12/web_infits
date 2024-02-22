<?php

function fetchData($query){
    // require_once('../app/db.conn.php');      
    global $conn;
    if($conn->connect_error){
        die("Connection failed :" . $conn->connect_error);
    }
    
    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] =  $row;
    }

    return ($data);
}

?>