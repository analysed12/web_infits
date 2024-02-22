<?php

$conn = new mysqli("localhost", "u991535966_shared_infits", "Teaminfits@123","u991535966_shared_infits");
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

//for referral 
$clientID = $_POST['userID'];
$referralCode = $_POST['referralCode'];
$activeUsers = $_POST['activeUsers'];

    $sql = "
    INSERT INTO client (clientuserID,password,name,email,mobile,dietitian_id,dietitianuserID,gender,age,verification,height,weight) VALUES ('$userID','$password',
	'$name','$email','$mobile','$dietitian_id','$dietitianuserID','$gender','$age','$verification','$weight','$height');
    INSERT INTO `referral_table`(`clientuserID`, `referralCode`, `activeUsers`) VALUES ('$clientID','$referralCode','$activeUsers');";
    
    $result = $conn->multi_query($sql) or die("Error in Selecting " . mysqli_error($conn));
    if($result){
        echo "success";
    }
    