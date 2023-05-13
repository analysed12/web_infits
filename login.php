<?php
include "server.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id"
        content="3315662633-6joqrjkcqimq2ms96p4ls8ie96e5liq1.apps.googleusercontent.com">
    <title>sign in</title>
    <?php require('constant/head.php');?>
</head>
<style>
.abcRioButton {
    border-radius: 10px;
    box-shadow: none !important;
}

.abcRioButtonContentWrapper {
    height: 100%;
    width: 100%;
    border: 1px solid #EAEAEA;
    border-radius: 10px;
    background: #FFFFFF;
    margin-right: 15px;
    padding: 0 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.abcRioButtonLightBlue {
    color: #4B99FB;
    font-weight: bolder;
    height: 50px !important;
    width: 130px !important;
    border-radius: 10px !important;

}

.abcRioButtonIconImage {
    height: 35px !important;
    width: 35px !important;
}

.abcRioButtonIconImage svg {
    height: 30px !important;
    width: 30px !important;
}

.abcRioButtonContents {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 20px !important;
    color: #4B99FB;
}

body {
    S max-height: 100vh;
    margin: 0;
    overflow-x: hidden;
    overflow-y: scroll;
    font-family: 'NATS', sans-serif;
}

.top_bar {
    display: flex;
    justify-content: space-between;
    S
}

.top_bar img {
    S margin-top: -20px;
    width: 210px;
    height: auto;
}

.bg {
    position: absolute;
    margin-top: -10px;
    z-index: -1;
    S
}

#home {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 500;
    font-size: 30px;

    color: #8081F9;
    background-color: #FFFFFF;
    border: none;
    margin-bottom: 10px;
    margin-top: 2rem;
}


.sign {
    background: #F8F8FF;
    box-shadow: 0px 0px 10px #C0C0FF;
    border-radius: 12px;
    width: 117px;
    height: 50px;
    border: none;
    margin-top: 2rem;
    margin-right: 2rem;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 500;
    font-size: 30px;
    color: #8081F9;
    S margin-left: 0.7rem;
}

.mobile img {
    width: 550px;
    height: 550px;
    margin-top: 6rem;
}

.col-sm-6 {
    display: flex;
    justify-content: center;
    align-items: center;

}

.col-sm-8 {
    display: flex;
    justify-content: center;
    flex-direction: row;
    align-items: center;
}

.col-sm-4 {
    display: flex;
    justify-content: center;
    align-items: center;
}

.left_links {
    display: flex;
    justify-content: space-between;
    align-items: left;
    margin-right: 15%;
    flex-direction: column;
    padding: 20px;
}

.left_links span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 30px;
    line-height: 40px;
    letter-spacing: 0.02em;
    color: #4F1963;
    S
}

.link {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 25px;
    line-height: 40px;
    letter-spacing: 0.02em;
    color: #8E8E8E;
}

.right_links {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: -30px;
    flex-direction: column;
    z-index: -1;
    margin-bottom: -110px;
}

.get-vec {
    margin-bottom: -110px;
}

.play_store {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: row;
    padding: 20px;
}

.content {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 20px;
}

.apple {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    background: #FFFFFF;
    border: 2px solid #817FF8;
    border-radius: 50px;
    width: 176px;
    height: 64px;
    margin-right: 10px;
    S
}

.content p {
    font-family: 'Calibri';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 90.84%;
    color: #000000;
}

.content span {
    font-family: 'Calibri';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 90.84%;
    color: #000000;
}

.apple img {
    margin-top: -110px;
}

.play {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    background: #FFFFFF;
    border: 2px solid #817FF8;
    border-radius: 50px;
    width: 180px;
    height: 64px;
    margin-left: 10px;
}

.play p {
    font-family: 'Calibri';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 90.84%;
    color: #000000;
}

.play span {
    font-family: 'Calibri';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 90.84%;
    color: #000000;
}

.play img {
    margin-top: -110px;
    margin-left: 10px;
}

.sform {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-top: -2rem;

}

.mt-5 {
    margin-right: 6.5rem;
    margin-top: 1rem !important;
    margin-bottom: 1.5rem;
}

.bottom_logo {
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.bottom_logo img {
    margin-bottom: -110px;
}

.copy {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    color: #A6A6A6;
    margin-top: 6rem;

}

.vec-sub {
    font-family: 'NATS';
    font-size: 25px;
    font-weight: 500;
    text-align: center;
}

.bottom_patch {
    margin-left: -500px;
    z-index: -1;
}

.social_links {
    display: flex;
    justify-content: space-between;
    flex-direction: row;
}

.header_sigin {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

}

.header_sigin img {
    margin-bottom: -130px;
    margin-left: 130px;
    width: 160px;
    height: 180px;
}

.header_sigin span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 800;
    font-size: 50px;
    line-height: 89.84%;
    color: #4F1963;

}

.gf_btns {
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    padding: 10px;
    margin-top: -1rem;
}

.google {
    display: flex;
    align-items: center;
    text-decoration: none;
    padding: 0px 12px;
    height: 50px;
    width: 150px;
    border-radius: 15px;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 23px;
    border: 1px solid #EAEAEA;
    border-radius: 15px;
    background: #FFFFFF;
    margin-right: 10px;
    color: #4B99FB;
}

.google:hover {
    box-shadow: 0px 0px 10px #B4B4B4;
}

.facebook:hover {
    box-shadow: 0px 0px 10px #B4B4B4;
}

.facebook {
    padding: 0px 12px;
    display: flex;
    align-items: center;
    text-decoration: none;
    height: 50px;
    width: 160px;
    border-radius: 15px;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 23px;
    border: 1px solid #EAEAEA;
    border-radius: 15px;
    background: #FFFFFF;
    margin-left: 10px;
    color: #4B99FB;
}

.form_inputs {
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    padding: 50px;
    margin-top: -2rem;
}

#email {
    background: #F9F9FF;
    border: 1px solid #F9F9FF;
    border-radius: 15px;
    padding: 10px;
    width: 332px;
    height: 50px;
    margin: 10px;
}

#password {
    background: #F9F9FF;
    border: 1px solid #EAEAEA;
    border-radius: 15px;
    padding: 10px;
    width: 332px;
    height: 50px;
    margin: 10px;
}

.input_container {
    position: relative;
    padding: 0;
    margin: 0;
}

.input {
    height: 20px;
    margin: 0;
    padding-left: 30px;
}

.input_img {
    position: absolute;
    bottom: 8px;
    left: 10px;
    width: 10px;
    height: 10px;
}

.ip_box {
    display: flex;

    align-items: center;
    flex-direction: row;
    color: #B4B4B4;
    margin-left: 1rem;


}

.ip_box img {
    z-index: 2;
    margin-right: -45px;
}

.sign_up {
    background: #4B99FB;
    border-radius: 15px;
    width: 130px;
    height: 50px;
    border: none;
    color: #FFFFFF;
}

.sign_btn_section {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;

    border-radius: 15px;

}

.sign_in_sec {
    margin-left: 30px;
}

.input_bar {
    background: #F9F9FF;
    border: 1px solid #F9F9FF;
    border-radius: 15px;
    padding-left: 40px !important;
    width: 30px;
    height: 50px;
    margin: 10px;
    font-family: 'manrope', sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 15px;
    color: #B4B4B4;
}


.sign_in_sec span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 15px;
    line-height: 121.34%;
    text-align: right;
    color: #4B99FB;
}

.row {
    margin-left: 2rem;
}

.down {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 124.84%;
    color: #A6A6A6;
    margin-top: 3rem;
    gap: 2rem;
}

@media screen and (max-width: 720px) {
    .sform {
        margin-left: 9rem;
    }
}

@media screen and (max-width: 720px) {
    #home {
        margin-left: 13rem;
    }

    .mobile img {
        width: 400px;
        height: 400px;
        margin-left: 6rem;
    }

    .left_links {
        margin-left: 8rem;
    }

    .right_links {
        margin-left: 3rem;
        margin-top: 2rem;
    }

    .sign {
        margin-left: 2rem;
    }

    #hr {

        display: none;
    }

    #btml {
        margin-left: 4rem;
    }

}

@media screen and (max-width: 768px) {
    #parent-lg {
        display: none !important;
    }

}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
    .mobile img {
        width: 400px;
        height: 400px;

    }

    .bottom_patch {
        margin-left: -530px;
    }
}

@media screen and (max-width: 768px) {
    .sign {
        margin-left: 11rem;
    }

}
</style>

<body>

    <div class="top_bar">
        <div class="left">
            <div class="bg">
                <img src="<?=$DEFAULT_PATH?>assets/images/Vector 1.svg" style="width:25rem">
            </div>
            <img src="<?=$DEFAULT_PATH?>assets/images/INFITS.svg" style="margin-top:0.8rem;margin-left:0.8rem">
        </div>
        <div class="up">
            <button id="home" onclick="window.location.href = 'index.php';">Home</button>
            <button class="sign" onclick="window.location.href = 'register.php';">SignUp</button>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6">

            <div class="sform">
                <div class="header_sigin">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Vector 5.svg">
                    <span style="font-size: 100px;margin-right: 5rem;font-weight:500">Sign In</span>


                </div>
                <span class="mt-5"><img src="<?=$DEFAULT_PATH?>assets/images/Line 70.svg"><span
                        style="color: #4F1963;font-size: 25px;font-weight: 400;margin-left:0.8rem">Sign In
                        With</span></span>
                <div class="gf_btns">
                    <a href="<?php echo $client->createAuthUrl(); ?>" class="google">
                        <img style="width: 30px; height: 30px;" src="<?=$DEFAULT_PATH?>assets/images/Google.svg" alt="">
                        <span class="ps-2">Google</span>
                    </a>

                    <form method="post" action="#">
                        <button type="submit" name="login" value="Facebook" class="facebook">
                            <img style="width: 30px; height: 30px;" src="<?=$DEFAULT_PATH?>assets/images/Facebook.svg"
                                alt="">
                            <span class="ps-2">Facebook</span>
                        </button>
                    </form>
                    <!-- Make sure that you are viewing the page on a web server or localhost. If you are viewing the page locally, the button may not show up because Facebook requires a valid URL to work. -->


                </div>
                <div class="or" style="margin-top:1rem">
                    <span style="color: #4F1963;font-size:25px ;font-weight:400">or</span>
                </div>

                <div class="form_inputs login-area">
                    <form action="" method="post">
                        <?php include('errors.php');
                        ?>

                        <!-- Main Form -->
                        <div class="ip_box">
                            <img style="height: 25px;width: 25px" src="<?=$DEFAULT_PATH?>assets/images/Email.svg">
                            <input class="input_bar" id="email" type="text" name="dietitianuserID" placeholder="Email">
                        </div>
                        <div class="ip_box">
                            <img style="height: 25px; width: 25px;" src="<?=$DEFAULT_PATH?>assets/images/Password.svg"
                                alt="">
                            <input name="password" class="input_bar" id="password" type="password"
                                placeholder="Password">
                            <img style="cursor: pointer; width: 22px; height: 19px; margin-left:-38px;"
                                src="<?=$DEFAULT_PATH?>assets/images/eye.svg" id="eyeicon" alt="eye">
                        </div>

                        <a href="forgot_password.php"
                            style="display: flex; justify-content: end; margin-right: 30px; text-decoration:none">Forgot
                            password?</a>
                        <br><br>
                        <div class="sign_btn_section">
                            <div class="sign_btn" style="background: #4B99FB;border-radius:15px">
                                <button type="submit" class="btn sign_up" name="login_user"
                                    style="font-size: 25px;">Sign In</button>
                            </div>
                            <p></p>
                            <div class="sign_in_sec">
                                <span style="font-size:20px">Don't have an Account?</span>
                                <div><a href="register.php"
                                        style="text-decoration:none;color:#4F1963;font-weight:500;font-size:20px;">Sign
                                        up</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mobile">
                <img src="<?=$DEFAULT_PATH?>assets/images/mobile.svg" alt="">
            </div>

        </div>
        <hr id="hr" style="border: 2px solid #EDEDFE; width: 1204px;">
    </div>
    <div class="row" id="parent-lg" style="margin-top:2rem">
        <div class="col-sm-4 " id="btml">
            <div class="bottom_logo">
                <img src="<?=$DEFAULT_PATH?>assets/images/INFITS.svg" alt="">
                <div class="vec-sub"><span>Fitter</span><span class="ms-2">. Healthier</span><span class="ms-2">.
                        Happier</span></div>
                <div class="social_links">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Facebook.svg" alt="">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Twitter.svg" alt="">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Linkedin.svg" alt="">

                </div>
                <span class="copy">Copyright 2022 Infits. All rights reserved.</span>
            </div>

            <div class="bottom_patch">
                <img src="<?=$DEFAULT_PATH?>assets/images/Vector 2.svg" style="margin-left:3rem">
            </div>

        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6">
                    <div class="left_links" style="margin-right: 10rem;">
                        <span class="link" style="margin-top:3rem; color: #4F1963;">Company</span>
                        <a class="link" style="color: #8E8E8E; text-decoration: none;">About</a>
                        <a class="link" style="color: #8E8E8E; text-decoration: none;">Features</a>
                        <a class="link" style="color: #8E8E8E; text-decoration: none;">Testimonials</a>
                        <a class="link" style="color: #8E8E8E; text-decoration: none;">Get in touch</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="right_links">
                        <img class="get-vec" src="<?=$DEFAULT_PATH?>assets/images/Vector 3.svg"
                            style="width:30rem;height:8rem">
                        <span style="color: #4F1963;font-size:25px">Get the app</span>

                        <div style="display: flex; gap:1rem;">
                            <a href="#"
                                style="width: 176px;height: 64px;justify-content: space-around;justify-content: center;align-items: center;background: #FFFFFF;border: 2px solid #817FF8;border-radius: 50px; display: flex; flex-direction: row; padding:2px; text-decoration: none;">
                                <div><img style="margin-right: 0.5rem;" src="<?=$DEFAULT_PATH?>assets/images/Apple.svg"
                                        alt="apple"></div>
                                <div style="display: flex; flex-direction: column;">
                                    <div>
                                        <p
                                            style=" margin-top: 1rem; font-weight: 400;font-size: 12px;line-height: 90.84%;color: #000000;">
                                            Download on the</p>
                                    </div>
                                    <div>
                                        <p style=" font-weight:600;font-size: 18px;line-height: 90.84%;color: #000000;">
                                            App Store</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#"
                                style="width: 176px;height: 64px;justify-content: space-around;justify-content: center;align-items: center;background: #FFFFFF;border: 2px solid #817FF8;border-radius: 50px; display: flex; flex-direction: row; padding:2px;text-decoration: none;">
                                <div><img style="margin-right: 0.5rem;"
                                        src="<?=$DEFAULT_PATH?>assets/images/Google Play.svg" alt="apple">
                                </div>
                                <div style="display: flex; flex-direction: column;">
                                    <div>
                                        <p
                                            style=" margin-top: 1rem; font-weight: 400;font-size: 12px;line-height: 90.84%;color: #000000;">
                                            GET IT ON</p>
                                    </div>
                                    <div>
                                        <p style=" font-weight:600;font-size: 18px;line-height: 90.84%;color: #000000;">
                                            Google Play</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="down">
                            <h6>Terms of use</h6>
                            <h6>Privacy Policy</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--------------------------------------mobile-view---------------------------------------------------->
    <div class="row  d-lg-none d-md-none d-xl-none" id="parent" style="margin-top:2rem">
        <!-- component-1 -->
        <div class="col-sm-8" style="margin-bottom:12rem;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="left_links">
                        <span class="link" style="margin-top:3rem; color: #4F1963;">Company</span>
                        <a class="link" style="color: #8E8E8E; text-decoration: none;">About</a>
                        <a class="link" style="color: #8E8E8E;text-decoration: none;">Features</a>
                        <a class="link" style="color: #8E8E8E;text-decoration: none;">Testimonials</a>
                        <a class="link" style="color: #8E8E8E;text-decoration: none;">Get in touch</a>
                    </div>
                </div>
                <div class="col-sm-6 mt-5">
                    <div class="right_links">
                        <img class="get-vec" src="assets/images/Vector 3.svg" style="width:30rem;height:8rem;">
                        <span style="color: #4F1963;font-size:30px">Get the app</span>
                        <div style="display: flex; gap:1rem;">
                            <a href="#"
                                style="width: 176px;height: 64px;justify-content: space-around;justify-content: center;align-items: center;background: #FFFFFF;border: 2px solid #817FF8;border-radius: 50px; display: flex; flex-direction: row; padding:2px; text-decoration: none;">
                                <div><img style="margin-right: 0.5rem;" src="<?=$DEFAULT_PATH?>assets/images/Apple.svg"
                                        alt="apple"></div>
                                <div style="display: flex; flex-direction: column;">
                                    <div>
                                        <p
                                            style=" margin-top: 1rem; font-weight: 400;font-size: 12px;line-height: 90.84%;color: #000000;">
                                            Download on the</p>
                                    </div>
                                    <div>
                                        <p style=" font-weight:600;font-size: 18px;line-height: 90.84%;color: #000000;">
                                            App Store</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#"
                                style="width: 176px;height: 64px;justify-content: space-around;justify-content: center;align-items: center;background: #FFFFFF;border: 2px solid #817FF8;border-radius: 50px; display: flex; flex-direction: row; padding:2px;text-decoration: none;">
                                <div><img style="margin-right: 0.5rem;"
                                        src="<?=$DEFAULT_PATH?>assets/images/Google Play.svg" alt="google"></div>
                                <div style="display: flex; flex-direction: column;">
                                    <div>
                                        <p
                                            style=" margin-top: 1rem; font-weight: 400;font-size: 12px;line-height: 90.84%;color: #000000;">
                                            GET IT ON</p>
                                    </div>
                                    <div>
                                        <p style=" font-weight:600;font-size: 18px;line-height: 90.84%;color: #000000;">
                                            Google Play</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="down">
                            <h6>Terms of use</h6>
                            <h6>Privacy Policy</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- component-2 -->
        <div class="col-sm-4" id="btml">
            <div class="bottom_logo">
                <img src="<?=$DEFAULT_PATH?>assets/images/INFITS.svg" alt="">
                <div class="vec-sub"><span>Fitter</span><span class="ms-2">. Healthier</span><span class="ms-2">.
                        Happier</span></div>
                <div class="social_links">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Facebook.svg" alt="">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Twitter.svg" alt="">
                    <img src="<?=$DEFAULT_PATH?>assets/images/Linkedin.svg" alt="">

                </div>
                <span class="copy">Copyright 2022 Infits. All rights reserved.</span>
            </div>

            <div class="bottom_patch">
                <img src="<?=$DEFAULT_PATH?>assets/images/Vector 2.svg" style="margin-left:3rem">
            </div>

        </div>
    </div>
    </div>
    
    <?php require('constant/scripts.php');?>
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
    <!-----------------------------facebook login code----------------------------------->

    <!-- <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '913030780033033',
      cookie     : true,
      xfbml      : true,
      version    : 'v12.0'
    });
      FB.AppEvents.logPageView();   
    };
   (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    function fbLogin(){
        FB.login(function (response){
            if(response.authResponse){
                fbAfterLogin();
            }
        });
    } 

    function fbAfterLogin(){
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') { 
            FB.api('/me', function(response) {
                console.log(response);
             jQuery.ajax({
              url: 'check_fblogin.php',
              type: 'post',
              data: 'name='+response.name+'&id='+response.id,
              success:function(result){
                 window.location.href = 'login.php';
              }
             });
      
    });
    }
});
    }
</script> -->
</body>

</html>