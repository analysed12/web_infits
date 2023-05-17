<?php
include "navbar.php";
require('constant/config.php');
$names= $_SESSION['name'];
$query = "SELECT * From `dietitian` WHERE `dietitianuserID` = '$names' ";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dietitianuserID = $names;
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];
        $qualification = $row['qualification'];
        $location = $row['location'];
        $experience = $row['experience'];
        $referral_code = $row['referral_code'];
        $gender = $row['gender'];
        $age = $row['age'];
        $facebook = $row['facebook'];
        $whatsapp = $row['whatsapp'];
        $twitter = $row['twitter'];
        $linkedin = $row['linkedin'];
        $instagram = $row['instagram'];
        $profilePhoto = $row['profilePhoto'];
        $Achievements = $row['Achievements'];

        if (is_null($row['profilePhoto']) or $row['profilePhoto'] = ' ') {
            $path = "./upload/pp.jpg";
        } else {
            $ext = explode('|', $row['profilePhoto']);
            $path = $ext[1] . "/" . $ext[0];
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
            color: #BBBBBB;
            opacity: 1;
        }

        body {
            font-family: 'NATS', sans-serif;
            font-weight: 400;
            padding-bottom: 2rem;
        }
        input,
        input[type=file] {
            background: #FFFFFF;
            box-shadow: 0px 0.7px 5px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            border: none;
            /* width: 100%; */
            padding: 8px 16px;
            gap: 8px;
        }

        select {
            background: #EFF8FFD9;
            box-shadow: 0px 0.7px 5px rgba(0, 0, 0, 0.25);
            border: none;
            border-radius: 4px;
            /* width: 100%; */
            padding: 8px 16px;
            gap: 8px;
        }

        input[type=sign-up] {
            border: 1px solid #EBEBEB;
            color: #7282FB;
            align-items: center;
            padding: 10px 22px;
            border-radius: 10px;
            text-decoration: none;
            margin: 4px 2px;
            /* width: auto; */
        }

        /* Shared */
        .addBtn {
            text-decoration: none;
            align-content: center;
            justify-content: center;
            width: 350px;
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

        .center-flex {
            display: flex;
            margin-top: 10px;
            padding-left: 1.5rem;
            gap: 0.5rem;
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
        }

        .flex-right {
            flex-shrink: 3;
            display: flex;
            align-items: center;
            margin-right: 120px;
        }
        

        .flex-left h4 input,.flex-middle h4 input{
            margin-top: 8px;
        }

        .flex-main {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            align-content: flex-start;
            position: relative;
        }

        .flex-left h4 span,.flex-middle h4 span{
            position: relative;
            left: 7px;
        }


        .align-middle {
            margin-left: 5%;
        }

        .rating {
            align-self: center;
            font-family: 'NATS';
            font-style: normal;
            font-weight: 400;
            font-size: 25.4545px;
        }

        .reset a {
            color: RoyalBlue;
        }

        .socials {
            border: none;
            margin-right: 50px;
            background: none;
        }
        .socials a{
            text-decoration:none; 
            color:black;
            background-color:none;
            position: absolute;
            font-size: 24px;
            line-height: 51px;
        }

        .twitter {
            position: absolute;
            margin-left: -55px;
        }

        .socials:hover {
            background-color: none;
        }

        .socials-img{
            position: absolute;
            margin-left: -50px;
        }


        .sharebutton {
            width: 342px;
            height: 48px;
            background: #FFFFFF;
            border: 2px solid #0177FD;
            border-radius: 10px;
            padding-top: 0.5rem;
            font-size: 20px;
            padding-top: 0.3rem;
            text-decoration: none;
            margin-left: 2.4rem;
        }

        .sharebutton:hover {
            background-color: white;
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
            margin-left: 500px;
            padding: 15px;
            background: #fff;
            border-radius: 5px;
            width: 448px;
            height: 188px;
            border-radius: 25px;
            position: relative;
            box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
        }

        .popup .cont{
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

        .leftinput {
            width: 342px;
        }

        .flex-main_wrapper{
            display:flex; 
            flex-direction: column; 
            gap:3rem;
            margin-left: 4rem;
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


        /***************media query for mobile *******************/
        


        @media screen and (max-width: 1000px) {
            .input-sec {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .popup {
                margin-left: 0rem;
            }
            .popup .content{
                margin-left: 25px;
            }
            .popup .close{
                right: 70px;
            }
            
            .heading {
                position: relative;
                right: 2rem;
            }

            .leftinput {
                width: 100%!important;
            }

            .flex-left {
                width: 90% !important;
                margin-right:5rem;
            }
            

            .flex-middle {
                width: 90% !important;
                margin-right:5rem;
            }

            .flex-right{
                margin-left: 2rem;
                
            }

            .flex-main {
                display: flex;
                flex-direction: column;
            }
            .center-flex {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1rem;
                width: 100%;
                margin-left:0;
            }

            .addBtn {
                width: 200px !important;
                margin-right: 0.5rem;
            }

            .sharebutton {
                width: 200px !important;
                margin-left: 0;
                margin-right: 0.5rem;
            }
        }

        /* **************media query for large devices *******************/
        @media only screen and (min-width:1024px) and (max-width:1440px) {

            .popup {
                margin-left: 400px;
            }

            .popup .close {
                right: 20px;
            }

            .flex-right {
                margin-left: 330px;
            }

            .addBtn {
                margin-left: 4rem;
            }

            .sharebutton {
                margin-left: 3rem;
            }

            .modal-content {
                margin-left: 24rem;
            }

            .modal-img {
                margin-left: 22rem;
                
            }
        } 
</style>
</head>
<body>
    <div id="content">
    <br>
        <form method="post" action="" enctype="multipart/form-data">   
            <br>
            <div class="flex-main">
                <div class="flex-main_wrapper ">
                    <h4 class="heading" style="font-size:40px"> Profile Settings</h4>
                    <div class="input-sec d-flex flex-lg-row align-center justify-content-center" style=" gap: 3rem;">
                    <div class="flex-left" style="font-size:18px;display:flex;flex-direction:column;justify-content:center">
                            <h4><span>User ID</span><br> <input type="text" class="leftinput" name="dietitianuserID"
                                value='<?php echo $dietitianuserID; ?>' disabled style="color: #AEAEAE;" /></h4>
                            <br>

                            <h4><span>Name</span><br> <input class="leftinput" name="Name" value="<?php echo $name; ?>"
                                style="color: #AEAEAE;" disabled /></h4>
                            <br>

                            <h4><span>Email</span><br> <input class="leftinput" name="email" value="<?php echo $email; ?>" disabled
                                style="color: #AEAEAE;" /></h4>
                            <br>

                            <h4><span>Mobile No</span><br> <input class="leftinput" name="mobile" value="<?php echo $mobile; ?>"
                                disabled style="color: #AEAEAE;" /><h4>
                            <br>

                            <h4><span>Qualification</span><br>
                            <?php if (is_null($qualification) or $qualification == '') { ?>
                                <input type="text" class="leftinput" name="qualification" value="<?php echo 'XXXXXX'; ?>"
                                    disabled style="color: #AEAEAE;">
                            <?php } else { ?>
                                <input name="qualification" class="leftinput" value="<?php echo $qualification; ?>" disabled
                                    style="color: #AEAEAE;">
                            <?php } ?></h4>
                            <br>

                            <h4><span>Password</span><br>
                            <div class="ip_box">
                            <input name="password" class="leftinput" id="password" type="password"
                                placeholder="Password" value="<?php echo $password; ?>" disabled style="color: #AEAEAE;"/>
                            <img style="cursor: pointer; width: 22px; height: 19px; margin-left:-38px;"
                                src="<?=$DEFAULT_PATH?>assets/images/eye.svg" id="eyeicon" alt="eye">
                            
                            </div>
                            </h4>
                            <br>
                        </div>


                        <div class="flex-middle" style="font-size:18px">
                            <h4><span>Username</span><br> <input type="text" class="leftinput" name="dietitianuserID"
                                value='<?php echo $dietitianuserID; ?>' disabled style="color: #AEAEAE;" /></h4>
                            <br>
                            <h4><span>Location</span><br>
                            <?php if (is_null($location) or $location == '') { ?>
                                <input type="text" name="location" value="<?php echo 'XXXXXX'; ?>" class="leftinput"
                                    disabled style="width: 342px;color: #AEAEAE;">
                            <?php } else { ?>
                                <input type="text" name="location" value="<?php echo $location; ?>" class="leftinput"
                                    disabled required style="width: 342px;color: #AEAEAE;">
                            <?php } ?></h4>
                            <br>

                            <div class="row" style="height:86px">
                                <div class="col-5">
                            <h4><span>Gender</span><br>
                            <?php if (is_null($gender) or $gender == '') { ?>
                                <input type="text" name="gender" value="<?php echo $gender; ?>" disabled class=" form-control"
                                    style="color: #AEAEAE;background-color:white"> 
                            <?php } else { ?>
                                <input type="text"  name="gender" value="<?php echo $gender; ?>" disabled class=" form-control"
                                    style="color: #AEAEAE;background-color:white;border-radius:9px">
                            <?php } ?></h4>
                            </div>
                            <div class="col-5">
                            <!-- <br> -->

                            <h4><span>Age</span><br>
                            <?php if (is_null($age) or $age == '') { ?>
                                <input type="text" name="experience"   value="<?php echo 'XX Years'; ?>" 
                                    class="form-control " style="color: #AEAEAE;background-color:white" disabled>
                            <?php } else { ?>
                                <input type="text" name="age"   value="<?php echo $age; ?>"  required
                                    class="form-control " style="color: #AEAEAE;background-color:white;border-radius:9px"disabled>
                            <?php } ?></h4>
                        </div>
                        </div><br>
                        

                            <h4><span>Experience</span><br>
                            <?php if (is_null($experience) or $experience == '') { ?>
                                <input type="text" name="experience" value="<?php echo 'XX Years'; ?>" disabled
                                    class="leftinput" style="color: #AEAEAE;">
                            <?php } else { ?>
                                <input type="text" name="experience" value="<?php echo $experience ; ?>Years" disabled
                                    class="leftinput" style="color: #AEAEAE;">
                            <?php } ?></h4>
                            <br>
                            

                            <h4 style="margin-top:10px"><span>Referral code</span><br>
                            <?php if (is_null($referral_code) or $referral_code == '') { ?>
                                <input type="text" name="referral" value="<?php echo 'XX'; ?>" disabled
                                    class="leftinput" style="color: #AEAEAE;">
                            <?php } else { ?>
                                <input type="text" name="referral" value="<?php echo $referral_code ; ?>" disabled
                                    class="leftinput" style="color: #AEAEAE;">
                            <?php } ?></h4>
                            <br>

                            <h4><span>Achievements and Certificates</span><br>
                            <?php if (is_null($referral_code) or $referral_code == '') { ?>
                                <input type="text" name="achievements" value="<?php echo 'XX'; ?>" disabled
                                    class="leftinput" style="color: #AEAEAE;">
                            <?php } else { ?>
                                <input type="text" name="achievements" value="<?php echo $Achievements ; ?>" disabled
                                    class="leftinput" style="color: #AEAEAE;">
                            <?php } ?></h4>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="flex-right">
                <div>   
                <img class="user" src="<?=$DEFAULT_PATH?>assets/images/Profile_dp.svg" style="height: 154px; width: 154px; border-radius:25px;"alt="profilePhoto" />
                    <div class="star" style="display:flex; gap:7px; margin-top:1rem;background:none;margin-left:30%">
                        <img src="<?=$DEFAULT_PATH?>assets/images/Star.svg" style="background:none; width: 28px; height: 28px;">
                        <h3 style="font-size:25px;">4.8</h3>
                    </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/WhatsApp.svg" class="socials-img"> &nbsp; <a href="<?php echo $whatsapp; ?>">WhatsApp<a></button><br><br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/Profile-twitter.svg" class="twitter"> &nbsp; <a href="<?php echo $twitter; ?>">Twitter</a></button><br><br><br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/Profile-facebook.svg" class="socials-img"> &nbsp; <a href="<?php echo $facebook; ?>">Facebook</a></button><br><br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/LinkedIn-Circled.svg" class="socials-img"> &nbsp; <a href="<?php echo $linkedin; ?>">LinkedIn</a></button><br><br>
                    <button class='socials'><img src="<?=$DEFAULT_PATH?>assets/images/Instagram.svg" class="socials-img"> &nbsp; <a href="<?php echo $instagram; ?>">Instagram</a></button><br>
                </div>


                <!----------------------------------------------SUBMIT BUTTON -------------------------------------------------->

            </div>

            <div class="center-flex  col-lg-10 col-sm-12 offset-lg-2 col-md-9 offset-md-3 col-xl-7 offset-xl-2"> <br>
                <br>
                <a id="addBtn" href="profile_settings_edit.php" style="text-decoration: none;">
                    <div class="addBtn">
                        <center style="font-size:25px">Edit Profile Details</center>
                    </div>
                </a>

                <a id="sharebutton" style="text-decoration: none;" href="#popup1">
                    <div class="sharebutton">
                        <center style="font-size:25px">Share Profile</center>
                    </div>
                </a>
                <!--link not working to move to next page -->
            </div>
            <br>
        </form>
    </div>

    <!-------------------------------------POPUPS-------------------------------------------------->
    <div id="popup1" class="overlay">
        <div class="popup">
            <div class="cont d-flex">
            <h4 style="margin-left:7rem">Share Via</h4><img src="<?=$DEFAULT_PATH?>assets/images/Share.svg" style="margin-left:1rem;margin-top:0.2rem;width:5%;height:3%">        
            <a class="close" href="#">&times;</a>    
            </div>
                <div class="content" style="display:flex;gap:1.7rem">
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