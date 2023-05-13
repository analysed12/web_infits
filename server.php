<?php

session_start();

// initializing variables
$name = "";
$email = "";
$errors = array();

include "constant/config.php";
include "constant/constant.php";
global $conn;

if (isset($_SESSION['login_id'])) {
    header('Location: index.php');
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
if(basename($_SERVER['PHP_SELF']) == 'register'){
    $client->setRedirectUri($DEFAULT_PATH.'register.php');
}else{
    $client->setRedirectUri($DEFAULT_PATH.'login.php');
}
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])):
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
            header('Location: index.php');
            exit;
        } else {
            // if user not exists we will insert the user
            $insert = mysqli_query($conn, "INSERT INTO `dietitian`(`dietitianuserID`,`name`,`email`,`p_p`) VALUES('$id','$full_name','$email','$profile_pic')");
            echo $id;
            echo $full_name;
            echo $email;
            echo $profile_pic;
            if ($insert) {
                $_SESSION['login_id'] = $id;
                header('Location: index.php');
                exit;
            } else {
                echo "Sign up failed!(Something went wrong).";
            }
        }
    } else {
        
        header('Location: login.php');
        exit;
    }
else:
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
//   header('Location: ' . $loginUrl);
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
// 		}
// 		// Redirect User to Dashboard
// 		header('Location: index.php');
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
//   header('Location: index.php');
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
    if ($password != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM dietitian WHERE dietitianuserID='$dietitianuserID' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['dietitianuserID'] === $dietitianuserID) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        //	$password = md5($);//encrypt the password before saving in the database

        $query = "INSERT INTO dietitian (dietitianuserID, name, email, mobile, password) 
  			  VALUES('$dietitianuserID','$name', '$email', '$mobile', '$password')";
        mysqli_query($conn, $query);

        # creating the Session
        // $_SESSION['dietitianuserID'] = $user['dietitianuserID'];
        // $_SESSION['name'] = $user['name'];
        // $_SESSION['dietitian_id'] = $user['dietitian_id'];

        // $_SESSION['name'] = $name;
        // $_SESSION['success'] = "You are now logged in";
        // header('location: index.php');
        header('location: login.php');
    }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $dietitianuserID = mysqli_real_escape_string($conn, $_POST['dietitianuserID']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

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
            $query = "SELECT * FROM dietitian WHERE `email`='$dietitianuserID' AND `password`='$password'";
            $results = mysqli_query($conn, $query);
            if (mysqli_num_rows($results) == 1) {
                // changing dietitianuseriid now from email to username
                $sql = "SELECT * FROM dietitian WHERE `email`='$dietitianuserID'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                # creating the Session
                $_SESSION['dietitianuserID'] = $row['dietitianuserID'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['dietitian_id'] = $row['dietitian_id'];
                // $_SESSION['name'] = $row['dietitianuserID'];
                // echo $row['dietitianuserID'] ;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
            } else {
                array_push($errors, "Wrong Email/password combination");
                // header('location: sign_in_new.php');
            }
        } else {

            // Username entered
            $query = "SELECT * FROM dietitian WHERE `dietitianuserID`='$dietitianuserID' AND `password`='$password'";
            $results = mysqli_query($conn, $query);
            if (mysqli_num_rows($results) == 1) {



                $sql = "SELECT * FROM dietitian WHERE `dietitianuserID`='$dietitianuserID'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                # creating the Session
                $_SESSION['dietitianuserID'] = $row['dietitianuserID'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['dietitian_id'] = $row['dietitian_id'];
                // var_dump($_SESSION);
                // print_r($result);
                // echo '123';
                // die();
                $_SESSION['name'] = $dietitianuserID;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');

            } else {
                array_push($errors, "Wrong Username/password combination");
                // header('location: sign_in_new.php');
            }
        }

    }
}


?>