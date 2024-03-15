<?php

require "connect.php";
// Create connection
$conn=mysqli_connect($server,$username,$password,$database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$question = $_POST['question'];
$question = json_decode($question, TRUE);

$answer = $_POST['answer'];
$answer = json_decode($answer, TRUE);

$userID = $_POST['userID'];
$name = $_POST['name'];

//$tablename = $_POST['tablename'];

// $question = array("Q1", "Q2", "Q3");
// $answer = array("A1", "A2", "A3");

$sql = "select * from client_consultation where clientuserID='$userID'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    for($i = 0; $i < count($question); $i++) {

        $sql = "insert into client_consultation VALUES ('$userID','$name','$question[$i]','$answer[$i]');";
    
        try {
            if($conn->query($sql)){
                echo "success";
            }
        } catch (mysqli_sql_exception $th) {
            echo $th;
        }
    
    }
}
else{
    for($i = 0; $i < count($question); $i++) {

        $sql = "update client_consultation set answers = '$answer[$i]' where question = '$question[$i]' and clientuserID = '$userID'";
    
        try {
            if($conn->query($sql)){
                echo "success";
            }
        } catch (mysqli_sql_exception $th) {
            echo $th;
        }
    
    }
}    
?>