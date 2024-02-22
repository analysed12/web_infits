2<?php 
require_once '../google-api/vendor/autoload.php';

$response = array();

$CLIENT_SERVER_ID = '503248337009-rpj1k0dcbds0jmqn5h9npldgdjce6pnq.apps.googleusercontent.com';

$server="localhost";
$username="root";
$password="";
$database = "infits";
// Create connection
$conn=mysqli_connect($server,$username,$password,$database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['email']) and isset($_POST['token'])){
        $client = new Google_Client(['client_id' => $CLIENT_SERVER_ID]); 
        $payload = $client->verifyIdToken($_POST['token']);
        if ($payload) {
            $verified_user_email = $payload['email'];
            if($verified_user_email != $_POST['email']){
                // $response['failure'] = false;
                // $response['message'] =  "Email verification failed.";
                echo "failure";
                exit;
            }else{
                $sql = "select * from client where email=?";

                $stmt = $conn->stmt_init();
                $stmt->prepare($sql);
                $stmt->bind_param("s",$verified_user_email);
                $stmt->execute();
                $stmt->bind_result($clientuserID,$password,$name,$location,$email,$mobile,$plan,$profilePhoto,$dietitianuserID,$gender,$age,$verification,$height,$weight);
                $result = $stmt->get_result();
                $resultArray = $result->fetch_assoc();

                if(mysqli_num_rows($result) > 0){
                    $imageName = $resultArray['clientuserID']."jpg";
	                $image = 'upload/'.$imageName;
	                $type = pathinfo($image, PATHINFO_EXTENSION);
                    if(file_exists($image) == false) {
                        $data = file_get_contents('upload/default.jpg');
                    } else {
                        $data = file_get_contents($image);
                    }
                    $products = array();
                    $temp = array();
                    $temp['clientuserID']= $resultArray['clientuserID'];
                    $temp['dietitianuserID']= $resultArray['dietitianuserID'];
                    $temp['name']= $resultArray['name'];
                    $temp['mobile']= $resultArray['mobile'];
                    $temp['password']= $resultArray['password'];
                    $temp['email']= $resultArray['email'];
                    $temp['profilePhoto']= base64_encode($data);
                    $temp['location']= $resultArray['location'];
                    $temp['age']= $resultArray['age'];
                    $temp['gender']= $resultArray['gender'];
                    $temp['plan'] = $resultArray['plan'];
                    $temp['verification'] = $resultArray['verification'];
                    $temp['height'] = $resultArray['height'];
                    $temp['weight'] = $resultArray['weight'];
                    array_push($products,$temp);
                    echo json_encode($products);
                }
            } 
        } else {
            // $response['failure'] = true;
            // $response['message'] = "Token verification failed.";
            echo "failure";
            exit;
        }
    }else{
        // $response['failure'] = true;
        // $response['message'] = "Required fields are missing.";
        echo "failure";
        exit;
    }
}
echo json_encode($response);
?>