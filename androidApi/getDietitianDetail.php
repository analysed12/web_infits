<?php

require "connect.php";

$userID = $_POST['userID'];

$stmnt = $conn->prepare("SELECT * FROM dietitian WHERE dietitianuserID=?");
$stmnt->bind_param("s", $userID);
$stmnt->execute();
$stmnt->bind_result(
    $dietitian_id, $dietitianuserID, $password, $name, $qualification,
    $email, $mobile, $profilePhoto, $p_p, $location, $age, $gender, $experience, $about_me, $no_of_clients,
    $referral_code, $facebook, $whatsapp, $twitter, $linkedin, $instagram, $achievements,
    $last_seen, $socialLogin, $verification_code
);

$dietitianDetails = array();
while ($stmnt->fetch()) {
    $temp = array(
        'dietitian_id' => $dietitian_id,
        'dietitianuserID' => $dietitianuserID,
        'name' => $name,
        'mobile' => $mobile,
        'password' => $password,
        'qualification' => $qualification,
        'email' => $email,
        'location' => $location,
        'age' => $age,
        'experience' => $experience,
        'about_me' => $about_me,
        'gender' => $gender,
        'no_of_clients' => $no_of_clients
    );
    array_push($dietitianDetails, $temp);
}

$response = array('dietitiandetails' => $dietitianDetails);

if (count($dietitianDetails) > 0) {
    echo json_encode($response);
} else {
    echo "failure";
}
