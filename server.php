<?php

session_start();

// initializing variables
$name = "";
$email = "";
$errors = array();

include "constant/config.php";
include "constant/constant.php";
global $conn;
function generateCode()
{
    $random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 10);
    return $random;
}
function generateReferralCode($fullName)
{
    $letters = substr(strtoupper(preg_replace("/[^A-Za-z]/", '', $fullName)), 0, 3);
    $randomNumber = str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
    $referralCode = $letters . $randomNumber;
    return $referralCode;
}

function getRandomCodes($fullName)
{
    global $conn;

    do {
        $code = generateCode();
        $referralCode = generateReferralCode($fullName);
        $sql = "SELECT * FROM dietitian WHERE verification_code = '$code' AND referral_code='$referralCode'";
        $res = $conn->query($sql);
    } while ($res->num_rows > 0);

    return array('verification_code' => $code, 'referral_code' => $referralCode);
}

if (isset($_SESSION['login_id'])) {
    header('Location:  index.php');  // index_head.php - index.php
    exit;
}
require 'vendor/autoload.php';
// Creating new google client instance
$client = new Google_Client();
// Enter your Client ID
$client->setClientId('3315662633-6joqrjkcqimq2ms96p4ls8ie96e5liq1.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
if (basename($_SERVER['PHP_SELF']) == 'register') {
    $client->setRedirectUri($DEFAULT_PATH . 'register.php');
} else {
    $client->setRedirectUri($DEFAULT_PATH . 'login.php'); // login.php
}
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) :
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token["error"])) {
        $client->setAccessToken($token['access_token']);
        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        $id = mysqli_real_escape_string($conn, $google_account_info->id);
        $full_name = mysqli_real_escape_string($conn, trim($google_account_info->name));
        $email = mysqli_real_escape_string($conn, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($conn, $google_account_info->picture);
        // checking user already exists or not
        $get_user = mysqli_query($conn, "SELECT * FROM `dietitian` WHERE `dietitianuserID`='$id'");
        $row = mysqli_fetch_assoc($get_user);
        if (mysqli_num_rows($get_user) > 0) {
            $_SESSION['login_id'] = $id;
            $_SESSION['dietitianuserID'] = $row['dietitianuserID'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['dietitian_id'] = $row['dietitian_id'];
            header('Location:  index.php');
            exit;
        } else {
            $randomCodes = getRandomCodes($full_name);
            $verification_code = $randomCodes['verification_code'];
            $referral = $randomCodes['referral_code'];
            // if user not exists we will insert the user
            $query = "INSERT INTO `dietitian`(`dietitianuserID`,`name`,`email`,`p_p`,`socialLogin`,`verification_code`,`referral_code`) VALUES('$id','$full_name','$email','$profile_pic',1,'$verification_code','$referral')";
            $insert = mysqli_query($conn, $query);
            if ($insert) {
                $fetch = mysqli_query($conn, "SELECT * FROM `dietitian` WHERE dietitianuserID = '$id'");
                $dietitian_id = mysqli_fetch_assoc($fetch)['dietitian_id'];
                $fetch1 = mysqli_query($conn, "INSERT INTO `notification_show_status`( `dietitian_id`, `dietitianuserID`, `show_all_notifications`, `show_client_updates`, `show_consultation_reminders`, `show_appointments`, `show_live_notifications`, `show_new_messages`, `show_payment_notifications`, `show_client_calls`) VALUES ('$dietitian_id','$id',1,1,1,1,1,1,1,1)");
                $_SESSION['login_id'] = $id;
                $_SESSION['dietitianuserID'] = $id;
                $_SESSION['name'] = $full_name;
                $_SESSION['dietitian_id'] = $dietitian_id;
                header('Location:  index.php');
                exit;
            } else {
                echo "Sign up failed!(Something went wrong).";
            }
        }
    } else {

        header('Location:  login.php'); // login.php
        exit;
    }
else :
// Google Login Url = $client->createAuthUrl(); 
endif;

/* -------------------------- Beginning of Facebook login code section --------------------------*/


// include the Facebook PHP SDK
// require_once './Facebook/autoload.php';

// // initialize the Facebook PHP SDK with your app ID and app secret
// $fb = new Facebook\Facebook([
//   'app_id' => '913030780033033',
//   'app_secret' => '013a40fae42256502caecceab5aa138e',
//   'default_graph_version' => 'v10.0',
// ]);

// // define the Facebook login function
// function fbLogin() {
//   global $fb;
//   $helper = $fb->getRedirectLoginHelper();
//   $loginUrl = $helper->getLoginUrl('http://localhost/Infits_Web_App/', ['email', 'public_profile']);
//   header('Location:  ' . $loginUrl);
// }

// // define the callback function
// function fbCallback() {
//   global $fb;
//   $helper = $fb->getRedirectLoginHelper();
//   try {
//     $accessToken = $helper->getAccessToken();
//     $response = $fb->get('/me?fields=id,name,email', $accessToken);
//     $userNode = $response->getGraphUser();
//     $facebook_id = $userNode->getId();
//     $name = $userNode->getName();
//     $email = $userNode->getEmail();

//     // Check if User Already Exists in Database
// 		$query = "SELECT * FROM dietitian WHERE dietitianuserID = '$facebook_id';";
// 		$result = $conn->query($query);
// 		if ($result->num_rows > 0) {
//       $_SESSION['dietitianuserID'] = $row['dietitianuserID'];
//       $_SESSION['name'] = $row['name'];
//       $_SESSION['dietitian_id'] = $row['dietitian_id'];
// 		} else {
// 			// User does not exist, insert new record into database
// 			$query = "INSERT INTO dietitian (dietitianuserID, name, email) VALUES ('$facebook_id', '$name', '$email')";
// 			mysqli_query($conn, $query);
// $insertedDietitianId = mysqli_insert_id($conn); // This gets the auto-generated dietitian_id
// $insertedDietitianUserId = $facebook_id;

// // Insert the values into the notification_show_status table
// $insertNotificationStatusQuery = "INSERT INTO notification_show_status (
//     dietitian_id,
//     dietitianuserID,
//     show_all_notifications,
//     show_client_updates,
//     show_consultation_reminders,
//     show_appointments,
//     show_live_notifications,
//     show_new_messages,
//     show_payment_notifications,
//     show_client_calls
// ) VALUES (
//     '$insertedDietitianId',
//     '$insertedDietitianUserId',
//     1,  // You can set default values for notification preferences here
//     1,
//     1,
//     1,
//     1,
//     1,
//     1,
//     1
// )";

// mysqli_query($conn, $insertNotificationStatusQuery);
// 		}
// 		// Redirect User to Dashboard
// 		header('Location:  index.php');
// 		exit();
//   } catch(Facebook\Exceptions\FacebookResponseException $e) {
//     echo 'Graph returned an error: ' . $e->getMessage();
//     exit;
//   } catch(Facebook\Exceptions\FacebookSDKException $e) {
//     echo 'Facebook SDK returned an error: ' . $e->getMessage();
//     exit;
//   }
// }

// check if the user is already logged in
// if (isset($_SESSION['user_id'])) {
//   // redirect the user to the home page
//   header('Location:  index.php');
//   exit;
// }

// // check if the callback URL is called
// if (isset($_GET['code'])) {
//   // call the callback function
//   fbCallback();
// }

// // check if the login button is clicked
// if (isset($_POST['login'])) {
//   // call the Facebook login function
//   fbLogin();
// }

/* -------------------------- End of Facebook login code section --------------------------*/


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $dietitianuserID = mysqli_real_escape_string($conn, $_POST['dietitianuserID']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $password_3 = mysqli_real_escape_string($conn, $_POST['password_3']);
    $referral = mysqli_real_escape_string($conn, $_POST['referral_code']);
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($dietitianuserID)) {
        array_push($errors, "Username is required");
    }
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($mobile)) {
        array_push($errors, "Phone Number is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (!empty($password_2)) {
        if ($password != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    } else if (!empty($password_3)) {
        if ($password != $password_3) {
        array_push($errors, "The two passwords do not match");
    }
    }
    
    

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM dietitian WHERE dietitianuserID='$dietitianuserID' OR email='$email' OR mobile='$mobile' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['dietitianuserID'] === $dietitianuserID) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
        if ($user['mobile'] === $mobile) {
            array_push($errors, "Phone number already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {

        // $sql_2 = "SELECT dietitian_id, dietitianuserID, referral_users FROM dietitian where referral_code = '$referral'"
        // $temp = mysqli_query($conn, $sql_2);
        // $temp_user = mysqli_fetch_assoc($temp);
        // $prepare = json_encode(array("{$temp_user['dietitian_id']}"=>"{$temp_user['dietitianuserID']}"));
        //	$password = md5($);//encrypt the password before saving in the database
        $randomCodes = getRandomCodes($name);
        $verification_code = $randomCodes['verification_code'];
        $referral = $randomCodes['referral_code'];
        $query = "INSERT INTO dietitian (`dietitianuserID`, `name`, `email`, `mobile`, `password`,`verification_code`,`referral_code`) 
  			  VALUES('$dietitianuserID','$name', '$email', '$mobile', '$hash','$verification_code','$referral')";
        mysqli_query($conn, $query);
        $fetchNewDietitian = mysqli_query($conn, "SELECT `dietitian_id`, `dietitianuserID` FROM `dietitian` WHERE `dietitianuserID` = '$dietitianuserID'");
        $newDietitianData = mysqli_fetch_assoc($fetchNewDietitian);
        $newDietitianID = $newDietitianData['dietitian_id'];
        $newDietitianUserID = $newDietitianData['dietitianuserID'];
        $insertNotificationStatusQuery = "INSERT INTO `notification_show_status` (
            `dietitian_id`, 
            `dietitianuserID`, 
            `show_all_notifications`, 
            `show_client_updates`, 
            `show_consultation_reminders`, 
            `show_appointments`, 
            `show_live_notifications`, 
            `show_new_messages`, 
            `show_payment_notifications`, 
            `show_client_calls`
        ) VALUES (
            '$newDietitianID', 
            '$newDietitianUserID', 
            1,  
            1, 
            1, 
            1, 
            1, 
            1, 
            1, 
            1
        )";

        mysqli_query($conn, $insertNotificationStatusQuery);


        header('Location:  login.php'); // login.php
    }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $dietitianuserID = mysqli_real_escape_string($conn, $_POST['dietitianuserID']);
    $password = $_POST['password'];

    if (empty($dietitianuserID)) {
        array_push($errors, "dietitianuserID is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    $word = ".com";
    if (count($errors) == 0) {
        // $password = md5($password);
        if (strpos($dietitianuserID, $word) !== false) {


            // emailid entered
            //$query = "SELECT * FROM dietitian WHERE `email`='$dietitianuserID' AND `password`='$password'";
            $query = "SELECT * FROM dietitian WHERE `email`='$dietitianuserID'";
            $results = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($results);
            if (mysqli_num_rows($results) == 1) {
                // changing dietitianuseriid now from email to username
                /*$sql = "SELECT * FROM dietitian WHERE `email`='$dietitianuserID'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);*/

                if (password_verify($password, $row['password'])) {
                    # creating the Session
                    $_SESSION['dietitianuserID'] = $row['dietitianuserID'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['dietitian_id'] = $row['dietitian_id'];
                    // $_SESSION['name'] = $row['dietitianuserID'];
                    // echo $row['dietitianuserID'] ;
                    $_SESSION['success'] = "You are now logged in";
                    header('Location:  index.php');
                } else {
                    array_push($errors, "Wrong password");
                }
            } else {
                array_push($errors, "Wrong Email");
                // header('Location:  sign_in_new.php');
            }
        } else {

            // Username entered
            //$query = "SELECT * FROM dietitian WHERE `dietitianuserID`='$dietitianuserID' AND `password`='$password'";
            $query = "SELECT * FROM dietitian WHERE `dietitianuserID`='$dietitianuserID'";
            $results = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($results);
            if (mysqli_num_rows($results) == 1) {

                    if (password_verify($password, $row['password'])) {
                        # creating the Session
                       $_SESSION['dietitianuserID'] = $row['dietitianuserID'];
                       $_SESSION['name'] = $row['name'];
                       $_SESSION['dietitian_id'] = $row['dietitian_id'];

                       $_SESSION['name'] = $dietitianuserID;
                       $_SESSION['success'] = "You are now logged in";
                       header('Location:  index.php');
                       exit();
                    } else {
                        array_push($errors, "Wrong Password");
                    }
                    


               /* $sql = "SELECT * FROM dietitian WHERE `dietitianuserID`='$dietitianuserID'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);*/

               
            } else {
                array_push($errors, "Wrong Username");
                // header('Location:  sign_in_new.php');
            }
        }
    }
}
