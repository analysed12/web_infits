<?php 
require "connect.php";

$error = false;
if (empty($_POST["userID"]) || empty($_POST["password"])) {
   // echo $_POST["userID"];
  
    $error = true;
}
$stat=array("Status");
$cases=array("Failure","Success");
$updt=array();
$products=array();
if ($error) {
 
  $updt = array("Status"=>$cases[0]);
  //echo json_encode($updt);
  array_push($products,$updt);
  echo json_encode($products);
} else {
  $updt = array("Status"=>$cases[1]);
  //echo json_encode($updt1);    
  $user_name = $_POST["userID"];
  $user_pass = $_POST["password"];

    $sql = "select * from client where clientuserID=? and password=?";

    $stmt = $conn->stmt_init();
    
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $user_name,$user_pass);
    $stmt->execute();
    $stmt->bind_result($clientID,$clientuserID, $password, $name, $location, $email, $mobile, $plan, $profilePhoto,$p_p, $dietitian_id,$dietitianuserID, $gender, $age, $verification,$verification_code, $height, $weight,$last_seen,$referred_clientID);
    $result = $stmt->get_result();
    $resultArray = $result->fetch_assoc();
    
    if(mysqli_num_rows($result) > 0) {
 
  //  
      // $imageName = $_POST[''];
      $imageName = "$user_name.jpeg";
      $image = 'upload/'.$imageName;
      $type = pathinfo($image, PATHINFO_EXTENSION);
      if (file_exists($image) == false) {
        $data = file_get_contents("C:/xampp/htdocs/infits/upload/default.jpg");
      } else {
        $data = file_get_contents($image);
      }
  
    
      //$products = array();
      $temp = array();

      $temp['client_id']= $resultArray['client_id'];
      $temp['clientuserID']= $resultArray['clientuserID'];
      $temp['dietitian_id']= $resultArray['dietitian_id'];
      $temp['dietitianuserID']= $resultArray['dietitianuserID'];
      $temp['name']= $resultArray['name'];
      $temp['mobile']= $resultArray['mobile'];
      $temp['password']= $resultArray['password'];
      $temp['email']= $resultArray['email'];
      $temp['location']= $resultArray['location'];
      $temp['age']= $resultArray['age'];
      $temp['gender']= $resultArray['gender'];
      $temp['plan'] = $resultArray['plan'];
      $temp['verification'] = $resultArray['verification'];
      $temp['verification_code'] = $resultArray['verification_code'];
      $temp['height'] = $resultArray['height'];
      $temp['weight'] = $resultArray['weight'];
      $temp['p_p'] = $resultArray['p_p'];
      $temp['profilePhoto']= base64_encode($data);
      
      array_push($products,$updt);
      array_push($products,$temp);

    echo json_encode($products);
    }
    else {
    echo "failure";
    }    
    
}
?>