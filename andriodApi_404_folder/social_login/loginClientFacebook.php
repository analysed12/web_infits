<?php 
use Facebook\Facebook;
require_once '../fb-login-sdk/vendor/autoload.php';

$response = array();

$facebook_app_id = '512089207734380';
$app_access_token = 'FTWIuMJBFSYIPua5U6UdfuNUmSc';
$app_secret_token = '243a29d0c48cde436a4f39f6695154d4';

$server="127.0.0.1:3306";
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
        $fb = new Facebook(array(
            'app_id'  => $facebook_app_id,
            'app_secret' => $app_secret_token,
        ));
        try {
            $res = $fb->get('/me?locale=en_US&fields=name,email', $_POST['token']);
            $me = $res->getGraphUser();
            if($me === null or $me->getField('email') != $_POST['email']){
                // $response['failure'] = true;
                // $response['message'] = "token verification failed";
                echo "failure";
                exit;
            }else{
                $verified_user_email = $me->getField('email');

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
                }else{
                    // $response['failure'] = true;
                    // $response['message'] = "User with given account email does not exist";
                    echo "failure";
                    exit;
                }
            }
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            // $response['failure'] = true;
            // $response['message'] = $e->getMessage();
            echo "failure";
            exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            // $response['failure'] = true;
            // $response['message'] = $e->getMessage();
            echo "failure";
            exit;
        }
    }else{
        // $response['failure'] = true;
        // $response['message'] = "Required fields missing.";
        echo "failure";
        exit;
    }
}
echo json_encode($response);
?>