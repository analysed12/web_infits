<?php
    include "navbar.php";
    require('constant/config.php');
?>
<?php 
    $sql  = "SELECT * FROM dietitian WHERE dietitianuserID = '{$_SESSION['dietitianuserID']}'";
    global $conn;
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['editbutton'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile_no = $_POST['mobile'];
            $qualification = $_POST['qualification'];
            $username = $_POST['username'];
            $location = $_POST['location'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $experience = $_POST['experience'];
            $achievements = $_POST['achievements'];

            $imageFileName = '';
            $sql_ = "UPDATE `dietitian` SET `dietitianuserID`='$username',`name`='$name',`qualification`='$qualification',`email`='$email',`mobile`='$mobile_no'";
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if (isset($_FILES["my_image"]) && $_FILES["my_image"]["error"] === 0) {
                $image = $_FILES['my_image']['tmp_name'];
                $imageFileName = $_FILES['my_image']['name'];

                if (preg_match('/^\d{4}_/', $imageFileName) === 1) {
                    $imageFileName = preg_replace('/^\d{4}_/', '', $imageFileName);
                }

                $targetDir = "uploads/profile/images/";
                $randomNumber = mt_rand(1000, 9999);
                $imageFileName = $randomNumber . '_' . $imageFileName;
                $imgPath = $targetDir. $imageFileName;
                move_uploaded_file($image, $imgPath); // for original images
                $sql_=$sql_.", `p_p`='$imageFileName'";
                
            } 
            $sql_2 = ",`location`='$location',`age`='$age',`gender`='$gender',`experience`='$experience',`achievements`='$achievements' WHERE dietitianuserID = '{$_SESSION['dietitianuserID']}'";
            $sql_ = $sql_.$sql_2;
            $result = mysqli_query($conn, $sql_);
            if ($result){
                $temp_name = $_SESSION['dietitianuserID'];
                $_SESSION['dietitianuserID'] = $username;
                $sql  = "SELECT * FROM dietitian WHERE dietitianuserID = '{$_SESSION['dietitianuserID']}'";
                $result = $conn->query($sql);
                $data1 = $result->fetch_assoc();
                // making sure that the user doesn't logout
                $_SESSION['name'] = $data1['name'];
                $_SESSION['dietitian_id'] = $data1['dietitian_id'];
                // # updating the Session
                
                if ($temp_name!==$username){
                    $result1 = $conn->query("SHOW TABLES");
                    $tables = $result1->fetch_all();
                    $columnName = 'dietitianuserID';
                    
                    // Iterate through each table
                    foreach ($tables as $table) {
                        $tableName = $table[0];
                        
                        // Check if the column exists in the current table
                        $checkColumnQuery = "SHOW COLUMNS FROM $tableName LIKE '".$columnName."'";
                        $columnExistsResult = $conn->query($checkColumnQuery);
                        
                        if ($columnExistsResult->num_rows > 0) {
                            // The column exists in the current table
                            $updateStatement = "UPDATE $tableName SET dietitianuserID = '".$username."'WHERE dietitianuserID='".$temp_name."'";
                            $conn->query($updateStatement);
                        }
                    }
                }
                
                // header("Location: profile_settings_show.php");
                // exit;
                
                echo "<script>window.location = 'profile_settings_show.php'</script>"; // use for redirecting to different page
            }
            else{
                die(mysqli_error($conn));
            }
        }
        if(isset($_POST['save_socials'])){
            $socials = $_POST['socials'];
            $link = $_POST['link'];
            // echo "<script>console.log('This is socials:$socials');</script>";
            $sql_3 = "UPDATE dietitian SET $socials = '$link' WHERE dietitianuserID = '{$_SESSION['dietitianuserID']}'";
            $result4 = $conn->query($sql_3);
            if ($result4){
                echo "<script>console.log('Done!');</script>";
            }
            else{
                die(mysqli_error($conn));
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFITS</title>
    <?php require('constant/head.php'); ?>

</head>
<style>
    body {
        font-family: 'NATS', sans-serif !important;
        font-weight: 400;

    }

    ::placeholder {
        color: #AEAEAE;
        padding: 10px;
    }

    .maincontainer {
        display: flex;
        flex-direction: column;
        padding-top: 2rem;
        padding-left: 2.5rem;
        padding-right: 4rem;
    }

    .maincontainer_wrapper {
        display: flex;
        justify-content: space-between;
        font-size: 25px;

    }

    .input_field {
        width: 342px;
        height: 48px;
        background: #FFFFFF;
        box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        border: none;
        padding: 10px;
        color: #AEAEAE;

    }

    .gender {
        width: 157px;
        height: 48px;
        background: #FFFFFF;
        box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        border: none;
        padding: 10px;
        color: #AEAEAE;

    }

    .editbutton {
        width: 342px;
        height: 48px;
        background: #0177FD;
        border-radius: 10px;
        color: white;
        border: none;
        font-size: 29px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        margin-top: 3rem;
    }

    .sharebutton {
        width: 342px;
        height: 48px;
        border-radius: 10px;
        font-size: 29px;
        background: #FFFFFF;
        border: 2px solid #0177FD;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        margin-top: 3rem;
        color: #0177FD;

    }

    .footer {
        display: flex;
        gap: 14.5%;
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

    .modal2 {
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

    .modal2:target {
        visibility: visible;
        opacity: 1;
    }

    .popup {

        margin: 290px;
        margin-left: 550px;
        padding: 20px;
        background: #fff;
        box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
        border-radius: 25.5283px;
        width: 400px;
        position: relative;
        transition: all 5s ease-in-out;

    }

    .popup h2 {
        margin-top: 0;
        color: #333;
        font-family: Tahoma, Arial, sans-serif;
    }

    .popup .close {

        transition: all 200ms;
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
        margin-left: 480px;
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
        margin-left: 500px;
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
        display: flex;
        align-items: center;
    }

    .addBtn1 {
        border: none;
        background: #8C68F8;
        border-radius: 8px;
        width: 185px;
        height: 50px;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        margin-right: 0.7rem;
    }

    .discard {
        border: 2px solid #8C68F8;
        background: white;
        border-radius: 8px;
        padding: 0.5rem;
        width: 182px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
    }

    .d-flex {
        display: flex !important;
        justify-content: center;
    }

    .modal-content2 {
        margin: 290px;
        margin-left: 550px;
        padding: 20px;
        background: #fff;
        box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
        border-radius: 25.5283px;
        width: 400px;
        position: relative;
        transition: all 5s ease-in-out;
    }

    @media screen and (max-width: 350px) {
        .gender {
            width: 100px !important;
        }
    }
    @media screen and (max-width: 450px){
    .modal-img .upload {
        margin-left: 0 !important;
    }
}

    @media screen and (max-width: 1200px) {
        .input_field {
            width: auto !important;
        }

        .editbutton {
            width: auto !important;
        }

        .sharebutton {
            width: auto !important;
        }

        .footer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 0rem;

        }

        .maincontainer {
            padding-right: 2rem;
        }

        .popup {
            margin-left: 10% !important;
            margin-right: 10% !important;
            width: auto
        }

        .modal-img {
            margin-left: 10% !important;
            margin-right: 10% !important;
            width: auto;

        }

        .modal-content {
            margin-left: 10% !important;
            margin-right: 10% !important;
            width: auto;
        }
        .modal-content2 {
            margin-left: 10% !important;
            margin-right: 10% !important;
            width: auto;
        }

        .modal-content #socials {
            width: 100%;
        }

        .modal-img .upload .upload-btn {
            width: auto;
        }

        @media screen and (max-width: 1120px) {
            .maincontainer_wrapper {
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 1rem;
            }

        }

    }
</style>

<body>
    <div class="maincontainer">
        <h1 style="font-size:40px;fontweight:400;padding-bottom:1rem">Profile Settings</h1>
        <form class="maincontainer_wrapper" id="maincontainer_wrapper"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="leftside" style="display:flex;flex-direction:column;gap:1rem">
            <?php $sql  = "SELECT * FROM dietitian WHERE dietitianuserID = '{$_SESSION['dietitianuserID']}'";
            global $conn;
            $result = $conn->query($sql);
            $data = $result->fetch_assoc();
        
            ?>
            
                <span style="display:flex;flex-direction:column">
                    User ID <input readonly type="text" class="input_field" placeholder="<?=$data['dietitian_id']?>" value="<?=$data['dietitian_id']?>" required>
                </span>
                <span style="display:flex;flex-direction:column">
                    Name <input type="text" class="input_field" name="name" placeholder="<?=$data['name']?>" value="<?=$data['name']?>" required>
                </span>
                <span style="display:flex;flex-direction:column">
                    Email <input type="text" class="input_field" placeholder="<?=$data['email']?>" value="<?=$data['email']?>" name="email" required><!-- <?php //if($data['socialLogin']==1){echo "readonly";}else{echo "name='email'";} ?> -->
                </span>
                <span style="display:flex;flex-direction:column">
                    Mobile No <input type="text" class="input_field" name="mobile" maxlength="10" placeholder="<?=$data['mobile']?>" value="<?=$data['mobile']?>" required>
                </span>
                <span style="display:flex;flex-direction:column">
                    Qualification <input type="text" class="input_field" name="qualification" placeholder="<?=$data['qualification']?>" value="<?=$data['qualification']?>" required>
                </span>
                <span style="display:flex;flex-direction:column">
                    <span>
                        Password
                        <span style="display:flex;align-items:center;justify-content:space-between "
                            class="input_field"><input disabled type="password" id="password" placeholder="XXXXX" value="<?=$data['password'];?>" style="border:none;" required>
                            <img style="cursor: pointer;width:25px;" src="<?= $DEFAULT_PATH ?>assets/images/eye.svg" id="eyeicon" alt="eye">
                            </span>
                            
                    </span>
                    <span style="font-size:15px;display:flex;justify-content:space-between;text-decoration:none"><a
                            href="forgot_password.php">Change Paswword</a> <a href="forgot_password.php">Forget
                            Password</a></span>
                </span>
            </div>

            <div class="middle" style="display:flex;flex-direction:column;gap:1rem">
                <span style="display:flex;flex-direction:column">
                    Username <input type="text" class="input_field" name = "username" placeholder="<?=$data['dietitianuserID']?>" value="<?=$data['dietitianuserID']?>" required> <!-- <?php //if($data['socialLogin']==1){echo "readonly";}else{echo "name='dietitianuserID'";} ?> -->
                </span>

                <span style="display:flex;flex-direction:column">
                    Location <input type="text" class="input_field" name="location" placeholder="<?=$data['location']?>" value="<?=$data['location']?>" required>
                </span>


                <span style="display:flex;gap:1.5rem">
                    <span style="display:flex;flex-direction:column">
                        Gender <input type="text" placeholder="M / F" name="gender" class="gender" value="<?=$data['gender']?>" required>
                    </span>
                    <span style="display:flex;flex-direction:column">
                        Age <input type="text" placeholder="XXXXX" class="gender" name="age" value=<?=$data['age']?> required>
                    </span>

                </span>

                <span style="display:flex;flex-direction:column">
                    Experience <input type="text" class="input_field" placeholder="XXXXX" name="experience" value="<?=$data['experience']?>" required>
                </span>
                <span style="display:flex;flex-direction:column">
                    Refferal Code <input type="text" class="input_field" placeholder="XXXXX" <?php if($data['referral_code']==""){echo 'name="referral_code"';}else{echo 'readonly';} ?>  value="<?=$data['referral_code']?>"  required>
                </span>
                <a href="#popup3" style="text-decoration:none;background:none;color:black">
                    <span style="display:flex;flex-direction:column">
                        Acheivements and Certificates <input type="text" class="input_field" placeholder="XXXXX" name="achievements"  value="<?=$data['achievements']?>"  required>
                    </span>
                </a>
            </div>
            <div class="rightside" style="display:flex;flex-direction:column;justify-content:center;align-items:center;gap:2rem">
                <div class="profiles" style="display:flex;flex-direction:column;position:relative; width:fit-content;">
                    <img class="profile_image" src="<?php if ($data['p_p']!=='user-default.png'){echo 'uploads/profile/images/'.$data['p_p'];}else{echo $DEFAULT_PATH.'assets/images/'.$data['p_p'];}?>" style="height: 150px; width: 150px; border-radius: 25px;z-index:-1;" alt="">
                    <a href="#popup2" class="edit" id="edit" style="border:3px solid white; background:#0177FD; border-radius:50%; width:38px;height:38px;position:absolute;right:15px;bottom:18px;text-decoration: none;display:flex;align-items:center;justify-content:center">
                        <img src="<?= $DEFAULT_PATH ?>assets/images/Edit-Img.svg"></a>

                </div>
                <input class="chooseimage" id="chooseimage" onchange="showImagePreview(event)" type="file" name="my_image" style="width: 250px; display:none;" value="<?=$data['p_p'];?>" /><!--required-->
                <div style="display:flex;flex-direction:column;gap:2rem">
                    <div style="display:flex;align-items:center;gap:1rem"><img src="<?= $DEFAULT_PATH ?>assets/images/WhatsApp.svg"><span>Whatsapp</span></div>
                    <div style="display:flex;align-items:center;gap:1rem"><img src="<?= $DEFAULT_PATH ?>assets/images/twitter.svg"><span>Twitter</span></div>
                    <div style="display:flex;align-items:center;gap:1rem"><img src="<?= $DEFAULT_PATH ?>assets/images/facebook.svg"><span>Facebook</span></div>
                    <div style="display:flex;align-items:center;gap:1rem"><img src="<?= $DEFAULT_PATH ?>assets/images/LinkedIn-Circled.svg"><span>Linkdin</span></div>
                    <div style="display:flex;align-items:center;gap:1rem"><img src="<?= $DEFAULT_PATH ?>assets/images/Instagram.svg"><span>Instagram</span></div>
                </div>
                <button type="button" id="myBtn" style="border:none; background:none;"><img src="<?= $DEFAULT_PATH ?>assets/images/edit.svg"></button>
            </div>
        </form>
        <div class="footer">
            <button type="submit" class="editbutton" name="editbutton" value="submit" form="maincontainer_wrapper">Confirm Changes</button><!---->
            <a id="sharebutton" class="sharebutton" style="text-decoration: none;" href="#popup1">Share Profile</a>
        </div>
    </div>
            

    <!-------------------------------------POPUPS-------------------------------------------------->
    <div id="popup1" class="overlay">
        <div class="popup">
            <div style="display:flex;justify-content:space-between;align-items:center">
                <h5>Share Via <img src="<?= $DEFAULT_PATH ?>assets/images/Share.svg"></h5>
                <a class="img-close" href="#" style="text-decoration:none;color:black">&times;</a>
            </div>

            <div class="content" style="display:flex;gap:1rem;justify-content:center">
                <a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><img
                        src="<?= $DEFAULT_PATH ?>assets/images/WhatsApp.svg"></a>
                <a class="twitter-share-button" href="https://twitter.com/intent/tweet"><img
                        src="<?= $DEFAULT_PATH ?>assets/images/twitter.svg"></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=#url" target="_blank"> <img
                        src="<?= $DEFAULT_PATH ?>assets/images/facebook.svg"></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={url}"><img
                        src="<?= $DEFAULT_PATH ?>assets/images/LinkedIn-Circled.svg"></a>
                <img src="<?= $DEFAULT_PATH ?>assets/images/Instagram.svg">
            </div>
        </div>
    </div>

    <div id="popup2" class="my-modal">
        <div class="modal-img">
            <a class="img-close" href="#">&times;</a>
            <div class="d-flex pop">
                <img class="profile_image" src="<?php if ($data['p_p']!=='user-default.png'){echo 'uploads/profile/images/'.$data['p_p'];}else{echo $DEFAULT_PATH.'assets/images/'.$data['p_p'];}?>">
                <div class="d-flex flex-column upload">
                    <button class="upload-btn" id="upload-btn" onclick="clickMe()">Upload New<img src="<?= $DEFAULT_PATH ?>assets/images/Edit-Profile.svg" class="up"> </button>
                    <button class="upload-btn">Remove Picture<img src="<?= $DEFAULT_PATH ?>assets/images/del-Profile.svg" class="del"></button>
                </div>
            </div>
        </div>
    </div>
    <div id="popup3" class="modal2">
        <div class="modal-content2">
            <a class="img-close" style="display:flex;justify-content:right;color:black;text-decoration:none"
                href="#">&times;</a>
            <div style="display:flex;justify-content:space-evenly;margin-top:35px;">
                <button class="addBtn1" name="save_socials">Save Changes</button><!-- type="submit" -->
                <button class="discard">Discard</button>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
        <!--Modal content-->
        <div class="modal-content">
            <span class="close"></span>
            <form method="post" id="media_update" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="form-floating">
                    <select select class="form-select" name="socials" id="socials" onchange="findstuf()" aria-label="Floating label select example">
                        <option selected>Platform</option>
                        <option value="whatsapp"><img src="<?= $DEFAULT_PATH ?>assets/images/WhatsApp.svg">WhatsApp</option>
                        <option value="twitter">Twitter</option>
                        <option value="facebook">Facebook</option>
                        <option value="linkedin">LinkedIn</option>
                        <option value="instagram">Instagram</option>
                    </select>
                    <br>
                    <input type="text" placeholder="Copy link here..." name="link" id="linksocials" style="width:100%;height:50px;background-color:white;box-shadow: 0px 1.76208px 5.28625px rgba(0, 0, 0, 0.25);border-radius: 8.81041px; color: #BBBBBB;border:none">
                    <br>
                    <div style="display:flex;justify-content:space-evenly;margin-top:35px;">
                        <button type="submit" class="addBtn1" name="save_socials">Save Changes</button><!--  -->
                        <button class="discard">Discard</button>
                    </div>
                </div>
            </form>
         </div>
        </div>
    </div>
    
    
    <script>
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");
        var upload = document.getElementById("upload-btn");
        var chooseimage = document.getElementById("chooseimage");
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];

    //  this condition is because in the socialLogin the "eyeicon == null" 
    //  as it is null in the socialLogin it will not run the code below...
        if(eyeicon !== null){
       
            eyeicon.addEventListener('click',()=>{
                if(password.type == 'password'){
                    password.type = "text";
                    eyeicon.src = "<?= $DEFAULT_PATH ?>assets/images/eye-open.png";
                   
                }
                else if(password.type == 'text'){
                    password.type = "password";
                    eyeicon.src = "<?= $DEFAULT_PATH ?>assets/images/eye.svg";
                    
                }
            })
        } 
        const clickMe = () => {
            chooseimage.click();
        }
        
        function showImagePreview(event) {
            var input = event.target;
            let imagePreview = Array.from(document.getElementsByClassName('profile_image'));
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.forEach((img, index) => {
                        img.setAttribute('src', e.target.result);
                    });
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        const findstuf = ()=>{
            <?php  $sql5  = "SELECT * FROM dietitian WHERE dietitianuserID = '{$_SESSION['dietitianuserID']}'";
                $result = $conn->query($sql5);
                $data2 = $result->fetch_assoc();?>
            let obj = {
                "platform": 'Copy link here...',
                "instagram": '<?=$data2['instagram']?>',
                "whatsapp": '<?=$data2['whatsapp']?>',
                "linkedin": '<?=$data2['linkedin']?>',
                "twitter": '<?=$data2['twitter']?>',
                "facebook": '<?=$data2['facebook']?>'
            };
            let social = document.getElementById('socials').value;
            let input = document.getElementById("linksocials");
            let lastdata = input.value;
            input.value = "";
            if (obj[social]==""){
                input.Placeholder = "Empty!";
            }
            else{
                input.placeholder = `${obj[social]}`;
                input.value = `${obj[social]}`;
            }
        }
        
        // this block is for show and hide of the popUp named "myModel"
        btn.addEventListener('click', (e)=> {
            e.preventDefault();
            modal.style.display = "block";
        })
        span.addEventListener('click', ()=> {
            modal.style.display = "none";
        })
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        
    </script>
    <?php require('constant/scripts.php'); ?>
</body>

</html>