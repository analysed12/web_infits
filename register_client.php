<?php

$conn = new mysqli("www.db4free.net", "infits_free_test", "EH6.mqRb9QBdY.U","infits_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email = $_POST['email'];
$password = $_POST['password'];
$userID = $_POST['userID'];
$name = $_POST['name'];
$mobile = $_POST['phone'];
$age = $_POST['age'];
$gender=$_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$verification = $_POST['verification'];
$dietitian_id = $_POST['dietitian_id'];
$dietitianuserID = $_POST['dietitianuserID'];
$sql = "insert into client (clientuserID,password,name,email,mobile,dietitian_id,dietitianuserID,gender,age,verification,height,weight) VALUES ('$userID','$password',
	'$name','$email','$mobile','$dietitian_id','$dietitianuserID','$gender','$age','$verification','$weight','$height');";
    try {
        if($conn->query($sql)){
            echo "success";
        }
    } catch (mysqli_sql_exception $th) {
        echo $th;
    }
