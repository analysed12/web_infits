<?php

require "connect.php";

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dietitian_verify_code = $_POST['dietitian_verify_code'];
$type = $_POST['type'];

if($type == '1'){
$sql = "select * from dietitian where verification_code = '$dietitian_verify_code'";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

$sql2 = "select dietitian_id,dietitianuserID,name,verification_code from dietitian where verification_code = '$dietitian_verify_code'";
$result2 = mysqli_query($conn, $sql2);

if(mysqli_num_rows($result) == 0) {
    echo "not found";
} else {
    echo "found";
}
}elseif($type == '2'){
    $query = "select name,age,gender,email,mobile,p_p from dietitian where verification_code = '$dietitian_verify_code'";
    $result = $conn->query($query);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    if(empty($row)){
        $response = array("status"=>"0","message"=>"Record is empty","data"=>$row);
    }
    
    else{
            $response = array("status"=>"1","message"=>"Record availabel","data"=>$row);
    }
    echo json_encode($response);
}else {
    echo 'Invalid arguments';
}

?>