<?php
// error_reporting(0);
require('constant/config.php');
// print_r($_POST);
if (isset($_POST['saverecipe'])) {
    // echo "we are here !";
    global $conn;
    $data = json_encode($_POST);
    $data = json_decode($data, true);
    
    $client_id = $_POST['client_id'];
    $day = $_POST['day'];
    $course = $_POST['course'];
    $subcourse = $_POST['subcourse'];
    $dietitian_id = $_POST['dietitian_id'];
    $selectedRecipeIds = json_decode($data['selectedRecipeIds'],true);
    if(isset($_POST['dietchart_id']) && $_POST['dietchart_id']==='-1'){
        $sql = "INSERT INTO diet_chart(client_id,dietitian_id) VALUES ($client_id,$dietitian_id)";
        // echo "$sql";
        $result = $conn->query($sql);
        if (!($result)){
            echo $conn->error;
        }
        $sql = "SELECT MAX(dietchart_id) FROM diet_chart WHERE client_id=$client_id AND dietitian_id=$dietitian_id";
        // echo "$sql";

        $result = $conn->query($sql);
        if($result->num_rows>0){
            // echo "we are here also 2!";
            $row = mysqli_fetch_assoc($result);
            $dietchart_id = $row['MAX(dietchart_id)'];
        }
    }else{
        $dietchart_id = $_POST['dietchart_id'];
    }
    // echo $dietchart_id;
    $sql = "SELECT $day FROM diet_chart WHERE dietchart_id = $dietchart_id";
    // echo "$sql";

    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        // echo "we are here also 3!";
        $row = mysqli_fetch_assoc($result);
        $json = $row[$day];
        if($json != ""){
            // echo "we are here also 4!";
            $data = json_decode($json, true);
            if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
                die("Error decoding JSON: " . json_last_error_msg());
            }
        }else{
            $data = array();
            $data[$course][$subcourse] = array();
        }
        if(!isset($data[$course][$subcourse])){
            // echo "we are here also 5!";
            $data[$course][$subcourse] = array();
        }
        foreach($selectedRecipeIds as $id){
            array_push($data[$course][$subcourse],$id);
        }
        $result = json_encode($data);
        
        $sql = "UPDATE diet_chart SET $day = '$result' WHERE dietchart_id = $dietchart_id";
        // echo "$sql";

        if (!($conn->query($sql))) {
            echo $conn->error;
        }
    }
    else{
        $data = array();
        $data[$course][$subcourse] = array();
        foreach($selectedRecipeIds as $id){
            array_push($data[$course][$subcourse],$id);
        }
        $result = json_encode($data);
        $sql = "INSERT INTO diet_chart ($day,client_id,dietitian_id) VALUES('$result',$client_id,$dietitian_id) ";
        // echo "$sql";

        if (!($conn->query($sql))) {
            echo $conn->error;
        }   
        
    }
    echo $dietchart_id;
    exit;
}

?>