<?php
include "navbar.php";
error_reporting(0);
require('constant/config.php');
$dietitianuserID = $_SESSION['name'];
$query = "SELECT * From `dietitian` WHERE `dietitianuserID` = '$dietitianuserID' ";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dietitianuserID = $row['dietitianuserID'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];
        $referral_code = $row['referral_code'];
        $qualification = $row['qualification'];
        $location = $row['location'];
        $experience = $row['experience'];
        $gender = $row['gender'];
        $age = $row['age'];
        $profilePhoto = $row['profilePhoto'];
        $Achievements = $row['Achievements'];


        if (is_null($row['profilePhoto']) or $row['profilePhoto'] == ' ') {
            $path = "./upload/pp.jpg";
        } else {
            $ext = explode('|', $row['profilePhoto']);
            $path = $ext[1] . "/" . $ext[0];
        }
    }
}

//profile updation save button     
// receive all input values from the form
if (isset($_POST['update']) || isset($_FILES['my_image'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $referral_code = mysqli_real_escape_string($conn, $_POST['referral_code']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $achievements = mysqli_real_escape_string($conn, $_POST['Achievements']);


    if (isset($_FILES['my_image'])) {
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
        $file_type = $_FILES['my_image']['type'];
    }
    $error;
    if ($error === 0) {
        if ($img_size > 99999999999) {
            echo ("file too large");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_ex = array("jpg", "svg");
            if (in_array($img_ex_lc, $allowed_ex)) {
                $new_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = "<?=$DEFAULT_PATH?>assets/images/" . $new_name;
move_uploaded_file($tmp_name, $img_upload_path);
$imageandpath = "$new_name|$img_upload_path";
// updating to conn$conn
$query = "UPDATE dietitian SET qualification = '$qualification', location = '$location', name = '$name',email =
'$email',gender = '$gender',mobile = '$mobile',experience = '$experience',age = '$age',profilePhoto =
'$imageandpath',password = '$password',referral_code = '$referral_code',Achievements = '$achievements' WHERE
`dietitianuserID` = '$dietitianuserID'";
mysqli_query($conn, $query);
$_SESSION['success'] = "Information Updated";
header('location: profile_settings_show.php');
}
}
}

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Infits | Add Client</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('constant/head.php');?>
    <style>
    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #BBBBBB;
        opacity: 1;
        /* Firefox */
    }


    body {
        font-family: 'NATS', sans-serif;
        font-weight: 400;
      
    }

    input,
    input[type=file] {
        background: #FFFFFF;
        box-shadow: 0px 0.7px 5px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        border: none;
        padding: 8px 16px;
        gap: 8px;
    }

    select {
        background: #EFF8FFD9;
        box-shadow: 0px 0.7px 5px rgba(0, 0, 0, 0.25);
        border: none;
        border-radius: 10px;
        padding: 0px 16px;
        gap: 8px;
        height: 48px;
        justify-content: flex-start;
    }

    input[type=sign-up] {
        border: 1px solid #EBEBEB;
        color: #7282FB;
        align-items: center;
        padding: 10px 22px;
        border-radius: 10px;
        text-decoration: none;
        margin: 4px 2px;
    }

    .heading {
        margin-left: 18.2rem;
    }

    .center-flex {
        display: flex;
        margin-top: 10px;
        padding-left: 2.5rem;
        gap: 0.5rem;
    }

    .center-flex button {
        background-color: transparent;
        border: none;
        color: #FFFFFF;
    }

    .signup {
        border: 1px solid #EBEBEB;
        padding: 10px;
        border-radius: 5px;
        min-width: auto;
        width: 150px;
        background-color: #FFFFFF;
        text-decoration: none;
        color: black;
    }

    .float-right {
        float: right;
    }

    .flex-left,
    .flex-right,
    .flex-middle {
        display: flex;
        align-items: left;
        justify-content: top;
        flex-direction: column;
    }

    .flex-left {
        flex-shrink: 3;
        width: 342px;
    }

    .ip_box {
    display: flex;
    align-items: center;
    flex-direction: row;
    color: #B4B4B4;
}

.ip_box img {
    z-index: 2;
    margin-right: -45px;
}
    .flex-right {
        flex-shrink: 3;
        display: flex;
        align-items: center;
        margin-left: 140px;
    }

    .flex-main {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: wrap;
        align-content: flex-start;
        position: relative;
    }

    .flex-left h4 input,
    .flex-middle h4 input {
        margin-top: 8px;
    }

    .flex-left h4 span,
    .flex-middle h4 span {
        position: relative;
        left: 7px;
    }

    .align-middle {
        margin-left: 5%;
    }

    .reset a {
        color: RoyalBlue;
    }

    .socials {
        border: none;
        margin-right: 40px;
        background: none;
    }

    .socials a {

        text-decoration: none;
        color: black;
        background-color: none;
        position: absolute;
        font-size: 24px;
        line-height: 51px;
    }

    .socials-img {
        position: absolute;
        margin-left: -50px;
    }

    .twitter {
        position: absolute;
        margin-left: -55px;
    }



    .sharebutton {
        display: block !important;
        width: 342px;
        height: 48px;
        background: #FFFFFF;
        border: 2px solid #0177FD;
        border-radius: 10px;
        padding-top: 0.5rem;
        font-size: 20px;
        text-decoration: none;
        padding-top: 0.3rem;
        margin-left: 2.2rem;
    }

    .sharebutton:hover {
        background-color: whit;
        background: white;
    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
    }

    .overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .popup {
        margin: 270px;
        margin-left: 550px;
        padding: 15px;
        background: #fff;
        border-radius: 25px;
        width: 448px;
        height: 180px;
        position: relative;
        box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
    }

    .popup .cont {
        margin-left: 40px;
        margin-top: 30px;
    }

    .popup .close {
        position: absolute;
        top: 5px;
        right: 20px;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
        background: none;
        border: none;
    }

    .popup .close:hover {
        color: #06D85F;
    }

    .popup .content {
        max-height: 30%;
        overflow: auto;
        margin-top: 20px;
        margin-left: 40px;
    }

    .addBtn {
        text-decoration: none;
        align-content: center;
        width: 342px;
        height: 48px;
        background: #0177FD;
        border-radius: 10px;
        color: white;
        padding-top: 0.3rem;
        font-size: 20px;
    }

    .addBtn:hover {
        background-color: none;
    }

    .my-modal {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
    }

    .my-modal:target {
        visibility: visible;
        opacity: 1;
    }

    .modal-img {
        margin: 290px;
        margin-left: 450px;
        margin-top: 190px;
        padding: 20px;
        background: #fff;
        border-radius: 34px;
        width: 501px;
        height: 250px;
        position: relative;
        box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
    }

    .modal-img .pop {
        margin-top: 15px;
        margin-left: 10px;
    }

    .modal-img .upload {
        gap: 1.5rem;
        margin-left: 40px;
        margin-top: 20px;
    }

    .modal-img .upload .upload-btn {
        width: 200px;
        height: 50px;
        border-radius: 8px;
        border: none;
        margin-top: 8px;
        box-shadow: 0px 1.5px 1.5px 1.5px rgba(0, 0, 0, 0.15);
        background-color: #FFFFFF;
        Font size: 20.42px;
    }

    .modal-img .upload .upload-btn .up {
        margin-left: 40px;
        margin-bottom: 8px;
    }

    .modal-img .upload .upload-btn .del {
        margin-left: 20px;
        margin-bottom: 8px;
    }


    .modal-img .img-close {
        position: absolute;
        top: 2px;
        right: 30px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
        background: none;
        border: none;
    }

    .modal-img .close:hover {
        color: #06D85F;
    }

    .modal-img .content {
        max-height: 30%;
        overflow: auto;
    }

    .modal {
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        transition: opacity 500ms;
        align-items: center;

    }

    .modal-content {
        width: 440px;
        height: 300px;
        padding: 20px;
        border-radius: 25px;
        margin: 210px;
        margin-left: 465px;
        margin-top: 220px;
        overflow: hidden;
    }

    .modal-content .close {
        position: absolute;
        top: 10px;
        right: 20px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
        background: none;
        border: none;
    }

    .modal-content #socials {
        margin-top: 30px;
        height: 55px;
        background-color: white;
        box-shadow: 0px 1.76208px 5.28625px rgba(0, 0, 0, 0.25);
        border-radius: 8.81041px;
        color: #BBBBBB;
        width: 390px;
        Font size: 21.14px;
    }

    /* Shared */
    .addBtn1 {
        border: none;
        background: #8C68F8;
        border-radius: 8px;
        width: 185px;
        height: 50px;
        color: white;
        padding: 0.5rem;
        padding-left: 2.5rem;
        padding-right: 2.5rem;
        font-size: 20px;
        margin-right: 0.7rem;
    }

    .addBtn1:hover {
        background-color: none;
    }

    .leftinput {
        width: 342px;
    }

    .flex-main_wrapper {
        display: flex;
        flex-direction: column;
        gap: 3rem;
        margin-left: 4rem;
    }

    .discard {
        border: 2px solid #8C68F8;
        background: white;
        border-radius: 8px;
        padding: 0.5rem;
        width: 182px;
        height: 50px;
        margin-right: 0.5rem;
        padding-left: 2.5rem;
        padding-right: 2.5rem;
        font-size: 20px;
    }

    .form-floating>.form-select {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    @media screen and (max-width:600px){

        .input-sec {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .popup {
            margin-left: 0.5rem;
        }

        .popup .close {
            right: 20px;
        }

        .heading {
            margin-left: 2rem;
        }

        .leftinput {
            width: 90% !important;
        }

        .flex-left {
            width: 90% !important;
            margin-right: 5rem;
        }

        .flex-middle {
            width: 90% !important;
            margin-right: 5rem;
        }

        .flex-right {
            width: 80%;
            margin-left: 1rem;
        }

        .flex-main {
            display: flex;
            flex-direction: column;
        }

        .user {
            margin-left: 6rem !important;
        }

        .star {
            margin-left: 7.5rem !important;
        }

        .center-flex {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            width: 100%;
        }

        .addBtn {
            width: 200px !important;
            margin-right: 3rem;
            margin-left: 0;
        }

        .sharebutton {
            width: 200px !important;
            margin-left: 0;
            margin-right: 3rem;
        }

        .chooseimage {
            margin-left: 6rem !important;
        }

        .text {
            margin-left: 6rem !important;
        }

        .profiles {
            margin: auto;

        }

        .modal-content {
            margin-left: 0.5rem;
        }

        .modal-img {
            margin-left: 2rem;
            width: 420px;
            height: 250px;
        }

        .modal-img .upload .upload-btn {
            width: 170px;
            height: 50px;
            border-radius: 8px;
            border: none;
            margin-top: 8px;
            box-shadow: 0px 1.5px 1.5px 1.5px rgba(0, 0, 0, 0.15);
            background-color: #FFFFFF;
            Font size: 20.42px;
        }
    }

    @media screen and (min-width:600px) and (max-width: 1000px) {

        .input-sec {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .popup {
            margin-left: 8rem;
        }

        .modal-content {
            margin-left: 8rem;
        }

        .modal-img {
            margin-left: 8rem;
            width: 420px;
            height: 250px;
        }

        .heading{
            margin-left: 2rem;
        }

        .leftinput {
            width: 90% !important;
        }

        .flex-left {
            width: 90% !important;
            margin-right: 5rem;
        }

        .flex-middle {
            width: 90% !important;
            margin-right: 5rem;
        }

        .flex-right {
            width: 80%;
            margin-left: 1rem;
        }

        .flex-main {
            display: flex;
            flex-direction: column;
        }

        .user {
            margin-left: 6rem !important;
        }

        .star {
            margin-left: 7.5rem !important;
        }

        .center-flex {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin-left:0;
            width: 100%;
        }

        .addBtn {
            width: 200px !important;
            margin-left: 8rem;
        }

        .sharebutton {
            width: 200px !important;
            margin-left: 8rem;
        }

        .modal-img .upload .upload-btn {
            width: 160px;
            height: 50px;
            border-radius: 8px;
            border: none;
            margin-top: 8px;
            box-shadow: 0px 1.5px 1.5px 1.5px rgba(0, 0, 0, 0.15);
            background-color: #FFFFFF;
            Font size: 20.42px;
        }
    }
    @media only screen and (min-width:1024px) and (max-width:1440px){
        .flex-right {
            margin-left: 330px;
        }

        .addBtn {
            margin-left: 4rem;
        }

        .sharebutton {
            margin-left: 3rem;
        }

    }

    @media screen and (min-width:1600px) {
        .flex-main_wrapper {
            display: flex;
            align-content: center;
            margin: 10px;
            justify-content: center;
        }

        .heading {
            margin-left: 28rem;
        }

        .popup .close {
            right: 20px;
        }

        .center-flex {
            margin-top: 150px;
        }

        .flex-left {
            margin-left: 4rem;
        }

        .flex-right {
            margin-left: 1000px;
        }
    }
    </style>
</head>

<body>
    <div id="content">
        <br>
        <form method="POST" action="" enctype="multipart/form-data" onsubmit="(e)=>{e.prevetDefault()}">
            <h4 class="heading" style="font-size:40px;color:black"> Profile Settings</h4>
            <br>
            <div class="flex-main">
                <div class="flex-main_wrapper">
                    <div class="input-sec d-flex flex-lg-row align-center justify-content-center" style="gap:3rem">
                        <div class="flex-left" id="flexleft" style="font-size:18px">
                            <h4><span>User ID</span><br> <input type="text" name="dietitianuserID"  class="leftinput"
                                    value="<?php echo $dietitianuserID; ?>" required style="color: #AEAEAE;" />
                            </h4>
                            <br>

                            <h4><span>Name</span><br><input type="text" name="name"  class="leftinput" value="<?php echo $name; ?>"
                                    required style="color: #AEAEAE;" /></h4>
                            <br>

                            <h4><span>Email</span><br> <input type="email" name="email"  class="leftinput" value="<?php echo $email; ?>"
                                    required style="color: #AEAEAE;" /></h4>
                            <br>

                            <h4><span>Mobile No</span><br> <input type="text" name="mobile"  class="leftinput"
                                    value="<?php echo $mobile; ?>" required style="color: #AEAEAE;" /></h4>
                            <br>

                            <h4><span>Qualification</span><br>
                                <?php if (is_null($qualification) or $qualification == '') { ?>
                                <select name="qualification" id="qualification" required>
                                    <option value="bachelors">Bachelors</option>
                                    <option value="masters">Masters</option>
                                    <option value="highschool">High School</option>
                                    <option value="phd">PhD</option>
                                </select>
                                <?php } else { ?>
                                <input type="text"  class="leftinput" name="qualification" value="<?php echo $qualification; ?>" required
                                    style="color: #AEAEAE;">
                                <?php } ?>
                            </h4>
                            <br>

                            <h4><span>Password</span><br>
                                <div class="ip_box">
                                    <input name="password" class="leftinput" id="password" type="password"
                                        placeholder="Password" value="<?php echo $password; ?>" disabled
                                        style="color: #AEAEAE;" />
                                    <img style="cursor: pointer; width: 22px; height: 19px; margin-left:-38px;"
                                        src="<?=$DEFAULT_PATH?>assets/images/eye.svg" id="eyeicon" alt="eye">
                                    <br>
                                </div>
                                <a href="reset_password.php" class='reset'
                                    style="display:flex;justify-content:space-between;text-decoration:none;width:80%;">
                                    <p style=" color: #0177FD; font-size: 14px; font-weight:400px;">Change
                                        Password</p>
                                    <p style=" color: #0177FD; font-size: 14px;font-weight:40px;margin-right:60px">
                                        Forgot Password</p>
                                </a>
                            </h4>
                            <br>
                        </div>

                        <div class="flex-middle" style="font-size:18px;font-weight:400px;">
                            <h4><span>Username</span><br> <input type="text" class="leftinput" name="dietitianuserID"
                                    value='<?php echo $dietitianuserID; ?>' disabled style="color: #AEAEAE;" />
                                <h4>
                                    <br>

                                    <h4><span>Location</span><br>
                                        <?php if (is_null($location) or $location == '') { ?>
                                        <input type="text" name="location" required class="leftinput"
                                            style="color: #AEAEAE;">
                                        <?php } else { ?>
                                        <input type="text" name="location" required value="<?php echo $location; ?>"
                                            required class="leftinput" style="color: #AEAEAE;">
                                        <?php } ?>
                                    </h4>
                                    <br>

                                    <div class="row">
                                        <div class="col-5">
                                            <h4><span>Gender</span><br>
                                                <?php if (is_null($gender) or $gender == '') { ?>
                                                <input type="text" name="gender" value="<?php echo $gender; ?>" disabled
                                                    class=" form-control"
                                                    style="color: #AEAEAE;margin-top:8px;background-color:white">
                                                <?php } else { ?>
                                                <input type="text" name="gender" value="<?php echo $gender; ?>" disabled
                                                    class=" form-control"
                                                    style="color: #AEAEAE;background-color:white;border-radius:9px">
                                                <?php } ?>
                                            </h4>
                                        </div>
                                        <div class="col-5">
                                            <!-- <br> -->

                                            <h4><span>Age</span><br>
                                                <?php if (is_null($age) or $age == '') { ?>
                                                <input type="text" name="experience" value="<?php echo 'XX Years'; ?>"
                                                    class="form-control " style="color: #AEAEAE;background-color:white"
                                                    disabled>
                                                <?php } else { ?>
                                                <input type="text" name="age" value="<?php echo $age; ?>" required
                                                    class="form-control "
                                                    style="color: #AEAEAE;background-color:white;border-radius:9px"
                                                    disabled>
                                                <?php } ?>
                                            </h4>
                                        </div>
                                    </div><br>

                                    <h4><span>Experience</span><br>
                                        <?php if (is_null($experience) or $experience == '') { ?>
                                        <input type="text" name="experience" required class="leftinput"
                                            style="color: #AEAEAE;">
                                        <?php } else { ?>
                                        <input type="text" name="experience" required value="<?php echo $experience; ?>"
                                            class="leftinput" style="color: #AEAEAE;">
                                        <?php } ?>
                                    </h4>
                                    <br>

                                    <h4><span>Referral code</span><br>
                                        <?php if (is_null($referral_code) or $referral_code == '') { ?>
                                        <input type="text" name="referral" required class="leftinput"
                                            style="color: #AEAEAE;">
                                        <?php } else { ?>
                                        <input type="text" name="referral" required
                                            value="<?php echo $referral_code; ?>" class="leftinput"
                                            style="color: #AEAEAE;">
                                        <?php } ?>
                                    </h4>
                                    <br>

                                    <h4><span>Achievements and Certificates</span><br>
                                        <?php if (is_null($Achievements) or $Achievements == '') { ?>
                                        <input type="text" name="achievements" required class="leftinput"
                                            style="color: #AEAEAE;">
                                        <?php } else { ?>
                                        <input type="text" name="achievements" required
                                            value="<?php echo $Achievements; ?>" class="leftinput"
                                            style="color: #AEAEAE;">
                                        <?php } ?>
                                    </h4>
                                    <br>
                        </div>
                    </div>
                </div>
                <div class="flex-right">
                    <div class="profiles"
                        style="display:flex;flex-direction:column;position:relative; width:fit-content;">
                        <img class="image1" src="<?=$DEFAULT_PATH?>assets/images/Profile_dp.svg"
                            style="height: 150px; width: 150px; border-radius: 25px;z-index:-1;" alt="">
                        <a href="#popup2" class="edit" id="edit"
                            style="border:3px solid white; background:#0177FD; border-radius:50%; width:38px;height:38px;position:absolute;right:15px;bottom:18px;text-decoration: none;"><img
                                src="<?=$DEFAULT_PATH?>assets/images/Edit-Img.svg"
                                style="margin-left:6px;margin-top:4px"></a>
                        <!-- <input type="submit" /> -->
                    </div>
                    <input class="chooseimage" id="chooseimage" type="file" name="my_image"
                        style="width: 250px; display:none;" value="" requied />
                    <br>
                    <br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/WhatsApp.svg" class="socials-img">
                        &nbsp; <a href="<?php echo $whatsapp; ?>">WhatsApp<a></button><br><br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/Profile-twitter.svg"
                            class="twitter"> &nbsp; <a href="<?php echo $twitter; ?>">Twitter</a></button><br><br><br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/Profile-facebook.svg"
                            class="socials-img"> &nbsp; <a href="<?php echo $facebook; ?>">Facebook</a></button><br><br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/LinkedIn-Circled.svg"
                            class="socials-img"> &nbsp; <a href="<?php echo $linkedin; ?>">LinkedIn</a></button><br><br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/Instagram.svg"
                            class="socials-img"> &nbsp; <a
                            href="<?php echo $instagram; ?>">Instagram</a></button><br><br>
                    <!-- Trigger/Open The Modal -->
                    <button id="myBtn" style="border:none; background:none;"><img
                            src="<?=$DEFAULT_PATH?>assets/images/Edit.svg"></button>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <!--Modal content-->
                        <div class="modal-content">
                            <span class="close"></span>

                            <form method="post" action=" " enctype="multipart/form-data">
                                <div class="form-floating">
                                    <select select class="form-select" id="socials"
                                        aria-label="Floating label select example">
                                        <option selected>Platform</option>
                                        <option value="whatsapp">WhatsApp</option>
                                        <option value="twitter">Twitter</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="linkedin">LinkedIn</option>
                                        <option value="instagram">Instagram</option>
                                    </select>
                                    <br>
                                    <input type="text" placeholder="Copy link here..." name="link"
                                        style="width:390px;height:50px;background-color:white;box-shadow: 0px 1.76208px 5.28625px rgba(0, 0, 0, 0.25);border-radius: 8.81041px; color: #BBBBBB;">
                                    <br>
                                    <div style="display:flex;justify-content:space-evenly;margin-top:35px;">
                                        <button type="submit" class="addBtn1" name="save_socials">Save Changes</button>
                                        <button class="discard">Discard</button>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <?php
                    //profile updation save button 
                    if (isset($_POST['save_socials'])) {
                        // receive all input values from the form
                        $socials = mysqli_real_escape_string($conn, $_POST['socials']);
                        $link = mysqli_real_escape_string($conn, $_POST['link']);

                        if ($socials == 'whatsapp') {
                            $query = "UPDATE dietitian SET whatsapp = '$link' where `dietitianuserID` = '$dietitianuserID'";
                            mysqli_query($conn, $query);
                        }

                        if ($socials == 'twitter') {
                            $query = "UPDATE dietitian SET twitter = '$link' where `dietitianuserID` = '$dietitianuserID'";
                            mysqli_query($conn, $query);
                        }

                        if ($socials == 'linkedin') {
                            $query = "UPDATE dietitian SET linkedin = '$link' where `dietitianuserID` = '$dietitianuserID'";
                            mysqli_query($conn, $query);
                        }

                        if ($socials == 'facebook') {
                            $query = "UPDATE dietitian SET facebook = '$link' where `dietitianuserID` = '$dietitianuserID'";
                            mysqli_query($conn, $query);
                        }

                        if ($socials == 'instagram') {
                            $query = "UPDATE dietitian SET instagram = '$link' where `dietitianuserID` = '$name'";
                            mysqli_query($conn, $query);
                        }
                    }
                    ?>

                    <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal 
                    btn.onclick = function() {
                        event.preventDefault(); //keeps page from refreshing
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                    var upload = document.getElementById("upload-btn");
                    var chooseimage = document.getElementById("chooseimage");

                    function clickMe() {
                        chooseimage.click();
                    }
                    </script>
                </div>



                <!---------------------------SUBMIT BUTTON ----------------------------------->

                <br><br>
            </div>
            <div class="center-flex d-flex col-lg-10 col-sm-12 offset-lg-2 col-md-9 offset-md-3 col-xl-7 offset-xl-2">
                <div class="addBtn">
                    <center style="font-size:25px">Confirm Changes</center>
                </div>


                <a id="sharebutton" style="text-decoration: none;" href="#popup1">
                    <div class="sharebutton">
                        <center style="font-size:25px">Share Profile</center>
                    </div>
                </a>
            </div>
        </form>
    </div>




    <!-------------------------------------POPUPS-------------------------------------------------->
    <div id="popup2" class="my-modal">
        <div class="modal-img">
            <a class="img-close" href="#">&times;</a>
            <div class="d-flex pop">
                <img class=" image1" src="<?=$DEFAULT_PATH?>assets/images/Profile_dp.svg" alt="">
                <div class="d-flex flex-column upload">
                    <button class="upload-btn" id="upload-btn" onclick="clickMe()">Upload New<img
                            src="<?=$DEFAULT_PATH?>assets/images/Edit-Profile.svg" class="up"> </button>
                    <button class="upload-btn">Remove Picture<img src="<?=$DEFAULT_PATH?>assets/images/del-Profile.svg"
                            class="del"></button>
                </div>
            </div>
        </div>
    </div>
    <div id="popup1" class="overlay">
        <div class="popup">
            <div class="cont d-flex">
                <h4 style="margin-left:7rem">Share Via</h4><img src="<?=$DEFAULT_PATH?>assets/images/Share.svg"
                    style="margin-left:1rem;margin-top:0.2rem;width:5%;height:3%">
                <a class="close" href="#">&times;</a>
            </div>
            <div class="content" style="display:flex;gap:1.7rem;">
                <img src="<?=$DEFAULT_PATH?>assets/images/WhatsApp.svg">
                <img src="<?=$DEFAULT_PATH?>assets/images/Profile-twitter.svg">
                <img src="<?=$DEFAULT_PATH?>assets/images/Profile-facebook.svg">
                <img src="<?=$DEFAULT_PATH?>assets/images/LinkedIn-Circled.svg">
                <img src="<?=$DEFAULT_PATH?>assets/images/Instagram.svg">
            </div>
        </div>
    </div>

    <script>
    let eyeicon = document.getElementById("eyeicon");
    let password = document.getElementById("password");
    eyeicon.onclick = function() {
        if (password.type == "password") {
            password.type = "text";
            eyeicon.src = "<?=$DEFAULT_PATH?>assets/images/eye-open.png";
        } else {
            password.type = "password";
            eyeicon.src = "<?=$DEFAULT_PATH?>assets/images/eye.svg";
        }
    }
    </script>
    <?php require('constant/scripts.php');?>
</body>

</html>
