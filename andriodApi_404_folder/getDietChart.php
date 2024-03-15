<?php

require "connect.php";

$dietitian_id = $_POST['dietitian_id'];
$client_id = $_POST['client_id'];
$type = $_POST['type'];

if($type == '1'){
$query = "select * from diet_chart where client_id = $client_id AND dietitian_id=$dietitian_id;";
$result = $conn->query($query);
$row = $result->fetch_all(MYSQLI_ASSOC);
if(empty($row)){
	$response = array("status"=>"0","message"=>"Record is empty","data"=>$row);
}

else{
		$response = array("status"=>"1","message"=>"Record availabel","data"=>$row);
}
echo json_encode($response);
}

elseif($type == '2'){

    $List = implode(', ', $_POST['recipe_id']);
	$query = "SELECT drecipe_name FROM default_recipes WHERE drecipe_id IN ($List);";
	$result = $conn->query($query);
    $row = $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($row);
}

elseif($type == '3'){
	$List = implode(', ', $_POST['recipe_id']);
    $query = "SELECT drecipe_nutritional_information FROM default_recipes where drecipe_id IN ($List)";
    $result = $conn->query($query);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

else {
	echo "Invalid arguments";
}

?>